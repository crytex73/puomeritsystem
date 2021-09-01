<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER - PUO MERIT SYSTEMS</title>
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
                <a href="index.html"><img src="{{ asset('img/logos.png') }}" alt="Logo" height="100"></a>
            </div>
            <h1 class="auth-title">Sign Up</h1>
            <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" id="name" name="name" required placeholder="Fullname">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                @error('name')
                <div class="invalid-feedback d-block">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
                @enderror

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" id="email" name="email" required placeholder="Email">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                @error('email')
                <div class="invalid-feedback d-block">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
                @enderror

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" id="password" name="password" required placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                @error('password')
                <div class="invalid-feedback d-block">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
                @enderror

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" id="password_confirmation" name="password_confirmation" required placeholder="Confirm Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>

                <p class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">Please Select Your Role :</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="roleopt" id="studentopt" value="student" required>
                    <label class="form-check-label" for="studentopt">
                        Student
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="roleopt" id="lectureropt" value="lecturer" required>
                    <label class="form-check-label" for="lectureropt">
                        Lecturer
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="roleopt" id="hepopt" value="hep" required>
                    <label class="form-check-label" for="hepopt">
                        HEP
                    </label>
                </div>

                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Sign Up</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Already have an account? <a href="{{ route('login') }}" class="font-bold">Log
                        in</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>


{{-- @extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Register') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('register') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Name') }}:
                        </label>

                        <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Password') }}:
                        </label>

                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                            required autocomplete="new-password">

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Confirm Password') }}:
                        </label>

                        <input id="password-confirm" type="password" class="form-input w-full"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="flex flex-wrap">
                        <p class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">Please Select Your Role :</p>
                        <input type="radio" id="studentopt" name="roleopt" value="student" required>
                        <label for="studentopt">Student</label><br>
                        <input type="radio" id="lectureropt" name="roleopt" value="lecturer" required>
                        <label for="lectureopt">Lecturer</label><br>
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Register') }}
                        </button>

                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            {{ __('Already have an account?') }}
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline"
                                href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </p>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection --}}
