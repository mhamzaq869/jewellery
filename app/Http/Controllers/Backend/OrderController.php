<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['cart','user'])->get();
        return view('backend.order.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $order = Order::find($request->id)->update([
                'status'  => $request->status
            ]);

            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = 'Order Status Successfully Updated';
            $response['data'] = Order::with('cart')->get();

            return response($response);

        }catch(Exception $e){

            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with(['cart','user'])->where('order_number',$id)->first();
        return view('backend.order.detail', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified order invoice.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        $order = Order::with(['cart.product','user'])->where('order_number',$id)->first();
        return view('backend.order.invoice', get_defined_vars());
    }

    /**
     * Display the specified order invoice.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoiceDownload($id)
    {
        $order = Order::with(['cart.product','user'])->where('order_number',$id)->first()->toArray();
        $pdf = Pdf::loadView('backend.order.invoice_print', ["order" => $order]);
        return $pdf->download('Invoice.pdf');
    }

     /**
     * Display the specified order invoice.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoicePrint($id)
    {
        $order = Order::with(['cart.product','user'])->where('order_number',$id)->first()->toArray();
        return view('backend.order.invoice_print', get_defined_vars());
    }
}
