<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
    /* To fetch Admin Proflie */
    public function AdminProfile()
    {
        $profileData = Admin::find(1);
        return view('admin.admin_profile_view', compact('profileData'));
    }

    /* To fetch Admin Proflie */
    public function AdminProfileEdit()
    {
        $profileData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('profileData'));
    }

    /* To fetch Admin Proflie */
    public function AdminProfileStore(Request $request)
    {
      
        $profileData = Admin::find(1);
        $profileData->name = $request->name;
        $profileData->email = $request->email;
        
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$profileData->profile_photo_path));
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $profileData['profile_photo_path'] = $filename;
        }
        $profileData->save();
        $notification = array(
            'message'=>'Profile Updated Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }


    

    public function AdminProfilePasswordEdit()
    {
        return view('admin.admin_profile_password_edit');
    }


    public function AdminUpdateChangePassword(Request $request)
    {
       

        $validateData =  $request->validate(
            [
                'oldPassword' => 'required',
                'password' => 'required|confirmed'
            ],
            [
                'oldPassword.required' => 'Please Enter Old Password',
                'password.required' => 'Please enter password',
                'password.confirmed' => 'Password and Confirm Password are not same'
            ]
       );
 

        $hashedPassword  =  Admin::find(1)->password;
        if(Hash::check($request->oldPassword,$hashedPassword)){

                $admin = Admin::find(1);
                $admin->password = Hash::make($request->password);
                $admin->save();
                Auth::logout();
                return redirect()->route('admin.logout');
        }
        else{
            return redirect()->back()->with('success','Admin Password Changed');
        }

    }
}
