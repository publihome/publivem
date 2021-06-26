<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Products extends Model
{
    use HasFactory;

    
    
    

    public function categories(){
        $sql = DB::table('categories')->get();
        return $sql;
    } 
}
