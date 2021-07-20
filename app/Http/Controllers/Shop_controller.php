<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Categories;
class Shop_controller extends Controller
{
    function index() {
        
        $data = array();
        
        $categories = Categories::getCategories();
        $data['categories'] = $categories;
        foreach($categories as $cat){
            
            $products = products::getProductsByCatID($cat->id);
            $cat->products = $products;
        }

       
        $data['cat_products'] = $categories;

        $data['currency'] = $this->currency;
        
        // Pass to view
        return view('pages/shop')->with("data",$data);
    }

    public function addToCart(Request $request)
    {  
        $id = $request->id;
        $product = products::getproductsbyid($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');        
        
        foreach($product as $product) {
            $product = $product;
        }

       
        //if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                'products' => [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "cat_id" => $product->cat_id,
                        "prod_id" => $product->id,
                        "img" => $product->img
                    ],
                ],
                'total_quantity' => [
                    'total' => 1,
                ],
                'total_price' => [
                    'total' => $product->price,
                ],
            ];
            session()->put('cart', $cart);
           
           
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart['products'][$id])) {
            $cart['products'][$id]['quantity']++;
            $cart['total_quantity']['total']++;            
            
            //add total price
            $cart['total_price']['total'] = $cart['total_price']['total'] + $product->price;
            
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart['products'][$id] = [
                    "name" => $product->name,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "cat_id" => $product->cat_id,
                    "prod_id" => $product->id,
                    "img" => $product->img
        ];
        $cart['total_quantity']['total']++;            
            
            //add total price
            $cart['total_price']['total'] = $cart['total_price']['total'] + $product->price;
        session()->put('cart', $cart);
        //session()->forget('cart');
   
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request)
    {        
        if($request->id) {
            $cart = session()->get('cart');            
            if(isset($cart['products'][$request->id])) {
                $cart['total_price']['total'] = $cart['total_price']['total'] - $cart['products'][$request->id]['price'];
                $cart['total_quantity']['total']--;

                unset($cart['products'][$request->id]);
                session()->put('cart', $cart);
            }
           
        }
    }
}
