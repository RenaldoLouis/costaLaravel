@extends('layouts.default')

@section('content')

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Addresses</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- My Account Page Start -->
    <div class="my-account-page ptb-80">
        <div class="container">
            <div class="row">
                @include('users._sidebar') <!-- Include the sidebar -->

                <div class="col-lg-9">
                    <div class="account-content">
                        <h3 class="mb-3">Your Addresses</h3>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <a href="{{ route('addresses.create') }}" class="btn btn-primary mb-3">Add New Address</a>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Address Name</th>
                                        <th>Recipient Name</th>
                                        <th>Address</th>
                                        <th>Default</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($addresses as $address)
                                        <tr>
                                            <td>{{ $address->name }}</td>
                                            <td>{{ $address->recipient_name }}</td>
                                            <td>{{ $address->address }}</td>
                                            <td>{{ $address->is_default ? 'Yes' : 'No' }}</td>
                                            <td>
                                                <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                @if(!$address->is_default)
                                                    <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this address?');">Delete</button>
                                                    </form>
                                                    <form action="{{ route('addresses.setDefault', $address->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info btn-sm">Set as Default</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account Page End -->

@endsection
