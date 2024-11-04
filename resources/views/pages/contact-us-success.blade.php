@extends('layouts.default')

@section('meta')
    <meta name="title" content="{{ $title }}">
@endsection

@section('styles')
    <style>
        .thank-you-message {
            text-align: center;
            margin-top: 50px;
            animation: fadeIn 1s ease-out, slideUp 1s ease-out;
        }

        .thank-you-message h3 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .thank-you-message p {
            font-size: 1.25rem;
            margin-bottom: 30px;
        }

        .thank-you-message a {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1.25rem;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .thank-you-message a:hover {
            background-color: #0056b3;
        }

        .bounce-animation {
            display: inline-block;
            animation: bounce 2s infinite;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
            }
            to {
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }
    </style>
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
    <!-- Success Page Start Here -->
    <div class="register-area ptb-80" style="background-color: #f9f9f9;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="register-contact clearfix thank-you-message text-center">
                        <div class="bounce-animation" style="margin-bottom: 20px;">
                            <i class="fas fa-check-circle" style="font-size: 5rem; color: green;"></i>
                        </div>
                        <h3>{{ __('contact.thank_you') }}</h3>
                        <p>{{ __('contact.success_message') }}</p>
                        <a href="{{ url('/') }}" class="btn btn-primary"
                        >{{ __('contact.home') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Success Page End Here -->
@endsection
