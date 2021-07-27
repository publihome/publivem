<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    use HasFactory;


    public function getSales($date){

        $sql = DB::table('sales')
        ->select(DB::raw('count(sales.created_at) as count_sales_by_day, created_at'))
        ->where('created_at', '>', $date['from'].' 00:00:00')
        ->where('created_at', '<', $date['to'].' 23:55:55')
        ->groupBy('sales.id','created_at')
        // ->orderBy("created_at","desc")
        ->get();
        
        return $sql;
    }

    public function getEmployees($date){
        $employees = DB::table('employees')
        ->join('sales', 'sales.employe_id', '=', 'employees.id')
        ->select(DB::raw('count(employees.id) as salesByEmploye, employees.id, employees.name as employeeName'))
        ->where('sales.created_at', '>', $date['from'].' 00:00:00')
        ->where('sales.created_at', '<', $date['to'].' 23:55:55')
        ->groupBy('employees.id', "employeeName")
        ->get();
        return $employees;
    }


    public function getProductsSales($date){
        $productsSales = DB::table('sales_details')
        ->join('products', 'products.id', "=", "sales_details.product_id")
        ->join('sales', 'sales.id', "=", "sales_details.sale_id")
        ->select(DB::raw("count(sales_details.product_id) as count_product, products.name as productName"))
        ->where('sales.created_at', '>', $date['from'].' 00:00:00')
        ->where('sales.created_at', '<', $date['to'].' 23:55:55')
        ->groupBy("sales_details.product_id","productName")
        ->get();
        return $productsSales;
    }

    public function getAllsales($date){

        $sql = DB::table('sales')
        ->select(DB::raw('sum(amount_all) as amountAll, sum(advance) as advanceAll'))
        ->where('created_at', '>', $date['from'].' 00:00:00')
        ->where('created_at', '<', $date['to'].' 23:55:55')
        ->get();

        return $sql;
    }


    public function getExpenses($date){
        $expenses = DB::table('expenses')
        ->select(DB::raw('sum(amount) as Expense'))
        ->where('created_at', '>', $date['from'].' 00:00:00')
        ->where('created_at', '<', $date['to'].' 23:55:55')
        ->get();

        return $expenses;
    }
}
