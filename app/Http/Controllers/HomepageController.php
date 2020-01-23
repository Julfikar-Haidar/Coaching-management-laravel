<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Headerfooter;
use DB;

class HomepageController extends Controller
{
   public function addheaderfooterForm()
   {
   	$header=DB::table('headerfooters')->first();
   	if (isset($header)) {

   		return view('admin.home.manage-header-footer-form',compact('header'));

   	}else{
   		return view('admin.home.add-header-footer-form');
   	}
   }


   public function headerandfooterSave(Request $request)
   {

   $this->headerandfooterValidation($request);

   	$data=new Headerfooter();

   	$data->owner_name=$request->owner_name;
   	$data->owner_dept=$request->owner_dept;
   	$data->owner_mobile=$request->owner_mobile;
   	$data->address=$request->address;
   	$data->status=$request->status;
   	$data->copyright=$request->copyright;
   	$data->save();
   	return redirect('/home')->with('success','Data Inserted successfully!!');
   }

   public function manageHeaderFooter($id)
   {
   	$header=Headerfooter::find($id);
   	return view('admin.home.manage-header-footer-form',compact('header'));
   }

   public function headerandfooterUpdate(Request $request)
   {
   	$this->headerandfooterValidation($request);
   	$header=Headerfooter::find($request->id);
   	
   	$header->owner_name=$request->owner_name;
   	$header->owner_dept=$request->owner_dept;
   	$header->owner_mobile=$request->owner_mobile;
   	$header->address=$request->address;
   	$header->copyright=$request->copyright;
   	$header->save();
   	return redirect()->back()->with('success','Data Updated successfully!!');
   }

   protected function headerandfooterValidation($request)
   {
   	 	$this->validate($request,[

       'owner_name'  => 'required|min:5',
       'owner_dept'  => 'required',
       'owner_mobile'  => 'required',
       'address'  => 'required',
       'copyright'  => 'required',
		]);
   }
}
