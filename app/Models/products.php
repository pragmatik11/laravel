<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;


    public static function getproducts(){
        $value=DB::table('t_products')->get();
        return $value;
    }

    public static function getproductsbyid($id){
        $value=DB::select(DB::raw(
            "SELECT 
                  *
              FROM t_products WHERE id = $id LIMIT 1"
              ));      
      return $value;
    }

    public static function getProductsByCatID($id) {      
      $value=DB::select(DB::raw(
            "SELECT 
                  *
              FROM t_products WHERE cat_id = $id"
              ));      
      return $value;
    }
}
