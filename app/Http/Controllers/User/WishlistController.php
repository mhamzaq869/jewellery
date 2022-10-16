<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists = Wishlist::with('product')->get();
        return view('user.wishlist.index', get_defined_vars());
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
        $product = Product::where('id', $request->id)->first();

        if (empty($request->id)) {
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = 'Invalid Product';

            return response($response);

        }

        // return $product;
        if (empty($product)) {
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = 'Invalid Product';

            return response($response);
        }


        $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $product->id)->first();

        if($wishlist) {
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = 'This product is already in your wishlist.';

            return response($response);
        }else{
            $wishlist = new Wishlist;
            $wishlist->user_id = Auth::id();
            $wishlist->product_id = $product->id;
            $wishlist->save();
        }

        $response['status'] = true;
        $response['code'] = 200;
        $response['message'] = 'Product successfully added to wishlist.';

        return response($response);

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
        try{
            $cart = Wishlist::find($id);
            if ($cart) {
                $cart->delete();
                $response['status'] = true;
                $response['code'] = 200;
                $response['message'] = 'Product successfully deleted from cart';
                return response($response);
            }
        }catch(Exception $e){
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }
}
