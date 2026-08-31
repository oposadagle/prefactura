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
        $derco = collect();
        $simoniz = collect();
        $generales = collect();

        foreach ($this->resultados as $registro) {
            $cliente = strtoupper(trim((string) ($registro->cliente ?? '')));

            if ($cliente === 'DERCO COLOMBIA SAS') {
                $derco->push($registro);
            } elseif ($cliente === 'SIMONIZ SA') {
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
