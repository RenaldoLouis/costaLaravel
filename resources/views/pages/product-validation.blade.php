@extends('layouts.default')

@section('content')
    <!-- Validation Area Start -->
    <div class="validation-area ptb-80">
        <div class="container">
            <!-- Section Title Start Here -->
            <div class="section-title text-center">
                <h2>{{ __('validation.section_title') }}</h2>
                <p>{{ __('validation.section_subtitle') }}</p>
            </div>
            <!-- Section Title End Here -->
            <!-- Validation Form Start -->
            <div class="validation-form-area ptb-40">
                <form id="validationForm" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="serialNumber">{{ __('validation.serial_number') }}</label>
                        <input type="text" class="form-control" id="serialNumber" name="serial_number" placeholder="{{ __('validation.placeholder_serial_number') }}">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-large">{{ __('validation.check_button') }}</button>
                    </div>
                </form>
                <div id="validationResult" class="pt-4"></div>
            </div>
            <!-- Validation Form End -->
            <!-- What is this? Start -->
            <div class="what-is-this ptb-40">
                <h3>{{ __('validation.what_is_this') }}</h3>
                <ul>
                    <li><strong>{{ __('validation.serial_number') }}:</strong> {{ __('validation.serial_number_explanation') }}</li>
                    <li><strong>{{ __('validation.section_title') }}:</strong> {{ __('validation.product_validation_explanation') }}</li>
                    <li><strong>{{ __('validation.importance_explanation') }}:</strong> {{ __('validation.importance_explanation') }}</li>
                </ul>
            </div>
            <!-- What is this? End -->
        </div>
    </div>
    <!-- Validation Area End -->
@endsection

@section('extend-scripts')
    <script>
        $(document).ready(function() {
            $('#validationForm').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('product-validate',[
                        'locale' => config('app.locale'),
                    ]) }}",
                    type: "POST",
                    dataType: "json",
                    data: formData,
                    beforeSend: function() {
                        $('#validationResult').html('<div class="text-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                    },
                    success: function(json) {
                        if (json.success) {
                            var productHtml = '<div class="product-info d-flex align-items-start">';
                            productHtml += '<div class="product-image mr-30"><img class="square-image" src="{{ asset('storage/') }}/' + json.product.image + '" alt="' + json.product.name + '" class="img-fluid" style="max-width: 150px; border-radius: 8px;"></div>';
                            productHtml += '<div>';
                            productHtml += '<h3>' + json.product.name + '</h3>';
                            productHtml += '<p>' + json.product.summary + '</p>';
                            productHtml += '<a href="' + "{{ route('products.showBySlug', '') }}/" + json.product.slug + '" class="btn btn-outline-primary">View Product</a>';
                            productHtml += '</div></div>';

                            $('#validationResult').html('<div class="result-icon"><i class="fas text-success fa-check-circle fa-3x"></i><br>' + json.message + '</div>' + productHtml);
                            $('.result-icon').addClass('drop-animation');
                        } else {
                            $('#validationResult').html('<div class="result-icon"><i class="fas text-danger fa-times-circle fa-3x"></i><br>' + json.message + '</div>');
                            $('.result-icon').addClass('drop-animation');
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#validationResult').html('<div class="alert alert-danger" role="alert">Error: ' + error + '</div>');
                    }
                });
            });
        });
    </script>
@endsection
