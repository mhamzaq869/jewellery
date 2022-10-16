<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application Homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
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
