<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Auth;
use Image;
use File;




class UserRegistrationController extends Controller
{
	public function showRegistrationFrom()
	{
		if (Auth::user()->role=='Admin') {
			
		return view('admin.users.registration-form');
		}else{
			return redirect('/home');
		}
	}

	public function user_save(Request $request)
	{
		$this->validator($request->all())->validate();

		event(new Registered($user = $this->create($request->all())));

		$users=User::all();

		return view('admin.users.user-list',compact('users'));

	}

	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => ['required', 'string', 'max:255'],
			'role' => ['required'],
			'mobile' => ['required', 'string', 'max:13','min:11'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
	}
	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'role' => $data['role'],
			'mobile' => $data['mobile'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
		]);
	}

	public function user_list()
	{
		if (Auth::user()->role=='Admin') {
			
		$users=User::all();

		return view('admin.users.user-list',compact('users'));
		}else{
			return redirect('/home');
		}
	}

	public function user_profile($userId)
	{
		$users=User::find($userId);

		return view('admin.users.users-profile',compact('users'));
	}

	public function changeuserInfo($id)
	{
		$users=User::find($id);
		return view('admin.users.change-users-info',compact('users'));
	}


	public function userinfoUpdate(Request $request,$id)
	{
		$this->validate($request,[

       'name'  => 'required', 'string', 'max:255',
       'mobile'  => 'required', 'string', 'max:13','min:11',
       'email'  => 'required', 'string', 'email', 'max:255', 'unique:users',
		]);

		$users=User::find($id);

		$users->name=$request->name;
		$users->mobile=$request->mobile;
		$users->email=$request->email;
		$users->save();
		session()->flash('success', 'User Updated successfully !!');
		return redirect()->back();

	}

	public function changeuserAvatar($id)
	{
		$users=User::find($id);
		return view('admin.users.change-user-avatar',compact('users'));
	}
	public function updatePhoto(Request $request)
	{

		$users = User::find($request->users_id);

		// $file=$request->file('avatar');
		// $imagename=$file->getClientOriginalName();
		// $directory='admin/avatar/';
		// $imageurl=$directory.$imagename;

		// Image::make($file)->resize(300,300);

		// $users->avatar=$imageurl;
    
    
  //       $users->save();
    //insert images also
    if ($request->hasFile('avatar')) {
        $image = $request->file('avatar');
        $img = time() . '.'. $image->getClientOriginalExtension();
        $location = public_path('admin/avatar/' .$img);
        Image::make($image)->resize(300,300)->save($location);
        $users->avatar = $img;
    }
    $users->save();

    session()->flash('success', 'A new brand has added successfully !!');
    // session()->flash('success', 'A new brand has added successfully !!');
    return redirect("/users-profile/$request->users_id");

	}

	public function changeuserPassword($id)
	{
		$users=User::find($id);
		return view('admin.users.change-user-password',compact('users'));
	}

	public function userpaswordUpdate(Request $request)
	{
		$this->validate($request,[

       'new_password'  => 'required|string|min:8',
      
		]);

		$oldPassword=$request->password;

		$users=User::find($request->user_id);

		if (Hash::check($oldPassword,$users->password)) {

			
			$users->password=Hash::make($request->new_password);
			$users->save();

		 // session()->flash('success', 'A new brand has added successfully !!');
    return redirect("/users-profile/$request->user_id")->with('success', 'A new Password update successfully!!');
    // session()->flash('success', 'A new brand has added successfully !!');
		}else{

   
			 return redirect("/users-profile/$request->user_id")->with('errors', 'A old password not match!!');
			 // session()->flash('errors', 'A old Password Not match!!');
		}
		
	}
}
