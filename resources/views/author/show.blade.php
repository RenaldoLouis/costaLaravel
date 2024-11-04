@extends('layouts.default')

@section('meta')
    <meta name="title" content="{{ $author->name }}">
    <meta name="description" content="{{ $author->bio }}">
@endsection

@section('content')
    <div class="author-detail container">
        <div class="author-box">
            <div class="author-box-left">
                @if ($author->profile_picture)
                    <img src="{{ asset('storage/' . $author->profile_picture) }}" alt="{{ $author->name }}" class="author-profile-picture">
                @else
                    <div class="author-initials">
                        {{ strtoupper(substr($author->name, 0, 1)) }}
                    </div>
                @endif
            </div>
            <div class="author-box-right">
                <p class="author-name"><strong>{{ $author->name }}</strong></p>
                <p class="author-bio">{{ $author->bio }}</p>
            </div>
        </div>

        <div class="author-posts">
            <h2>{{ __('Posts by') }} {{ $author->name }}</h2>
            <ul>
                @foreach ($posts as $post)
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
            </ul>
        </div>
    </div>
@endsection

<style>
    .author-detail {
        margin-top: 50px;
    }
    .author-box {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }
    .author-box-left {
        flex: 0 0 80px;
        margin-right: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .author-profile-picture {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
    }
    .author-initials {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: #2c3e50; /* Dark blue color */
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        font-weight: bold;
    }
    .author-box-right {
        flex: 1;
    }
    .author-name {
        font-size: 1.5em;
        margin: 0;
    }
    .author-bio {
        margin: 5px 0 0;
    }
    .author-posts {
        margin-top: 40px;
    }
    .author-posts h2 {
        font-size: 1.8em;
        margin-bottom: 20px;
    }
    .author-posts ul {
        list-style: none;
        padding: 0;
    }
    .author-posts li {
        margin-bottom: 10px;
    }
    .author-posts a {
        text-decoration: none;
        color: #3490dc;
    }
    .author-posts a:hover {
        text-decoration: underline;
    }
</style>
