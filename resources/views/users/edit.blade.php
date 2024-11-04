@extends('layouts.default')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @include('users._sidebar')

            <div class="col-lg-9">
                <h2>Edit Account</h2>
                {{ html()->form('POST', route('account.update'))->open() }}
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        {{ html()->label('Name', 'name')->class('form-label') }}
                        {{ html()->text('name')->class('form-control')->value(Auth::user()->name) }}
                    </div>

                    <div class="mb-3">
                        {{ html()->label('Email', 'email')->class('form-label') }}
                        {{ html()->email('email')->class('form-control')->value(Auth::user()->email) }}
                    </div>

                    <div class="mb-3">
                        {{ html()->label('Birth Date', 'birth')->class('form-label') }}
                        {{ html()->date('birth')->class('form-control')->value(Auth::user()->birth) }}
                    </div>

                    <div class="mb-3">
                        {{ html()->label('Gender', 'gender')->class('form-label') }}
                        {{ html()->select('gender', ['male' => 'Male', 'female' => 'Female'])->class('form-control')->value(Auth::user()->gender) }}
                    </div>

                    <div class="mb-3">
                        {{ html()->label('Facebook URL', 'facebook')->class('form-label') }}
                        {{ html()->text('facebook')->class('form-control')->value(Auth::user()->facebook) }}
                    </div>

                    <div class="mb-3">
                        {{ html()->label('Instagram URL', 'instagram')->class('form-label') }}
                        {{ html()->text('instagram')->class('form-control')->value(Auth::user()->instagram) }}
                    </div>

                    <div class="mb-3">
                        {{ html()->label('Twitter URL', 'twitter')->class('form-label') }}
                        {{ html()->text('twitter')->class('form-control')->value(Auth::user()->twitter) }}
                    </div>

                    <div class="mb-3">
                        {{ html()->label('YouTube URL', 'youtube')->class('form-label') }}
                        {{ html()->text('youtube')->class('form-control')->value(Auth::user()->youtube) }}
                    </div>

                    {{ html()->submit('Update')->class('btn btn-primary') }}
                {{ html()->closeModelForm() }}
            </div>
        </div>
    </div>
@endsection
