<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthorController extends Controller
{
    public function show($locale, $slug)
    {
        // Cari user berdasarkan slug
        $author = User::all()->filter(function($user) use ($slug) {
            return md5($user->id) === $slug;
        })->firstOrFail();

        $posts = $author->blogs; // Assuming the User model has a relationship with Post model

        return view('author.show', compact('author', 'posts'));
    }

    // showId
    public function showId($slug)
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->show('id', $slug);
    }
}
