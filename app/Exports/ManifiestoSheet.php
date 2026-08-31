<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ManifiestoSheet implements FromCollection, ShouldAutoSize, WithColumnFormatting, WithHeadings, WithMapping, WithTitle
{
    protected $filas;

    protected $titulo;

    public function __construct($filas, string $titulo)
    {
        $this->filas = $filas;
        $this->titulo = $titulo;
    }

    public function collection()
    {
        return $this->filas;
    }

    public function title(): string
    {
        return $this->titulo;
    }

    public function map($record): array
    {
        return [
            $record->id,
            $record->fecha_servicio,
            $record->llegada_cumplido_gle,
            $record->entrega_facturacion,
            $record->guia,
            is_numeric($record->manifiesto) ? (int) $record->manifiesto : $record->manifiesto,
            $record->cliente,
            $record->origen,
            $record->destino,
            $record->documento_cliente,
            $record->destinatario,
            $record->direccion,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'FECHA_SERVICIO',
            'LLEGADA_CUMPLIDO_GLE',
            'ENTREGA_FACTURACION',
            'GUIA',
            'MANIFIESTO',
            'CLIENTE',
            'ORIGEN',
            'DESTINO',
            'DOCUMENTO_CLIENTE',
            'DESTINATARIO',
            'DIRECCION',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
