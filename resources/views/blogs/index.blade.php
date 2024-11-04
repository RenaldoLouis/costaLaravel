@extends('layouts.default')

@section('content')
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Blog</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Blog Index Page Start -->
    <div class="blog-index-page ptb-80">
        <div class="container">
            @foreach ($blogs as $post)
                <div class="blog-item" style="margin-bottom: 30px;">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="blog-image">
                                <img src="{{ asset('storage' . $post->image) }}" alt="{{ session('locale') == 'id' ? $post->title_in ?? $post->title : $post->title }}">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="blog-content">
                                <h3 class="blog-title mb-20">
                                    <a href="{{ route('blogs.showBySlug', ['locale'=>config('app.locale'),'slug'=>$post->slug]) }}">{{ session('locale') == 'id' ? $post->title_in ?? $post->title : $post->title }}</a>
                                </h3>
                                <p class="blog-excerpt">{{ Str::limit(session('locale') == 'id' ? $post->excerpt_in ?? $post->excerpt : $post->excerpt, 150) }}</p>
                                <div class="blog-meta">
                                    <span class="blog-date">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Pagination --}}
            <div class="pagination-wrapper">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
    <!-- Blog Index Page End -->
@endsection
