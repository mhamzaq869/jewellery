<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\SiteSetting;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
     /**
     * Show the Admin Profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        return view('backend.profile.index');
    }

    /**
     * Update Admin Profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profileUpdate(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender = $request->gender;

        if($request->has('photo')){
            $image = json_decode($request->photo);
            $filename = uniqid().time().'.png';
            if(File::exists($user->photo)){
                File::delete($user->photo);
            }
            Storage::put('public/profile/'.$filename, base64_decode($image->data));
            $user->photo = 'storage/profile/'.$filename;
        }

        if($request->new_password != ''){
            if(!Hash::check($request->password,$user->password)){
                return redirect()->back()->withErrors('password','Incorrect Current Password, Please Check Again!');
            }
            $user->password = Hash::make($request->new_password);
        }

        $user->save();
        return redirect()->back()->with('success','Your Profile Successfully Updated!');
    }

     /**
     * Show the Admin Profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function setting()
    {
        $setting = SiteSetting::find(1);
        return view('backend.setting.general.index', get_defined_vars());
    }

    /**
     * Update Admin Profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function settingUpdate(Request $request)
    {
        $setting = SiteSetting::findOrFail(1);

        $setting->email = json_encode($request->email);
        $setting->contact = json_encode($request->contact);
        $setting->name = $request->name;
        $setting->about = $request->about;
        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;
        $setting->twitter = $request->twitter;
        $setting->medium = $request->medium;

        if($request->has('logo')){
            $image = json_decode($request->logo);
            $filename = uniqid().time().'.png';
            if(File::exists($setting->logo)){
                File::delete($setting->logo);
            }
            Storage::put('public/setting/'.$filename, base64_decode($image->data));
            $setting->logo = 'storage/setting/'.$filename;
        }

        if($request->has('favicon')){
            $image = json_decode($request->favicon);
            $filename = uniqid().time().'.png';
            if(File::exists($setting->favicon)){
                File::delete($setting->favicon);
            }
            Storage::put('public/setting/'.$filename, base64_decode($image->data));
            $setting->favicon = 'storage/setting/'.$filename;
        }

        $setting->save();
        return redirect()->back()->with('success','Site Setting Successfully Updated!');
    }


     /**
     * Show the Admin Profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function banner()
    {
        $main_banners = Banner::where('type','main_slider')->get();
        $cat_banners = Banner::where('type','cat_banners')->get();

        return view('backend.setting.banner.index', get_defined_vars());
    }

    /**
     * Show the Admin Profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function bannerShow($id)
    {
        try{
            $banner = Banner::find($id);

            $response['status'] = true;
            $response['code'] = 200;
            $response['data'] = $banner;

            return response($response);
        }catch(Exception $e){
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }

    /**
     * Update Admin Profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function bannerUpdate(Request $request)
    {
        try{
            $banner = $request->has('id') ? Banner::find($request->id) : new Banner;

            $banner->h1 = $request->h1 ?? '';
            $banner->h1_color = $request->h1_color ?? '';
            $banner->h2 = $request->h2 ?? '';
            $banner->h2_color = $request->h2_color ?? '';
            $banner->h3 = $request->h3 ?? '';
            $banner->h3_color = $request->h3_color ?? '';
            $banner->link = $request->link ?? '';
            $banner->btn_text = $request->btn_text ?? '';
            $banner->btn_text_color = $request->btn_text_color ?? '';
            $banner->btn_bg_color = $request->btn_bg_color ?? '';
            $banner->description = $request->description ?? '';
            $banner->description_color = $request->description_color ?? '';
            $banner->type = $request->type ?? '';
            $banner->status = $request->status ?? '';

            if($request->has('photo')){
                $image = json_decode($request->photo);
                $filename = uniqid().time().'.png';
                if(File::exists($banner->photo)){
                    File::delete($banner->photo);
                }
                Storage::put('public/banner/'.$filename, base64_decode($image->data));
                $banner->photo = 'storage/banner/'.$filename;
            }

            $banner->save();

            $response['status'] = true;
            $response['code'] = 200;
            $response['data'] = $banner;
            $response['message'] = 'Banner Setting Successfully Updated!';

            return response($response);

        }catch(Exception $e){
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = $e->getMessage();

            return response($response);
        }
    }

    /**
     * Show the Admin Profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shopBanner()
    {
        $shop_banners = Banner::where('type','shop_slider')->get();
        return view('backend.setting.banner.shop', get_defined_vars());
    }


}
