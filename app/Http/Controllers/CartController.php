<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        # code...
    }


    public function show()
    {
        try{
            $carts = Cart::with('product')->where('user_id',request()->ip())->get();

            $response['status'] = true;
            $response['code'] = 200;
            $response['data'] = $carts;
            $response['total'] = $carts->sum('price');

            return response($response);

        }catch(Exception $e){
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }
    /**
     * Add to cart Product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addToCart(Request $request)
    {

        if (empty($request->product_id)) {
            Session::flash('error','Invalid Products');
            return back();
        }
        $product = Product::where('id', $request->product_id)->first();
        if (empty($product)) {
            Session::flash('error','Invalid Products');
            return back();
        }

        $already_cart = Cart::where('user_id', request()->ip())->where('product_id', $product->id)->first();

        if($already_cart) {


            $already_cart->quantity = $already_cart->quantity + $request->quantity;
            $already_cart->price   =  $already_cart->price + $request->price;

            if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) {
                return back()->with('error','Stock not sufficient!.');
            }
            $already_cart->save();

        }else{

            $cart = new Cart;
            $cart->user_id = request()->ip();
            $cart->product_id = $product->id;
            if($product->price != Null){
                $cart->price = ($product->price-($product->price*$product->discount)/100);
                $cart->quantity = $request->quantity;
                $cart->price=$cart->price*$cart->quantity;
                if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
                $cart->save();
                $wishlist= Wishlist::where('user_id',request()->ip())->where('cart_id',null)->update(['cart_id'=>$cart->id]);
            }
        }
        Session::flash('success','Product successfully added to cart');
        return back();
    }

    /**
     * Single Add to cart Product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function singleAddToCart($slug)
    {
        $quant = 1;
        $size = 'small';

        $product = Product::where('slug', $slug)->first();
        if($product->quantity < $quant){
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = 'Out of stock, You can add other products.';

            return response($response);
        }

        if ( ($quant < 1) || empty($product) ) {
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = 'Invalid Products';

            return response($response);
        }

        $cart = Cart::where('user_id', request()->ip())->where('product_id', $product->id)->first();

        // return $already_cart;

        if($cart) {
            $cart->quantity = $cart->quantity + $quant;
            $cart->price = ($product->price * $quant)+ $cart->price;

            if ($cart->product->quantity < $cart->quantity || $cart->product->quantity <= 0){
                $response['status'] = false;
                $response['code'] = 500;
                $response['message'] = 'Stock not sufficient!.';
                return response($response);
            }

            $cart->save();

            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = 'Product quantity successfully added to cart';
            $response['data'] = $cart;
            return response($response);
        }else{

            $cart = new Cart;
            $cart->user_id = request()->ip();
            $cart->product_id = $product->id;
            $cart->price = ($product->price-($product->price*$product->discount)/100);
            $cart->quantity = $quant;
            $cart->size = $size;

            if ($cart->product->quantity < $cart->quantity || $cart->product->quantity <= 0)
            {
                $response['status'] = false;
                $response['code'] = 500;
                $response['message'] = 'Stock not sufficient!.';

                return response($response);
            }

            $cart->save();
            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = 'Product successfully added to cart.';
            $response['data'] = $cart;

            return response($response);
        }
    }


    /**
     * Update to cart Product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cartUpdate(Request $request)
    {

        if($request->quant){
            $error = array();
            $success = '';
            // return $request->quant;
            foreach ($request->quant as $k=>$quant) {
                // return $k;
                $id = $request->qty_id[$k];
                // return $id;
                $cart = Cart::find($id);
                // return $cart;
                if($quant > 0 && $cart) {
                    // return $quant;

                    if($cart->product->stock < $quant){
                        Session::flash('error','Out of stock');
                        return back();
                    }
                    $cart->quantity = ($cart->product->stock > $quant) ? $quant  : $cart->product->stock;
                    // return $cart;

                    if ($cart->product->stock <=0) continue;
                    $after_price=($cart->product->price-($cart->product->price*$cart->product->discount)/100);
                    $cart->price = $after_price * $quant;
                    // return $cart->unit_price;
                    $cart->save();
                    $success = 'Cart successfully updated!';
                }else{
                    $error[] = 'Cart Invalid!';
                }
            }
            return back()->with($error)->with('success', $success);
        }else{
            return back()->with('Cart Invalid!');
        }
    }

    /**
     * Delete to cart Product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy(Request $request)
    {
        try{
            $cart = Cart::find($request->id);
            if ($cart) {
                $cart->delete();
                $response['status'] = true;
                $response['code'] = 200;
                $response['message'] = 'Product successfully deleted from cart';
                return response($response);
            }
        }catch(Exception $e){
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }
}
