<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function index(){
        $partnerships = Partnership::where('is_active', 1)->get();
        return view('partnerships.index', compact('partnerships'));
    }

    // indexId
    public function indexId(){
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->index();
    }
}
