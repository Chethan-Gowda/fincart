@extends('admin.admin_master')
@section('admin')
<script
  src="https://code.jquery.com/jquery-3.6.0.js"></script>

<div class="container-full">
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Edit Profile</h4>
            </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{ route('admin.profileStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="row">
                       <div class="col-12">						
                        
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Name Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="name" name="name" class="form-control" required="" data-validation-required-message="This field is required" value="{{ $profileData->name }}"> <div class="help-block"></div></div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Email Input Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required="" data-validation-required-message="This field is required" value="{{ $profileData->email }}"> <div class="help-block"></div></div>
                                        </div>
                                    </div>

                           </div>

                           <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>File Input Field <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="image" type="file" name="profile_photo_path" class="form-control" required=""> <div class="help-block"></div></div>
                                  </div>
                            </div>
                            <div class="col-md-6">

                                <img id="showImage" src="{{  (!empty($profileData->admin_photo_path) ? url('upload/admin_images/'.$profileData->admin_photo_path) : url('upload/no_image.jpg') ) }} " style="width: 100px; height:100px;"/>
                            </div>

                            
                        
                           </div>

                          

                          


                          
                           
                       <div class="text-xs-right">
                           <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                       </div>
                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </section>
</div>
<script>

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>
@endsection