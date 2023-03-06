<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(Auth::check()){
            $product = Product::get();
            return view('dashboard',[
                'product' => $product
            ]);
        }
   
        return redirect("login")->withSuccess('are not allowed to access');
    }
    public function detail(Request $request){
        $id = $request->id;
        $detail = Product::find($id);
        return response()->json($detail);
    }
    public function addToCart(Request $request)
    {   
        
        $cart = Cart::create([
                    'id'           => $request->id,
                    'document_code' => 'TRX',
                    'document_number' => '004',
                    'product_name' => $request->product_name,
                    'product_code' => $request->product_code,
                    'price' => $request->price,
                    'quantity' => 1,
                    'currency' => $request->currency,
                    'sub_total' => $request->price,
                    'unit' => $request->unit,
        ]);
        // dd($cart);
        return redirect()->route('cart');

    }
    public function cart(){
        $cart = Cart::get();
        // dd($cart);
        return view('cart',[
            'cart' => $cart,
        ]);
    }            
}
