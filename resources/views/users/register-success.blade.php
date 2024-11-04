@extends('layouts.default')

@section('content')
    <!-- Main Wrapper Start Here -->
    <div class="wrapper">
        <!-- flashdata -->
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session()->get('success') }}
            </div>
        @endif
        <!-- Register Success Area Start -->
        <div class="coupon-area white-bg pt-80 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="text-center mb-30">
                            <!-- Success Icon -->
                            <i class="fa fa-check-circle" style="font-size: 100px; color: green; animation: bounce 2s;"></i>
                            <h2 class="mt-3" style="animation: fadeInDown 1s;">Registration Successful!</h2>
                        </div>

                        <div class="coupon-accordion">
                            <!-- Registration Success Message Start -->
                            <div class="coupon-info text-center">
                                <p class="coupon-text">Your registration has been successfully completed.</p>
                                <p>
                                    We have sent a verification email to your registered email address. Please click the link in the email to verify your account.
                                </p>
                                <p>
                                    If you did not receive the email, please check your spam folder or <a href="#">click here</a> to resend the verification email.
                                </p>
                            </div>
                            <!-- Registration Success Message End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Register Success Area End -->
    </div>
    <!-- Main Wrapper End Here -->

    <!-- Include FontAwesome for the check-circle icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Custom Animation Styles -->
    <style>
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

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translate3d(0, -100%, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }
    </style>
@endsection
