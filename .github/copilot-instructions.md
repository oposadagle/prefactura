# Prefactura - AI Coding Assistant Guidelines

## Project Overview
**Prefactura** is a Laravel 10 logistics/transport management system built on MySQL with heavy emphasis on data import/export, audit trails, and reporting. The application tracks shipments ("solicitudes"), vehicles, clients, and operational costs.

## Architecture & Key Patterns

### Database Strategy (CRITICAL)
- **Raw Query Preference**: Controllers use `DB::table()` with raw SQL for bulk operations instead of Eloquent Models
- **LOAD DATA INFILE Pattern**: For CSV imports (see `EstadoController::store()`, `store2()`), use:
  ```php
  DB::connection()->getPdo()->exec("LOAD DATA INFILE '{$path}' INTO TABLE {$table} ...")
  // WITH: DB::beginTransaction() / DB::commit() / DB::rollBack()
  ```
- **Transactions Required**: Always wrap multi-step DB operations in `DB::beginTransaction()` blocks
- **Duplicate Detection**: Parse `PDOException` messages for "Duplicate entry" errors to provide user-friendly feedback
- **MySQL Timezone Support**: Database uses `America/Bogota` timezone; use `Carbon::now('America/Bogota')` for timestamps

### Controller Conventions
- **CRUD + Custom Methods**: Resource controllers + custom named methods (e.g., `diario()`, `prefacturas()`, `congelado()`) returning views or exports
- **Response Pattern**: Most methods return `view()` or `Excel::download()` from Maatwebsite
- **Audit Fields**: Always include when inserting:
  - `fecha_creacion`, `create_user`, `update_user`, `created_at`, `updated_at`
  - Set via `Auth::user()->name` for user tracking
- **Date Calculations**: Manual calculations (not Eloquent accessors) using `Carbon` for business logic in loops
- **Validation Messages**: Define custom messages array separately from rules for Spanish error messages

### Data Flow for Shipment Management
1. **Solicitud (Shipment)** → Client places order
2. **Estados/GLE (Tracking)** → Bulk CSV imports via `LOAD DATA INFILE`
3. **Vehiculo (Vehicle)** → Assigned with audit fields, evaluation dates
4. **Exports** → Multiple Excel views (Diarios, Prefacturas, Historicos, etc.) using `Maatwebsite\Excel`

### Key Models & Tables
| Model | Table | Usage |
|-------|-------|-------|
| `Solicitud` | peticiones | Core shipments; has `$fillable` array |
| `Vehiculo` | vehiculos/vehiculares | Vehicles with mandatory audit fields |
| `Cuenta` | cuentas | Cost/accounting data |
| `Cliente` | clientes | Client master data |
| Others | gles, proveedores, locales | Tracking/state data (no Models) |

**Note**: Most tables don't have Eloquent Models; queries use `DB::table()` directly.

### Export Functionality
- **Location**: `app/Exports/*Export.php` using `Maatwebsite\Excel`
- **Pattern**: `SomeExport extends FromQuery`; override `query()` method with filtering logic
- **Chunk Size**: Set `public function chunkSize()` for large datasets (typically 1000)
- **Filter Support**: Many exports accept constructor params (year, month, operator, clients)

## Developer Workflows

### Local Setup
```bash
# Environment
cp .env.example .env
php artisan key:generate

# Dependencies
composer install
npm install

# Database (migrations in database/migrations/)
php artisan migrate

# Running
php artisan serve
npm run dev  # Vite for assets
```

### Database Imports
- CSV files → temp storage via `StoreAs('temp', 'import.csv')`
- Use `Storage::delete()` to clean up after success/failure
- Enable `LOAD DATA LOCAL INFILE` in `config/database.php` (already done; see `PDO::MYSQL_ATTR_LOCAL_INFILE`)

### Testing
- Uses PHPUnit (config: `phpunit.xml`)
- Test structure: `tests/Feature/` and `tests/Unit/`
- Models use `HasFactory` for seeders

### Build & Assets
- **CSS**: `resources/css/app.css` (Tailwind + plugins via config)
- **JS**: `resources/js/app.js` (Vite entry point)
- **Build**: `npm run build` (Vite)
- **Plugins**: jQuery, Flatpickr (dates), Full Calendar, Leaflet (maps)

## Project-Specific Conventions

### Naming
- Spanish column names: `fecha_cargue`, `cedula_conductor`, `fecha_evaluacion`
- View paths: `view('Vehiculo.index')` (PascalCase folders)
- Controllers: Singular resource-based (ClienteController, not ClientsController)

### Auditing & Logging
- Manual audit fields (no eloquent timestamps on some tables)
- `UserLog` & `SolicitudLog` models for action tracking
- Track via `Auth::user()->name` during create/update

### Dates & Timezones
- Store in MySQL; parse with `Carbon::parse()`
- Business logic uses `Carbon::now('America/Bogota')`
- Date formatting: `->format('Y-m-d')` standard; validate with `['digits:4', 'gte:1900']` for years

### Error Handling
- Catch `PDOException` for DB errors; check message for context
- Return `back()->with('success'|'error', $message)`
- Validation errors via `$this->validate($request, $fields, $messages)`

## Common Pitfalls to Avoid

1. **Don't use Eloquent for bulk imports** — Raw SQL + transactions are required for performance
2. **Don't forget transaction commits** — Always pair `beginTransaction()` with `commit()` or `rollBack()`
3. **Don't skip audit fields** — New records must include `create_user`, `fecha_creacion`
4. **Don't hardcode paths** — Use `storage_path()` and `Storage::` facade
5. **Don't assume UTC** — Use `America/Bogota` timezone explicitly

## Key Files to Reference

- [VehiculoController](app/Http/Controllers/VehiculoController.php) — CRUD + audit pattern
- [SolicitudController](app/Http/Controllers/SolicitudController.php) — Complex filtering, exports (~1400 lines)
- [EstadoController](app/Http/Controllers/EstadoController.php) — LOAD DATA INFILE pattern
- [config/database.php](config/database.php) — Multiple DB configs, LOAD DATA settings
- [Exports/LocalesExport.php](app/Exports/LocalesExport.php) — Filter + chunk pattern
