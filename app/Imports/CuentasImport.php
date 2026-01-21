<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class CuentasImport implements ToCollection, WithHeadingRow
{
    protected $data = [];

    public function collection(Collection $rows)
    {
        // Validar cada fila del archivo Excel
        Validator::make($rows->toArray(), [
            '*.guia' => 'required',
            '*.valor' => 'required|numeric', // CAMBIADO de integer a numeric
            '*.factura' => 'required|integer',
        ], [
            '*.guia.required' => 'La guía es obligatoria en la fila :attribute.',
            '*.valor.required' => 'El valor es obligatorio en la fila :attribute.',
            '*.valor.numeric' => 'El valor debe ser un número válido en la fila :attribute.',
            '*.factura.required' => 'La factura es obligatoria en la fila :attribute.',
            '*.factura.integer' => 'La factura debe ser un número entero en la fila :attribute.',
        ])->validate();

        // Almacenar los datos validados
        $this->data = $rows->map(function ($row) {
            return [
                'guia' => $row['guia'],
                'valor' => $row['valor'],
                'factura' => $row['factura'],
            ];
        })->toArray();
    }

    public function getData()
    {
        return $this->data;
    }
}
