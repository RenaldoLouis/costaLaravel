<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showcase;

class ShowcaseController extends Controller
{
    /**
     * Menampilkan halaman showcase berdasarkan slug.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($locale, $slug)
    {
        // Mencari showcase berdasarkan slug
        $showcase = Showcase::where('slug', $slug)->firstOrFail();

        // Mengambil sections terkait, diurutkan berdasarkan 'order'
        $sections = $showcase->sections()->orderBy('order')->get();

        return view('showcase.show', compact('showcase', 'sections'));
    }


    public function showId($slug)
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->show('id', $slug);
    }
}
