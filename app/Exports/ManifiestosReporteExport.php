<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ManifiestosReporteExport implements WithMultipleSheets
{
    protected $resultados;

    public function __construct($resultados)
    {
        $this->resultados = $resultados;
    }

    public function sheets(): array
    {
        $normalizar = function ($valor) {
            return preg_replace('/[^A-Z0-9]/', '', strtoupper((string) $valor));
        };

        $clientesDerco = [
            'DERCO COLOMBIA SAS',
            'INCHCAPE COLOMBIA S A S',
            'AUTOMOTORES COMERCIALES AUTOCOM S.A',
            'METROKIA S.A.',
        ];

        $dercoNormalizados = array_map($normalizar, $clientesDerco);
        $simonizNormalizado = $normalizar('SIMONIZ SA');

        $derco = collect();
        $simoniz = collect();
        $generales = collect();

        foreach ($this->resultados as $registro) {
            $cliente = $normalizar($registro->cliente ?? '');

            if (in_array($cliente, $dercoNormalizados, true)) {
                $derco->push($registro);
            } elseif ($cliente === $simonizNormalizado) {
                $simoniz->push($registro);
            } else {
                $generales->push($registro);
            }
        }

        $sheets = [];

        if ($derco->isNotEmpty()) {
            $sheets[] = new ManifiestoSheet($derco, 'DERCO COLOMBIA SAS');
        }

        if ($simoniz->isNotEmpty()) {
            $sheets[] = new ManifiestoSheet($simoniz, 'SIMONIZ SA');
        }

        if ($generales->isNotEmpty() || empty($sheets)) {
            $sheets[] = new ManifiestoSheet($generales, 'CLIENTES GENERALES');
        }

        return $sheets;
    }
}
