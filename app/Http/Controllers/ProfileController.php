<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CloudinaryStorage;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$user = User::where('id', Auth::user()->id)->first();

    	return view('pages/userprofile', compact('user'));
    }

    public function update(Request $request)
	{
    	 $this->validate($request, [
            'password'  => 'confirmed',
        ]);

    	$user = User::where('id', Auth::user()->id)->first();
    	if (!empty($request->name)) {
        $user->name = $request->name;
   		}
		if (!empty($request->fullname)) {
        $user->fullname = $request->fullname;
   		}
		if (!empty($request->birthday)) {
        $user->birthday = $request->birthday;
   		}
		if (!empty($request->address)) {
    	$user->address = $request->address;
   		}
	 	if (!empty($request->nohp)) {
     	$user->nohp = $request->nohp;
   	 	}
		if (!empty($request->gender)) {
     	$user->gender = $request->gender;
   	 	}
	// 	// if (!empty($request->gender)) {
    //     // $user->gender = $request->gender;
	// 	if (!empty($request->avatar)) {
    //     $user->avatar = $image_url;
   	// 	}
    	if(!empty($request->password))
    	{
    		$user->password = Hash::make($request->password);
    	}
    	
    	$user->update();

    	return redirect('profile');
    }
    // {
    // 	 $request->validate([
	// 		'name' => 'nullable|string',
	// 		'fullname' => 'nullable|string',
	// 		'birthday' => 'nullable|string',
	// 		'address' => 'nullable|string',
	// 		'nohp' => 'nullable|string',
	// 		'gender' => 'nullable|string',
	// 		'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

	// 	$image = $request->file('avatar');
    //     $image_url = CloudinaryStorage::uploadAvatar( $image->getRealPath(), $image->getClientOriginalName());

    // 	$user = User::where('id', Auth::user()->id)->first();
		
    // 	// $user->name = $request->name;
	// 	// if (!empty($request->fullname)) {
    //     // $user->fullname = $request->fullname;
   	// 	// }
	// 	// if (!empty($request->birthday)) {
    //     // $user->birthday = $request->birthday;
   	// 	// }
	// 	// if (!empty($request->address)) {
    //     // $user->address = $request->address;
   	// 	// }
	// 	// if (!empty($request->nohp)) {
    //     // $user->nohp = $request->nohp;
   	// 	// }
	// 	// if (!empty($request->gender)) {
    //     // $user->gender = $request->gender;
   	// 	// }
	// 	if (!empty($request->avatar)) {
    //     $user->avatar = $image_url;
   	// 	}
    // 	// if(!empty($request->password))
    // 	// {
    // 	// 	$user->password = Hash::make($request->password);
    // 	// }
    	
    // 	$user->update($request->all());

    // 	return redirect('profile')->with('success', 'User updated successfully');
    // }
}
