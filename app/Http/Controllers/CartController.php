<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCart()
    {
        $userId = Auth::id();

        $carts = Cart::where('user_id', $userId)->get();

        return view('show_cart', [
            'carts' => $carts,
            'title' => 'Cart'
        ]);
    }


    public function addCart(Product $product, Request $request)
    {

        $userId = Auth::id();

        $productId = $product->id;

        $existingCart = Cart::where('product_id', $productId)
                        ->where('user_id', $userId)
                        ->first();

        if ($existingCart == null) {
            $request->validate([
                'amount' => 'required|gte:1|lte:' . $product->stock 
            ]);
    
            
    
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'amount' => $request->amount
            ]);
    
            
        } else {

            $request->validate([
                'amount' => 'required|gte:1|lte:' . ($product->stock - $existingCart->amount) 
            ]);

            $existingCart->update([
                'amount' => $existingCart->amount + $request->amount
            ]);
        }

        return redirect('/cart');

       
    }

    public function editCart(Cart $cart, Request $request)
    {
        $carts = $request->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->stock
        ]);

        $cart->update($carts);

        return redirect('/cart');
    }

    public function destroyCart(Cart $cart)
    {
        $cart->delete();

        return redirect('/cart');
    }
}
