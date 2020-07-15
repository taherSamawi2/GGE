<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>login</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('gge.ico') }}">
    <link rel="stylesheet" href=" {{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('/css/font-awesome.css') }}">
    <link rel="stylesheet" href=" {{ asset('/css/admin-style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">


</head>

<body class="body-login">

<div class="container">
    <div class="row justify-content-center card-login">
        <div class="col-md-4">
            <div class="card">
                <div class="login-logo">
                    <img src="/imgs/gge-logo.svg">
                </div>
                <div class="card-body  text-center ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group mb-3 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group text-left">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary btn-block" >
                                {{ __('Login') }}
                            </button>

{{--                            @if (Route::has('password.request'))--}}
{{--                                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                    {{ __('Forgot Your Password?') }}--}}
{{--                                </a>--}}
{{--                            @endif--}}
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/jquery-3.3.1.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/popper.min.js"></script>
<!--<script src="main.js"></script>-->
</body>
</html>
