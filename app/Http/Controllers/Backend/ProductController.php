<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Tax;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category','subcategory','discount'])->get()->toArray();
        return view('backend.product.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_categories = Category::where('parent_id',null)->get();
        $categories = Category::all();
        $discounts = Discount::where('status',1)->get();
        $shippings = Shipping::where('status',1)->get();
        $taxes = Tax::where('status',1)->get();

        return view('backend.product.create', get_defined_vars());
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
            $images_path = [];

            if($request->has('images')){
                foreach($request->images as $i => $images):
                    if (!empty($images)) {
                        $image = json_decode($images);
                        $filename = uniqid().time().'.png';

                        Storage::put('public/product/'.$filename, base64_decode($image->data));
                        $images_path[] = 'storage/product/'.$filename;

                        $compressUploadPath = storage_path('app/public/product/'.$filename);
                        $compressDestPath = 'storage/product/compress/'.$filename;
                        compressImage($compressUploadPath,$compressUploadPath,$compressDestPath,0.25);

                    }
                endforeach;
            }

            $data['user_id'] = Auth::id();
            $data['images'] = json_encode($images_path);
            $data['slug'] = Str::slug($request->title);
            $data['size'] = json_encode($data['size']);

            Product::create($data);
            return redirect()->route('product.index')->with('success','Product Created Successfully!');
        }catch(Exception $e){
            return redirect()->route('product.index')->with('danger',$e->getMessage());
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
        $parent_categories = Category::where('parent_id',null)->get();
        $categories = Category::all();
        $product = Product::find($id);
        $discounts = Discount::where('status',1)->get();
        $shippings = Shipping::where('status',1)->get();
        $taxes = Tax::where('status',1)->get();

        return view('backend.product.edit', get_defined_vars());
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
            $product = Product::find($id);
            $data = $request->all();
            $images_path = [];

            // Delete already exisiting images
            $images = json_decode($product->images);
            if(count($images) > 0){
                foreach($images as $image):
                    if(File::exists($image)){
                        File::delete($image);
                        File::delete(insertAtPosition($image));
                    }
                endforeach;
            }

            // Store new images
            if($request->has('images')){
                foreach($request->images as $i => $images):
                    if (!empty($images)) {
                        $image = json_decode($images);
                        $filename = uniqid().time().'.png';

                        Storage::put('public/product/'.$filename, base64_decode($image->data));
                        $images_path[] = 'storage/product/'.$filename;

                        $compressUploadPath = storage_path('app/public/product/'.$filename);
                        $compressDestPath = 'storage/product/compress/'.$filename;
                        compressImage($compressUploadPath,$compressUploadPath,$compressDestPath,0.25);

                    }
                endforeach;
            }

            $data['user_id'] = Auth::id();
            $data['images'] = json_encode($images_path);
            $data['slug'] = Str::slug($request->title);
            $data['size'] = json_encode($data['size']);

            $product->update($data);
            return redirect()->route('product.index')->with('success','Product Updated Successfully!');
        }catch(Exception $e){
            return redirect()->route('product.index')->with('danger',$e->getMessage());
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

            $product = Product::find($id);
            $images = json_decode($product->images);
            if(count($images) > 0){
                foreach($images as $image):
                    if(File::exists($image)){
                        File::delete($image);
                        File::delete(insertAtPosition($image));
                    }
                endforeach;
            }

            $product->delete();
            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = 'Product Deleted Successfully!';


            return response($response);
        }catch(Exception $e){

            $response['status'] = true;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }
}
