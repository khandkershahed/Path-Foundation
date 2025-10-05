<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')

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

    <!--============///* USE LINK *///=============-->
    @include('frontend.partials.script')
    {!! Toastr::message() !!}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const preloader = document.getElementById('loading');

            setTimeout(function() {
                preloader.style.opacity = 0;
                setTimeout(function() {
                    preloader.style.display = "none";
                }, 100);
            }, 500);
        });
    </script>


    {{-- {{ \TawkTo::widgetCode() }} --}}




</body>

</html>
