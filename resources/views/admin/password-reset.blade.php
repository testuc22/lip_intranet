<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Reset Password</title>
        <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/gif" sizes="16x16">
        <!-- Custom fonts for this template-->
        <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
        <!-- Custom styles for this template-->
        <link href="{{ asset('backend/css/admin.css') }}" rel="stylesheet">
        <style>
            .login-user i {
                font-size: 48px;
                margin-bottom: 15px;
            }
            .login_error{
                font-size: 14px;
                color: red;
            }
            .card{
                position: relative;
            }
            .alert{
                position: absolute;
                top: 5px;
                left: 50px;
                right: 50px;
                text-align: center;
                padding: 5px 0px;
            }
        </style>
    </head>

    <body class="bg-gradient-primary">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-6 col-lg-6 col-md-12">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center login-user">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </div>
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Admin Panel</h1>
                                        </div>
                                        <form action="{{ route('password.update') }}" method="post" class="user" autocomplete="off">
                                            @method('POST')
                                            @csrf
                                            <input type="hidden" name="token" value="{{ $token }}">
                                            <input type="hidden" name="email" value="{{ $email }}">
                                            <div class="form-row">
                                            <!-- Form Group (first name)-->
                                            <div class="form-group col-md-12">
                                                @if($errors->has('password'))
                                                    <p class="login_error">{{ $errors->first('password') }}</p>
                                                @endif
                                                <input class="form-control" name="password" type="password" placeholder="Enter New Password" value="">
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="form-group col-md-12">
                                                <input  class="form-control" name="password_confirmation" type="password" placeholder="Enter New Password again" value="">
                                            </div>
                                        </div>
                                            <input type="submit" class="btn btn-primary btn-block" value="Password Reset">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('backend/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('backend/js/admin.min.js')}}"></script>

    </body>

</html>