@extends('layouts.default')

@section('content')
    <style>
        /* style jika form submit disabled */
        #submitBtn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('register.breadcrumb_home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('register.breadcrumb_register') }}</li>
            </ol>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Regester Page Start Here -->
    <div class="register-area ptb-80">
        <div class="container">
            @if (request()->type == 'affiliator')
                <h3 class="login-header">{{ __('register.create_account_as_affiliator') }}</h3>
            @elseif (request()->type == 'reseller')
                <h3 class="login-header">{{ __('register.create_account_as_reseller') }}</h3>
            @else
                <h3 class="login-header">{{ __('register.create_account') }}</h3>
            @endif
            <div class="row">
                <div class="offset-xl-1 col-xl-10">
                    <div class="register-form login-form clearfix">
                        {{ html()->form('POST', route('signup.store', ['locale'=>config('app.locale')]))->open() }}
                        <p>{{ __('register.already_have_account') }} <a href="{{ route('login', [
                            'locale'=>config('app.locale')
                        ]) }}">{{ __('register.log_in_instead') }}</a></p>
                        {{-- <div class="form-group row align-items-center">
                            <label class="col-lg-3 col-md-3 col-form-label">{{ __('register.social_title') }}</label>
                            <div class="col-lg-6 col-md-6">
                                {{ html()->select('gender', ['1' => 'Mr.', '2' => 'Mrs.'])->class('form-control') }}
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="f-name" class="col-lg-3 col-md-3 col-form-label">{{ __('register.full_name') }}</label>
                            <div class="col-lg-6 col-md-6">
                                {{ html()->text('name')->class('form-control') }}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-md-3 col-form-label">{{ __('register.email') }}</label>
                            <div class="col-lg-6 col-md-6">
                                {{ html()->email('email')->class('form-control') }}
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-lg-3 col-md-3 col-form-label">{{ __('register.password') }}</label>
                            <div class="col-lg-6 col-md-6">
                                {{ html()->password('password')->class('form-control')->id('inputPassword') }}
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword2" class="col-lg-3 col-md-3 col-form-label">{{ __('register.confirm_password') }}</label>
                            <div class="col-lg-6 col-md-6">
                                {{ html()->password('password_confirmation')->class('form-control')->id('inputPassword2') }}
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        {{-- <div class="form-group row align-items-center">
                            <label for="birth" class="col-lg-3 col-md-3 col-form-label">{{ __('register.birthdate') }}</label>
                            <div class="col-lg-6 col-md-6">
                                {{ html()->date('birth')->class('form-control') }}
                            </div>
                            <span class="col-sm-3 form-control-comment">{{ __('register.birthdate_optional') }}</span>
                        </div> --}}

                        @if (request()->type == 'reseller')
                            {{ html()->hidden('is_reseller', true) }}
                        @endif

                        <!-- separator -->
                        <hr class="mt-40 mb-40">

                        <!-- judul section -->
                        @if (request()->type == 'affiliator')
                            <h3 class="login-header">{{ __('register.affiliator_information') }}</h3>

                            <!-- hidden input is_affiliate -->
                            {{ html()->hidden('is_affiliate', true) }}
                            <div class="form-group row align-items-center">
                                <label for="birth" class="col-lg-3 col-md-3 col-form-label">{{ __('register.instagram_url') }}</label>
                                <div class="col-lg-6 col-md-6">
                                    {{ html()->text('instagram')->class('form-control')->placeholder('https://www.instagram.com/username') }}
                                    @error('instagram')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="birth" class="col-lg-3 col-md-3 col-form-label">{{ __('register.tiktok_url') }}</label>
                                <div class="col-lg-6 col-md-6">
                                    {{ html()->text('tiktok')->class('form-control')->placeholder('https://www.tiktok.com/@username') }}
                                    @error('tiktok')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="birth" class="col-lg-3 col-md-3 col-form-label">{{ __('register.youtube_url') }}</label>
                                <div class="col-lg-6 col-md-6">
                                    {{ html()->text('youtube')->class('form-control')->placeholder('https://www.youtube.com/channel/username') }}
                                    @error('youtube')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="birth" class="col-lg-3 col-md-3 col-form-label">{{ __('register.twitter_url') }}</label>
                                <div class="col-lg-6 col-md-6">
                                    {{ html()->text('twitter')->class('form-control')->placeholder('https://www.twitter.com/username') }}
                                    @error('twitter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="birth" class="col-lg-3 col-md-3 col-form-label">{{ __('register.facebook_url') }}</label>
                                <div class="col-lg-6 col-md-6">
                                    {{ html()->text('facebook')->class('form-control')->placeholder('https://www.facebook.com/username') }}
                                    @error('facebook')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <div class="form-check row p-0 mt-20">
                            <div class="col-md-8 offset-md-3">
                                <div class="position-relative">
                                    {{ html()->checkbox('terms')->id('terms')->value('#')->class('form-check-input') }}
                                    <label class="form-check-label" for="terms">{{ __('register.agree_terms') }} <a
                                            href="{{ url('/terms-of-service') }}">{{ __('register.terms_of_service') }}</a> {{ __('register.and_acknowledge') }} <a href="{{ url('/privacy-policy') }}">{{ __('register.privacy_policy') }}</a>.</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-check row p-0 mt-20">
                            <div class="col-md-6 offset-md-3">
                                <div class="position-relative">
                                    {{ html()->checkbox('offer')->id('offer')->value('#')->class('form-check-input') }}
                                    <label class="form-check-label" for="offer">{{ __('register.receive_offers') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-check row p-0 mt-20">
                            <div class="col-md-8 offset-md-3">
                                <div class="position-relative">
                                    {{ html()->checkbox('subscribe')->id('subscribe')->value('#')->class('form-check-input') }}
                                    <label class="form-check-label" for="subscribe">{{ __('register.sign_up_newsletter') }}<br>{{ __('register.newsletter_description') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="register-box mt-40">
                            {{ html()->submit(__('register.register'))->class('login-btn ms-auto')->id('submitBtn') }}
                        </div>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Page End Here -->
@endsection

@section('extend-scripts')
    <script>
        $(document).ready(function() {
            // Initially disable the submit button
            $('#submitBtn').prop('disabled', true);

            // Toggle the submit button's disabled state based on the checkbox
            $('#terms').change(function() {
                $('#submitBtn').prop('disabled', !$(this).is(':checked'));
            });
        });
    </script>
@endsection
