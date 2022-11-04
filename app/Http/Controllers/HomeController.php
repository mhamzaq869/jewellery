<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Review;
use App\Models\Waitlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Newsletter;

class HomeController extends Controller
{

    /**
     * Show the application Homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('status',1)->get();
        $reviews = Review::where('status',1)->take(10)->get();
        $main_banners = Banner::where('type','main_slider')->where('status',1)->get();
        $cat_banners = Banner::where('type','cat_banners')->where('status',1)->get();

        return view('index', get_defined_vars());
    }

     /**
     * Show the application contact us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('frontend.contactus');
    }

     /**
     * Send Mail on Contact us form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contactMail(Request $request)
    {

        try {

            $mail = new MailController;
            $mail->sendMail($request->email, $request->subject, $request->message);

            return back()->with("success", "Email has been sent.");

        } catch (Exception $e) {
             return back()->with('error','Message could not be sent.');
        }
    }

    /**
     * waitlist
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function waitlist(Request $request)
    {

        try {

            $mail = new MailController;
            // $mail->sendMail($request->email, $request->subject, $request->message);
            Waitlist::create($request->all());

            $response['status'] = true;
            $response['status_code'] = 200;
            $response['type'] = 'success';
            $response['message'] = 'Your request has been sent ';

            return response($response);

        } catch (Exception $e) {
             return back()->with('error','Message could not be sent.');
        }
    }

    /**
     * Subscribe to newsletter
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function subscribe(Request $request)
    {

        try {
            $integeration = DB::table('integrations')->where('name','Mailchimp')->first();
            Config::set('newsletter.apiKey',$integeration->secret_key );
            Config::set('newsletter.lists.subscribers.id',$integeration->app_id );

            if($integeration->status == 1){




                if (!Newsletter::isSubscribed($request->email)) {
                    Newsletter::subscribePending($request->email);

                    if (Newsletter::lastActionSucceeded()) {

                        $response['status'] = true;
                        $response['status_code'] = 200;
                        $response['type'] = 'success';
                        $response['message'] = 'Subscribed! Please check your email';

                        return response($response);

                    } else {

                        $message = explode(':',Newsletter::getLastError());

                        $response['status'] = false;
                        $response['status_code'] = 500;
                        $response['type'] = 'error';
                        $response['message'] = $message[1] ?? 'Something went wrong! please try again';

                        return response($response);
                    }
                } else {

                    $response['status'] = true;
                    $response['status_code'] = 200;
                    $response['type'] = 'success';
                    $response['message'] = 'Already Subscribed';

                    return response($response);
                }
            }else {

                $response['status'] = false;
                $response['status_code'] = 500;
                $response['type'] = 'error';
                $response['message'] = 'Something went wrong! please try again';

                return response($response);
            }

        } catch (Exception $e) {
            $response['status'] = false;
            $response['status_code'] = 500;
            $response['type'] = 'error';
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }


    /**
     * Show the application about us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('frontend.aboutus');
    }

    /**
     * Show the application Faq page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function faq()
    {
        return view('frontend.faqs');
    }

    /**
     * Show the application Shipping & Returns page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shippingReturns()
    {
        return view('frontend.shipping_returns');
    }

    /**
     * Show the application Store & Locator page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeLocator()
    {
        return view('frontend.store_locator');
    }

    /**
     * Show the application Privacy Policy page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function privacyPolicy()
    {
        return view('frontend.privacy_policy');
    }

    /**
     * Show the application Terms & Conditions page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function termsCondition()
    {
        return view('frontend.terms_conditions');
    }
}
