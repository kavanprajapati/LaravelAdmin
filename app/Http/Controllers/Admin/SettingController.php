<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function validateRequest($id = "")
    {
        $validateData = request()->validate([
            'app_name' => 'required',
            'app_email' => 'required|email'
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
        //
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
        $setting = Setting::where('id', $id)->update(array(
            'app_name' => $result['app_name'],
            'app_email' => $result['app_email']
        ));

        if ($setting) {
            return redirect()->route('admin.settings')->with("success", "Settings updated successfully!");
        } else {
            return redirect()->route('admin.settings')->with("error", "Oops..! some error occurred!");
        }
    }
}
