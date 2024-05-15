<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use DB;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $export = DB::table('users')
            ->join('roles','roles.id','=','users.role_id')
            ->where('users.id', '!=', '1' )
            ->where('users.id', '!=', '4' )
            ->select('users.id', 'users.name', 'users.email', 'roles.display_name')
            ->orderBy('roles.display_name')
            ->get();
        return $export ;

        //return Order::all();
    }
    
    public function headings(): array
    {
        return [
            ['EEI-EDC (eKart)'],
            ['USERS'],
            ["User ID", "Name", "Email Address", "Role"],
        ];
    }

}
