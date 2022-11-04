<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Show the cart index
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::with('cart.product')->where('user_id',Auth::id())->paginate(6);
        return view('user.order.index', get_defined_vars());
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('cart.product')->where('order_number',$id)->where('user_id',Auth::id())->first();
        return view('user.order.show', get_defined_vars());
    }



     /**
     * Order Successfully Completed.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function orderCompleted()
    {
        if(session()->get('order_number')){
            $order_number = session()->get('order_number') ?? '';
            return view('frontend.order_completed',get_defined_vars());
        }else{
            return redirect()->route('order.index');
        }
    }

}
