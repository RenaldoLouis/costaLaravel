@extends('layouts.default')

@section('meta')
    @php
        $title = $post->meta_title ?? $post->title;
        if (session('locale') == 'id') {
            $title = $post->meta_title_in ?? $post->title_in;
            if (!empty($post->html_title_in)) {
                $title = $post->html_title_in;
            }
        } else {
            $title = $post->meta_title ?? $post->title;
            if (!empty($post->html_title)) {
                $title = $post->html_title;
            }
        }
    @endphp
    <meta name="title" content="{{ $title }}
    <meta name="description"
        content="{{ session('locale') == 'id' ? $post->meta_description_in ?? $post->meta_description : $post->meta_description ?? $post->excerpt }}">
    <meta name="keywords"
        content="{{ session('locale') == 'id' ? $post->meta_keywords_in ?? $post->meta_keywords : $post->meta_keywords }}">
    <meta property="og:title"
        content="{{ session('locale') == 'id' ? $post->meta_title_in ?? $post->meta_title : $post->meta_title ?? $post->name }}">
    <meta property="og:image" content="{{ asset('storage' . $post->image) }}">
    <meta property="og:description"
        content="{{ session('locale') == 'id' ? $post->meta_description_in ?? $post->meta_description : $post->meta_description ?? $post->summary }}">
    <meta property="og:url" content="{{ route('blogs.showBySlug', $post->slug) }}">
    <meta name="author" content="{{ $post->user->name }}">
@endsection

@section('content')
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('blogs') }}">Blog</a>
                </li>
                <li class="breadcrumb-item active">
                    {{ session('locale') == 'id' ? $post->title_in ?? $post->title : $post->title }}</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Blog Detail Page Start -->
    <article class="blog-detail-page" itemscope itemtype="http://schema.org/BlogPosting">
        <header class="blog-detail-header" style="background-image: url('{{ asset('storage' . $post->image) }}');">
            <div class="overlay"></div> <!-- Overlay berada langsung di bawah blog-detail-header -->
            <div class="container">
                <h1 class="blog-title" itemprop="headline">
                    {{ session('locale') == 'id' ? $post->title_in ?? $post->title : $post->title }}</h1>
                <div class="blog-meta">
                    <time itemprop="datePublished"
                        datetime="{{ $post->created_at->toIso8601String() }}">{{ $post->created_at->format('F d, Y') }}</time>
                    <time itemprop="dateModified" datetime="{{ $post->updated_at->toIso8601String() }}"
                        style="display: none;">{{ $post->updated_at->format('F d, Y') }}</time>
                </div>
            </div>
        </header>
        <div class="blog-content container ptb-80" itemprop="articleBody">
            {!! session('locale') == 'id' ? $post->content_in ?? $post->content : $post->content !!}
            <!-- Author Information -->
            <div class="author-box">
                <div class="author-box-left">
                    @if ($post->user->profile_picture)
                        <a
                            href="{{ route('author.show', [
                                'slug' => $post->user->slug,
                                'locale' => app()->getLocale(),
                            ]) }}">
                            <img src="{{ asset('storage/' . $post->user->profile_picture) }}"
                                alt="{{ $post->user->name }}" class="author-profile-picture">
                        </a>
                    @else
                        <div class="author-initials" onclick="location.href='{{ route('author.show', [
                            'slug' => $post->user->slug,
                            'locale' => app()->getLocale(),
                        ]) }}';" style="cursor: pointer;">
                            {{ strtoupper(substr($post->user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>
                <div class="author-box-right">
                    <p class="author-name"><strong>

                            <a
                                href="{{ route('author.show', [
                                    'slug' => $post->user->slug,
                                    'locale' => app()->getLocale(),
                                ]) }}">
                                {{ $post->user->name }}
                            </a>
                        </strong></p>
                    <p class="author-bio">{{ $post->user->bio }}</p>
                </div>
            </div>
        </div>
        <div class="share-buttons container">
            <h5>Share this post:</h5>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('blogs.showBySlug', $post->slug) }}"
                target="_blank" class="share-btn facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/intent/tweet?url={{ route('blogs.showBySlug', $post->slug) }}&text={{ $post->title }}"
                target="_blank" class="share-btn twitter"><i class="fab fa-twitter"></i></a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('blogs.showBySlug', $post->slug) }}&title={{ $post->title }}"
                target="_blank" class="share-btn linkedin"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://wa.me/?text={{ route('blogs.showBySlug', $post->slug) }}" target="_blank"
                class="share-btn whatsapp"><i class="fab fa-whatsapp"></i></a>
            <button id="copyLinkBtn" class="share-btn copy-link"><i class="fas fa-link"></i></button>
        </div>
    </article>
    <!-- Blog Detail Page End -->
@endsection

@section('extend-scripts')
    <script>
        document.getElementById('copyLinkBtn').addEventListener('click', function() {
            var dummy = document.createElement('input'),
                text = window.location.href;

            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand('copy');
            document.body.removeChild(dummy);

            alert('Link copied to clipboard!');
        });
    </script>
@endsection
