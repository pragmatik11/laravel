<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;


    public static function getCategories(){
        $value=DB::table('t_categories')->get();
        return $value;
      }
}
