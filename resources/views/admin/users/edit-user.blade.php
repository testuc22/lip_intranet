@extends('layouts.admin-app')
@section('title', 'Edit User')
@section('content')
	<div class="row justify-content-center">
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                    <form action="{{ route('admin.update.user.info', ['id'=>$user->id]) }}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <!-- Form Row-->
                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-6">
                                @if($errors->has('first_name'))
                                    <p class="validation_error">{{ $errors->first('first_name') }}</p>
                                @endif
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" name="first_name" type="text" placeholder="Enter your first name" value="{{ $user->first_name }}">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="form-group col-md-6">
                                @if($errors->has('last_name'))
                                    <p class="validation_error">{{ $errors->first('last_name') }}</p>
                                @endif
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" name="last_name" type="text" placeholder="Enter your last name" value="{{ $user->last_name }}">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="form-group">
                            @if($errors->has('email'))
                                <p class="validation_error">{{ $errors->first('email') }}</p>
                            @endif
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" name="email" type="email" placeholder="Enter your email address" value="{{ $user->email }}">
                        </div>
                        <!-- Form Row-->
                        <div class="form-row">
                            <!-- Form Group (phone number)-->
                            <div class="form-group col-md-6">
                                @if($errors->has('phone_number'))
                                    <p class="validation_error">{{ $errors->first('phone_number') }}</p>
                                @endif
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" name="phone_number" type="tel" placeholder="Enter your phone number" value="{{ $user->phone_number }}">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="form-group col-md-6">
                                @if($errors->has('role'))
                                    <p class="validation_error">{{ $errors->first('role') }}</p>
                                @endif
                                <label class="small mb-1" for="inputBirthday">Role</label>
                                <select name="role" class="form-control">
                                	<option value="">Select User Role</option>
                                    @if (Auth::user()->role_id == 1)
                                        <option value="2"
                                            @if ($user->role_id == 2)
                                                selected
                                            @endif
                                        >Manager</option>
                                    	<option value="3"
                                            @if ($user->role_id == 3)
                                                selected
                                            @endif
                                        >Employee</option>
                                    @endif
                                    @if (Auth::user()->role_id == 2)
                                        <option value="3"
                                            @if ($user->role_id == 3)
                                                selected
                                            @endif
                                        >Employee</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button type="submit" class="btn btn-primary" type="button">Update Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>	
@endsection