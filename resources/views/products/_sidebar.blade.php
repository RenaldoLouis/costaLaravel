<!-- Sidebar Shopping Option Start -->
<div class="col-lg-3 order-2 order-lg-1 mt-all-30">
    <div class="sidebar shop-sidebar">
        <!-- Sidebar Categorie Start -->
        <div class="sidebar-categorie mb-30">
            <h3 class="sidebar-title">Categories</h3>
            <ul class="sidbar-style">
                @foreach ($categories as $c)
                    <li>
                        <a href="{{ route('categories.showBySlug', ['slug' => $c->slug, 'locale' => app()->getLocale()]) }}"
                            class="category-toggle" data-toggle="collapse" data-target="#category-{{ $c->id }}"
                            aria-expanded="true" aria-controls="category-{{ $c->id }}">
                            {{ $c->name }}
                            @if ($c->children->isNotEmpty())
                                <i class="fa fa-angle-up toggle-icon"></i>
                            @endif
                        </a>
                        @if ($c->children->isNotEmpty())
                            <ul class="collapse show ml-3" id="category-{{ $c->id }}">
                                @foreach ($c->children as $childCategory)
                                    <li>
                                        <a
                                            href="{{ route('categories.showBySlug', ['slug' => $childCategory->slug, 'locale' => app()->getLocale()]) }}">
                                            {{ $childCategory->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Sidebar Categorie End -->


        <!-- Subcategories Section Start -->
        @if (isset($subcategories) && $subcategories->isNotEmpty())
            <div class="subcategories mt-4">
                <h3 class="sidebar-title">{{ $category->name }}</h3>
                <ul class="list-unstyled">
                    @foreach ($subcategories as $subcategory)
                        <li class="d-flex align-items-center mb-3">
                            <a
                                href="{{ route('categories.showBySlug', ['slug' => $subcategory->slug, 'locale' => app()->getLocale()]) }}">
                                <img src="{{ asset('storage' . ($subcategory->image ?? $c->image)) }}"
                                    alt="{{ $subcategory->name }}" class="subcategory-image mr-3"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                                {{ $subcategory->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Subcategories Section End -->
    </div>
</div>
<!-- Sidebar Shopping Option End -->




<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toggles = document.querySelectorAll('.toggle-icon');
        toggles.forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                var target = document.querySelector(toggle.parentElement.getAttribute(
                    'data-target'));
                target.classList.toggle('show');
                toggle.classList.toggle('fa-angle-down');
                toggle.classList.toggle('fa-angle-up');
            });
        });
    });
</script>
