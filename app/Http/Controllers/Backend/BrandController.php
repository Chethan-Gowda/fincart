<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function BrandView()
    {
       $brands = Brand::latest()->get();
       return view('admin.brand.brand_view', compact('brands'));
    }

    public function BrandStore(Request $request)
    {

        $validateData =  $request->validate(
            [
                'brand_name_en' => 'required',
                'brand_name_kan' => 'required',
                'brand_image' => 'required',
                
            ],
            [
                'brand_name_en.required' => 'Please Enter Brand Name',
                'brand_name_kan.required' => 'Please enter Kannada brand Name',
                'brand_image.required' => 'Please add image'
            ]
       ); 
       $brands = Brand::latest()->get();
       return view('admin.brand.brand_view');
    }
}
