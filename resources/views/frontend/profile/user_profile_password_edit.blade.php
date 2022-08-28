@extends('frontend.main_master')
@section('content')
@php
  $user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp

<div class="body-content outer-top-xs" id="top-banner-and-menu">


  <div class="container">
    <div class="row"> 
        
      <div class="col-md-2">
        <br>
      {{--     <img src="{{  (!empty( Auth::user()->profile_photo_path) ? url('upload/user_images/'. Auth::user()->profile_photo_path) : url('upload/no_image.jpg') ) }} " alt="" class="card-img-top " style="border-radius:50%; height: 100%; width:100%" > --}}
          <img src="{{  (!empty( $user->profile_photo_path) ? url('upload/user_images/'. $user->profile_photo_path) : url('upload/no_image.jpg') ) }} " alt="" class="card-img-top " style="border-radius:50%; height: 100%; width:100%" >
        <br><br>
          <ul class="list-group list-group-flush">
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
            <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile</a>
            <a href="{{ route('user.profile.passwordupdate') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">logout</a>
          </ul>
      </div>

      <div class="col-md-2">

      </div>

      <div class="col-md-6">
          <div class="card">
            <h3 class="text-center">
              <span class="text-danger">
             

              </span>
              <strong>
               {{--  {{ Auth::user()->name }}  
 --}}
              </strong>
              Change your password
             


            </h3>
          </div>

          <div class="card-body">
              <form method="POST" action="{{  route('user.profilePasswordUpdate') }}" >
                @csrf
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Old Password<span>*</span></label>
                    <input type="text" id="current_password" name="oldPassword" value="" class="form-control" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">New Password<span>*</span></label>
                    <input type="password"  id="password" name="password" value="" class="form-control" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Confirm Password<span>*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation" value="" class="form-control" id="exampleInputEmail1">
                </div> 

               

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">Update</button>
                </div>
               

              </form> 
          </div>


      </div>


    </div>
  </div>
</div>
@endsection