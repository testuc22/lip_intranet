<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    /**
     * Load Forgot Password View Page
     */
    public function index()
    {
    	return view('admin.forgot-password');
    }

    /**
     * Send Password Reset Link
     */
    public function sendResetLink(Request $request)
    {
    	$request->validate(['email' => 'required|email']);
    	$status = Password::sendResetLink(
    	    $request->only('email')
    	);
    	return $status === Password::RESET_LINK_SENT
    	            ? back()->with(['status' => __($status)])
    	            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Password Reset View
     */
    public function resetPassword(Request $request,$token)
    {
    	return view('admin.password-reset')->with(['token' => $token,'email'=>$request->email]);
    }

    /**
     * Pasword Reset
     */
    public function updatePassword(Request $request)
    {
    	$request->validate(['password' => 'required|confirmed|min:6',]);
    	$user = User::where('email', $request->email)->first();
    	$user->password = Hash::make($request->password);
    	$user->remember_token = Str::random(60);
    	$user->save();

    	return redirect()->route('admin.login')->with('success', 'Password Reset Successfully !');
    }
}
