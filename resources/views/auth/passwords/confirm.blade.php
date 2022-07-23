@extends('admin.layouts.app')

@section('content')
    <div class="login-page">
        <div class="card card-outline card-primary login-box">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>{{ __('Confirm Password') }}</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">{{ __('Please confirm your password before continuing.') }}.</p>
                <form action="{{ route('password.confirm') }}" method="post">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input-group mb-3">
                        <input type="password" class="form-control  @error('password') is-invalid @enderror"
                               placeholder="{{ __('Password') }}" id="password" name="password" required
                               autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Confirm Password') }}</button>

                            <p class="mb-1">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
