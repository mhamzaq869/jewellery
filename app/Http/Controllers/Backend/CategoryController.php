<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('parent')->get()->toArray();
        return view('backend.category.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $parents = Category::all();
        return view('backend.category.create', get_defined_vars());
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
                Storage::put('public/category/'.$filename, base64_decode($image->data));
                $data['image'] = 'storage/category/'.$filename;
            }

            $data['slug'] = Str::slug($request->name);
            Category::create($data);
            return redirect()->route('category.index')->with('success','Brand Created Successfully!');
        }catch(Exception $e){
            return redirect()->route('category.index')->with('danger',$e->getMessage());
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
        $brands = Brand::all();
        $category = Category::find($id);
        $parents = Category::all();

        return view('backend.category.edit', get_defined_vars());
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
            $category = Category::find($id);

            if (!empty($request->image)) {
                $image = json_decode($request->image);
                $filename = uniqid().time().'.png';

                if(File::exists($category->image)){
                    File::delete($category->image);
                }

                Storage::put('public/category/'.$filename, base64_decode($image->data));
                $data['image'] = 'storage/category/'.$filename;
            }

            $data['slug'] = Str::slug($request->name);


            $category->update($data);
            return redirect()->route('category.index')->with('success','Category Created Successfully!');
        }catch(Exception $e){
            return redirect()->route('category.index')->with('danger',$e->getMessage());
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

           $category = Category::find($id);
            if(File::exists($category->image)){
                File::delete($category->image);
            }
            $category->delete();
            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = 'Category Deleted Successfully!';

            return response($response);
        }catch(Exception $e){

            $response['status'] = true;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }
}
