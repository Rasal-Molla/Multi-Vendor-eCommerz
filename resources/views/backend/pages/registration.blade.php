
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Registration</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="{{url('/backend/css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('/backend/css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{url('/backend/css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/backend/css/lib/helper.css')}}" rel="stylesheet">
    <link href="{{url('/backend/css/style.css')}}" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#"><span>Focus</span></a>
                        </div>
                        <div class="login-form">
                            <h4>Register to Administration</h4>
                            @if($errors->any())
                                @foreach ($errors->all() as $message)
                                    <p class="alert alert-danger">{{$message}}</p>
                                @endforeach
                            @endif

                            <form action="{{route('admin.registration.process')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input name="email" type="email" class="form-control" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" type="text" class="form-control" placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Enter Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button type="button" class="btn btn-primary bg-facebook btn-flat btn-addon m-b-10"><i class="ti-facebook"></i>Register with facebook</button>
                                        <button type="button" class="btn btn-primary bg-twitter btn-flat btn-addon m-t-10"><i class="ti-twitter"></i>Register with twitter</button>
                                    </div>
                                </div>
                                <div class="register-link m-t-15 text-center">
                                    <p>Already have account ? <a href="{{route('admin.login')}}"> Sign in</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
