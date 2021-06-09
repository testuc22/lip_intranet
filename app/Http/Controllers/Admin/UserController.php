<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\{
    Hash,Auth
};
use App\Models\User;

class UserController extends Controller
{
    /**
     * Load User Listing View
     */
    public function index() {
        $id = Auth::id();
        if (Auth::user()->role_id == 1) {
            $users = User::where('id', '!=', $id)->get();
        }
        if (Auth::user()->role_id == 2) {
            $users = User::where('created_by', $id)->get();
        }
    	return view('admin.users.user-listing')->with(['users'=>$users]);
    }

    /**
     * Load User Profile View
     */
    public function userProfile() {
        $id = Auth::id();
        $user = User::find($id);
    	return view('admin.users.user-profile')->with('user', $user);
    }

    /**
     * Load User Create Form View
     */
    public function create() {
        return view('admin.users.create-user');
    }

    /**
     * Save User into Database
     */
    public function saveUser(UserStoreRequest $request)
    {
        dd($request->all());
        $id = Auth::user()->role_id;
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->first_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'created_by' => $id,
            'role_id' => $request->role,
        ];
        $user = User::create($data);

        return redirect()->route('admin.users')->with('success', 'User Created Successfully!');
    }

    /**
     * Update User Profile
     */
    public function updateUserProfile(UserStoreRequest $request, $id)
    {
        $user = User::find($id);
        if ($request->has('file')) {
            $name = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads/profile', $name, 'public');
            $image = '/storage/' . $filePath;
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->image = isset($image) ? $image : $user->image;
        $user->save();

        return redirect()->back()->with('success', 'User Profile Updated Successfully !');
    }

    /**
     * Edit Specific User Info
     */
    public function editUserInfo($id)
    {
        $user = User::find($id);
        return view('admin.users.edit-user')->with(['user'=>$user]);
    }

    /**
     * Update User Info
     */
    public function updateUserInfo(UserStoreRequest $request, $id)
    {
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->role_id = $request->role;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User Info Updated Successfully');
    }

    /**
     * Delete Specific User
     */
    public function deleteUser($id)
    {
        $user = User::find($id);

        //$user->delete();

        return redirect()->back()->with('success', 'User Deleted Successfully !');
    }

    /**
     * Change User Status
     */
    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

    /**
     * Load Change Password View
     */
    public function changePasswordView()
    {
        return view('admin.users.change-password');
    }

    /**
     * Change User Password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
          'old_password'     => 'required',
          'password'  => 'required|required_with:password_confirmation|string|confirmed',
        ]);
        $id = Auth::id();
        $user = User::find($id);
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Old Password mismatch with Existing Password !');
        }
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password Changed Successfully !');
    }
}
