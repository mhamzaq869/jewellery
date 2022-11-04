<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    private $gateway;


     /**
     * Initiate a payment.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function pay($request)
    {
        $integeration = DB::table('integrations')->where('name',$request->payment)->where('status',1)->first();
        if($request->payment == 'PayPal'){
            $this->gateway = Omnipay::create('PayPal_Rest');
            $this->gateway->setClientId($integeration->client_id);
            $this->gateway->setSecret($integeration->secret_key);
            $this->gateway->setTestMode(true); //set it to 'false' when go live

            $this->paypalCharge($request);
        }elseif($request->payment == 'Stripe'){
            $this->gateway = Omnipay::create('Stripe');
            $this->gateway->setApiKey($integeration->secret_key);
            return $this->stripeCharge($request);

        }elseif($request->payment == 'Klarna'){

        }
    }
    /**
     * Make Payment on PayPal.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function paypalCharge($request)
    {
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => 'USD',
                'returnUrl' => $request->returnUrl,
                'cancelUrl' => $request->cancelUrl,
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect(); // this will automatically forward the customer
            } else {
                // not successful
                return $response->getMessage();
            }
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Make Payment on Stripe.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function stripeCharge($request)
    {
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => 'USD',
                'source' => 'tok_visa',
            ))->send();

            // Stripe order is OK, profit!
            if ($response->isSuccessful()) {
                return $request->returnUrl;
            // Stripe thinks order needs additional strep
            } elseif ($response->isRedirect()) {
                $response->redirect();
            }


        } catch(Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Make Payment on Klarna.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function klarnaCharge($request)
    {
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => 'USD',
                'returnUrl' => $request->returnUrl,
                'cancelUrl' => $request->cancelUrl,
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect(); // this will automatically forward the customer
            } else {
                // not successful
                return $response->getMessage();
            }
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }



    /**
     * Payment Completed.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function paymentCompleted($request)
    {
        try {
            $carts = Cart::with('product')->where('user_id',request()->ip())->get();

            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'ORD-'.strtoupper(Str::random(10)),
                'billing_address' => $request['billing_address'],
                'shipping_address' => $request['shipping_address'],
                'shippment' => $request['shippment'],
                'tax' => $request['tax'],
                'total' => $request['amount'],
                'note' => $request['note'],
                'payment_method' => $request['method'],
                'payment_status' => 'paid',
            ]);

            $transaction = Transaction::create([
                'user_id' => Auth::id(),
                'order_id' => $order->id,
                'details' => json_encode($request['payment_detail']),
                'payment_method' => $request['method'],
                'payment_status' => 'paid',
            ]);

            Cart::where('user_id',request()->ip())->update([
                'user_id' => Auth::id(),
                'order_id' => $order->id,
            ]);

            $notify = new NotificationController();
            $users_list = User::where('role',1)->get();
            foreach ($users_list as $key => $value) {
                $sender_id = Auth::user()->id;
                $receiver_id = $value['id'];
                $slug = 'new-order';
                $type = 'order';
                $data = 'data';
                $title = 'New Order';
                $icon =  'shopping-bag';
                $class = 'primary';
                $desc = 'You have new order <a href="#">'. $order->order_number.'</a>';

                $notify->sendNotification($sender_id,$receiver_id,$slug,$type,$data,$title,$icon,$class,$desc);
            }

            session()->put('order_number',$order->order_number);

        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

}
