<div class="col-md-12">
    <div class="checkout-form-list mb-30">
        <x-input-field label="{{ __('checkout.full_name') }}" name="name" placeholder="" required="true" />
    </div>
</div>
<div class="col-md-12">
    <div class="checkout-form-list">
        <x-input-field label="{{ __('checkout.address') }}" name="address" placeholder="Street address" required="true" />
    </div>
</div>
<div class="col-md-12">
    <div class="checkout-form-list mtb-30">
        <x-input-field label="" name="address2"
            placeholder="Apartment, suite, unit etc. ({{ __('checkout.optional') }})" />
    </div>
</div>

<div class="col-md-6">
    <div class="checkout-form-list ">
        <label for="province_code">Province <span class="required">*</span></label>
        <select name="province_code" id="province_code" class="checkout-input" required>
            <option value="">Select Province</option>
            @foreach ($provinces as $province)
                <option value="{{ $province->kode }}">{{ $province->nama }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-6">
    <div class="checkout-form-list ">
        <label for="city_code">City <span class="required">*</span></label>
        <select name="city_code" id="city_code" class="checkout-input" required>
            <option value="">Select City</option>
        </select>
    </div>
</div>
<div class="col-md-6">
    <div class="checkout-form-list mtb-30">
        <label for="district_code">District <span class="required">*</span></label>
        <select name="district_code" id="district_code" class="checkout-input" required>
            <option value="">Select District</option>
        </select>
    </div>
</div>
<div class="col-md-6">
    <div class="checkout-form-list mtb-30">
        <label for="village_code">Village <span class="required">*</span></label>
        <select name="village_code" id="village_code" class="checkout-input" required>
            <option value="">Select Village</option>
        </select>
    </div>
</div>
<div class="col-md-6">
    <div class="checkout-form-list mb-30">
        <label for="postcode">Postcode <span class="required">*</span></label>
        <select name="postcode" id="postcode" class="checkout-input" required>
            <option value="">Select Postcode</option>
        </select>
    </div>
</div>
<div class="col-md-6">
    <div class="checkout-form-list mb-30">
        <x-input-field label="{{ __('checkout.email_address') }}" name="email" placeholder="Email Address"
            type="email" required />
    </div>
</div>
<div class="col-md-6">
    <div class="checkout-form-list mb-30">
        <x-input-field label="{{ __('checkout.phone') }}" name="phone" placeholder="Phone" required="true" />
    </div>
</div>
<div class="col-md-12">
    <div class="checkout-form-list create-acc mb-30">
        {{ html()->checkbox('create_account')->name('create_account')->id('cbox') }}
        <label>{{ __('checkout.create_account') }}</label>
    </div>
    <div id="cbox_info" class="checkout-form-list create-accounts mb-25">
        <p class="mb-10">{{ __('checkout.create_account_info') }}</p>
        <x-input-field label="{{ __('checkout.account_password') }}" name="password" placeholder="password"
            type="password" />
    </div>
</div>

<div class="col-md-12">
    <button type="button" id="select-shipping" class="btn btn-primary">Select Shipping</button>
    <div id="shipping-rates" class="mt-3">
        <div id="skeleton-loader" style="display: none;">
            <div class="skeleton-rate"></div>
            <div class="skeleton-rate"></div>
            <div class="skeleton-rate"></div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const villageSelect = document.getElementById('village_code');
        const postcodeSelect = document.getElementById('postcode');
        const selectShippingButton = document.getElementById('select-shipping');
        const shippingRatesContainer = document.getElementById('shipping-rates');
        const shippingRateResult = document.getElementById('shipping-rate-result');
        const shippingCostElement = document.getElementById('shipping-cost');
        const orderTotalElement = document.getElementById('order-total');
        const placeOrderBtn = document.getElementById('place-order-btn');

        const selects = {
            province: document.getElementById('province_code'),
            city: document.getElementById('city_code'),
            district: document.getElementById('district_code'),
            village: document.getElementById('village_code')
        };

        function fetchOptions(url, select) {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    select.innerHTML = '<option value="">Select ' + select.id.replace('_', ' ') +
                        '</option>';
                    data.forEach(item => {
                        select.innerHTML += `<option value="${item.kode}">${item.nama}</option>`;
                    });
                });
        }

        selects.province.addEventListener('change', function() {
            fetchOptions(`/get-cities/${this.value}`, selects.city);
            selects.district.innerHTML = '<option value="">Select District</option>';
            selects.village.innerHTML = '<option value="">Select Village</option>';
        });

        selects.city.addEventListener('change', function() {
            fetchOptions(`/get-districts/${this.value}`, selects.district);
            selects.village.innerHTML = '<option value="">Select Village</option>';
        });

        selects.district.addEventListener('change', function() {
            fetchOptions(`/get-villages/${this.value}`, selects.village);
        });

        window.addEventListener('load', function() {
            const prefilledData = {
                province: "{{ old('province_code') }}",
                city: "{{ old('city_code') }}",
                district: "{{ old('district_code') }}",
                village: "{{ old('village_code') }}"
            };

            if (prefilledData.province) {
                fetchOptions(`/get-cities/${prefilledData.province}`, selects.city).then(() => {
                    selects.city.value = prefilledData.city;
                    if (prefilledData.city) {
                        fetchOptions(`/get-districts/${prefilledData.city}`, selects.district)
                            .then(() => {
                                selects.district.value = prefilledData.district;
                                if (prefilledData.district) {
                                    fetchOptions(`/get-villages/${prefilledData.district}`,
                                        selects.village).then(() => {
                                        selects.village.value = prefilledData
                                            .village;
                                    });
                                }
                            });
                    }
                });
            }
        });

        villageSelect.addEventListener('change', function() {
            const regionCode = this.value;

            if (regionCode) {
                fetch(`/biteship/maps?region_code=${regionCode}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const areas = data.areas;
                            postcodeSelect.innerHTML = '<option value="">Select Postcode</option>';
                            areas.forEach(area => {
                                const option = document.createElement('option');
                                option.value = area.postal_code;
                                option.textContent = area.postal_code;
                                option.dataset.areaId = area.id; // Store area ID
                                postcodeSelect.appendChild(option);
                            });
                        } else {
                            alert('Failed to fetch postal codes');
                        }
                    })
                    .catch(error => console.error('Error fetching postal codes:', error));
            } else {
                postcodeSelect.innerHTML = '<option value="">Select Postcode</option>';
            }
        });

        selectShippingButton.addEventListener('click', function() {
            const destinationAreaId = postcodeSelect.options[postcodeSelect.selectedIndex].dataset
                .areaId;
            const destinationPostalCode = postcodeSelect.value;

            if (!destinationAreaId || !destinationPostalCode) {
                alert('Please select village and postal code');
                return;
            }

            @php
                // buat agar session cart itu ga ada key, jadi nanti di javascript bisa diakses langsung
                $cart = session('cart', true);
                $cart = array_values($cart);
            @endphp
            const cartItems = {!! json_encode($cart) !!};

            const items = cartItems.map(item => ({
                name: item.name,
                description: item.slug,
                value: item.price,
                length: 30, // Example value, replace with actual data
                width: 15, // Example value, replace with actual data
                height: 20, // Example value, replace with actual data
                weight: 2000, // Example value, replace with actual data
                quantity: item.quantity
            }));

            const requestBody = {
                // csrf
                _token: '{{ csrf_token() }}',
                origin_area_id: "IDNP6IDNC150IDND885IDZ14450",
                destination_area_id: destinationAreaId,
                origin_postal_code: "14450",
                destination_postal_code: destinationPostalCode,
                type: "origin_suggestion_to_closest_destination",
                couriers: "anteraja,jne,sicepat,gojek",
                items: items
            };

            document.getElementById('skeleton-loader').style.display = 'block';

            fetch('/biteship/rates', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(requestBody)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        shippingRatesContainer.innerHTML = data.pricing.map(rate => `
                    <div class="shipping-rate">
                        <input type="radio" name="shipping_option" value="${rate.courier_code}-${rate.courier_service_code}" id="${rate.courier_code}-${rate.courier_service_code}" data-price="${rate.price}">
                        <label for="${rate.courier_code}-${rate.courier_service_code}">
                            <div class="shipping-rate-info">
                                <div>
                                    <strong>${rate.courier_name.toUpperCase()}</strong> (${rate.description})<br>
                                    Duration: ${rate.duration}
                                </div>
                                <div class="shipping-rate-price">
                                    <strong>Rp ${rate.price.toLocaleString()}</strong>
                                </div>
                            </div>
                        </label>
                    </div>
                `).join('');
                        document.querySelectorAll('.shipping-rate input[type="radio"]').forEach(
                            radio => {
                                radio.addEventListener('change', function() {
                                    document.querySelectorAll('.shipping-rate').forEach(
                                        rate => {
                                            rate.classList.remove('selected');
                                        });
                                    this.closest('.shipping-rate').classList.add(
                                        'selected');

                                    shippingRateResult.textContent = this
                                        .nextElementSibling
                                        .textContent;

                                    const shippingCost = parseFloat(this.dataset.price);
                                    shippingCostElement.textContent =
                                        `Rp ${shippingCost.toLocaleString()}`;

                                    const total = parseFloat($('.total').data(
                                        'value')) + shippingCost;
                                    orderTotalElement.textContent =
                                        `Rp ${total.toLocaleString()}`;

                                    placeOrderBtn.style.display = 'block';
                                });
                            });
                    } else {
                        shippingRatesContainer.innerHTML = '<p>Failed to fetch shipping rates</p>';
                    }
                })
                .catch(error => {
                    document.getElementById('skeleton-loader').style.display = 'none';
                    console.error('Error fetching shipping rates:', error);
                });
        });
    });
</script>

<style>
    .shipping-rate {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: background-color 0.3s ease;
    }

    .shipping-rate label {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        cursor: pointer;
    }

    .shipping-rate-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    .shipping-rate-price {
        text-align: right;
        flex-shrink: 0;
    }

    .shipping-rate input[type="radio"] {
        margin-right: 10px;
    }

    .shipping-rate.selected {
        background-color: #f0f0f0;
    }

    .badge-success {
        background-color: #28a745;
        color: white;
        padding: 5px 10px;
        border-radius: 3px;
        margin-left: 10px;
    }

    .skeleton-rate {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        background-color: #f0f0f0;
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% {
            background-color: #f0f0f0;
        }

        50% {
            background-color: #e0e0e0;
        }

        100% {
            background-color: #f0f0f0;
        }
    }
</style>
