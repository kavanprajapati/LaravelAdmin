<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use File;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->publicPath = public_path("/storage/settings/");
    }

    public function validateRequest($id = "")
    {
        $validateData = request()->validate([
            'app_name'    => 'required',
            'app_email'   => 'required|email',
            'app_logo'    => 'image',
        ]);
        return $validateData;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        return view('admin.settings.show',['settings'=>$setting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $id = 1;
        $settings = Setting::find($id);
        return view('admin.settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $id = 1;
        $result = $this->validateRequest($id);
        $setting = Setting::find($id);

        // APP LOGO
        $imagePath = $this->publicPath . $setting->app_logo;
        if ($request->hasFile('app_logo')) {
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $appLogo = $request->file('app_logo');
            $imgName = 'APP_LOGO_' . time() . '.' . $appLogo->extension();
            $destinationPath = $this->publicPath;
            $appLogo->move($destinationPath, $imgName);
        } else {
            $imgName = $setting->app_logo;
        }

        // APP FAVICON
        $imagePathFavicon = $this->publicPath . $setting->app_favicon;
        if ($request->hasFile('app_favicon')) {
            if (File::exists($imagePathFavicon)) {
                File::delete($imagePathFavicon);
            }
            $appFavIcon = $request->file('app_favicon');
            $imgNameFavicon = 'APP_FAVICON_' . time() . '.' . $appFavIcon->extension();
            $destinationPath = $this->publicPath;
            $appFavIcon->move($destinationPath, $imgNameFavicon);
        } else {
            $imgNameFavicon = $setting->app_favicon;
        }

        $setting->app_name    = $result['app_name'];
        $setting->app_email   = $result['app_email'];
        $setting->app_logo    = $imgName;
        $setting->app_favicon = $imgNameFavicon;
        $setting->save();

        if ($setting) {
            return redirect()->route('admin.settings.show')->with("success", "Settings updated successfully!");
        } else {
            return redirect()->route('admin.settings.show')->with("error", "Oops..! some error occurred!");
        }
    }
}
