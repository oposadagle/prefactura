<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaqtotalesExport implements FromCollection, WithHeadings
{
     /**
    * @return \Illuminate\Support\Collection
    */

    protected $month;

    public function __construct($month)
    {
        $this->month = $month;
    }

    public function collection()
    {        
        $currentYear = date('Y');
        return DB::table('paquetesfile')
                    ->select('AÑO','MES','CLIENTE','TOTAL_GLE','TOTAL_PROVEEDOR','UTILIDAD')                    
                    ->where('MES',$this->month)
                    ->where('AÑO', $currentYear)
                    ->get();
    }
    public function headings(): array
    {
        return [
            'AÑO',
            'MES',
            'CLIENTE',
            'TOTAL_GLE',
            'TOTAL_PROVEEDOR',
            'UTILIDAD'
        ];
    }
}

