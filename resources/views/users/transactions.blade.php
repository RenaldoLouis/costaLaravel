@extends('layouts.default')

@section('content')
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Affiliator</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- My Orders Page Start -->
    <div class="my-account-page ptb-80">
        <div class="container">
            <div class="row">
                @include('users._sidebar') <!-- Include the sidebar -->

                <div class="col-lg-9">
                    <div class="account-content">
                        <h3 class="mb-3">My Transactions</h3>
                        <p>Below is the list of transactions that you have made through your affiliate links.</p>
                        <div class="products-list">
                            <!--
                                        $transactions = Auth::user()->transactions()->paginate(10);
                                        columns: date, type:credit/withdrawal, amount, description
                                    -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th style="text-align: right;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->created_at->format('d M Y') }}</td>
                                            <td>{{ $transaction->description }}</td>
                                            <td>{{ $transaction->type }}</td>
                                            <td style="text-align: right; font-weight: bold;">
                                                @if ($transaction->type == 'credit')
                                                    <span style="color: green;">
                                                        IDR {{ number_format($transaction->amount, 0, ',', '.') }}
                                                    </span>
                                                @else
                                                    <span style="color: red;">
                                                        -IDR {{ number_format($transaction->amount, 0, ',', '.') }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <x-pagination :products="$transactions" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
