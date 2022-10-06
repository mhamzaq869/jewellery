<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brand.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
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
            if (!empty($request->image)) {
                $image = json_decode($request->image);
                $filename = uniqid().time().'.png';
                Storage::put('public/brand/'.$filename, base64_decode($image->data));
                $data['image'] = 'storage/brand/'.$filename;
            }

            $data['slug'] = Str::slug($request->name);
            Brand::create($data);
            return redirect()->route('brand.index')->with('success','Brand Created Successfully!');
        }catch(Exception $e){
            return redirect()->route('brand.index')->with('danger',$e->getMessage());
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
        $brand = Brand::find($id);
        return view('backend.brand.edit', get_defined_vars());
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

            $data = $request->all();
            $brand = Brand::find($id);

            if (!empty($request->image)) {
                $image = json_decode($request->image);
                $filename = uniqid().time().'.png';

                if(File::exists($brand->image)){
                    File::delete($brand->image);
                }

                Storage::put('public/brand/'.$filename, base64_decode($image->data));
                $data['image'] = 'storage/brand/'.$filename;
            }

            $data['slug'] = Str::slug($request->name);


            $brand->update($data);
            return redirect()->route('brand.index')->with('success','Brand Created Successfully!');
        }catch(Exception $e){
            return redirect()->route('brand.index')->with('danger',$e->getMessage());
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

            $brand = Brand::find($id);

            if(File::exists($brand->image)){
                File::delete($brand->image);
            }

            $brand->delete();
            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = 'Brand Deleted Successfully!';


            return response($response);
        }catch(Exception $e){

            $response['status'] = true;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }
}
