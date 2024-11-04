<?php

use App\Http\Controllers\AddressesController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RajaOngkirController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BiteShipController;
use App\Http\Controllers\DokuController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ShowcaseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [PageController::class, 'homeId'])->name('home.id');
Route::get('/categories/{slug}', [CategoryController::class, 'showBySlugId'])->name('categories.showBySlug.id');
Route::get('/products', [ProductController::class, 'indexId'])->name('products.id');
Route::get('/products/{slug}', [ProductController::class, 'showBySlugId'])->name('products.showBySlug.id');
Route::get('/blog', [BlogController::class, 'indexId'])->name('blogs.id');
Route::get('/blog/{slug}', [BlogController::class, 'showBySlugId'])->name('blogs.showBySlug.id');
Route::get('/affiliate', [PageController::class, 'affiliateId'])->name('affiliate.id');
Route::get('/become-reseller', [PageController::class, 'becomeResellerId'])->name('become-reseller.id');
Route::get('/contact-us', [PageController::class, 'contactUsId'])->name('contact-us.id');
Route::post('/contact-us', [PageController::class, 'contactUsPostId'])->name('contact-us.post.id');
Route::get('/contact-us/success', [PageController::class, 'contactUsSuccessId'])->name('contact-us.success.id');
Route::get('/partnerships', [PartnershipController::class, 'indexId'])->name('partnerships-page.id');


Route::get('/signup', [UserController::class, 'registerId'])->name('signup.id');
Route::get('/signup/{type?}', [UserController::class, 'registerId'])->name('signup.type.id');
Route::get('/verify-email', [UserController::class, 'verifyEmailId'])->name('signup.verifyEmail.id');
Route::get('/signup-success', [UserController::class, 'successId'])->name('signup.success.id');
Route::get('/verify/{code}', [UserController::class, 'verify'])->name('verify');
Route::get('/login', [UserController::class, 'loginId'])->name('login.id');
Route::post('/login', [UserController::class, 'authenticateId'])->name('authenticate.id');
Route::get('/about-us', [PageController::class, 'aboutUsId'])->name('about-us.id');
Route::get('/checkout', [OrderController::class, 'checkoutId'])->name('checkout.id');
Route::get('/confirmation', [OrderController::class, 'confirmationId'])->name('orders.confirmation.id');
Route::get('/thankyou/{code}', [OrderController::class, 'thankyouId'])->name('thankyou.id');
Route::get('/cart', [CartController::class, 'indexId'])->name('cart.id');

Route::get('/orders/success/{code}', [OrderController::class, 'successId'])->name('orders.success.id');
Route::get('/orders/{code}/invoice', [OrderController::class, 'invoiceId'])->name('orders.invoice.id');

Route::get('/product-validation', [PageController::class, 'validationId'])->name('product-validation.id');
Route::get('/author/{slug}', [AuthorController::class, 'showId'])->name('author.show.id');

// Route untuk Refund Policy dalam Bahasa Indonesia
Route::get('/refund-policy', [PageController::class, 'refundPolicyId'])->name('refund-policy.id');
Route::get('/faq', [PageController::class, 'faqId'])->name('faq.id');

Route::get('/rk/provinces', [RajaOngkirController::class, 'getProvinces'])->name('rajaongkir.provinces');
Route::get('/rk/cities/{province_id}', [RajaOngkirController::class, 'getCities'])->name('rajaongkir.cities');
Route::post('/rk/costs/{city_id}', [RajaOngkirController::class, 'getCosts'])->name('rajaongkir.costs');

Route::get('/showcase/{slug}', [ShowcaseController::class, 'showId'])->name('showcase.show.id');

