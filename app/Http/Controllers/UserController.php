<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    // register
    public function register()
    {
        return view('users.register');
    }

    public function registerId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->register();
    }

    // store dengan validation
    public function store(Request $request)
    {
        // jika request->type = affiliator, maka validasi tambahan
        if ($request->type == 'affiliator') {
            $this->validate($request, [
                'name' => 'required|min:3|max:50',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:50|confirmed',
                'password_confirmation' => 'required',
                'instagram' => 'required|url',
                'tiktok' => 'required|url',
                'youtube' => 'required|url',
                'facebook' => 'url|nullable',
                'twitter' => 'url|nullable',
            ], [
                'instagram.required' => 'Instagram URL is required',
                'tiktok.required' => 'Tiktok URL is required',
                'youtube.required' => 'Youtube URL is required',
                'instagram.url' => 'Instagram URL must be a valid URL',
                'tiktok.url' => 'Tiktok URL must be a valid URL',
                'youtube.url' => 'Youtube URL must be a valid URL',
                'facebook.url' => 'Facebook URL must be a valid URL',
                'twitter.url' => 'Twitter URL must be a valid URL',
            ]);
        } else {
            // validasi
            $this->validate($request, [
                'name' => 'required|min:3|max:50',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:50|confirmed',
                'password_confirmation' => 'required',
            ]);
        }

        // buat user baru
        $user = new \App\Models\User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = bcrypt($request->password);
        $user->verification_code = \Str::random(40);
        $user->gender = $request->gender;
        $user->birth = $request->birth;
        $user->balance = 0;
        $user->is_affiliate = false;
        if ($request->has('is_affiliate')) {
            $user->is_affiliate = true;
            $user->instagram = $request->instagram;
            $user->twitter = $request->twitter;
            $user->youtube = $request->youtube;
            $user->facebook = $request->facebook;
        }
        if ($request->has('is_reseller')) {
            $user->is_reseller = true;
        }
        $user->save();

        // save as role "member"
        $user->assignRole('member');

        Mail::to($user->email)->send(new \App\Mail\EmailVerificationMail($user));

        // redirect ke verifikasi email, jika bahasa indo ke signup.success.id
        if (app()->getLocale() == 'id') {
            return redirect()->route('signup.success.id')->with('success', 'Register success, please check your email to verify your account');
        }
        return redirect()->route('signup.success', [
            'locale' => app()->getLocale()
        ])->with('success', 'Register success, please check your email to verify your account');
    }

    public function verifyEmail(Request $request)
    {
        $user = User::where('verification_code', $request->code)->first();

        if (!is_null($user)) {
            $user->email_verified_at = now();
            $user->verification_code = null; // opsional, untuk menghapus kode setelah verifikasi
            $user->save();

            // Redirect ke halaman yang diinginkan setelah verifikasi
            return redirect()->route(
                'login',
                [
                    'locale' => app()->getLocale()
                ]
            )->with('success', 'Your email has been verified.');
        }

        // Gagal verifikasi
        return redirect()->route('login', [
            'locale' => app()->getLocale()
        ])->with('error', 'Invalid verification code.');
    }

    // verifyEmailId
    public function verifyEmailId(Request $request)
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->verifyEmail($request);
    }

    // register success
    public function success()
    {
        return view('users.register-success');
    }

    // successId
    public function successId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->success();
    }

    // verify
    public function verify($code)
    {
        // cari user berdasarkan verification code
        $user = \App\Models\User::where('verification_code', $code)->first();

        // jika user tidak ditemukan
        if (!$user) {
            return redirect()->route('register')->with('error', 'Verification code not found');
        }

        // jika user ditemukan, update verification code menjadi null dan is_verified menjadi true
        $user->verification_code = null;
        $user->email_verified_at = now();
        $user->save();

        // redirect ke login
        return redirect()->route('login')->with('success', 'Verification success, please login');
    }

    // login
    public function login()
    {
        // jika user sudah login, redirect ke home
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('users.login');
    }

    // loginId
    public function loginId()
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->login();
    }

    // login post dan cek sudah verifikasi email atau belum
    public function authenticate(Request $request)
    {

        // validasi
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:50',
        ]);

        // cek apakah user sudah verifikasi email atau belum
        $user = \App\Models\User::where('email', strtolower($request->email))->first();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Email not found');
        }

        // cek apakah email sudah diverifikasi atau belum
        if ($user->email_verified_at == null) {
            return redirect()->route('login')->with('error', 'Please verify your email first');
        }

        // cek apakah email dan password benar
        if (!\Auth::attempt(['email' => strtolower($request->email), 'password' => $request->password])) {
            return redirect()->route('login')->with('error', 'Email or password wrong');
        }

        // cek ada request redirect_to atau tidak
        if (request('redirect_to')) {
            return redirect(request('redirect_to'));
        }

        // redirect ke home
        return redirect()->route('home')->with('success', 'Login success');
    }

    // authenticate id
    public function authenticateId(Request $request)
    {
        app()->setLocale('id');
        session()->put('locale', 'id');
        return $this->authenticate($request);
    }

    public function account()
    {
        return view('users.account');
    }

    // edit
    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        // Validasi data request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        // Update data pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->birth = $request->birth;
        $user->gender = $request->gender;
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;

        $user->save();

        // set session untuk nama
        session(['name' => $user->name]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('account')->with('success', 'Account updated successfully.');
    }

    // change password
    public function changePassword()
    {
        return view('users.change-password');
    }

    public function changePasswordUpdate(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|min:6|max:50',
            'new_password' => 'required|min:6|max:50|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Your current password does not match our records.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully.');
    }

    public function myOrders(Request $request)
    {
        $searchTerm = $request->input('search');

        $orders = Order::where('user_id', Auth::id())
            ->where(function ($query) use ($searchTerm) {
                $query->where('invoice_number', 'LIKE', "%{$searchTerm}%")
                    ->orWhereHas('details.product', function ($query) use ($searchTerm) {
                        $query->where('name', 'LIKE', "%{$searchTerm}%");
                    });
            })
            ->paginate(10);

        return view('users.my-orders', compact('orders'));
    }

    public function myOrdersShow($code)
    {
        $order = Order::where('user_id', Auth::id())->where('code', $code)->firstOrFail();

        return view('users.my-orders-show', compact('order'));
    }

    // transactions
    public function transactions()
    {
        $transactions = Auth::user()->transactions()->paginate(10);

        return view('users.transactions', compact('transactions'));
    }

    // logout
    public function logout()
    {
        // logout
        Auth::logout();

        // redirect ke login
        return redirect()->route(
            'login',
            [
                'locale' => app()->getLocale()
            ]
        )->with('success', 'Logout success');
    }
}
