@extends('admin.admin_master')
@section('admin')


<div class="container-full">
    <div class="container-full">
	

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			<div class="col-8">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Brand List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand Name En</th>
								<th>Brand Name Kan</th>
								<th>Image</th>
								<th>ACtion</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach ($brands as $item )
                          	<tr>
								<td>{{ $item->brand_name_en }}</td>
								<td>{{  $item->brand_name_kan  }}</td>
								<td><img src="{{ asset($item->brand_image)  }}" style="width:70px;height:40px"></td>
								<td>
                                    <a href="edit/{{ $item->id }}" class="btn btn-info">Edit</a>
                                    <a href="{{ $item->id }}" class="btn btn-info">Delete</a>

                                </td>
							</tr>
                            @endforeach
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			 
			  <!-- /.box -->          
			</div>
			
            <!-- /.col -->

            {{-- Brand ADD --}}
            <div class="col-4">
                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Brand List</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                      
                        <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            	 
                                                <div class="form-group">
                                                    <h5>Brand Name Eng<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input id="current_password" type="text" name="brand_name_en" class="form-control" required="" data-validation-required-message="This field is required" value=""> <div class="help-block"></div></div>
                                                    @error('brand_name_en')
                                                        <span class="text-danger" >{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <h5>Brand Name Kan <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input id="password" type="text" name="brand_name_kan" class="form-control" required="" data-validation-required-message="This field is required" value=""> <div class="help-block"></div></div>
                                                        @error('brand_name_kan')
                                                        <span class="text-danger" >{{ $message }}</span>
                                                    @enderror
                                                </div>
                                          
        
                                           
                                                <div class="form-group">
                                                    <h5>Brand Image<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input id="password_confirmation" type="file" name="brand_image" class="form-control" required="" data-validation-required-message="This field is required" value=""> <div class="help-block"></div></div>
                                                        @error('brand_image')
                                                        <span class="text-danger" >{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            
        
                                            @error('oldPassword')
                                            <span class="text-danger"> {{$message}}</span> 
                                             @enderror
        
                                             @error('password')
                                            <span class="text-danger"> {{$message}}</span> 
                                             @enderror
        
                               
                          
                               <div class="text-xs-right">
                                   <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                               </div>
                           </form>


                       </div>
                   </div>
                   <!-- /.box-body -->
                 </div>
                 <!-- /.box -->
   
                
                 <!-- /.box -->          
               </div>

            {{-- Brand Add ENDS --}}

		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>

  @endsection