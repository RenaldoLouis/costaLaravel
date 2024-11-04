<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    // home
    public function home(Request $request, $locale)
    {
        $sliders = Slider::where('is_active', true)->get();
        // buat variable $homepage, dan dapatkan semua settings di mana prefixnya adalah "homepage_"
        $homepage = Setting::where('key', 'like', 'homepage_%')->pluck('value', 'key');

        $title = session('locale') == 'id' ? 'Beranda' : 'Home' ;

        return view('pages.home', compact('sliders', 'homepage', 'title'));
    }
    public function homeId(Request $request){
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->home($request, 'id');
    }

    // viewBySlug
    public function viewBySlug($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.view', compact('page'));
    }

    // aboutUs
    public function aboutUs(){
        return $this->viewBySlug('about');
    }

    // aboutUsId
    public function aboutUsId(){
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->aboutUs();
    }

    // affiliate
    public function affiliate()
    {
        // jika user sudah login dan sudah menjadi affiliate, maka redirect ke halaman affiliate dashboard
        if (auth()->check() && auth()->user()->is_affiliate) {
            return redirect()->route('affiliate.dashboard');
        }
        $affiliate = Setting::where('key', 'like', 'affiliate_%')->pluck('value', 'key');
        $title = session('locale') == 'id' ? 'Menjadi Affiliator, Program Afiliasi' : 'Become Affiliator, Affiliate Program';
        return view('pages.affiliate', compact('affiliate', 'title'));
    }


    public function affiliateId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->affiliate();
    }

    // become reseller
    public function becomeReseller()
    {
        $reseller = Setting::where('key', 'like', 'reseller_%')->pluck('value', 'key');
        $title = session('locale') == 'id' ? 'Menjadi Reseller' : 'Become Reseller';
        return view('pages.become-reseller', compact('reseller', 'title'));
    }

    // become reseller id
    public function becomeResellerId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->becomeReseller();
    }

    // contact us
    public function contactUs()
    {
        $title = session('locale') == 'id' ? 'Hubungi Kami' : 'Contact Us';
        return view('pages.contact-us', compact('title'));
    }

    // contact us id
    public function contactUsId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->contactUs();
    }


    // contact us post
    public function contactUsPost(Request $request)
    {
        // Validasi form termasuk token reCAPTCHA
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:10',
            'website' => 'nullable|url',
            'g-recaptcha-response' => 'required'
        ]);

        // Verifikasi reCAPTCHA
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        $result = $response->json();

        if (!$result['success'] || $result['score'] < 0.5) {
            return redirect()->back()->withErrors(['recaptcha' => 'reCAPTCHA verification failed.']);
        }

        // Kirim email jika diatur untuk mengirim email
        if (setting('is_email')) {
            \Mail::raw($request->message, function ($message) use ($request) {
                $message->to(setting('website_email'));
                $message->subject('Contact Us from ' . $request->name);
            });
        }

        // Simpan ke database
        Contact::create($request->all());

        // Redirect ke halaman contact us dengan pesan sukses
        return redirect()->route('contact-us.success');
    }

    // contact us success
    public function contactUsSuccess()
    {
        $title = session('locale') == 'id' ? 'Terima Kasih' : 'Thank You';
        return view('pages.contact-us-success', compact('title'));
    }

    // contact us success id
    public function contactUsSuccessId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->contactUsSuccess();
    }


    // validation
    public function validation()
    {
        $title = session('locale') == 'id' ? 'Validasi Produk' : 'Product Validation';
        return view('pages.product-validation', compact('title'));
    }

    // validationId
    public function validationId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->validation();
    }

    // app/Http/Controllers/ProductController.php
    public function validationPost(Request $request)
    {
        // jadi product itu punya field yaitu serial_numbers, yang isinya adalah string yang berisi serial number yang dipisahkan dengan baris baru (enter)
        // buat supaya pencarian eksak, jangan like, tapi pakai = (sama dengan)
        // ekstrak dulu semua serial number yang ada di database
        $serialNumbers = Product::pluck('serial_numbers')->implode("\n");

        // buat pengecekan
        $found = false;
        $serialNumber = $request->serial_number;
        $serialNumbers = explode("\n", $serialNumbers);
        foreach ($serialNumbers as $sn) {
            if (trim($sn) == $serialNumber) {
                $found = true;
                break;
            }
        }

        // jika serial number ditemukan, maka tampilkan productnya, return json
        if ($found) {
            return response()->json([
                'success' => true,
                'message' => 'Serial number found. Congratulations, you have an original product',
                'product' => Product::where('serial_numbers', 'like', "%$serialNumber%")->first()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Unfortunately, the serial number is not found'
            ]);
        }
    }

    // Refund Policy
    public function refundPolicy()
    {
        return $this->viewBySlug('refund-policy');
    }

    // Refund Policy dalam Bahasa Indonesia
    public function refundPolicyId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->refundPolicy();
    }

    // faq
    public function faq()
    {
        return $this->viewBySlug('faq');
    }

    // faq id
    public function faqId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->faq();
    }
}
