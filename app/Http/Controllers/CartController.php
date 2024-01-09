<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    //
    public function cart(){
        session('cartItems');
        return view('cart.cart');
    }

    public function addToCart($id){
        $product = Product::findOrFail($id);
        $cartItems = session()->get('cartItems',[]);

        if(isset($cartItems[$id])){
            $cartItems[$id]['quantity']++;
        }
        else{
            $cartItems[$id] = [
                'name'=>$product->name,
                'brand'=>$product->brand,
                'details' =>$product->details,
                'price'=>$product->price,
                'quantity'=>1,
                'image_path'=>$product->image_path
            ];
        }

        session()->put('cartItems',$cartItems);
        return redirect()->back()->with('success','Product added to cart successfully');
    }

    public function deleteFromCart(Request $request){
        if($request->id){
            $cartItems = session()->get('cartItems');

            if(isset($cartItems[$request->id])){
                unset($cartItems[$request->id]);
                session()->put('cartItems',$cartItems);
            }
            return redirect()->back()->with('success','Product removed from cart successfully');
        }
    }

    public function updateFromCart(Request $request){
        if($request->id && $request->quantity){
            $cartItems = session()->get('cartItems');

            if(isset($cartItems[$request->id])){
                $cartItems[$request->id]['quantity'] = $request->quantity;
                session()->put('cartItems',$cartItems);
            }
            return redirect()->back()->with('success','Cart updated successfully');
        }
    }
}
