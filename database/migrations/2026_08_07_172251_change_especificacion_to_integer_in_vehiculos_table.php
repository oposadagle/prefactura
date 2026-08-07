<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $this->saveAllViewDefs();
        $this->dropAllDependentViews();
        $this->alterColumnToInteger();
        $this->restoreMissingViews();
    }

    public function down(): void
    {
        $this->saveAllViewDefs();
        $this->dropAllDependentViews();
        $this->alterColumnToVarchar();
        $this->restoreMissingViews();
    }

    private function saveAllViewDefs(): void
    {
        DB::statement("
            CREATE TEMP TABLE IF NOT EXISTS _saved_view_defs AS
            SELECT c.relname AS name, pg_get_viewdef(c.oid, true) AS def
            FROM pg_class c
            JOIN pg_namespace n ON c.relnamespace = n.oid
            WHERE c.relkind = 'v' AND n.nspname = 'public'
        ");
    }

    private function dropAllDependentViews(): void
    {
        DB::statement("
            DO \$\$
            DECLARE
                r record;
                found boolean;
            BEGIN
                LOOP
                    found := false;
                    FOR r IN
                        SELECT DISTINCT dv.relname AS view_name
                        FROM pg_depend
                        JOIN pg_rewrite ON pg_depend.objid = pg_rewrite.oid
                        JOIN pg_class AS dv ON pg_rewrite.ev_class = dv.oid
                        JOIN pg_class AS st ON pg_depend.refobjid = st.oid
                        JOIN pg_attribute ON pg_depend.refobjid = pg_attribute.attrelid
                            AND pg_depend.refobjsubid = pg_attribute.attnum
                        WHERE st.relname = 'vehiculos'
                            AND pg_attribute.attname = 'especificacion'
                    LOOP
                        EXECUTE 'DROP VIEW IF EXISTS ' || r.view_name || ' CASCADE';
                        found := true;
                    END LOOP;
                    EXIT WHEN NOT found;
                END LOOP;
            END
            \$\$;
        ");
    }

    private function alterColumnToInteger(): void
    {
        DB::statement('ALTER TABLE vehiculos ALTER COLUMN especificacion DROP DEFAULT');
        DB::statement('ALTER TABLE vehiculos ALTER COLUMN especificacion TYPE integer USING especificacion::integer');
        DB::statement('ALTER TABLE vehiculos ALTER COLUMN especificacion SET DEFAULT 0');
    }

    private function alterColumnToVarchar(): void
    {
        DB::statement('ALTER TABLE vehiculos ALTER COLUMN especificacion DROP DEFAULT');
        DB::statement('ALTER TABLE vehiculos ALTER COLUMN especificacion TYPE varchar(20) USING especificacion::varchar');
        DB::statement("ALTER TABLE vehiculos ALTER COLUMN especificacion SET DEFAULT ''");
    }

    private function restoreMissingViews(): void
    {
        DB::statement("
            DO \$\$
            DECLARE
                r record;
                remaining integer;
                pass integer := 0;
            BEGIN
                LOOP
                    remaining := 0;
                    FOR r IN
                        SELECT svd.name, svd.def
                        FROM _saved_view_defs svd
                        WHERE NOT EXISTS (
                            SELECT 1 FROM pg_views pv WHERE pv.viewname = svd.name
                        )
                    LOOP
                        BEGIN
                            EXECUTE 'CREATE OR REPLACE VIEW ' || r.name || ' AS ' || r.def;
                        EXCEPTION WHEN OTHERS THEN
                            remaining := remaining + 1;
                        END;
                    END LOOP;

                    pass := pass + 1;
                    EXIT WHEN remaining = 0 OR pass > 20;
                END LOOP;
            END
            \$\$;
        ");

        DB::statement('DROP TABLE IF EXISTS _saved_view_defs');
    }
};
