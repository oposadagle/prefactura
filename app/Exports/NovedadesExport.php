<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class NovedadesExport implements FromCollection, WithHeadings, WithMapping
{
    protected $year;
    protected $month;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function collection()
    {
        return DB::table('novedades')
            ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [$this->year])
            ->whereRaw('EXTRACT(MONTH FROM created_at) = ?', [$this->month])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function map($record): array
    {
        return [
            $record->id,
            $record->ide,
            $record->manifiesto,
            $record->tipo_novedad,
            $record->clase_novedad,
            $record->valor,
            $record->valor_faltante,
            $record->cuotas,
            $record->nota,
            $record->update_user,
            $record->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'servicio',
            'manifiesto',
            'tipo_novedad',
            'clase_novedad',
            'valor',
            'valor_faltante',
            'cuotas',
            'nota',
            'update_user',
            'created_at',
        ];
    }
}