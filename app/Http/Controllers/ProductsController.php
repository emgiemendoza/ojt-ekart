<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
{
    public function export() 
    {
         return Excel::download(new ProductsExport, ('products-'.Carbon::now()->format('m-d-Y').'.xlsx'));
    }

}
