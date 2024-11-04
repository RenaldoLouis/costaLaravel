@extends('layouts.default')

@section('content')
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">{{ $address->exists ? 'Edit Address' : 'Add Address' }}</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- My Account Page Start -->
    <div class="my-account-page ptb-80">
        <div class="container">

            <!-- flashdata -->
            @if (session('error'))
                <div class="alert alert-info">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                @include('users._sidebar') <!-- Include the sidebar -->

                <div class="col-lg-9">
                    <div class="account-content">
                        <h3 class="mb-3">{{ $address->exists ? 'Edit Address' : 'Add Address' }}</h3>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ $action }}" method="POST">
                            @csrf
                            @if ($address->exists)
                                @method('PUT')
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Address Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ old('name', $address->name) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" class="form-control" id="address" required>{{ old('address', $address->address) }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="province_code">Province</label>
                                        <select name="province_code" id="province_code" class="form-control" required>
                                            <option value="">Select Province</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->kode }}"
                                                    {{ $province->kode == old('province_code', $address->province_code) ? 'selected' : '' }}>
                                                    {{ $province->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="city_code">City</label>
                                        <select name="city_code" id="city_code" class="form-control" required>
                                            <option value="">Select City</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="district_code">District</label>
                                        <select name="district_code" id="district_code" class="form-control" required>
                                            <option value="">Select District</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="village_code">Village</label>
                                        <select name="village_code" id="village_code" class="form-control" required>
                                            <option value="">Select Village</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="postal_code">Postal Code</label>
                                        <input type="text" name="postal_code" class="form-control" id="postal_code"
                                            value="{{ old('postal_code', $address->postal_code) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="latitude">Latitude</label>
                                        <input type="text" name="latitude" class="form-control" id="latitude"
                                            value="{{ old('latitude', $address->latitude) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="longitude">Longitude</label>
                                        <input type="text" name="longitude" class="form-control" id="longitude"
                                            value="{{ old('longitude', $address->longitude) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient_name">Recipient Name</label>
                                        <input type="text" name="recipient_name" class="form-control" id="recipient_name"
                                            value="{{ old('recipient_name', $address->recipient_name) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient_email">Recipient Email</label>
                                        <input type="email" name="recipient_email" class="form-control"
                                            id="recipient_email"
                                            value="{{ old('recipient_email', $address->recipient_email) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient_phone">Recipient Phone</label>
                                        <input type="text" name="recipient_phone" class="form-control"
                                            id="recipient_phone"
                                            value="{{ old('recipient_phone', $address->recipient_phone) }}">
                                    </div>

                                    <div class="form-group form-check">
                                        <input type="checkbox" name="is_default" id="is_default"
                                            {{ old('is_default', $address->is_default) ? 'checked' : '' }} value="1">
                                        <label class="form-check-label" for="is_default">Set as default address</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                class="btn btn-primary">{{ $address->exists ? 'Update' : 'Submit' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account Page End -->

    <script>
        document.getElementById('province_code').addEventListener('change', function() {
            let provinceCode = this.value;
            let citySelect = document.getElementById('city_code');
            let districtSelect = document.getElementById('district_code');
            let villageSelect = document.getElementById('village_code');

            citySelect.innerHTML = '<option value="">Select City</option>';
            districtSelect.innerHTML = '<option value="">Select District</option>';
            villageSelect.innerHTML = '<option value="">Select Village</option>';

            if (provinceCode) {
                fetch('/get-cities/' + provinceCode)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(city => {
                            citySelect.innerHTML +=
                            `<option value="${city.kode}">${city.nama}</option>`;
                        });
                    });
            }
        });

        document.getElementById('city_code').addEventListener('change', function() {
            let cityCode = this.value;
            let districtSelect = document.getElementById('district_code');
            let villageSelect = document.getElementById('village_code');

            districtSelect.innerHTML = '<option value="">Select District</option>';
            villageSelect.innerHTML = '<option value="">Select Village</option>';

            if (cityCode) {
                fetch('/get-districts/' + cityCode)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(district => {
                            districtSelect.innerHTML +=
                                `<option value="${district.kode}">${district.nama}</option>`;
                        });
                    });
            }
        });

        document.getElementById('district_code').addEventListener('change', function() {
            let districtCode = this.value;
            let villageSelect = document.getElementById('village_code');

            villageSelect.innerHTML = '<option value="">Select Village</option>';

            if (districtCode) {
                fetch('/get-villages/' + districtCode)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(village => {
                            villageSelect.innerHTML +=
                                `<option value="${village.kode}">${village.nama}</option>`;
                        });
                    });
            }
        });

        // Prefill sub-region selects based on existing data
        window.addEventListener('load', function() {
            let provinceCode = document.getElementById('province_code').value;
            if (provinceCode) {
                fetch('/get-cities/' + provinceCode)
                    .then(response => response.json())
                    .then(data => {
                        let citySelect = document.getElementById('city_code');
                        data.forEach(city => {
                            citySelect.innerHTML +=
                                `<option value="${city.kode}" ${city.kode == "{{ $address->city_code }}" ? 'selected' : ''}>${city.nama}</option>`;
                        });

                        let cityCode = document.getElementById('city_code').value;
                        if (cityCode) {
                            fetch('/get-districts/' + cityCode)
                                .then(response => response.json())
                                .then(data => {
                                    let districtSelect = document.getElementById('district_code');
                                    data.forEach(district => {
                                        districtSelect.innerHTML +=
                                            `<option value="${district.kode}" ${district.kode == "{{ $address->district_code }}" ? 'selected' : ''}>${district.nama}</option>`;
                                    });

                                    let districtCode = document.getElementById('district_code').value;
                                    if (districtCode) {
                                        fetch('/get-villages/' + districtCode)
                                            .then(response => response.json())
                                            .then(data => {
                                                let villageSelect = document.getElementById(
                                                    'village_code');
                                                data.forEach(village => {
                                                    villageSelect.innerHTML +=
                                                        `<option value="${village.kode}" ${village.kode == "{{ $address->village_code }}" ? 'selected' : ''}>${village.nama}</option>`;
                                                });
                                            });
                                    }
                                });
                        }
                    });
            }
        });
    </script>
@endsection
