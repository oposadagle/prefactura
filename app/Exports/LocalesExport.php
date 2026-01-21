<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class LocalesExport implements FromQuery, WithHeadings
{
    protected $year;
    protected $month;
    protected $operador;
    protected $clientesSeleccionados;
    protected $facturaFiltro;
    protected $guiaBusqueda;

    public function __construct($year, $month, $operador = null, $clientesSeleccionados = [], $facturaFiltro = null, $guiaBusqueda = null)
    {
        $this->year = $year;
        $this->month = $month;
        $this->operador = $operador;
        $this->clientesSeleccionados = $clientesSeleccionados;
        $this->facturaFiltro = $facturaFiltro;
        $this->guiaBusqueda = $guiaBusqueda;
    }

    public function chunkSize(): int
    {
        return 1000; // Puedes ajustar este valor si es necesario
    }

    public function query()
    {
        $query = DB::table('locales')
            ->select('guia', 'operador', 'cliente', 'año', 'mes', 'trayecto', 'peso', 'original', 'total', 'dif', 'factura')
            ->where('año', $this->year)
            ->where('mes', $this->month)
            ->orderBy('guia');;

        // Aplicar filtros
        if ($this->operador) {
            $query->where('operador', $this->operador);
        }
        if (!empty($this->clientesSeleccionados)) {
            $query->whereIn('cliente', $this->clientesSeleccionados);
        }
        if ($this->facturaFiltro === 'si') {
            $query->where('factura', '!=', 0);
        } elseif ($this->facturaFiltro === 'no') {
            $query->where('factura', '=', 0);
        }
        if ($this->guiaBusqueda) {
            $query->where('guia', 'like', '%' . $this->guiaBusqueda . '%');
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'GUIA',
            'OPERADOR',
            'CLIENTE',
            'AÑO',
            'MES',
            'TRAYECTO',
            'PESO',
            'FACTURADO',
            'CONSOLIDADO',
            'DIF',
            'FACTURA'
        ];
    }
}
