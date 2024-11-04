<div class="shop-breadcrumb-area pt-2">
    <div class="">
        <div class="text-center">
            <span class="show-items">{{ __('pagination.showing') }}
                {{ $products->firstItem() }}–{{ $products->lastItem() }}
                {{ __('pagination.of') }} {{ $products->total() }} {{ __('pagination.results') }}</span>
        </div>
        <div class="">
            <ul class="pfolio-breadcrumb-list text-center mt-3">
                <!-- Previous Page Link -->
                @if ($products->onFirstPage())
                    <li class="prev disabled"><span><i class="fa fa-angle-left fa-fw"
                                aria-hidden="true"></i>{{ __('pagination.previous') }}</span></li>
                @else
                    <li class="prev"><a href="{{ $products->previousPageUrl() }}"><i class="fa fa-angle-left"
                                aria-hidden="true"></i>{{ __('pagination.previous') }}</a></li>
                @endif

                <!-- Pagination Elements -->
                @foreach ($products->getUrlRange(1, $products->lastPage()) as $pageNum => $url)
                    <li class="{{ $products->currentPage() == $pageNum ? 'active' : '' }}">
                        <a href="{{ $url }}">{{ $pageNum }}</a>
                    </li>
                @endforeach

                <!-- Next Page Link -->
                @if ($products->hasMorePages())
                    <li class="next"><a href="{{ $products->nextPageUrl() }}">{{ __('pagination.next') }}<i class="fa fa-angle-right"
                                aria-hidden="true"></i></a></li>
                @else
                    <li class="next disabled"><span>{{ __('pagination.next') }}<i class="fa fa-angle-right" aria-hidden="true"></i></span></li>
                @endif
            </ul>
        </div>
    </div>
</div>
