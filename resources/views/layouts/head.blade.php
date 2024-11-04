<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ?? (session('locale') == 'id' ? 'Beranda' : 'Home') }}
        | COSTA Official Website</title>
    <meta name="description" content="{{ $description ?? 'COSTA Official Website' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- meta robots -->
    <meta name="robots" content="{{ $robots ?? 'index, follow' }}">

    <link rel="alternate" href="https://www.costa.co.id/" hreflang="x-default" />
    <link rel="alternate" href="https://www.costa.co.id/en/" hreflang="en" />

    <link rel="canonical" href="{{ $canonical ?? url()->current() }}" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <!-- Animate css -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Stroke Gap Icon css -->
    <link rel="stylesheet" href="{{ asset('css/stroke-gap.css') }}">
    <!-- Nice select css -->
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="{{ asset('css/meanmenu.min.css') }}">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- Fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">

    <!-- custom.css -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Modernizer js -->
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-60075KKGVN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-60075KKGVN');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KF3RTSR5');
    </script>
    <!-- End Google Tag Manager -->

    @yield('meta')

    <!-- Stack untuk CSS tambahan dari komponen -->
    @stack('styles')
</head>
