@extends('frontend.master')
@section('content')
@section('styles')
    <meta property="og:title" content="NGen IT Ltd.">
    <!--<meta property="og:description" content="Description of your blog post">-->
    <meta property="og:image" content="{{ asset('storage/' . optional($home)->branner1) }}">
    <!--<meta property="og:url" content="URL to your blog post">-->
    <style>
        .training-featuer {
            background-color: #F3F4F8;
            border: 1px dashed #e5e6e7;
            /* border-radius: 0px; */
        }

        .feature-title {
            font-size: 45px;
            width: 50%;
            margin: auto;
            line-height: 1.3;
            text-align: center;
            font-weight: 600;
        }

        @media screen and (max-width: 769px) {
            .feature-title {
                font-size: 25px;
            }
        }

        .devider {
            margin: auto;
            padding: 3px;
            width: 70px;
            margin-top: 10px;
            height: 0px;
            background-color: #F2AF29;
        }

        .action-btnss {
            padding: 5px 65px;
            background-color: transparent;
            width: 12.5%;
        }

        .action-btnss-2 {
            padding: 10px 83px;
            background-color: white;
            width: 12.5%;
            border-radius: 5px;
        }

        .buttons-area {
            width: 40%;
            margin: auto;
        }
    </style>
@endsection
<section class="">
    <!--======// Banner Section //======-->
    @if (!empty(optional($home)->branner1) || !empty(optional($home)->branner2) || !empty(optional($home)->branner3))
        <section>
            <div class="Advance-Slider">
                <!-- Item -->
                @if (!empty(optional($home)->branner1))
                    <div class="item">
                        <div class="img-fill">
                            <img class="dots-img"
                                src="{{ isset(optional($home)->branner1) && file_exists(public_path('storage/' . optional($home)->branner1)) ? asset('storage/' . optional($home)->branner1) : asset('frontend/images/banner-demo.png') }}"
                                alt="">
                            <div class="contain-wrapper">
                                <div class="dots-contain">
                                    <img class="dots-img"
                                        src="{{ isset(optional($home)->branner1) && file_exists(public_path('storage/' . optional($home)->branner1)) ? asset('storage/' . optional($home)->branner1) : asset('frontend/images/banner-demo.png') }}"
                                        alt="">
                                </div>
                                <div class="info w-50 mb-3">
                                    @if (optional($home)->banner1_title)
                                        <div>
                                            <h3><strong>{{ optional($home)->banner1_title }}</strong></h3>
                                            <h5 class="text-white my-4 w-75 mx-auto">
                                                {{ optional($home)->banner1_short_description }}
                                            </h5>
                                        </div>
                                    @endif
                                    @if (optional($home)->banner1_button_link)
                                        <div class="my-4">
                                            <a class="btn-color"
                                                href="{{ optional($home)->banner1_button_link }}">{{ optional($home)->banner1_button_name }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- // Item -->

                <!-- Item -->
                @if (!empty(optional($home)->branner2))
                    <div class="item">
                        <div class="img-fill">
                            <img src="{{ isset(optional($home)->branner2) && file_exists(public_path('storage/' . optional($home)->branner2)) ? asset('storage/' . optional($home)->branner2) : asset('frontend/images/banner-demo.png') }} "
                                alt="">
                            <div class="contain-wrapper">
                                <div class="dots-contain">
                                    <img class="dots-img"
                                        src="{{ isset(optional($home)->branner2) && file_exists(public_path('storage/' . optional($home)->branner2)) ? asset('storage/' . optional($home)->branner1) : asset('frontend/images/banner-demo.png') }}"
                                        alt="">
                                </div>
                                <div class="info w-50 mb-3">
                                    @if (optional($home)->banner2_title)
                                        <div>
                                            <h3><strong>{{ optional($home)->banner2_title }}</strong></h3>
                                            <h5 class="text-white my-4 w-75 mx-auto">
                                                {{ optional($home)->banner2_short_description }}
                                            </h5>
                                        </div>
                                    @endif
                                    @if (optional($home)->banner2_button_link)
                                        <div class="my-4">
                                            <a class="btn-color"
                                                href="{{ optional($home)->banner2_button_link }}">{{ optional($home)->banner2_button_name }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- // Item -->

                <!-- Item -->
                @if (!empty(optional($home)->branner3))
                    <div class="item">
                        <div class="img-fill">
                            <img src="{{ isset(optional($home)->branner3) && file_exists(public_path('storage/' . optional($home)->branner3)) ? asset('storage/' . optional($home)->branner3) : asset('frontend/images/banner-demo.png') }} "
                                alt="">
                            <div class="contain-wrapper">
                                <div class="dots-contain">
                                    <img class="dots-img"
                                        src="{{ isset(optional($home)->branner3) && file_exists(public_path('storage/' . optional($home)->branner3)) ? asset('storage/' . optional($home)->branner1) : asset('frontend/images/banner-demo.png') }}"
                                        alt="">
                                </div>
                                <div class="info w-lg-50 mb-3">
                                    @if (optional($home)->banner3_title)
                                        <div>
                                            <h3><strong>{{ optional($home)->banner3_title }}</strong></h3>
                                            <h5 class="text-white my-4 w-lg-75 mx-auto">
                                                {{ optional($home)->banner3_short_description }}
                                            </h5>
                                        </div>
                                    @endif
                                    @if (optional($home)->banner3_button_link)
                                        <div class="my-4">
                                            <a class="btn-color"
                                                href="{{ optional($home)->banner3_button_link }}">{{ optional($home)->banner3_button_name }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- // Item -->
            </div>
        </section>
    @endif
    {{-- Banner Bottom Card --}}
    {{-- @if (!empty(optional($home)->btn1_title) && !empty(optional($home)->btn2_title))
        <div class="container px-lg-4 px-2">
            <div class="row gx-5 mx-auto banner_bottom_box">
                <div class="col px-2">
                    @if (!empty(optional($home)->btn1_title))
                        <div class="border bg-light custom_shadow px-lg-3 px-sm-1 home_banner_card">
                            <h2 class="text-center home_banner_card_title">{{ optional($home)->btn1_title }}</h2>
                            <div class="home_card_button d-flex justify-content-center pt-2">
                                <a class="home-btn"
                                    href="{{ optional($home)->btn1_link }}">{{ optional($home)->btn1_name }}</a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col px-2">
                    <div class="border bg-light custom_shadow px-lg-3 px-sm-1 home_banner_card">
                        <h2 class="text-center home_banner_card_title">{{ optional($home)->btn2_title }}</h2>
                        <div class="home_card_button d-flex justify-content-center pt-2">
                            <a class="home-btn"
                                href="{{ optional($home)->btn2_link }}">{{ optional($home)->btn2_name }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif --}}
    <!---------End -------->
</section>
<!--======// Action section //======-->
<section class="d-sm-none d-lg-block">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-1">

            </div>
            <div class="col-lg-2">
                <div class="card training-featuer">
                    <div class="card-body py-3 ">
                        <div class="d-flex justify-content-center flex-column text-center">
                            <div>
                                <img class="img-fluid" width="50px" src="{{asset('frontend/images/icons/01.jpg')}}"
                                    alt="">
                            </div>
                            <h6 class="fw-bolder pt-2">20+ Practice <br> Project</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card training-featuer">
                    <div class="card-body py-3 ">
                        <div class="d-flex justify-content-center flex-column text-center">
                            <div>
                                <img class="img-fluid" width="50px" src="{{asset('frontend/images/icons/02.jpg')}}"
                                    alt="">
                            </div>
                            <h6 class="fw-bolder pt-2">4 Month <br> Study Plan</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card training-featuer">
                    <div class="card-body py-3 ">
                        <div class="d-flex justify-content-center flex-column text-center">
                            <div>
                                <img class="img-fluid" width="50px" src="{{asset('frontend/images/icons/03.jpg')}}"
                                    alt="">
                            </div>
                            <h6 class="fw-bolder pt-2">After Course <br> Certificate</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card training-featuer">
                    <div class="card-body py-3 ">
                        <div class="d-flex justify-content-center flex-column text-center">
                            <div>
                                <img class="img-fluid" width="50px" src="{{asset('frontend/images/icons/04.jpg')}}"
                                    alt="">
                            </div>
                            <h6 class="fw-bolder pt-2">Lifetime Video <br> Access</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card training-featuer">
                    <div class="card-body py-3 ">
                        <div class="d-flex justify-content-center flex-column text-center">
                            <div>
                                <img class="img-fluid" width="50px" src="{{asset('frontend/images/icons/05.jpg')}}"
                                    alt="">
                            </div>
                            <h6 class="fw-bolder pt-2">Marketplace <br> Guideline</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="feature-title">Carrer Guideline With Job Market Guideline!</h1>
                <div class="devider"></div>
                <p class="text-center py-3 fs-6" style="color: #A4A4A6">We Offer Best Cources And Guideline In Your
                    Area.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="buttons-area py-4 pt-1">
                    <div class="p-2 py-3 text-center d-flex justify-content-between align-items-center"
                        style="background-color: #F3F4F8;border-radius: 5px;">
                        <div>
                            <a href="" class="action-btnss fw-bolder">
                                All Cources
                            </a>
                        </div>
                        <div>
                            <a href="" class="bg-white action-btnss-2 fw-bolder">
                                Scholarship
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="d-sm-block d-lg-none">
    <div class="container">
        <div class="row py-3">
            <div class="col-lg-12">
                <div class="trainingFeature">
                    <div class="item border-0">
                        <div class="card training-featuer mx-2">
                            <div class="card-body py-3 text-center">
                                <div class="d-flex justify-content-center flex-column text-center align-items-center">
                                    <div>
                                        <img class="img-fluid text-center" width="50px"
                                            src="{{asset('frontend/images/icons/01.jpg')}}" alt="">
                                    </div>
                                    <h6 class="fw-bolder pt-2">20+ Practice <br> Project</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-0">
                        <div class="card training-featuer mx-2">
                            <div class="card-body py-3 text-center">
                                <div class="d-flex justify-content-center flex-column text-center align-items-center">
                                    <div>
                                        <img class="img-fluid text-center" width="50px"
                                            src="{{asset('frontend/images/icons/02.jpg')}}" alt="">
                                    </div>
                                    <h6 class="fw-bolder pt-2">20+ Practice <br> Project</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-0">
                        <div class="card training-featuer mx-2">
                            <div class="card-body py-3 text-center">
                                <div class="d-flex justify-content-center flex-column text-center align-items-center">
                                    <div>
                                        <img class="img-fluid text-center" width="50px"
                                            src="{{asset('frontend/images/icons/03.jpg')}}" alt="">
                                    </div>
                                    <h6 class="fw-bolder pt-2">20+ Practice <br> Project</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-0">
                        <div class="card training-featuer mx-2">
                            <div class="card-body py-3 text-center">
                                <div class="d-flex justify-content-center flex-column text-center align-items-center">
                                    <div>
                                        <img class="img-fluid text-center" width="50px"
                                            src="{{asset('frontend/images/icons/04.jpg')}}" alt="">
                                    </div>
                                    <h6 class="fw-bolder pt-2">20+ Practice <br> Project</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-0">
                        <div class="card training-featuer mx-2">
                            <div class="card-body py-3 text-center">
                                <div class="d-flex justify-content-center flex-column text-center align-items-center">
                                    <div>
                                        <img class="img-fluid text-center" width="50px"
                                            src="{{asset('frontend/images/icons/05.jpg')}}" alt="">
                                    </div>
                                    <h6 class="fw-bolder pt-2">20+ Practice <br> Project</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="feature-title">Carrer Guideline With Job Market Guideline!</h1>
                <p class="text-center py-3">We Offer Best Cources And Guideline In Your Area</p>
            </div>
        </div>
    </div>
</section>
<!--======// Business section //======-->
<section class="">
    <div class="container">
        @if (!empty($features) && array_filter($features))
            <!-- home title -->
            <div class="row">
                @if (!empty(optional($home)->header1))
                    <div class="home_banner_bottom_title mx-auto py-3 px-lg-4">
                        <h6 class="home_title_heading home_banner_bt-title pb-2"> {{ optional($home)->header1 }}
                        </h6>
                        <p class="home_title_text">{{ optional($home)->header2 }}</p>
                    </div>
                @endif
            </div>
            <!-- business content -->
            @if (!empty($features))
                <div class="d-lg-block d-sm-none">
                    <div class="row d-flex justify-content-center">
                        @foreach ($features as $feature)
                            @if (!empty($feature))
                                <div class="custom_col-2 col-md-6 col-sm-12">
                                    <div class="text-center">
                                        <img class="img-fluid" height="85px"
                                            src="{{ !empty($feature->logo) && file_exists(public_path('storage/' . $feature->logo)) ? asset('storage/' . $feature->logo) : asset('frontend/images/service-no-img.png') }}"
                                            alt="NGEN IT">
                                        <h5 class="business_services pt-2">
                                            {{ Str::words($feature->badge, 10, $end = '') }}
                                        </h5>
                                    </div>
                                    <div class="feature_description">
                                        <p class="feature_descrip">{{ Str::words($feature->header, 12, $end = '') }}
                                        </p>
                                    </div>
                                    <a href="{{ route('feature.details', $feature->id) }}"
                                        class="business_item_button pt-3">
                                        <span>Learn More</span>
                                        <span class="business_item_button_icon">
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </span>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="row d-lg-none d-sm-block">
                    <div class="d-flex justify-content-center align-items-center px-3 mb-3 border-bottom">
                        <div class="text-start w-75">
                            <h3 class="main_color">Feature Contents</h3>
                        </div>
                        <div class="text-end w-25">
                            <a class="Arrows custom-responsive-slider-prev"><i
                                    class="fas fa-2x fa-arrow-alt-circle-left"></i></a>
                            <a class="Arrows custom-responsive-slider-next"><i
                                    class="fas fa-2x fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="owl-carousel custom-responsive-slider" style="z-index: 0 !important;">
                        @foreach ($features as $key => $feature)
                            @if (!empty($feature))
                                <div class="item">
                                    <div class="text-center">
                                        <div class="d-flex justify-content-center align-items-center story-mb">
                                            <img src="{{ !empty($feature->logo) && file_exists(public_path('storage/' . $feature->logo)) ? asset('storage/' . $feature->logo) : asset('frontend/images/service-no-img.png') }}"
                                                alt="NGEN IT" style="width: 80px;">
                                        </div>
                                        <h5 class="business_services pt-2">
                                            {{ Str::words($feature->badge, 10, $end = '') }}</h5>
                                    </div>
                                    <div class="feature_description">
                                        <p class="feature_descrip">{{ Str::words($feature->header, 12, $end = '') }}
                                        </p>
                                    </div>
                                    <a href="{{ route('feature.details', $feature->id) }}"
                                        class="business_item_button pt-3">
                                        <span>Learn More</span>
                                        <span class="business_item_button_icon">
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </span>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
            <!-- button -->
            @if (!empty($features))
                <div class="d-flex justify-content-center my-5">
                    <a class="btn-color" href="{{ route('learn.more') }}">Learn More</a>
                </div>
            @endif
        @endif
    </div>
</section>

<!---------End -------->
<!--=======// Shop product //======-->
{{-- <section class="spacer learn_more py-lg-3">
    <div class="container py-lg-5 py-4">
        <div class="row align-items-center">
            <!-- content -->
            <div class="col-lg-8 col-sm-12">
                <div class="home_shop_product_wrapper home_shop_product">
                    <h5> Shop Products and Hardware</h5>
                    <p class="text-justify w-75 w-sm-100">
                        Among More than
                        <strong class="main_color number-font" style="font-size:20px;">
                            {{ $productCount }}
                            <small>products</small>
                        </strong>
                        and
                        <strong class="main_color number-font" style="font-size:20px;">
                            {{ $brandCount }}
                            <small>brands</small>
                        </strong>
                        at your service, we can provide you with the tools
                        you need to succeed. Additionally, you may easily ask your exact requirements or contact us at
                        anytime.
                    </p>
                    <div class="mt-lg-5 mt-4 btn-area">
                        <a href="{{ route('shop.html') }}" class="btn-color">Explore Shop</a>
                    </div>
                </div>
            </div>
            <!-- product brand -->
            <div class="col-lg-4 col-sm-12 product_brand">
                <div>
                    <p class="fw-bold top-line-title"><span style="border-top: 4px solid #ae0a46;">Exp</span>lore
                        Categories
                    </p>

                    <div class="">
                        <a href="{{ route('all.brand') }}">
                            <div id="fed-bg">
                                <div class="p-2">
                                    <h3 class="text-white brand_side_text">Brands ›</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="pt-2">
                        <a href="{{ route('all.category') }}">
                            <div id="fed-bg">
                                <div class="p-2">
                                    <h3 class="text-white brand_side_text">Product Categories ›</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class=" pt-2">
                        <a href="{{ route('software.common') }}">
                            <div id="fed-bg">
                                <div class="p-2">
                                    <h3 class="text-white brand_side_text">Software ›</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class=" pt-2">
                        <a href="{{ route('hardware.common') }}">
                            <div id="fed-bg">
                                <div class="p-2">
                                    <h3 class="text-white brand_side_text">Hardware ›</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section> --}}
<!---------End -------->
<!--=======// Client Story //======-->
{{-- @if (!empty($story) | !empty($story2) | !empty($story3) | !empty($story4)) --}}
@if (!empty($storys) && array_filter($storys))
    <section>
        <div class="container my-4 mb-5 d-lg-block d-sm-none">
            <h2 class="text-center"><span class="main_color">Storys</span></h2>
            <div class="row">
                @foreach ($storys as $story)
                    @if (!empty($story))
                        <div class="col-lg-3">
                            <div class="client_story_box">
                                <div class="details-titles pt-4 ps-4 pb-3">
                                    <p class="pb-5">{{ $story->badge }}</p>
                                </div>
                                <div class="grid-river">
                                    <figure class="effect-oscar">
                                        <img src="{{ isset($story->image) && file_exists(public_path('storage/' . $story->image)) ? asset('storage/' . $story->image) : asset('frontend/images/banner-demo.png') }} "
                                            alt="">
                                        <figcaption>
                                            <h6> {{ Str::words($story->title, 6) }}</h6>
                                            <p>{{ Str::words($story->header, 10) }}</p>
                                            <h5 class="download-hover-btn">
                                                <a class="text-white"
                                                    href="{{ route('story.details', $story->id) }}">Read Story
                                                    <i class="fa-solid fa-chevron-right" style="font-size: 12px;"></i>
                                                </a>
                                            </h5>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="container my-4 mb-5 d-lg-none d-sm-block">
            <div class="d-flex justify-content-center align-items-center mx-3 border-bottom">
                <div class="text-start w-75">
                    <h3 class="main_color">Storys</h3>
                </div>
                <div class="text-end w-25">
                    <a class="Arrows custom-responsive-slider-prev"><i
                            class="fas fa-2x fa-arrow-alt-circle-left"></i></a>
                    <a class="Arrows custom-responsive-slider-next"><i
                            class="fas fa-2x fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>

            <div class="owl-carousel custom-responsive-slider" style="z-index: 0 !important;">
                @foreach ($storys as $key => $story)
                    <div class="item border-0">
                        @if (!empty($story))
                            <div class="client_story_box">
                                <div class="details-titles pt-3 ps-4 pb-3">
                                    <p class="pb-5">{{ $story->badge }}</p>
                                </div>
                                <div class="grid-river">
                                    <figure class="effect-oscar">
                                        <img src="{{ isset($story->image) && file_exists(public_path('storage/' . $story->image)) ? asset('storage/' . $story->image) : asset('frontend/images/banner-demo.png') }} "
                                            alt="">
                                        <figcaption>
                                            <h6> {{ Str::words($story->title, 6) }}</h6>
                                            <p>{{ Str::words($story->header, 10) }}</p>
                                            <h5 class="download-hover-btn">
                                                <a class="text-white"
                                                    href="{{ route('story.details', $story->id) }}">Read Story
                                                    <i class="fa-solid fa-chevron-right" style="font-size: 12px;"></i>
                                                </a>
                                            </h5>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
<!--======// Magazine Section //======-->
@if (!empty($techglossy))
    <section>
        <div class="container spacer">
            <div class="row bg-white magazine_content">
                <div class="col-lg-12">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="holder-main-text ps-5">
                                {{-- <h6>{{ $techglossy->badge }}</h6> --}}
                                <h6 class="title-tag text-capitalize">{{ $techglossy->badge }}</h6>
                                <h2 class="container-title">
                                    {{ $techglossy->title }}
                                </h2>
                                <p class="pt-3" style="text-align: justify">
                                    {!! Str::words(strip_tags($techglossy->short_des), 50) !!}
                                    {{-- {{ $techglossy->header }} --}}
                                </p>
                                <a href="{{ route('techglossy.details', $techglossy->id) }}"
                                    class="pt-3 business_item_button d-flex justify-content-start">
                                    <span>Read More</span>
                                    <span class="business_item_button_icon">
                                        <i class="fa-solid fa-arrow-right-long" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0 d-lg-block d-sm-none">
                            <div class="showcase-industry-bottom" style="position: relative; overflow: hidden;">
                                <!-- Add a pseudo-element for the overlay -->
                                <div class="gradient-overlay"></div>
                                <img class="img-fluid overlays-img"
                                    src="{{ isset($techglossy->image) && file_exists(public_path('storage/' . $techglossy->image)) ? asset('storage/' . $techglossy->image) : asset('frontend/images/banner-demo.png') }}"
                                    alt="Picture" style="border-top-right-radius: 60px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!----------End--------->
<!--=======// Popular products //======-->


<!---------End -------->
<!---------Our Success Section-------->

@if (!empty($successItems) && array_filter($successItems))
    <section class="success_section">
        <div class="container my-4 pb-4 d-lg-block d-sm-none">
            <h2 class="text-center pb-5">Our Success <span class="main_color">Starts With</span> Our Culture.</h2>
            <div class="row success-area">
                @foreach ($successItems as $key => $successItem)
                    @if (!empty($successItem->title))
                        <div class="col-lg-4">
                            <!---------Column  Content -------->
                            <div class="success-area-content">
                                <div class="pb-2">
                                    <img width="50px" src="{{ asset('storage/' . $successItem->image) }}"
                                        alt="">
                                </div>
                                <div class="success-divider-{{ $key }}"></div>
                                <h4 class="success-divider-title-{{ $key }} pb-2">{{ $successItem->title }}
                                </h4>
                                <p>{{ $successItem->description }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="container d-lg-none d-sm-block">
            <h3 class="text-center">Our Success <span class="main_color">Starts With</span> Our Culture.</h3>
            <div class="row">
                <div class="d-flex justify-content-between px-4">
                    <a class="Arrows custom-responsive-slider-prev"><i
                            class="fas fa-2x fa-arrow-alt-circle-left"></i></a>
                    <a class="Arrows custom-responsive-slider-next"><i
                            class="fas fa-2x fa-arrow-alt-circle-right"></i></a>
                </div>
                <div class="owl-carousel custom-responsive-slider" style="z-index: 0 !important;">
                    @foreach ($successItems as $key => $successItem)
                        @if (!empty($successItem->title))
                            <div class="item border-0">
                                <div class="success-area-content success-area-content-mobile">
                                    <div class="pb-2">
                                        <img src="{{ asset('storage/' . $successItem->image) }}" alt=""
                                            style="width: 50px;">
                                    </div>
                                    <div class="success-divider-{{ $key }}"></div>
                                    <h4 class="success-divider-title-{{ $key }} pb-2">
                                        {{ $successItem->title }}
                                    </h4>
                                    <p>{{ $successItem->description }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endif

<!---------End -------->
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('.trainingFeature').slick({
            autoplay: true,
            autoplaySpeed: 7000,
            speed: 1500,
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: false,
            pauseOnHover: false,
            infinite: false,
            prevArrow: false
        });
    });
</script>
@endpush
