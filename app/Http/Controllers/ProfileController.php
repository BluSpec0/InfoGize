<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
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
			'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);		

		// 	$image = $request->file('avatar');
    //     $image_url = CloudinaryStorage::uploadAvatar( $image->getRealPath(), $image->getClientOriginalName());

		$user = User::where('id', Auth::user()->id)->first();

		$image = $request->file('avatar');
        $image_url = $image ? CloudinaryStorage::replaceAvatar($user->image_url, $image->getRealPath(), $image->getClientOriginalName()) : $user->image_url;

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
		if (!empty($request->avatar)) {
        $user->avatar = $image_url;
   		}
    	
    	$user->update();

    	return back();
    }

	public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }	
}
