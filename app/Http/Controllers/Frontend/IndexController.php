<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class IndexController extends Controller
{
    //
    public static function index()
    {
       return view('frontend.index');
    }

    public function Userlogout()
    {
     Auth::logout();
     return Redirect()->route('login');
    }
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }


    public function UserProfilePasswordEdit()
    {
        return view('frontend.profile.user_profile_password_edit');
    }

    public function UserProfileUpdatePassword(Request $request)
    {
        # code...
        return view('frontend.profile.user_password_change', compact('user'));
    }

    

    public function UserProfileStore(Request $request)
    {
        $profileData = User::find(Auth::user()->id);
        $profileData->name = $request->name;
        $profileData->email = $request->email;
        $profileData->phone = $request->phone;
        
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$profileData->profile_photo_path));
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $profileData['profile_photo_path'] = $filename;
        }
        $profileData->save();
        $notification = array(
            'message'=>'User Profile Updated Successfully',
            'alert-type'=> 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }


    public function UserUpdateChangePassword(Request $request)
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
 
      /*   $id = User::find(Auth::user()->id);
        $hashedPassword  =  User::find($id)->password; */
        //$id = User::find(Auth::user()->id);
        $hashedPassword  =  Auth::user()->password;
        if(Hash::check($request->oldPassword,$hashedPassword)){

                $user =User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route('login');
        }
        else{
            return redirect()->back()->with('success','User Password Changed');
        }

    }
}
