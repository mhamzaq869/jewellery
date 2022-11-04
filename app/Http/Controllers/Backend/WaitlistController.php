<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Waitlist;
use Illuminate\Http\Request;

class WaitlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $waitlists = Waitlist::with(['product'])->where('product_id',$id)->get()->toArray();
        return view('backend.product.waitlist', get_defined_vars());
    }
}
