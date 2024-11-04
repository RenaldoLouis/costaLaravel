@extends('layouts.default')

@section('meta')
    <meta name="title" content="{{ session('locale') == 'id' ? ($page->meta_title_in ?? $page->meta_title) : ($page->meta_title ?? $page->title) }}">
    <meta name="description" content="{{ session('locale') == 'id' ? ($page->meta_description_in ?? $page->meta_description) : ($page->meta_description ?? $page->excerpt) }}">
    <meta name="keywords" content="{{ session('locale') == 'id' ? ($page->meta_keywords_in ?? $page->meta_keywords) : $page->meta_keywords }}">
    <meta property="og:title" content="{{ session('locale') == 'id' ? ($page->meta_title_in ?? $page->meta_title) : ($page->meta_title ?? $page->name) }}">
    <meta property="og:image" content="{{ asset('storage' . $page->image) }}">
    <meta property="og:description" content="{{ session('locale') == 'id' ? ($page->meta_description_in ?? $page->meta_description) : ($page->meta_description ?? $page->summary) }}">
    <meta property="og:url" content="{{ route('blogs.showBySlug', $page->slug) }}">
@endsection

@section('content')
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <ol class="breadcrumb breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">{{ session('locale') == 'id' ? $page->title_in ?? $page->title : $page->title }}</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Blog Detail Page Start -->
    <div class="blog-detail-page">
        <div class="blog-detail-header" style="background-image: url('{{ asset('storage' . $page->image) }}');">
            <div class="overlay"></div> <!-- Overlay berada langsung di bawah blog-detail-header -->
            <div class="container">
                <h1 class="blog-title">{{ session('locale') == 'id' ? $page->title_in ?? $page->title : $page->title }}</h1>
                <div class="blog-meta">
                    <span class="blog-date">{{ $page->created_at->format('F d, Y') }}</span>
                </div>
            </div>
        </div>
        <div class="blog-content container ptb-80">
            {!! session('locale') == 'id' ? $page->content_in ?? $page->content : $page->content !!}
        </div>
    </div>
    <!-- Blog Detail Page End -->
@endsection
