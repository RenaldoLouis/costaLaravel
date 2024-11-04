{{-- resources/views/checkout/auth-address-form.blade.php --}}
<div class="col-md-12">
    <label for="select-address">{{ __('checkout.select_address') }}</label>
    <select id="select-address" name="address_id" class="form-control">
        @foreach ($addresses as $address)
            <option value="{{ $address->id }}" {{ $address->is_default ? 'selected' : '' }}>
                {{ $address->name }} - {{ $address->address }}
            </option>
        @endforeach
    </select>
</div>
<div class="col-md-12">
    <div class="row mt-3">
        <div class="col-md-4">
            {{ __('checkout.full_name') }}
        </div>
        <div class="col-md-8" id="address-name">
            {{ $defaultAddress->name ?? '' }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {{ __('checkout.address') }}
        </div>
        <div class="col-md-8" id="address-address">
            {{ $defaultAddress->address ?? '' }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {{ __('checkout.postcode_zip') }}
        </div>
        <div class="col-md-8" id="address-postcode">
            {{ $defaultAddress->postal_code ?? '' }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {{ __('checkout.email') }}
        </div>
        <div class="col-md-8" id="address-email">
            {{ $defaultAddress->recipient_email ?? '' }}
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-4">
            {{ __('checkout.phone') }}
        </div>
        <div class="col-md-8" id="address-phone">
            {{ $defaultAddress->recipient_phone ?? '' }}
        </div>
    </div>
</div>
