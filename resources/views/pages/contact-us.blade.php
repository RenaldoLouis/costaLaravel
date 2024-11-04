@extends('layouts.default')

@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.nocaptcha.sitekey') }}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ config('services.nocaptcha.sitekey') }}', {
                action: 'contact'
            }).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
            });
        });
    </script>
@endsection

@section('content')
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('contact.breadcrumb_home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('contact.breadcrumb_contact') }}</li>
            </ol>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Contact Page Start Here -->
    <div class="register-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="register-contact clearfix">
                        <h3 class="login-header">{{ __('contact.header') }}</h3>
                        <!-- Google Map Start -->
                        <div class="google-map" style="padding-bottom: 30px;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.1045064030777!2d106.77693787448186!3d-6.116631993869968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1d987fc434b5%3A0x3ee1b33bcc296cf9!2sJl.%20Muara%20Karang%20Raya%2C%20Pluit%2C%20Kec.%20Penjaringan%2C%20Jkt%20Utara%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2014450!5e0!3m2!1sid!2sid!4v1704497701493!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <p>{{ __('contact.attention') }}</p>
                        <!-- Google Map End -->
                        {{ html()->form('POST', route('contact-us.post', ['locale'=>app()->getLocale()]))->class('contact-form')->attribute('id', 'contact-form')->open() }}
                        <div class="address-wrapper row">
                            <div class="col-md-12">
                                <div class="address-fname">
                                    {{ html()->text('name')->class('form-control')->placeholder(__('contact.name_placeholder')) }}
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="address-email">
                                    {{ html()->email('email')->class('form-control')->placeholder(__('contact.email_placeholder')) }}
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="address-web">
                                    {{ html()->text('website')->class('form-control')->placeholder(__('contact.website_placeholder')) }}
                                    @error('website')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="address-subject">
                                    {{ html()->text('subject')->class('form-control')->placeholder(__('contact.subject_placeholder')) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="address-textarea">
                                    {{ html()->textarea('message')->class('form-control')->placeholder(__('contact.message_placeholder')) }}
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                        </div>
                        <div class="footer-content mail-content clearfix">
                            <div class="send-email ms-auto">
                                {{ html()->submit(__('contact.submit_button'))->class('return-customer-btn') }}
                            </div>
                        </div>
                        <p class="form-message"></p>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Page End Here -->
@endsection

@section('extend-scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {
                action: 'contact'
            }).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
            });
        });
    </script>
@endsection
