@extends('frontend.master')
@section('content')

    {{-- Blog Updated  --}}
    <style>
        .blog_header {
            background-image: url(../images/buy-category-hero.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /* padding: 180px 0px; */
            height: 360px;
        }

        .special_character {
            color: #ae0a46;
            font-weight: bold;
        }

        .date_blog {
            font-family: 'Poppins', sans-serif !important;
        }

        .blog_feature_description {
            border-left: 5px solid #ae0a46;
            border-right: 5px solid #ae0a46;
            padding: 20px 20px 20px;
            overflow-wrap: break-word;
            text-align: justify;
            background-color: #f7f6f5;
        }

        .blog_feature_extra {
            text-align: justify;
        }

        .tag_btn {
            background-color: #f7f6f5;
            color: black;
            font-size: 13px;
            padding: 5px;
        }

        .tag_title {
            background-color: #ae0a46;
            color: #fff;
        }

        .blogins_tags a {
            color: #808080;
        }
    </style>

    <!--======// Header Title //======-->
    <section class="blog_header"
        style="background-image: url('{{ !empty($blog->banner_image) && file_exists(public_path('storage/' . $blog->banner_image)) ? asset('storage/' . $blog->banner_image) : asset('frontend/images/no-banner(1920-330).png') }}');">
        <h1 class="text-center text-white pt-5">{{ $blog->badge }}</h1>
        <div class="container ">
            <div class="row ">
            </div>
        </div>
    </section>
    <!----------End--------->
    {{-- @php
        $last_word = end($tags);
    @endphp --}}
    <!--======// Home Cart Section //======-->
    <section class="">
        <div class="container">
            <!-- wrapper -->
            <div class="row m-0">
                <!-- home card item -->
                <div class="col-lg-12 col-sm-12 shadow-lg px-5 py-3 text-center  bg-white" style="margin-top: -4.5rem; ">
                    <h1> {{ $blog->title }}</h1>
                    <div class="d-flex justify-content-between">

                        <p>By
                            <span
                                class="special_character">{{ !empty($blog->author) ? $blog->author : 'PATH BANGLADESH' }}</span>
                            <span class="date_blog">/ {{ $blog->created_at->format('D M, Y') }} /
                            </span>
                            @if (!empty($blog->tags))
                                Topics :
                                @foreach (json_decode($blog->tags) as $item)
                                    <span class="special_character"><i class="fa-regular fa-bookmark"></i>
                                        {{ $item }} , </span>
                                @endforeach
                                {{-- <span class="special_character"><i class="fa-regular fa-bookmark"></i> {{ $last_word }}
                                </span> --}}
                            @endif
                        </p>
                        {{-- <div class="bySocial col-3">
                            <ul class="social-icon-links pull-right" style="font-size: 1.5rem;">
                                {!! Share::page(url('/blog/' . $blog->id . '/details'))->facebook()->twitter()->whatsapp() !!}
                            </ul>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- home card end -->
    @if ($blog->header)
        <section>
            <div class="container mt-5 px-2">
                <div class="row m-0">
                    <div class="col-4 d-flex justify-content-start ms-2" style="border-top: 4px dotted red">

                    </div>
                </div>
                <div class="row m-0 px-3">
                    <div class="col-12 d-flex justify-content-center border-top-info">
                        <h4 class="text-center py-4">{!! $blog->header !!}</h4>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-4 ">

                    </div>
                    <div class="col-4 ">

                    </div>

                    <div class="col-4" style="border-bottom: 4px dotted red">

                    </div>
                </div>
            </div>
        </section>
    @endif
    <section>
        <div class="container mt-5 mb-3">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12">
                    @if ($blog->short_des)
                        <div class="blog_feature_description">
                            <p>{!! $blog->short_des !!}</p>
                        </div>
                    @endif
                    @if ($blog->long_des)
                        <div>
                            <div class="blog_feature_extra py-5">
                                <p>{!! $blog->long_des !!}</p>
                            </div>
                        </div>
                    @endif
                    @if (!empty($blog->footer))
                        <div class="mb-5">
                            <div class="callout m-0 p-4 text-center">
                                <p><strong>{!! $blog->footer !!} </strong></p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 ">
                    {{-- Releted Solution --}}
                    @if (!empty($blog->tags))
                        <div class="border my-3 ">
                            <h4 class="text-center py-1 tag_title">TAGS</h4>
                            <div class="text-start p-2">
                                @foreach ($tags as $item)
                                    <a href="" class=" text-black">#{{ $item }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>



@endsection
