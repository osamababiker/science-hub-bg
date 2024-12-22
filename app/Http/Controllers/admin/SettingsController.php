<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;


class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.settings.index',[
            'settings' => Settings::first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $request->validate([
            'company_name' => 'required|string',
            'company_slogan' => 'required|string',
            'logo' => 'required|file',
            'primary_email' => 'required|email',
            'primary_phone' => 'required',
            'company_bio' => 'required|string',
            'privacy_policy' => 'required|string',
            'terms_of_use' => 'required|string'
        ]);
        $settings = Settings::findOrFail($id);

        if($request->has('logo')){
            $logo = $request->file('logo');
            $logo_name = time().'_'. rand(1000, 9999). '.' .$logo->extension();
            $logo->move(public_path('upload/settings'),$logo_name);
        }else{
            $logo_name = $settings->logo;
        }

        $settings->company_name = $request->company_name;
        $settings->company_slogan = $request->company_slogan;
        $settings->logo = $logo_name;
        $settings->primary_email = $request->primary_email;
        $settings->secondary_email = $request->secondary_email;
        $settings->primary_phone = $request->primary_phone;
        $settings->secondary_phone = $request->secondary_phone;
        $settings->facebook_link = $request->facebook_link;
        $settings->twitter_link = $request->twitter_link;
        $settings->linkedin_link = $request->linkedin_link;
        $settings->youtube_link = $request->youtube_link;
        $settings->instagram_link = $request->instagram_link;
        $settings->company_bio = $request->company_bio;
        $settings->privacy_policy = $request->privacy_policy;
        $settings->terms_of_use = $request->terms_of_use;
        $settings->save();

        return redirect()->back()->with('feedback', 'settings has been updated');
    }

}
