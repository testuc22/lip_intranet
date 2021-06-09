<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\User;

class Logincontroller extends Controller
{
    /**
     * Load Admin Login View Page
     */
    public function index()
    {
    	return view('admin.login');
    }

    /**
     * check Login Request
     */
    public function checkLoginRequest(Request $request)
    {
    	$request->validate([
          'email'     => 'required',
          'password'  => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if($user->status == 0 && $user->role_id == 2) {
            return redirect()->route('admin.login')->with('error', 'Your Account is not activated');   
        }
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'role_id'=>1]) || Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'role_id'=>2])) {
        	return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login')->with('error', 'Invalid Credentials');
    }

    /**
     * User Logout Request
     */
    public function logout()
    {
    	Auth::logout();
		return redirect()->route('admin.login');
    }
}
