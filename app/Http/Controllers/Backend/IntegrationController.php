<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Integration;
use Exception;
use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $integrations = Integration::where('int_type','payment')->get();
        $other_integrations = Integration::where('int_type','!=','payment')->get();
        return view('backend.setting.integration.index',get_defined_vars());
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
            $integration = Integration::find($request->id);
            $integration->update($request->except('id'));

            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = $integration->name.' Integration Updated Successfully!';

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
        $integration = Integration::find($id);

        $response['status'] = true;
        $response['code'] = 200;
        $response['message'] = $integration->name.' Integration Updated Successfully!';
        $response['data'] = $integration;

        return response($response);
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
        try{

            $integration = Integration::find($id);
            $integration->update($request->all());

            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = $integration->name.' Integration Updated Successfully!';

            return response($response);

        }catch(Exception $e){
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
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
        //
    }
}
