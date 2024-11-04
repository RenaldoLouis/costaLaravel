<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog; // Assuming you have a Blog model

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 'publish')
            ->orderBy('created_at', 'desc')
            ->paginate(10); // Adjust the number per page as needed
        $title = session('locale') == 'id' ? 'Blog' : 'Blogs';
        return view('blogs.index', compact('blogs', 'title'));
    }

    public function indexId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->index();
    }

    public function showBySlug($locale, $slug)
    {
        if (!empty(request()->preview)) {
            if (md5($slug) != request()->code) {
                abort(404);
            }
            $post = Blog::where('slug', $slug)->firstOrFail();
            $title = session('locale') == 'id' ? $post->title_in : $post->title;
            $robots = 'noindex, nofollow';
            return view('blogs.show', compact('post', 'title', 'robots'));
        }

        $post = Blog::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        // jika tidak ditemukan, maka akan menampilkan halaman 404
        if (!$post) {
            abort(404);
        }

        $title = session('locale') == 'id' ? $post->html_title_in : $post->html_title;
        $robots = $post->meta_robots;
        return view('blogs.show', compact('post', 'title', 'robots'));
    }

    public function showBySlugId($slug)
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->showBySlug('id', $slug);
    }
}
