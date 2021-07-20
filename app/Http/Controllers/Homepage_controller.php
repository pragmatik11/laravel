<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Categories;
class Homepage_controller extends Controller
{
    function index() {
        
    $data = array();
    $data['products'] = products::getproducts();
    $data['categories'] = Categories::getCategories();
    $data['currency'] = $this->currency;
    
    // Pass to view
    return view('pages/homepage')->with("data",$data);
    }
}
