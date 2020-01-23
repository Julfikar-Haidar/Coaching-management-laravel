<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;
use Image;
class sliderController extends Controller
{
    public function addSlider()
    {
    	return view('admin.slider.add-slider-form');
    }


    public function uploadSlider(Request $request)
    {
    	$this->validate($request,[
             'slide_image'=>'required',
             'slide_title'=>'required',
             'slide_description'=>'required',
             'slide_status'=>'required',
    	]);

    	$slider=new slider();
    	$slider->slide_title=$request->slide_title;
    	$slider->slide_description=$request->slide_description;
    	$slider->slide_status=$request->slide_status;
    

      if ($request->hasFile('slide_image')) {
        $image = $request->file('slide_image');
        $img = time() . '.'. $image->getClientOriginalExtension();
        $location = public_path('admin/slider/' .$img);
        Image::make($image)->save($location);
        $slider->slide_image = $img;
    }
    $slider->save();

    return redirect()->back()->with('success','slider inserted successfully');
    }
}
