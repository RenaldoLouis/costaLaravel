<style>
    .statistic-box {
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-align: center;
        margin-bottom: 20px;
    }

    .statistic-box h4 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .statistic-box p {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }
</style>
<!-- Statistic Area Start -->
<div class="statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="statistic-box">
                    <h4>Balance</h4>
                    <p>IDR {{ number_format(auth()->user()->balance, 0, ',', '.') }}</p>
                    <a href="">View Transactions</a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="statistic-box">
                    <h4>Links</h4>
                    <p>{{ $generatedLinks }}</p>
                    <a href="{{ route('affiliate.links') }}">View Links</a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="statistic-box">
                    <h4>Clicks</h4>
                    <p>{{ $clicks }}</p>
                    <a href="{{ route('affiliate.clicks') }}">View Clicks</a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="statistic-box">
                    <h4>Sales</h4>
                    <p>{{ number_format($sales, 0, ',', '.') }}</p>
                    <a href="{{ route('affiliate.sales') }}">View Sales</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Statistic Area End -->
