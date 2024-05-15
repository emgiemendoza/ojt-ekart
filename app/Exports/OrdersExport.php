<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use DB;

class OrdersExport implements FromCollection, WithHeadings, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $export = DB::table('orders')
            ->select('created_at', 'id', 'billing_email', 'billing_name', 
                     'billing_address', 'billing_city', 'billing_postalcode', 
                     'billing_discount', 'billing_tax', 'billing_total', 'shipped',
            )
            ->get();
        return $export ;

        //return Order::all();
    }
    
    public function headings(): array
    {
        return [
            ['EEI-EDC (eKart)'],
            ['ONLINE ORDERS'],
            ["Placed Order (Y-M-D)", "Order ID", "Biling Email", "Pick Up By",
            "Company", "Department", "Cash/Credit",
            "POS transaction No.", "POS Total", "Total", "Picked&Paid",
            ],
        ];
        
        // return ["Placed Order (Y-M-D)", "Order ID", "Biling Email", "Pick Up By",
        //         "Company", "Department", "Cash/Credit",
        //         "POS transaction No.", "POS Total", "Total", "Picked&Paid",
        //         ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'H' => NumberFormat::FORMAT_NUMBER,
            'I' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
