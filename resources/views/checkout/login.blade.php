{{-- resources/views/checkout/login.blade.php --}}
@if (auth()->guest())
    <h3>{{ __('checkout.returning_customer') }} <span id="showlogin">{{ __('checkout.click_here_to_login') }}</span></h3>
    <div id="checkout-login" class="coupon-content">
        <div class="coupon-info">
            <p class="coupon-text">{{ __('checkout.login_details') }}</p>
            {!! html()->form('POST', route('login', ['locale' => app()->getLocale()]))->open() !!}
            <p class="form-row-first">
                {!! html()->email('email')->placeholder(__('checkout.email'))->required() !!}
            </p>
            <p class="form-row-last">
                {!! html()->password('password')->placeholder(__('checkout.password'))->required() !!}
            </p>
            {{ html()->hidden('redirect_to', url()->current()) }}
            <p class="form-row align-items-center">
                <input type="submit" value="{{ __('checkout.login') }}" />
                <label>
                    {!! html()->checkbox('remember') !!}
                    {{ __('checkout.remember_me') }}
                </label>
            </p>
            <p class="lost-password">
                <a href="#">{{ __('checkout.lost_your_password') }}</a>
            </p>
            {!! html()->form()->close() !!}
        </div>
    </div>
@endif
