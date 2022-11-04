<?php

namespace App\Http\Controllers\Backend;

use App\Charts\MonthlyOrdersChart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MonthlyOrdersChart $orderChart)
    {

        $customers = User::whereNot('role',1)->get();
        $sales = Order::where('status','delivered')->sum('total');
        $products = Product::all();
        $orders = Order::orderBy('id','Desc')->get();
        $transactions = Transaction::all();
        $monthly_earning = Order::whereIn('id',$transactions->pluck('id'))->whereMonth('created_at',date('m'))->sum('total');
        $chart =  $orderChart->build();

        return view('backend.index', get_defined_vars());
    }

    /**
     * Show the application Global search results.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function globalSearch(Request $request)
    {

        $transactions = Transaction::join('users', 'users.id', '=', 'transactions.user_id')
                            ->join('orders', 'orders.id', '=', 'transactions.order_id')
                            ->select(['transactions.id','users.first_name','users.last_name','orders.order_number','transactions.payment_method','transactions.order_id','transactions.user_id'])
                            ->where(DB::raw('lower(users.first_name)'),'like','%'.$request->search.'%')
                            ->orWhere(DB::raw('lower(users.last_name)'),'like','%'.$request->search.'%')
                            ->orWhere(DB::raw('lower(orders.order_number)'),'like','%'.$request->search.'%')
                            ->orWhere(DB::raw('lower(transactions.payment_method)'),'like','%'.$request->search.'%')
                            ->get();


        $orders = DB::select("SELECT orders.order_number, orders.total, users.first_name, users.last_name FROM orders Left JOIN users ON orders.user_id = users.id WHERE lower(orders.order_number)  LIKE '%$request->search%' OR CONCAT(lower(users.first_name), ' ', lower(users.last_name)) LIKE '%$request->search%' OR lower(orders.total) LIKE '%$request->search%' ");

        $products = DB::select("SELECT id,title,slug,price,quantity FROM products WHERE status = 1 AND lower(title)  LIKE '%$request->search%' OR lower(slug) LIKE '%$request->search%' OR lower(price) LIKE '%$request->search%' OR lower(quantity) LIKE '%$request->search%'");


        $customers = User::where('email','like','%'.$request->search.'%')
                        ->where('status',1)
                        ->orWhere(DB::raw('lower(first_name)'),'like','%'.$request->search.'%')
                        ->orWhere(DB::raw('lower(last_name)'),'like','%'.$request->search.'%')
                        ->orWhere(DB::raw('lower(gender)'),'like','%'.$request->search.'%')
                        ->get();

        $customers = $customers->reject(function ($li) {
            return $li->role == 1;
        })->flatten();


        $response['transactions'] = $transactions;
        $response['orders'] = $orders;
        $response['products'] = $products;
        $response['customers'] = $customers;
        $response['status_code'] = 200;
        $response['success'] = true;

        return response()->json($response);

    }

}
