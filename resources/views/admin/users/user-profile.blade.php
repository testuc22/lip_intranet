@extends('layouts.admin-app')
@section('title', 'User-Profile')
@section('content')
	<div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    @if ($user->image == '')
                        <img id="previewImg" class="img-account-profile rounded-circle mb-2" src="{{ asset('backend/img/undraw_profile.svg')}}" alt="">
                    @else
                        <img id="previewImg" class="img-account-profile rounded-circle mb-2" src="{{ asset("{$user->image}") }}" alt="">
                    @endif
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 1 MB</div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form action="{{ route('admin.update.user.profile', ['id'=>$user->id]) }}" method="post" autocomplete="off" enctype="multipart/form-data">
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
                                <input class="form-control" name="first_name" type="text" placeholder="Enter your first name" value="{{$user->first_name}}">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="form-group col-md-6">
                                @if($errors->has('last_name'))
                                    <p class="validation_error">{{ $errors->first('last_name') }}</p>
                                @endif
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" name="last_name" type="text" placeholder="Enter your last name" value="{{$user->last_name}}">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="form-group">
                            @if($errors->has('email'))
                                <p class="validation_error">{{ $errors->first('email') }}</p>
                            @endif
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" name="email" type="email" placeholder="Enter your email address" value="{{$user->email}}">
                        </div>
                        <!-- Form Row-->
                        <div class="form-row">
                            <!-- Form Group (phone number)-->
                            <div class="form-group col-md-6">
                                @if($errors->has('phone_number'))
                                    <p class="validation_error">{{ $errors->first('phone_number') }}</p>
                                @endif
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" name="phone_number" type="tel" placeholder="Enter your phone number" value="{{$user->phone_number}}">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputBirthday">Position</label>
                                <input type="text" class="form-control" value="{{$user->role->name}}" readonly>
                            </div>

                        </div>
                        <!-- Form Row-->
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                @if($errors->has('file'))
                                    <p class="validation_error">{{ $errors->first('file') }}</p>
                                @endif
                                <label class="small mb-1" for="inputPhone">Profile Picture</label>
                                <input class="form-control" name="file" type="file" onchange="previewFile(this);">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection