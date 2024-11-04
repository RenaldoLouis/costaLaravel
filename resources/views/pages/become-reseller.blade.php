@extends('layouts.default')

@section('content')
    <style>
        /* Similar styles as Affiliate Program for consistency */
        .reseller-program-area {
            background-color: #f4f4f4;
            padding: 80px 0;
        }

        .reseller-section-title {
            margin-bottom: 40px;
        }

        .reseller-section-title h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }

        .reseller-section-title p {
            font-size: 16px;
            color: #666;
        }

        .reseller-program-content {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .reseller-program-content h3 {
            font-size: 22px;
            color: #333;
            margin-bottom: 15px;
        }

        .reseller-program-content ul {
            list-style: none;
            padding: 0;
        }

        .reseller-program-content ul li {
            font-size: 16px;
            color: #666;
            padding-left: 20px;
            position: relative;
            margin-bottom: 10px;
        }

        .reseller-program-content ul li:before {
            content: '\2022';
            color: #e74c3c;
            position: absolute;
            left: 0;
            top: 0;
            font-size: 20px;
        }

        .reseller-join-btn .btn {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 30px;
            border-radius: 4px;
            text-transform: uppercase;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .reseller-join-btn .btn:hover {
            background-color: #c0392b;
            color: #fff;
            text-decoration: none;
        }

        .reseller-content-section {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
            /* Margin antar section */
        }

        .reseller-content-image {
            width: 30%;
            /* Lebar gambar */
            margin-right: 20px;
            /* Jarak antara gambar dan teks */
        }

        .reseller-content-text {
            width: 70%;
            /* Lebar teks */
        }
    </style>

    <!-- Reseller Program Area Start -->
    <!-- Reseller Program Area Start -->
    <div class="reseller-program-area ptb-80">
        <div class="container">
            <!-- Section Title Start Here -->
            <div class="reseller-section-title text-center">
                <h2>Join the COSTA Reseller Program - Earn More Profit!</h2>
                <p>Unlock the potential to sell COSTA products at special prices. The more you sell, the greater your
                    profits!</p>
            </div>
            <!-- Section Title End Here -->

            <!-- Reseller Program Content Start Here -->
            <div class="reseller-program-content">
                <!-- Program Overview -->
                <div class="reseller-content-section">
                    <div class="reseller-content-image">
                        <img src="{{ asset('img/reseller/reseller1.png') }}" alt="Reseller Leveling System">
                    </div>
                    <div class="reseller-content-text">
                        <h3>Reseller Leveling System</h3>
                        <ul>
                            <li><strong>Level 1 - Beginner Reseller:</strong> "Purchase individual products at a discounted
                                rate. Ideal for those starting out."</li>
                            <li><strong>Level 2 - Advanced Reseller:</strong> "Buy in larger quantities at even lower
                                prices. Specific sales requirements must be met to reach this level."</li>
                            <li><strong>Level 3 - Pro Reseller:</strong> "Enjoy the lowest wholesale prices and priority
                                access to new products. Consistent sales volume is required to maintain this status."</li>
                        </ul>
                    </div>
                </div>

                <!-- Reseller Benefits -->
                <div class="reseller-content-section">
                    <div class="reseller-content-image">
                        <img src="{{ asset('img/reseller/reseller2.png') }}" alt="Benefits of Being a COSTA Reseller">
                    </div>
                    <div class="reseller-content-text">
                        <h3>Benefits of Being a COSTA Reseller</h3>
                        <ul>
                            <li>Exclusive Pricing: Access special reseller prices not available to regular buyers.</li>
                            <li>Full Support: Receive marketing assistance, promotional materials, and sales support.</li>
                            <li>Bonuses and Incentives: Opportunity to earn bonuses based on monthly sales targets.</li>
                            <li>Product Training: Exclusive training sessions to enhance your product knowledge.</li>
                        </ul>
                    </div>
                </div>

                <!-- How to Join -->
                <div class="reseller-content-section">
                    <div class="reseller-content-image">
                        <img src="{{ asset('img/reseller/reseller3.png') }}" alt="How to Join the Reseller Program">
                    </div>
                    <div class="reseller-content-text">
                        <h3>How to Join the Reseller Program</h3>
                        <ul>
                            <li>Fill Out the Registration Form: Provide your personal and business information.</li>
                            <li>Verification and Approval: Our team will review your application and assign a reseller
                                status based on your level.</li>
                            <li>Start Selling: Once approved, you can start selling COSTA products at special reseller
                                prices.</li>
                        </ul>
                    </div>
                </div>

                <!-- Join Button -->
                <div class="reseller-join-btn text-center mt-40">
                    <a href="{{ route('signup.type', ['type'=>'reseller','locale'=>config('app.locale')]) }}" class="btn btn-large">BECOME A RESELLER</a>
                </div>
            </div>
            <!-- Reseller Program Content End Here -->
        </div>
    </div>
    <!-- Reseller Program Area End -->

    <!-- Reseller Program Area End -->
@endsection
