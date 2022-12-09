@extends('layouts.app')
@section('loginStyle')
    <style>
        .login {
            background: linear-gradient(to left, #3A3845, #C69B7B);
            height: 100vh;
            width: 100%;
        }

        .login .form {
            box-shadow: 0 10px 20px 5px rgba(0, 0, 0, 0.7);
            width: 350px;
        }

        .login .form img {
            width: 100px;
            border-radius: 50%;
            position: absolute;
            top: -30%;
            left: 50%;
            transform: translate(-50%, 50%);
            box-shadow: 5px 1px 5px 1px rgba(0, 0, 0, 0.7);
        }

        .login .form .form-item {
            margin-bottom: 30px;
        }

        .login .form .form-item label {
            font-weight: 400;
        }
        .login .form .form-item .form-input {
            position: relative;
        }
        .login .form .form-item .form-input input {
            height: 5vh;
            padding-left: 35px;
            padding-right: 10px;
            font-weight: 500;
            border: none;
            outline: none;
            border: 1px solid #3A3845;
            background: #FFF6EA;
        }
        .form-btn button {
            background: linear-gradient(to left, #3A3845, #C69B7B);
            border: none;
            height: 5vh;
            transition: all .2s linear;
            margin-top: 40px;
        }
        .form-btn button:hover {
            letter-spacing: 5px;
            font-weight: 600;
            box-shadow: 5px 1px 5px 1px rgba(0, 0, 0, 0.7);
        }
        .login .form .form-item .form-input i {
            position: absolute;
            top: 43%;
            left: 10px;
        }
        .forget{
            float: right;
            font-size: 14px;
        }
        .forget a {
            text-decoration: none;
            color: #7F8487;
        }
        .forget a:hover {
            color: rgb(212, 68, 68);
        }
    </style>
@endsection
@section('title')
    <title>connexion</title>
@endsection
@section('content')
    <div class="login">
        <div class="position-absolute top-50 start-50 translate-middle bg-light p-4 rounded-3 form">
            <img src="./upload/Produits/giftart.jpg" alt="">
            <div class="title text-center pt-4">
                <h3>GiftArt</h3>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-item">
                    <label for="email">{{ __('Email') }}</label>
                    <div class="form-input">
                        <i class="far fa-paper-plane"></i>
                        <input class="w-100 rounded-3 mt-2" id="email" type="email"
                            class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                            autocomplete="email" autofocus>

                        @error('email')
                            <span role="alert" class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-item">
                    <label for="password">{{ __('Mot de passe') }}</label>
                    <div class="form-input">
                        <i class="fas fa-key"></i>
                        <input class="w-100 rounded-3 mt-2" id="password" type="password"
                            class="@error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="forget mb-5 mt-2">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div> --}}
                </div>

                {{-- <div>
                    <div>
                        <div>
                            <input type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> --}}

                <div class="form-btn">
                    <button type="submit" class="w-100 text-light rounded-3 fs-5 text-uppercase">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
