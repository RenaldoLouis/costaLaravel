<div class="payment-method">
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingone">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        {{ __('checkout.bank_transfer') }}
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingone"
                data-parent="#accordion">
                <div class="card-body">
                    <p>{{ __('checkout.bank_transfer_details') }}</p>
                    @php $bankAccounts = json_decode(setting('bank_accounts'), true); @endphp
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('checkout.bank') }}</th>
                                <th>{{ __('checkout.account_number') }}</th>
                                <th>{{ __('checkout.account_holder') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($bankAccounts))
                                @foreach ($bankAccounts as $bank => $account)
                                    <tr>
                                        <td>{{ $account['name'] }}</td>
                                        <td>{{ $account['number'] }}</td>
                                        <td>{{ $account['holder'] }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <p class="mt-30">{{ __('checkout.unique_code') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
