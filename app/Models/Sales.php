<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sales extends Model
{
    use HasFactory;

    public function getSales(){
        $sales = DB::table('sales')
                ->join('employees', 'employees.id', '=', 'sales.employe_id')
                ->orderBy('created_at','desc')
                ->select('employees.name as employe','employees.lastname','sales.*')
                ->paginate(20);

        return $sales;
    }

    public function getSalesBySale_id($sale_id){
        $sale = DB::table('sales_details')
        ->join('sales', 'sales.id', '=','sales_details.sale_id')
        ->join('products', 'products.id', '=','sales_details.product_id')
        ->where('sales.id', '=', $sale_id)
        ->get();

        return $sale;

    }

    public function getSaleById($sale_id){

        $sale = DB::table('sales')
        ->join('employees','employees.id', '=', 'sales.employe_id')
        ->where('sales.id', '=', $sale_id)
        ->select('sales.*', 'employees.name', 'employees.lastname')
        ->get();


        return $sale;
    }

    public function getSalesByDate($date){
        $sales = DB::table('sales')
        ->join('employees', 'employees.id', '=', 'sales.employe_id')
        ->orderBy('created_at','desc')
        ->select('employees.name as employe','employees.lastname','sales.*')
        ->where('sales.created_at', '>', $date['from'].' 00:00:00')
        ->where('sales.created_at', '<', $date['to'].' 23:55:55')
        ->get();

        return $sales;
    }


}
