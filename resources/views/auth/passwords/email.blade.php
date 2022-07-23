@extends('admin.layouts.app')

@section('content')
    <div class="login-page">
        <div class="card card-outline card-primary login-box">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>{{ __('Reset Password') }}</b></a>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               placeholder="{{ __('Email Address') }}" id="email" name="email"
                               value="{{ old('email') }}"
                               required autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit"
                                    class="btn btn-primary btn-block"> {{ __('Send Password Reset Link') }}</button>
                        </div>
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="{{route('login')}}">Login</a>
                </p>
            </div>
        </div>
    </div>

@endsection
