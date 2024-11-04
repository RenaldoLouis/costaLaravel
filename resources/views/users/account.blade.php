@extends('layouts.default')

@section('content')
    <style>
        .account-content h3 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .account-info-list {
            list-style: none;
            padding: 0;
        }

        .account-info-list li {
            margin-bottom: 10px;
            font-size: 14px;
        }

        .account-info-list li strong {
            color: #555;
            margin-right: 5px;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .account-details ul {
            padding-left: 0;
        }

        .account-details ul li a {
            color: #007bff;
            text-decoration: none;
        }

        .account-details ul li a:hover {
            text-decoration: underline;
        }

        .account-info-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            /* Adjust the ratio as needed */
            grid-gap: 10px;
            margin-bottom: 20px;
        }

        .account-info-container div {
            display: flex;
            align-items: center;
        }

        .account-label {
            font-weight: bold;
            text-align: right;
            padding-right: 10px;
            /* Optional for spacing */
        }
    </style>


    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">My Account</li>
            </ol>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->

    <!-- My Account Page Start -->
    <div class="my-account-page ptb-80">
        <div class="container">
            <div class="row">
                <!-- Account Sidebar Start (optional) -->
                @include('users._sidebar')
                <!-- Account Sidebar End -->

                <!-- Account Content Start -->
                <div class="col-lg-9">
                    <div class="account-content universal-padding">
                        <h3 class="mb-3">Account Details</h3>
                        <div class="account-details">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="account-info-list">
                                        <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
                                        <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
                                        <li><strong>Email Verified At:</strong>
                                            {{ Auth::user()->email_verified_at ?? 'Not Verified' }}</li>
                                        <li><strong>Birth:</strong> {{ Auth::user()->birth ?? 'N/A' }}</li>
                                        <li><strong>Gender:</strong> {{ Auth::user()->gender ?? 'N/A' }}</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="account-info-list">
                                        <li><strong>Account Created:</strong> {{ Auth::user()->created_at }}</li>
                                        @if (Auth::user()->is_affiliate)
                                            <li><strong>Affiliator:</strong> {{ Auth::user()->is_affiliate ? 'Yes' : 'No' }}
                                            </li>
                                            <li><strong>Balance:</strong> IDR {{ number_format(Auth::user()->balance, 0, ',', '.') }}
                                            <li><strong>Social Links:</strong>
                                                <ul>
                                                    <li>Facebook: <a href="{{ Auth::user()->facebook ?? '-' }}"
                                                            target="_blank">{{ Auth::user()->facebook ?? '-' }}</a></li>
                                                    <li>Instagram: <a href="{{ Auth::user()->instagram ?? '-' }}"
                                                            target="_blank">{{ Auth::user()->instagram ?? '-' }}</a></li>
                                                    <li>Twitter: <a href="{{ Auth::user()->twitter ?? '-' }}"
                                                            target="_blank">{{ Auth::user()->twitter ?? '-' }}</a></li>
                                                    <li>YouTube: <a href="{{ Auth::user()->youtube ?? '-' }}"
                                                            target="_blank">{{ Auth::user()->youtube ?? '-' }}</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('account.edit') }}" class="btn btn-primary mt-3">Edit Account</a>
                        </div>
                    </div>
                </div>
                <!-- Account Content End -->
            </div>
        </div>
    </div>
    <!-- My Account Page End -->
@endsection

@section('extend-scripts')
    <!-- Custom scripts for this page if any -->
@endsection
