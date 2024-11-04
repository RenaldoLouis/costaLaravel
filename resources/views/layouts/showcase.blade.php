<!doctype html>
<html class="no-js" lang="{{ !empty(session('locale')) ? session('locale') : 'id' }}">

@include('layouts.head')

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KF3RTSR5" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!--[if lte IE 9]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
 <![endif]-->

    <!-- Main Wrapper Start Here -->
    <div class="wrapper">
        {{-- @include('layouts.newsletter') --}}

        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')

        <div class="whatsapp-icon">
            <a href="https://wa.me/{{ setting('website_whatsapp') }}" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
            </a>
        </div>
    </div>
    <!-- Main Wrapper End Here -->
    @include('layouts.scripts')

    <!-- Inisialisasi ScrollMagic Controller dan simpan di global scope -->
    <script>
        window.scrollMagicController = new ScrollMagic.Controller();
    </script>


    <!-- Stack untuk JavaScript tambahan dari komponen -->
    @stack('scripts')

</body>

</html>
