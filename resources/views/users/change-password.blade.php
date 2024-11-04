@extends('layouts.default')

@section('content')
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">My Account</li>
            </ol>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <div class="my-account-page ptb-80">
        <div class="container">
            <div class="row">
                @include('users._sidebar')

                <div class="col-lg-9">
                    <h3>Edit Password</h3>

                    <!-- has message -->
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    {{ html()->form('PUT', route('account.changePassword.update'))->open() }}
                        @csrf

                        <div class="mb-3">
                            {{ html()->label('Current Password', 'current_password')->class('form-label') }}
                            {{ html()->password('current_password')->class('form-control')->required() }}
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            {{ html()->label('New Password', 'new_password')->class('form-label') }}
                            {{ html()->password('new_password')->class('form-control')->required() }}
                            @error('new_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            {{ html()->label('Confirm New Password', 'new_password_confirmation')->class('form-label') }}
                            {{ html()->password('new_password_confirmation')->class('form-control')->required() }}
                            @error('new_password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{ html()->submit('Update Password')->class('btn btn-primary') }}
                    {{ html()->closeModelForm() }}
                </div>
            </div>
        </div>
    </div>
@endsection
