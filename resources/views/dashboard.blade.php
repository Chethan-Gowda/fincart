@extends('frontend.main_master')
@section('content')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
        
      <div class="col-md-2">
        <br>
          <img src="{{  (!empty($user->profile_photo_path) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.jpg') ) }} " alt="" class="card-img-top " style="border-radius:50%; height: 100%; width:100%" >
        <br><br>
          <ul class="list-group list-group-flush">
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
            <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile</a>
            <a href="{{ route('user.profile.passwordupdate') }}" class="btn btn-primary btn-sm btn-block">Change Passwod</a>
            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">logout</a>
          </ul>



      </div>

      <div class="col-md-2">

      </div>

      <div class="col-md-6">
          <div class="card">
            <h3 class="text-center">
              <span class="text-danger">
                Hi.... 

              </span>
              <strong>
                {{ Auth::user()->name }}  
              </strong>
              Welcome..
            </h3>
          </div>
      </div>


    </div>
  </div>
</div>
@endsection