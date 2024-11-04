@extends('layouts.default')

@section('content')
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('login.breadcrumb_home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('login.breadcrumb_login') }}</li>
            </ol>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Login Page Start Here -->
    <div class="login ptb-80">
        <div class="container">
            <h3 class="login-header">{{ __('login.login_header') }}</h3>
            <div class="row">
                <div class="col-xl-6 col-lg-8 offset-xl-3 offset-lg-2">
                    <div class="login-form">
                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {{ session()->get('error') }}
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session()->get('success') }}
                            </div>
                        @endif
                        {{ html()->form('POST', route('authenticate',[
                            'locale'=>config('app.locale')
                        ]))->open() }}
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">{{ __('login.email') }}</label>
                            <div class="col-sm-7">
                                {{ html()->email('email')->class('form-control')->placeholder(__('login.email'))->attribute('id', 'email') }}
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">{{ __('login.password') }}</label>
                            <div class="col-sm-7">
                                {{ html()->password('password')->class('form-control')->placeholder(__('login.password'))->attribute('id', 'inputPassword') }}
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="login-details text-center mb-25">
                            <a href="forgot-password.html">{{ __('login.forgot_password') }}</a>
                            {{ html()->submit(__('login.sign_in'))->class('login-btn')}}
                        </div>
                        <div class="login-footer text-center">
                            <p>{{ __('login.no_account') }} <a href="{{ route('signup',[
                                'locale'=>config('app.locale')
                            ]) }}">{{ __('login.create_one_here') }}</a></p>
                        </div>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Page End Here -->
@endsection
