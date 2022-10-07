<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tax;
use Exception;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxes = Tax::all();
        return view('backend.tax.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tax.create');
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
            Tax::create($request->all());
            return redirect()->route('tax.index')->with('success','Tax Created Successfully!');
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
        $tax = Tax::find($id);
        return view('backend.tax.edit', get_defined_vars());
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
            $tax = Tax::find($id);
            $tax->update($request->all());

            return redirect()->route('tax.index')->with('success','Tax Updated Successfully!');
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

            $record = Tax::find($id);
            $record->delete();

            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = 'Tax Deleted Successfully!';


            return response($response);
        }catch(Exception $e){

            $response['status'] = true;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }
}
