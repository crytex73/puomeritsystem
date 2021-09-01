<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - PUO MERIT SYSTEMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/modules/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/pages/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom_style.css') }}">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="{{ url('/home') }}">
                    <img src="{{ asset('img/logos.png') }}" alt="Logo" height="100">
                </a>
            </div>
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">Log in with your data.</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" id="email" name="email" required autocomplete="email" autofocus placeholder="E-mail">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    @error('email')
                    <div class="invalid-feedback d-block">
                        <i class="bx bx-radio-circle"></i>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" id="password" name="password" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @error('password')
                    <div class="invalid-feedback d-block">
                        <i class="bx bx-radio-circle"></i>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                
                @if (Route::has('password.request'))
                <p><a class="font-bold" href="{{ route('password.request') }}">Forgot password?</a>.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
            <img src="{{ asset('img/puodepan.jpg') }}" alt="puo" height="885" width="855" >
        </div>
    </div>
</div>

    </div>
</body>

</html>
