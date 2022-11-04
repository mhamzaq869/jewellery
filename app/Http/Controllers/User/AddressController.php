<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::where('user_id',Auth::id())->get();
        return view('user.address.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.address.create');
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
            $data = $request->all();
            $data['user_id'] = Auth::id();

            Address::create($data);
            return redirect()->route('address.index')->with('success','Address Successfully Added');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
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
        $address = Address::find($id);
        return view('user.address.edit',get_defined_vars());
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
        try{
            $user = Address::findOrFail($id);
            $data = $request->all();
            $data['user_id'] = Auth::id();
            $data['is_delivery'] = $request->has('is_delivery') == true ? $request->is_delivery : 0;
            $data['is_shipping'] = $request->has('is_shipping') == true ? $request->is_shipping : 0;
            $user->fill($data)->save();

            return redirect()->route('address.index')->with('success','Address Successfully Updated');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
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
            $address = Address::find($id);
            $address->delete();

            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = 'Address Successfully Deleted';
            return response($response);

        }catch(Exception $e){
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeShipAddress(Request $request)
    {
        try{
            $data = $request->all();
            $data['user_id'] = Auth::id();

            $address = Address::create($data);

            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = 'Address Successfully Added';
            $response['data'] = $address;

            return response($response);

        }catch(Exception $e){
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }
}