Route::prefix('{locale}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware('setlocale')
    ->group(function () {
        // Route untuk Refund Policy
        Route::get('/refund-policy', [PageController::class, 'refundPolicy'])->name('refund-policy');
        Route::get('/faq', [PageController::class, 'faq'])->name('faq');

        // controller page, method home
        Route::get('/', [PageController::class, 'home'])->name('home');
        // categories controller
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        // categories by slug
        Route::get('/categories/{slug}', [CategoryController::class, 'showBySlug'])->name('categories.showBySlug');
        // product controller
        Route::get('/products', [ProductController::class, 'index'])->name('products');
        Route::get('/products/{slug}', [ProductController::class, 'showBySlug'])->name('products.showBySlug');
        // cart, checkout, wishlist
        Route::get('/cart', [CartController::class, 'index'])->name('cart');
        Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
        Route::get('/orders', [OrderController::class, 'index'])->name('orders');
        Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
        Route::get('/confirmation', [OrderController::class, 'confirmation'])->name('orders.confirmation');
        Route::get('/thankyou/{code}', [OrderController::class, 'thankyou'])->name('thankyou');
        Route::get('/orders/success/{code}', [OrderController::class, 'success'])->name('orders.success');
        Route::get('/orders/{code}/invoice', [OrderController::class, 'invoice'])->name('orders.invoice');

        Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

        Route::get('/affiliate', [PageController::class, 'affiliate'])->name('affiliate');
        Route::get('/become-reseller', [PageController::class, 'becomeReseller'])->name('become-reseller');
        Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contact-us');
        Route::post('/contact-us', [PageController::class, 'contactUsPost'])->name('contact-us.post');
        Route::get('/contact-us/success', [PageController::class, 'contactUsSuccess'])->name('contact-us.success');
        Route::get('/partnerships', [PartnershipController::class, 'index'])->name('partnerships-page');

        // blogs
        Route::get('/blog', [BlogController::class, 'index'])->name('blogs');
        Route::get('/blog/{slug}', [BlogController::class, 'showBySlug'])->name('blogs.showBySlug');

        // prototypes
        // get costa-collect
        Route::get('/costa-collect', function () {
            $categories = [];
            return view('pages.prototype.costa-collect', compact('categories'));
        });

        Route::get('/showcase/{slug}', [ShowcaseController::class, 'show'])->name('showcase.show');

        // buy
        Route::get('/buy', function () {
            $categories = [];
            return view('pages.prototype.buy', compact('categories'));
        });

        Route::get('/product-validation', [PageController::class, 'validation'])->name('product-validation');
        Route::post('/product-validation', [PageController::class, 'validationPost'])->name('product-validate');

        Route::get('/signup', [UserController::class, 'register'])->name('signup');
        Route::get('/signup/{type?}', [UserController::class, 'register'])->name('signup.type');
        Route::post('/signup', [UserController::class, 'store'])->name('signup.store');
        Route::get('/verify-email', [UserController::class, 'verifyEmail'])->name('signup.verifyEmail');
        Route::get('/signup-success', [UserController::class, 'success'])->name('signup.success');
        Route::get('/login', [UserController::class, 'login'])->name('login');
        Route::post('/login', [UserController::class, 'authenticate'])->name('authenticate');
        Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about-us');
        Route::get('/author/{slug}', [AuthorController::class, 'show'])->name('author.show');
    });
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/add-to-cart', [CartController::class, 'addToCart']);

// harus login dulu
Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', [UserController::class, 'account'])->name('account');
    Route::get('/my-account/edit', [UserController::class, 'edit'])->name('account.edit');
    Route::put('/my-account', [UserController::class, 'update'])->name('account.update');
    Route::get('/my-account/change-password', [UserController::class, 'changePassword'])->name('account.changePassword');
    Route::put('/my-account/change-password', [UserController::class, 'changePasswordUpdate'])->name('account.changePassword.update');
    Route::get('/my-transactions', [UserController::class, 'transactions'])->name('users.transactions');
    Route::get('/my-orders', [UserController::class, 'myOrders'])->name('users.my-orders');
    Route::get('/my-orders/{code}', [UserController::class, 'myOrdersShow'])->name('users.my-orders.show');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/affiliate-dashboard', [AffiliateController::class, 'dashboard'])->name('affiliate.dashboard');
    Route::get('/affiliate/links', [AffiliateController::class, 'links'])->name('affiliate.links');
    Route::get('/affiliate/link/{productId}/{userProductCode}', [AffiliateController::class, 'link'])->name('affiliate.link');
    Route::get('/affiliate/clicks', [AffiliateController::class, 'clicks'])->name('affiliate.clicks');
    Route::get('/affiliate/sales', [AffiliateController::class, 'sales'])->name('affiliate.sales');

    // addresses
    Route::get('addresses', [AddressesController::class, 'index'])->name('addresses.index');
    Route::get('addresses/create', [AddressesController::class, 'create'])->name('addresses.create');
    Route::post('addresses', [AddressesController::class, 'store'])->name('addresses.store');
    Route::get('addresses/{address}/edit', [AddressesController::class, 'edit'])->name('addresses.edit');
    Route::put('addresses/{address}', [AddressesController::class, 'update'])->name('addresses.update');
    Route::delete('addresses/{address}', [AddressesController::class, 'destroy'])->name('addresses.destroy');
    Route::post('addresses/{address}/set-default', [AddressesController::class, 'setDefault'])->name('addresses.setDefault');
});


Route::get('get-cities/{province_code}', [RegionController::class, 'getCities']);
Route::get('get-districts/{city_code}', [RegionController::class, 'getDistricts']);
Route::get('get-villages/{district_code}', [RegionController::class, 'getVillages']);

Route::get('/biteship/maps', [BiteShipController::class, 'maps']);
Route::post('/biteship/rates', [BiteShipController::class, 'rates']);

Route::get('/p/{affiliateCode}', [AffiliateController::class, 'linkRedirect'])->name('affiliate.link.redirect');

Route::get('/x/{affiliateCode}', [AffiliateController::class, 'affiliationClicked'])->name('affiliate.affiliation.clicked');

Route::get('/language/{locale}', function ($locale) {
    if (array_key_exists($locale, config('app.locales'))) {
        session(['locale' => $locale]);
        // set locale
        app()->setLocale($locale);
    }

    return back();
})->name('language');

Route::post('/notify/transfer-va', [PaymentController::class, 'transferNotify'])->name('payment.transferNotify');
Route::post('/notify/debit', [PaymentController::class, 'debitNotify'])->name('payment.debitNotify');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::post('/initiate-payment', [DokuController::class, 'initiatePayment']);
