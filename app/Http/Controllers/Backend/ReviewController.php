<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::with(['user','product'])->get();
        $pending_reviews = Review::with(['user','product'])->where('status',0)->get();
        $approved_reviews = Review::with(['user','product'])->where('status',1)->get();

        return view('backend.review.index', get_defined_vars());
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
            $order = Review::find($request->id)->update([
                'status'  => $request->status
            ]);

            $response['status'] = true;
            $response['code'] = 200;
            $response['message'] = 'Order Status Successfully Updated';
            $response['data'] = Review::with(['user','product'])->get();
            $response['pending_reviews'] = Review::with(['user','product'])->where('status',0)->get();
            $response['approved_reviews'] = Review::with(['user','product'])->where('status',1)->get();

            return response($response);

        }catch(Exception $e){

            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }
}
