<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class AdminController extends Controller
{

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
        $adminImage = $request->file('adminImage');

        $admin = User::find($id);
        $isUpload = $this->storeImage($admin);

        if (!empty($isUpload)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function storeImage($admin)
    {
        if (request()->has('adminImage')) {
            $avatarImage = 'ADMIN_' . time() . '.' . request()->adminImage->extension();
            $admin = User::find($admin->id);
            $admin->profile = $avatarImage;
            $admin->save();
            if ($admin) {
                $path = request()->adminImage->storeAs('public/admin', $avatarImage);
            }
        }
        return $path;
    }
}
