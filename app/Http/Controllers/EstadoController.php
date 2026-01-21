<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function create()
    {
        return view('Estado.create');
    }

    public function store(Request $request)
    {
        // Validar que se haya enviado un archivo CSV
        $request->validate([
            'gle' => 'required|file|mimes:csv,txt', // Permitir solo archivos CSV o TXT
        ]);

        // Obtener el archivo cargado
        $file = $request->file('gle');

        // Guardar temporalmente el archivo en el sistema
        $filePath = $file->storeAs('temp', 'import.csv', 'local'); // Almacena en storage/app/temp/import.csv

        // Ruta completa del archivo
        $fullPath = storage_path("app/{$filePath}");

        // Convertir la ruta a formato compatible con MySQL (reemplazar \ por /)
        $mysqlPath = str_replace('\\', '/', $fullPath);

        try {
            // Usar transacciones para asegurar la integridad de los datos
            DB::beginTransaction();

            // Contar los registros actuales en la tabla
            $initialCount = DB::table('gles')->count();

            // Ejecutar LOAD DATA INFILE
            $query = "
            LOAD DATA INFILE '{$mysqlPath}'
            INTO TABLE gles
            CHARACTER SET utf8
            FIELDS TERMINATED BY ';'
            ENCLOSED BY '\"'
            LINES TERMINATED BY '\n'
            IGNORE 1 ROWS
            (guia, operador, cliente, @fecha, origen, destino, declarado, piezas, trayecto, kilo, total, factura)
            SET fecha = STR_TO_DATE(@fecha, '%Y-%m-%d');
        ";

            // Ejecutar la consulta
            DB::connection()->getPdo()->exec($query);

            // Contar los registros después de la carga
            $finalCount = DB::table('gles')->count();

            // Calcular cuántos registros se cargaron
            $recordsInserted = $finalCount - $initialCount;

            // Confirmar la transacción
            DB::commit();

            // Eliminar el archivo temporal
            Storage::delete($filePath);

            // Mostrar mensaje de éxito con el número de registros cargados
            return redirect()->back()->with('success', "Datos importados correctamente. Se cargaron {$recordsInserted} registros.");
        } catch (\PDOException $e) {
            // Revertir la transacción en caso de error
            DB::rollBack();

            // Manejar errores específicos de duplicidad
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                // Extraer el número de guía duplicada del mensaje de error
                preg_match("/Duplicate entry '([^']+)'/", $e->getMessage(), $matches);
                $duplicateGuia = $matches[1] ?? 'Desconocido';
                return redirect()->back()->withErrors("Error: La guía {$duplicateGuia} ya existe en la base de datos.");
            }

            // Otros errores
            return redirect()->back()->withErrors('Error al importar el archivo: ' . $e->getMessage());
        }
    }

    public function store2(Request $request)
    {
        // Validar que se haya enviado un archivo CSV
        $request->validate([
            'proveedor' => 'required|file|mimes:csv,txt', // Permitir solo archivos CSV o TXT, máximo 2MB
        ]);

        // Obtener el archivo cargado
        $file = $request->file('proveedor');

        // Guardar temporalmente el archivo en el sistema
        $filePath = $file->storeAs('temp', 'importa.csv', 'local'); // Almacena en storage/app/temp/import.csv

        // Ruta completa del archivo
        $fullPath = storage_path("app/{$filePath}");

        // Convertir la ruta a formato compatible con MySQL (reemplazar \ por /)
        $mysqlPath = str_replace('\\', '/', $fullPath);

        try {
            // Usar transacciones para asegurar la integridad de los datos
            DB::beginTransaction();

            // Contar los registros actuales en la tabla
            $initialCount = DB::table('proveedores')->count();

            // Ejecutar LOAD DATA INFILE
            $query = "
            LOAD DATA INFILE '{$mysqlPath}'
            INTO TABLE proveedores
            CHARACTER SET utf8
            FIELDS TERMINATED BY ';'
            ENCLOSED BY '\"'
            LINES TERMINATED BY '\n'
            IGNORE 1 ROWS
            (guia,transportadora,origen,destino,@fecha,documento,remitente,destinatario,trayecto,servicio,declarado,piezas,peso_guia,peso_fisico,peso_volumen,peso_facturado,valor_flete,costo_manejo,total,cliente)
            SET fecha = STR_TO_DATE(@fecha, '%Y-%m-%d');
        ";

            // Ejecutar la consulta
            DB::connection()->getPdo()->exec($query);

            // Contar los registros después de la carga
            $finalCount = DB::table('proveedores')->count();

            // Calcular cuántos registros se cargaron
            $recordsInserted = $finalCount - $initialCount;

            // Confirmar la transacción
            DB::commit();

            // Eliminar el archivo temporal
            Storage::delete($filePath);

            // Mostrar mensaje de éxito con el número de registros cargados
            return redirect()->back()->with('success', "Datos importados correctamente. Se cargaron {$recordsInserted} registros.");
        } catch (\PDOException $e) {
            // Revertir la transacción en caso de error
            DB::rollBack();

            // Manejar errores específicos de duplicidad
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                // Extraer el número de guía duplicada del mensaje de error
                preg_match("/Duplicate entry '([^']+)'/", $e->getMessage(), $matches);
                $duplicateGuia = $matches[1] ?? 'Desconocido';
                return redirect()->back()->withErrors("Error: La guía {$duplicateGuia} ya existe en la base de datos.");
            }

            // Otros errores
            return redirect()->back()->withErrors('Error al importar el archivo: ' . $e->getMessage());
        }
    }
}