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
    
    public function getNameCategory($id_category){
        $sql = DB::table('categories')->where('id', "=", $id_category)->pluck('name');
        return $sql;
    }
    
    public function addProduct($data){
        $sql = DB::table('products')->insert($data);

    }
    public function insertAttr($id_at, $id_prod, $value){
        $data = array (
            "attribute_id" => $id_at,
            "product_id" => $id_prod,
            "value" => $value,
        );

        $sql = DB::table('attributes_by_product')->insert($data);

    }

    public function getAttrbyName($nameAtribute){
        return DB::table('attributes')->where('name', "=", $nameAtribute)->pluck('id');
    }


    public function getProductsBycategory($category_id){
        $sql = DB::table('products')
                ->where('products.category_id', "=", $category_id)
                ->get();
                return $sql;

    }

    public function getProductsByIdAndIdCategory($category_id, $product_id){
        $sql = DB::table('products')
                ->where('products.category_id', "=", $category_id)
                ->where('products.id', "=", $product_id)
                ->get();
                return $sql;

    }

    public function getAtributtesbycategory($category_id){
        $sql = DB::table('attributes_by_product')
                ->join('attributes', 'attributes.id', "=", 'attributes_by_product.attribute_id') 
                ->join('products', "products.id", "=", "attributes_by_product.product_id")
                ->join('categories', 'categories.id', '=','products.category_id')
                ->where('categories.id', "=", $category_id)
                ->select('products.id', 'attributes_by_product.value', 'attributes.name as attributeName')
                ->get();
                return $sql;
    }

    public function getAtributtesbyIdAndIdCategory($category_id,$product_id){
        $sql = DB::table('attributes_by_product')
                ->join('attributes', 'attributes.id', "=", 'attributes_by_product.attribute_id') 
                ->join('products', "products.id", "=", "attributes_by_product.product_id")
                ->where('products.id', "=", $product_id)
                ->select('products.id', 'attributes_by_product.value', 'attributes.name as attributeName')
                ->get();
                return $sql;

    }

    public function deleteAtributesProduct($id_prod){
        DB::table('attributes_by_product')
            ->where("product_id", "=", $id_prod)
            ->delete();
    }

    public function deleteProducts($id_prod){
        DB::table('products')
            ->where("id", "=", $id_prod)
            ->delete();
    }

    public function getPapers(){
        $sql = DB::table('papers')->get();
        return $sql;
    }

    public function updateData($data, $id){
        $sql = DB::table('products')
            ->where('id','=',$id)
            ->update($data);
        return $sql;
    }

    public function getIdAtribute($attr){
        $id = DB::table('attributes')->where('name', '=', $attr)->get('id');
        return $id;
    }

    public function updateAttr($attr_id, $value , $product_id){
        DB::table('attributes_by_product')
        ->where('product_id', '=', $product_id)
        ->where('attribute_id', '=', $attr_id)
        ->update(['value' => $value ]);
    }


}
