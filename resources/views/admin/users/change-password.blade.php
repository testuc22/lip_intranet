@extends('layouts.admin-app')
@section('title', 'Change Password')
@section('content')
	<div class="row justify-content-center">
        <div class="col-xl-6">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <form action="{{ route('admin.update.password') }}" method="post" autocomplete="off">
                        @method('POST')
                        @csrf
                        <!-- Form Row-->
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                @if($errors->has('old_password'))
                                    <p class="validation_error">{{ $errors->first('old_password') }}</p>
                                @endif
                                <label class="small mb-1" for="inputFirstName">Old Password</label>
                                <input class="form-control" name="old_password" type="password" placeholder="Enter your first name" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-12">
		                        @if($errors->has('password'))
		                            <p class="validation_error">{{ $errors->first('password') }}</p>
		                        @endif
                                <label class="small mb-1" for="inputFirstName">Password</label>
                                <input class="form-control" name="password" type="password" placeholder="Enter your Password" value="">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="form-group col-md-12">
                                <label class="small mb-1" for="inputLastName">Re-Type Password</label>
                                <input  class="form-control" name="password_confirmation" type="password" placeholder="Enter your Password again" value="">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection