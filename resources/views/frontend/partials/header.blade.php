<section class="main_header_area">

    <div class="row px-2">
        <nav class="navbar navbar-expand-lg p-2 main-navbar bg-white menu-section">
            <div class="container-fluid d-flex align-items-center">

                <a class="navbar-brand fw-bold main-logo ms-4" href="{{ route('homepage') }}">
                    <img class="img-fluid site-main-logo"
                        src="{{ !empty(optional($setting)->site_logo) && file_exists(public_path('storage/' . optional($setting)->site_logo)) ? asset('storage/' . optional($setting)->site_logo) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}"
                        alt="Path Foundation">
                </a>

                <a href="javascript:void(0)" class="nvabar-toggler tab_btn_icon upper-content-menu d-lg-none"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#rightOffcanvas"
                    aria-controls="rightOffcanvas">
                    <i class="fa-solid fa-bars main_color" style="font-size: 15px !important;"></i>
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <hr>
                        <li class="nav-item dropdown position-static main-menu-spacing">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item pe-3">
                                    <a class="nav-link pe-0" href="{{ route('homepage') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item pe-3">
                                    <a class="nav-link pe-0" href="{{ route('about') }}">
                                        About Us
                                    </a>
                                </li>
                                <li class="nav-item pe-3">
                                    <a class="nav-link pe-0" href="{{ route('whatwedo') }}">
                                        What We Do
                                    </a>
                                </li>
                                <li class="nav-item pe-3">
                                    <a class="nav-link pe-0" href="{{ route('learn.more') }}">
                                        Our Projects
                                    </a>
                                </li>
                                <li class="nav-item pe-3">
                                    <a class="nav-link pe-0" href="{{ route('researchReport') }}">
                                        Research & Reports
                                    </a>
                                </li>
                            </ul>
                        </li>
                </div>
            </div>
        </nav>
    </div>
</section>


{{-- Mobile Menu Offcanvas --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="rightOffcanvas" aria-labelledby="rightOffcanvasLabel">
    <div class="offcanvas-header">
        <a class="navbar-brand fw-bold upper-content-menu main-logo ms-4" href="{{ route('homepage') }}">
            <img height="50px"
                src="{{ !empty(optional($setting)->site_logo) && file_exists(public_path('storage/' . optional($setting)->site_logo)) ? asset('storage/' . optional($setting)->site_logo) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}"
                alt="Path Foundation">
        </a>



        <button class="offcanvas-icons upper-content-menu text-reset" data-bs-dismiss="offcanvas" aria-label="Close"
            style="padding-left: none !important;">
            <i class="fa-solid fa-xmark" style="font-size: 18px !important;"></i>
        </button>
    </div>
    <div class="offcanvas-body pt-0 px-0">
        <div>

            <hr>
            <ul class="navbar-nav justify-content-end flex-grow-1 mt-0 ps-4">
                <li class="nav-item dropdown cool-link">
                    <a class="nav-link" href="{{ route('homepage') }}" role="button">
                        Home
                    </a>
                </li>
                <li class="nav-item dropdown cool-link">
                    <a class="nav-link" href="{{ route('about') }}" role="button">
                        About Us
                    </a>
                </li>
                <li class="nav-item dropdown cool-link">
                    <a class="nav-link" href="{{ route('whatwedo') }}" role="button">
                        What We Do
                    </a>
                </li>
                <li class="nav-item dropdown cool-link">
                    <a class="nav-link" href="{{ route('learn.more') }}" role="button">
                        Our Projects
                    </a>
                </li>
                <li class="nav-item dropdown cool-link">
                    <a class="nav-link" href="{{ route('researchReport') }}" role="button">
                        Research & Reports
                    </a>
                </li>

            </ul>

        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all dropdown links
        var dropdownLinks = document.querySelectorAll('.navbar-nav .nav-link');

        // Add click event listener to each dropdown link
        dropdownLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                // Remove the 'active' class from all dropdown links
                dropdownLinks.forEach(function(otherLink) {
                    otherLink.parentNode.classList.remove('active');
                });

                // Add the 'active' class to the clicked dropdown link's parent
                this.parentNode.classList.add('active');
            });
        });

        // Add an event listener for when the dropdown is hidden
        document.querySelector('.navbar-nav').addEventListener('hidden.bs.dropdown', function() {
            // Remove the 'active' class from all dropdown links when the dropdown is hidden
            dropdownLinks.forEach(function(link) {
                link.parentNode.classList.remove('active');
            });
        });
    });
</script>
