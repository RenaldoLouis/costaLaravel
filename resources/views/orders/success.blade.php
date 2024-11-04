@extends('layouts.default')

@section('content')
    <!-- Main Wrapper Start Here -->
    <div class="wrapper">
        <!-- Success Area Start -->
        <div class="coupon-area white-bg pt-80 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="text-center mb-30">
                            <!-- Success Icon -->
                            <i class="fa fa-check-circle" style="font-size: 100px; color: green; animation: bounce 2s;"></i>
                            <h2 class="mt-3" style="animation: fadeInDown 1s;">Thank You for Your Order!</h2>
                            <h4>Invoice Number: #{{ $order->invoice_number }}</h4>
                        </div>

                        <div class="coupon-accordion">

                            <!-- Success Message Start -->
                            <h3>Order Confirmation</h3>
                            <div class="coupon-info">
                                <p class="coupon-text">Your order has been successfully processed.</p>
                                <!-- Order Summary Table -->
                                <div class="order-summary">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th style="text-align:right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->details as $item)
                                                <tr>
                                                    <td>{{ $item->product->name }} × {{ $item['quantity'] }}</td>
                                                    <td style="text-align:right">Rp
                                                        {{ number_format($item['price'] * $item['quantity']) }}</td>
                                                </tr>
                                            @endforeach
                                            <tr class="order-total">
                                                <td>Order Total</td>
                                                <td style="text-align:right">Rp {{ number_format($order->total) }}</td>
                                            </tr>
                                            <tr class="shipping">
                                                <td>Shipping Cost - {{ $order->shipping_method }}</td>
                                                <td style="text-align:right">Rp {{ number_format($order->shipping_cost) }}
                                                </td>
                                            </tr>
                                            <tr class="amount-to-pay">
                                                <th>Total to be Paid (including Unique Code)</th>
                                                <td style="text-align:right"><strong>Rp
                                                        {{ number_format($order->total + $order->shipping_cost + (int) substr($order->invoice_number, -3)) }}</strong>
                                                </td>
                                            </tr>
                                            <tr class="amount-to-pay">
                                                <th>Payment Status</th>
                                                <td style="text-align:right">
                                                    @if ($order->payment_status == 'unpaid')
                                                        <strong>
                                                            <span class="badge bg-warning text-white">
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                {{ $order->payment_status }}
                                                            </span>
                                                        </strong>
                                                    @elseif($order->payment_status == 'paid')
                                                        <strong>
                                                            <span class="badge bg-success text-white">
                                                                <i class="fa fa-check-circle"></i>
                                                                {{ $order->payment_status }}
                                                            </span>
                                                        </strong>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Success Message End -->

                            <!-- Payment Information Start -->
                            <h3 class="mt-30">Payment Information</h3>
                            <div class="coupon-info">
                                <!-- Payment Details -->
                                @php $bankAccounts = json_decode(setting('bank_accounts'), true); @endphp
                                <ul class="mb-15">
                                    @foreach ($bankAccounts as $bank => $account)
                                        <li>{{ $account['name'] }}: {{ $account['number'] }} ({{ $account['holder'] }})
                                        </li>
                                    @endforeach
                                </ul>
                                <p>
                                    Please transfer the total amount of
                                    <strong>Rp
                                        {{ number_format($order->total + (int) substr($order->invoice_number, -3)) }}</strong>.
                                    This includes the unique code
                                    <strong>{{ substr($order->invoice_number, -3) }}</strong>
                                    for easy identification of your payment.
                                </p>
                                <p>
                                    Use the last three digits of your invoice number as the unique code in your payment.
                                    This helps us to quickly match the payment to your order.
                                </p>
                                <p>
                                    Please check your email regularly for further notifications regarding your order status.
                                </p>
                            </div>
                            <!-- Payment Information End -->

                            <!-- Download Invoice Start -->
                            <h3 class="mt-30">Invoice</h3>
                            <div class="coupon-info">
                                <a href="{{ route('orders.invoice', [
                                    'locale' => app()->getLocale(),
                                    'code' => $order->code,
                                ]) }}"
                                    class="btn btn-primary">Download
                                    Invoice</a>
                            </div>
                            <!-- Download Invoice End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Success Area End -->
    </div>
    <!-- Main Wrapper End Here -->
    <!-- Include FontAwesome for the check-circle icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Custom Animation Styles -->
    <style>
        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
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
