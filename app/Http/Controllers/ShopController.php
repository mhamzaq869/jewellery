<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
     /**
     * Show the Shop index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($cat=null,$sub=null)
    {

        $category = Category::where(DB::raw('lower(name)'),$cat)->first();
        $subcat = Category::where(DB::raw('lower(name)'),$sub)->first();

        if($cat != null && $sub != null){
            $products = Product::where('status',1);
            if($category != null ){
                $products = $products->where('category_id',$category->id);
            }else{
                abort(404);
            }

            if($subcat != null){
                $products = $products->where('subcategory_id',$subcat->id);
            }else{
                abort(404);
            }

            $products = $products->get();

        }elseif($cat != null){
            if($category != null ){
                $products = Product::where('category_id',$category->id)
                ->where('status',1)->get();
            }else{
                abort(404);
            }


        }else{
            $products = Product::where('status',1)->get();
        }

        return view('frontend.shop', get_defined_vars());
    }

    /**
     * Return response of Product .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productDetail($id)
    {
        try{
            $product = Product::with(['category','subcategory'])->where('id',$id)->where('status',1)->first();
            return view('frontend.product_detail', get_defined_vars());
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }


    /**
     * Return response of Product .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productDetailAjax($id)
    {
        try{
            $product = Product::with(['category','subcategory'])->where('id',$id)->where('status',1)->first()->toArray();

            $response['status'] = true;
            $response['code'] = 200;
            $response['data'] = $product;

            return response($response);
        }catch(Exception $e){

            $response['status'] = false;
            $response['code'] = 500;
            $response['data'] = $e->getMessage();

            return response($response);
        }
    }
}
