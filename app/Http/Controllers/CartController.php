<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Integration;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Show the cart index
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.cart');
    }

    /**
     * Show to cart Product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        try{
            $carts = Cart::with('product')->where('user_id',request()->ip())->where('order_id',null)->get();

            $response['status'] = true;
            $response['code'] = 200;
            $response['data'] = $carts;
            $response['subtotal'] = $carts->sum('price');
            $response['tax'] = $carts->sum('tax');
            $response['shipping'] = $carts->sum('shipping');
            $response['total_price'] = $carts->sum('total_price');

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
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = 'Invalid Products';

            return response($response);
        }
        $product = Product::where('id', $request->product_id)->first();
        if (empty($product)) {
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = 'Invalid Products';

            return response($response);
        }

        $cart = Cart::where('user_id', request()->ip())->where('product_id', $product->id)->first();

        if($cart) {
            $cart->quantity = $cart->quantity + $request->quantity;
            $cart->price   =  $cart->price + $product->price;
            $cart->price   =  $cart->price - $product->discount;
            $cart->size   =  $request->size;

            if ($cart->product->quantity < $cart->quantity || $cart->product->quantity <= 0) {
                $response['status'] = false;
                $response['code'] = 500;
                $response['message'] = 'Stock not sufficient!.';

                return response($response);

            }
            $cart->save();

            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = 'Product quantity successfully update to cart';
            $response['data'] = $cart;
            return response($response);
        }else{

            $cart = new Cart;
            $cart->user_id = request()->ip();
            $cart->product_id = $product->id;
            $cart->size   =  $request->size;
            if($product->price != Null){
                $cart->quantity = $request->quantity;
                $cart->price = $product->price * $cart->quantity;
                $cart->price = $product->price - $product->discount;
                if ($cart->product->quantity < $cart->quantity || $cart->product->quantity <= 0){
                    $response['status'] = false;
                    $response['code'] = 500;
                    $response['message'] = 'Stock not sufficient!.';

                    return response($response);
                }
                $cart->save();

                // $wishlist= Wishlist::where('user_id',request()->ip())->where('cart_id',null)->update(['cart_id'=>$cart->id]);
            }
        }

        $response['status'] = true;
        $response['code'] = 200;
        $response['message'] = 'Product successfully added to cart';
        $response['data'] = $cart;
        return response($response);
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

        if($cart) {
            $cart->quantity = $cart->quantity + $quant;
            $cart->price = ($cart->price * $quant)+ $cart->price;

            if ($cart->product->quantity < $cart->quantity || $cart->product->quantity <= 0){
                $response['status'] = false;
                $response['code'] = 500;
                $response['message'] = 'Stock not sufficient!.';

                return response($response);
            }

            $cart->save();

            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = 'Product quantity updated ';
            $response['data'] = $cart;
            return response($response);
        }else{

            $cart = new Cart;
            $cart->user_id = request()->ip();
            $cart->product_id = $product->id;
            $cart->price = $product->price-$product->discount;
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
            foreach ($request->quant as $k => $quant) {
                // return $k;
                $id = $request->id;

                $cart = Cart::find($id);

                if($quant > 0 && $cart) {
                    // return $quant;

                    if($cart->product->quantity < $quant){

                        $response['status'] = false;
                        $response['code'] = 500;
                        $response['message'] = 'Out of stock.';
                        return response($response);
                    }
                    $cart->quantity = ($cart->product->quantity > $quant) ? $quant  : $cart->product->quantity;
                    // return $cart;

                    if ($cart->product->quantity <=0) continue;
                    $after_price= $cart->product->price - $cart->product->discount;
                    $cart->price = $after_price * $quant;

                    $cart->save();

                    $response['status'] = true;
                    $response['code'] = 200;
                    $response['message'] = 'Cart successfully updated!';
                    return response($response);

                }else{

                    $response['status'] = false;
                    $response['code'] = 500;
                    $response['message'] = 'Cart Invalid!';
                    return response($response);

                }
            }

        }else{

            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = 'Cart Invalid!';
            return response($response);
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

    /**
     * Delete to cart Product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function applyCoupon(Request $request)
    {
        try{
            $carts = Cart::with('product')->where('user_id',request()->ip())->get();
            $coupon = Coupon::where('code',$request->code)->first();

            if($coupon != null){
                if($coupon->type == 1){
                    $price = $coupon->amount;
                }else{
                    $price = $carts->sum('total_price') * $coupon->amount/100;
                }

                $total_price = $carts->sum('total_price') - $price;
                Session::put('total_price',$total_price);
                Session::put('coupon_code',$coupon->code);

                return redirect()->back();
            }else{
                return redirect()->back()->withErrors(['coupon' => 'This coupon code does not exist!']);
            }

        }catch(Exception $e){

            $response['message'] = $e->getMessage();
            return redirect()->back()->withErrors(['coupon' => 'This coupon code is no more valid!']);
        }
    }

    /**
     * Delete to cart Product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function removeCoupon()
    {
        Session::forget('total_price');
        Session::forget('coupon_code');
        return redirect()->back();
    }

    /**
     * Checkout Page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checkout()
    {

        if(empty(Cart::where('user_id',request()->ip())->where('order_id',null)->first()))
        {
            Session::flash('error','Cart is Empty !');
            return redirect()->route('home');
        }else{

            $carts = Cart::with(['product'])->where('order_id',null)->get();
            $billing = Address::where('user_id',Auth::id())->where('is_delivery',1)->first();
            $shipping = Address::where('user_id',Auth::id())->where('is_shipping',1)->first();
            $integerations = Integration::where('status',1)->get();


            if(Session::get('total_price')){
                $subtotal = Session::get('total_price');
                $total = Session::get('total_price') + $carts->sum('shipping');
            }else{
                $subtotal = $carts->sum('price');
                $total = $carts->sum('total_checkout_price');
            }

            return view('frontend.checkout', get_defined_vars());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        try{

            $payment = new PaymentController;
            $request->returnUrl = route('payment.success',[$request->payment]);
            $request->cancelUrl = route('payment.error',[$request->payment]);
            $payment->pay($request);
            session()->put('request', $request->all());

        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }


    /**
     * Charge a payment and store the transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function paymentSuccess(Request $request,$type=null)
    {
       try{
           $data = $request->session()->get('request');
           $data['billing_address'] = json_encode($data['bill']);
           $data['shipping_address'] = json_encode($data['ship']);
           $data['payment_detail'] = $request->all();
           $data['method'] = $type;

           $payment = new PaymentController;
           $payment->paymentCompleted($data);

           return redirect()->route('user.order.completed');

       }catch(Exception $e){
            return redirect()->route('carts.index')->with('error',$e->getMessage());
       }
    }

    /**
     * Error Handling.
     */
    public function paymentError()
    {
        return 'User cancelled the payment.';
    }

}
