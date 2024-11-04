@extends('layouts.default')

@section('content')
<div class="wrapper">
    <div class="container text-center py-5">
        <!-- Icon Ceklis Hijau menggunakan FontAwesome -->
        <div class="checkmark-container mb-4">
            <i class="fas fa-check-circle" style="font-size: 100px; color: #4CAF50; animation: bounce 1s ease-in-out;"></i>
        </div>

        <!-- Ucapan Terima Kasih Multi Bahasa -->
        <h2>{{ __('thankyou.thank_you') }}</h2>
        <p class="lead">{{ __('thankyou.order_received') }}</p>
        <p>{{ __('thankyou.check_email') }}</p>

        <!-- Tombol Download Invoice -->
        <a href="{{ route('orders.invoice', [
            'code' => $order->code,
            'locale' => app()->getLocale()
        ]) }}" class="btn btn-primary mt-4">
            {{ __('thankyou.download_invoice') }}
        </a>
    </div>
</div>
@endsection

@section('extend-styles')
<style>
    @keyframes bounce {
        0%, 20%, 40%, 60%, 80%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
</style>
@endsection
