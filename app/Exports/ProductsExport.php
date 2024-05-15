<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use DB;

class ProductsExport implements FromCollection, WithHeadings
// class ProductsExport implements FromCollection, WithHeadings, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $export = DB::table('products')
            ->select('id', 'name', 'slug', 'details', 'price', 'quantity', 
                     'featured', 'description',
            )
            ->get();
        return $export ;

        //return Order::all();
    }
    
    public function headings(): array
    {
        return [
            ['EEI-EDC (eKart)'],
            ['PRODUCTS'],
            ["ID", "Product Name", "Product Code", "Details", "Price", "Quantity", 
             "Featured", "Description",
            ],
        ];
    }

    // public function columnFormats(): array
    // {
    //     return [
    //         'E' => NumberFormat::FORMAT_NUMBER,
    //     ];
    // }
}
