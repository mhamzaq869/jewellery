<?php

namespace App\Http\Controllers\Backend;

use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippings = Shipping::all();
        return view('backend.shipping.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.shipping.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);


        try{

            if($request->type == 'free'){
                $request['amount'] = 0;
            }

            if($request->type == 'flat'){
                $request->validate([
                    'amount' => 'min:1',
                ]);
            }

            Shipping::create($request->all());
            return redirect()->route('shipping.index')->with('success','Shipping Created Successfully!');
        }catch(Exception $e){
            return redirect()->back()->with('danger',$e->getMessage());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shipping = Shipping::find($id);
        return view('backend.shipping.edit', get_defined_vars());
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
        $request->validate([
            'name' => 'required',
        ]);


        try{
            $shipping = Shipping::find($id);
            if($request->type == 'free'){
                $request['amount'] = 0;
            }

            if($request->type == 'flat'){
                $request->validate([
                    'amount' => 'min:1',
                ]);
            }

            $shipping->update($request->all());
            return redirect()->route('shipping.index')->with('success','Shipping Created Successfully!');
        }catch(Exception $e){
            return redirect()->back()->with('danger',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $record = Shipping::find($id);
            $record->delete();

            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = 'Shipping Deleted Successfully!';


            return response($response);
        }catch(Exception $e){

            $response['status'] = true;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }
}
