@extends('layouts.app')

@section('content')
    <div class="login-page">
        <div class="card card-outline card-primary login-box">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>{{ __('Verify Your Email Address') }}</b></a>
            </div>
            <div class="card-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <p class="login-box-msg">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p class="login-box-msg">{{ __('If you did not receive the email') }},</p>
                <form action="{{ route('verification.resend') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <button type="submit"
                                    class="btn btn-primary btn-block">{{ __('click here to request another') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
