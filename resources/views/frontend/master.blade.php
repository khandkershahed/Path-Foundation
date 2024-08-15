<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Primary Meta Tags -->
<title>PATH Foundation</title>
<meta name="title" content="PATH Foundation" />
<meta name="description" content="Join PATH Foundation in its commitment to a harmonious Bangladesh, focusing on rule of law, environmental care, and equitable education for all communities." />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="https://metatags.io/" />
<meta property="og:title" content="PATH Foundation" />
<meta property="og:description" content="Join PATH Foundation in its commitment to a harmonious Bangladesh, focusing on rule of law, environmental care, and equitable education for all communities." />
<meta property="og:image" content="https://metatags.io/images/meta-tags.png" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="https://metatags.io/" />
<meta property="twitter:title" content="PATH Foundation" />
<meta property="twitter:description" content="Join PATH Foundation in its commitment to a harmonious Bangladesh, focusing on rule of law, environmental care, and equitable education for all communities." />
<meta property="twitter:image" content="https://metatags.io/images/meta-tags.png" />

<!-- Meta Tags Generated with https://metatags.io -->
    {{-- <script async data-id="9476858534" id="chatling-embed-script" type="text/javascript"
        src="https://chatling.ai/js/embed.js"></script> --}}


</head>
{{-- <body onload="myFunction()"> --}}

<body>
    <div id="loading" style="margin-top: 0rem !important"></div>

    <!--======// Nav Menu //========-->
    @include('frontend.partials.header')
    <!--------End---------->
    <div class="page-wrapper row p-0">
        @yield('content')
    </div>
    <!----------End--------->
    <!--=======// Footer Section//=========-->
    @if (Route::current() && Route::current()->getName() && str_contains(Route::current()->getName(), 'client'))
    @else
        @include('frontend.partials.footer')
    @endif

    <!--=======// Cookises Modals //=======-->
    {{-- @include('frontend.partials.cookies') --}}
    <!----------End--------->

    <!--=======// Feedback Modals //=======-->
    {{-- @include('frontend.partials.feedback') --}}
    <!----------End--------->

    <!--============///* USE LINK *///=============-->
    @include('frontend.partials.script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const preloader = document.getElementById('loading');

            setTimeout(function() {
                preloader.style.opacity = 0;
                setTimeout(function() {
                    preloader.style.display = "none";
                }, 100);
            }, 800);
        });
    </script>


    {{-- {{ \TawkTo::widgetCode() }} --}}




</body>

</html>
