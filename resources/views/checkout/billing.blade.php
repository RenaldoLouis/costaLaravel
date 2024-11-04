{{-- resources/views/checkout/billing.blade.php --}}
<div class="checkbox-form mb-sm-40">
    <h3>{{ __('checkout.billing_details') }}</h3>
    {{ html()->form('POST', route('orders.store', ['locale' => app()->getLocale()]))->open() }}

    @if (auth()->guest())
        <div class="row">
            @include('checkout.guest-address-form')
        </div>
    @else
        <div class="row">
            @include('checkout.auth-address-form')
        </div>
    @endif

    {{ html()->submit(__('checkout.checkout'))->class('mt-30 login-btn ms-auto')->id('place-order-btn') }}
    {{ html()->form()->close() }}
</div>
