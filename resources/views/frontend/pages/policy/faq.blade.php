@extends('frontend.master')
@section('content')
    <!--======// Header Title //======-->
    <section>
        <div>
            <img class="page_top_banner" src="{{ asset('frontend/images/faq.jpg') }}" alt="NGEN IT FAQ">
        </div>
    </section>
    <!----------End--------->
    <section class="header mb-4">
        <div class="container py-4">
            <div class="py-4">
                <h4 class="text-center"><span class="faqs_title_border_top">Do Y</span>ou Have Any Quest<span
                        class="faqs_title_border_bottom">ion ?</span></h4>
            </div>
            <div class="row faq-area">
                <div class="col-md-12 px-0">
                    <div class="container px-0">
                        <div id="accordion">
                            <div class="border-0">
                                @foreach ($faqs as $subKey => $faq)
                                    <div class="card-header p-0 border-0 mb-2 mt-1" id="heading-{{ $faq->id }}">
                                        <button
                                            class="btn btn-link accordion-title border-0 collapse rounded-0 {{ $subKey === 0 ? 'show' : '' }}"
                                            data-toggle="collapse" data-target="#collapse-{{ $faq->id }}"
                                            aria-expanded="{{ $subKey === 0 ? 'true' : 'false' }}"
                                            aria-controls="#collapse-{{ $faq->id }}">
                                            <i
                                                class="fas fa-plus text-center d-flex align-items-center justify-content-center h-100"></i>
                                            {{ $faq->question }}
                                        </button>
                                    </div>
                                    <div id="collapse-{{ $faq->id }}"
                                        class="collapse {{ $subKey === 0 ? 'show' : '' }} mb-3"
                                        aria-labelledby="heading-{{ $faq->id }}" data-parent="#accordion">
                                        <div class="card-body accordion-body">
                                            <p style="font-size: 13px; font-weight: 500; text-align: justify;">
                                                {!! $faq->answer !!}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
