<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
//use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use DB;

//class OrderSlipExport implements FromCollection, WithHeadings, WithColumnFormatting
class OrderSlipExport implements FromCollection, WithHeadings
{

    protected $id;
    function __construct($id) {
            $this->id = $id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $export = DB::table('orders')
            ->join('order_product','order_product.order_id','=','orders.id')
            ->join('products','products.id','=','order_product.product_id')
            ->select(
                // 'orders.created_at', 'orders.id', 'orders.billing_email', 'orders.billing_name', 
                //      'orders.billing_address', 'orders.billing_city', 'orders.billing_postalcode', 
                //      'orders.billing_discount', 'orders.billing_tax', 'orders.billing_total', 'orders.shipped',
                     'order_product.quantity', 'products.name', 'products.price',
            )
            ->where('orders.id', '=', $this->id)
            ->orderBy('orders.id', 'ASC')
            ->orderBy('orders.created_at', 'DESC') 
            ->get();

        return $export ;

    }
    
    public function headings(): array
    {
        $orderHeader = DB::table('orders')
            ->select('created_at', 'id', 'billing_email', 'billing_name', 
                     'billing_address', 'billing_city', 'billing_postalcode', 
                     'billing_discount', 'billing_tax', 'billing_total', 'shipped',
            )
            ->where('orders.id', '=', $this->id)
            ->get();

            $arrayHeader1[] = [];
            $arrayHeader2[] = [];
            $arrayHeader3[] = [];
            $arrayHeader4[] = [];
            foreach ($orderHeader as $hdr) {
                if($hdr->shipped) {
                    $shipped = 'YES';
                } else $shipped = 'NO';
                //$arrayHeader[] = array_values($hdr);
                $arrayHeader1 = [
                    'Place Order: '.$hdr->created_at, 'Oder ID: '.$hdr->id, 
                ];
                $arrayHeader2 = [
                    'Email: '.$hdr->billing_email, 'Pick Up By: '.$hdr->billing_name, 'Picked&Paid: '.$shipped
                ];
                $arrayHeader3 = [
                    'Company: '.$hdr->billing_address, 'Department: '.$hdr->billing_city, 'Total: '.presentPrice($hdr->billing_total), 
                ];
                $arrayHeader4 = [
                    'Cash/Credit: '.$hdr->billing_postalcode, 'POS transaction No.:'.$hdr->billing_discount, 'POS Total: '.presentPrice($hdr->billing_tax), 
                ];
            }
            
        return [
            ['EEI-EDC (eKart Slip)'],
            [],
            $arrayHeader1,
            $arrayHeader2,
            $arrayHeader3,
            $arrayHeader4,
            [],
            ['ORDERS:'],
            ["QUANTITY", "PRODUCT NAME", "PRICE"],
            // ['EEI-EDC (eKart Slip)'],
            // ["Placed Order (Y-M-D)", "Order ID"],
            // $arrayHeader1,
            // ["Biling Email", "Pick Up By", "Total", "Picked&Paid"],
            // $arrayHeader2,
            // ["Company", "Department"],
            // $arrayHeader3,
            // ["Cash/Credit", "POS transaction No.", "POS Total"],
            // $arrayHeader4,
            // ["Quantity", "Product Name", "Price"],
        ];
    }

    // public function columnFormats(): array
    // {
    //     return [
    //         //'A' => NumberFormat::FORMAT_DATE_DDMMYYYY,
    //         'C' => NumberFormat::FORMAT_NUMBER,
    //     ];
    // }
}
