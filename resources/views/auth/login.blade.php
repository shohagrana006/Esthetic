@extends('admin.master')
@section('content')

<section class="log-reg-page">
    <div class="container d-flex justify-content-center align-items-center bg--primary">
        <div
            class="login__card d-flex flex-direction-column justify-content-center align-items-center border-radius--lg bg--secondary">
            <div class="logo">
                {{-- <img src="{{ asset('public') }}/admin/img/asthetic pos 1.png" alt="" class="w-25" /> --}}
            </div>
            <h2 class="title margin-buttom color--primary">Welcome</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login__username d-flex align-items-center margin-buttom border-radius bg--white">
                    <span class="d-flex bg--primary border-radius--left">
                        <i class="fa fa-user color--tertionary margin-auto"></i>
                    </span>
                    <span>
                        <input class="color--tertionary border-radius" type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus />
                    </span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="login__password d-flex align-items-center margin-buttom border-radius bg--white">
                    <span class="d-flex bg--primary border-radius--left">
                        <i class="fa fa-lock color--tertionary margin-auto"></i>
                    </span>
                    <span>
                        <input class="color--tertionary border-radius" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" />
                    </span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="text-center">
                    <input class="login__btn border-radius bg--primary color--tertionary margin-buttom-sm" type="submit"
                        value="Log in" id="loginBtn" />
                </div>
            </form>

            @if (Route::has('password.request'))
            <a class="forget__link color--primary margin-buttom" href="{{ route('password.request') }}">
                {{ __('Forget Password') }}
            </a>
            @endif


            {{-- <div>
                <div class="login__using__title d-flex align-items-center margin-buttom-sm color--primary">
                    <hr class="bg--primary border-radius--round" />
                    OR
                    <hr class="bg--primary border-radius--round" />
                </div>
                <div class="login__using d-flex justify-content-space-evenly">
                    <a href="#" class="login__using__icon d-flex border-radius--round color--primary">
                        <i class="fab fa-google margin-auto"></i>
                    </a>
                    <a href="#" class="login__using__icon d-flex border-radius--round color--primary">
                        <i class="fab fa-facebook-f margin-auto"></i>
                    </a>
                    <a href="#" class="login__using__icon d-flex border-radius--round color--primary">
                        <i class="fab fa-apple margin-auto"></i>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>

@endsection --}}
