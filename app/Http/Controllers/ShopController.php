<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{


    protected $category_filter=[],
              $size_filter=[],
              $brand_filter=[];

     /**
     * Show the Shop index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($cat=null,$sub=null)
    {

        $categories = Category::where('status',1)->where('parent_id',null)->get();
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
     * Filter Product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filter_product_for(Request $request)
    {

        try{
            $search = "";
            $order_filter = "";
            $min_price = "";
            $max_price = "";
            $category_array = "";
            $size_array = "";
            $brand_array = "";


            $arr = Product::query();
            $category = new Category();

            // SortBy Filter
            if (!empty($request->order_filter)) {
                $order_filter = $request->order_filter;
                if ($order_filter == "Latest") {
                    $arr->latest();
                } else if ($order_filter == "Low") {
                    $arr->orderBy('price', 'ASC');
                } else if ($order_filter == "High") {
                    $arr->orderBy('price', 'DESC');
                } else if ($order_filter == "Sort_ASC") {
                    $arr->orderBy('title', 'ASC');
                } else if ($order_filter == "Sort_DESC") {
                    $arr->orderBy('title', 'DESC');
                }
            }

            //Price Min & Max Filter
            if (!empty($request->min_price) && !empty($request->max_price)) {
                $min_price = $request->min_price;
                $max_price = $request->max_price;
                $arr->whereBetween('products.price', [$min_price, $max_price]);
            }

            //Search Filter
            if(!empty($request->search_product)) {
                $search = $request->search_product;
                $arr->where('products.title', 'LIKE', '%' . $search . '%');
            }

            // Condition for Category Filter
            if (!empty($request->category_array)) {
                $category_array = $request->category_array;
                $this->category_filter = explode(',', $category_array);
            }else{
                $this->category_filter = [];
            }

            if (!empty($this->category_filter)) {
                $arr->where(function ($q) use($category) {
                    $attribute_gender_first =  $category->where('id',$this->category_filter[0])->first()->id ?? 0;
                    $q->where('subcategory_id', $attribute_gender_first);

                    for ($i = 1; $i < count($this->category_filter); $i++) {
                        $attribute_gender_all =  $category->where('id',$this->category_filter[$i])->first()->id ?? 0;
                        $q->orWhere('subcategory_id', $attribute_gender_all);
                    }

                });
            }

            // Condition for Size Filter
            if (!empty($request->size_array)) {
                $size_array = $request->size_array;
                $this->size_filter = explode(',', $size_array);
            }else{
                $this->size_filter = [];
            }

            if(!empty($this->size_filter)){
                $arr->where(function ($q) use($category){
                    $q->where('size', 'Like','%'.$this->size_filter[0].'%');
                    for ($i = 1; $i < count($this->size_filter); $i++) {
                        $q->where('size', 'Like','%'.$this->size_filter[$i].'%');
                    }
                });
            }

            // Condition for Brand
            if (!empty($request->brand_array)) {
                $brand_array = $request->brand_array;
                $this->brand_filter = explode(',', $brand_array);
            }else{
                $this->brand_filter = "";
            }

            if (!empty($this->brand_filter)) {
                $arr->where(function ($q){
                    $brands = DB::table('brands')->get();
                    $brand_first = $brands->where('id',$this->brand_filter[0])->first()->id ?? '';

                    $q->where('products.brand_id', $brand_first);
                    for ($i = 1; $i < COUNT($this->brand_filter); $i++) {
                        $brand_all = $brands->where('id',$this->brand_filter[$i])->first()->id ?? '';
                        $q->orWhere('products.brand_id', $brand_all);
                    }
                });
            }


            $response['status'] = true;
            $response['code'] = 200;
            $response['data'] = $arr->with(['category','subcategory'])->where('status',1)->take(20)->get();

            return response($response);

        }catch(Exception $e){
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = 'Something went wrong!';

            return response($response);
        }

    }
    /**
     * Return response of Product .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productDetail($slug)
    {
        try{
            $product = Product::with(['category','subcategory'])->where('slug',$slug)->where('status',1)->first();
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
