<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--Title-->
<title>{{ !empty($setting->site_name) ? $setting->site_name : 'Path Bangladesh' }}</title>

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Primary Meta Tags -->
{{-- <title>PATH Bangladesh</title> --}}
<meta name="title" content="PATH Bangladesh" />
<meta name="description"
    content="Join PATH Bangladesh in its commitment to a harmonious Bangladesh, focusing on rule of law, environmental care, and equitable education for all communities." />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="https://pathbangladesh.org/" />
<meta property="og:title" content="PATH Bangladesh" />
<meta property="og:description"
    content="Join PATH Bangladesh in its commitment to a harmonious Bangladesh, focusing on rule of law, environmental care, and equitable education for all communities." />
<meta property="og:image"
    content="{{ !empty(optional($setting)->site_logo) && file_exists(public_path('storage/' . optional($setting)->site_logo)) ? asset('storage/' . optional($setting)->site_logo) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="https://pathbangladesh.org/" />
<meta property="twitter:title" content="PATH Bangladesh" />
<meta property="twitter:description"
    content="Join PATH Bangladesh in its commitment to a harmonious Bangladesh, focusing on rule of law, environmental care, and equitable education for all communities." />
<meta property="twitter:image"
    content="{{ !empty(optional($setting)->site_logo) && file_exists(public_path('storage/' . optional($setting)->site_logo)) ? asset('storage/' . optional($setting)->site_logo) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}" />

<!--Fav-Icon-->
<link rel="icon" type="image/x-icon"
    href="{{ !empty(optional($setting)->site_favicon) && file_exists(public_path('storage/' . optional($setting)->site_favicon)) ? asset('storage/' . optional($setting)->site_favicon) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}">





<!--CSS Start-->


<!-- slick slider -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/sliders/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/sliders/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/sliders/slick-theme.css') }}">

<!-- Library link -->
<link href="{{ asset('frontend/css/bootstrap/bootstrap@5.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('frontend/css/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/select-2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/toastr/toastr.min.css') }}">


<!-- Css link -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/custom_global.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/custom_responsive.css') }}">

{{-- Custom Style 6-7-2023 End --}}

@yield('styles')
<meta property="og:image:width" content="700"> {{-- Set the width of your image --}}
<meta property="og:image:height" content="630"> Set the height of your image
