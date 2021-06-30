<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expenses extends Model
{
    use HasFactory;

    public function get(){
        $sql = DB::table('expenses')
        ->join('employees','employees.id', "=", 'expenses.employee_id')
        ->orderBy("created_at",'desc')
        ->select("expenses.*","employees.name as employeeName", "employees.lastname")
        ->get();
        return $sql;
    }

}
