<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->publicPath = public_path("/storage/admin/");
    }

    public function validateRequest($id = "")
    {
        $validateData = request()->validate([
            'name' => 'required'
        ]);
        return $validateData;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adminData = User::find($id);
        return view('admin.profile.show', compact('adminData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminData = User::find($id);
        return view('admin.profile.edit', compact('adminData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->post('id');
        $result = $this->validateRequest($id);
        $admin = User::where('id', $id)->update(array(
            'name'    => $result['name'],
            'address' => $request->post('address')
        ));

        if ($admin) {
            return redirect()->route('admin.profile', ['id' => $id])->with("success", "Profile updated successfully!");
        } else {
            return redirect()->route('admin.profile', ['id' => $id])->with("error", "Oops..! some error occurred!");
        }
    }

    public function changeImage(Request $request)
    {
        $id = $request->post('id');
        $admin = User::find($id);
        $imagePath = $this->publicPath . $admin->profile;
        if ($request->hasFile('adminImage')) {
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $adminProfile = $request->file('adminImage');
            $imgName = 'ADMIN' . time() . '.' . $adminProfile->extension();
            $destinationPath = $this->publicPath;
            $adminProfile->move($destinationPath, $imgName);
        } else {
            $imgName = $admin->profile;
        }

        $admin->profile = $imgName;
        $admin->save();

        if (!empty($imgName) && !empty($admin->profile)) {
            return response()->json(['responseStatus' => 1,'imgName'=>$imgName]);
        } else {
            return response()->json(['responseStatus' => 0,'imgName'=>$imgName]);
        }
    }
}
