<!--=====// Pageform section //=====-->

<section class=" solution_contact_wrapper">
    <div class="container" id="Contact">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-5 col-sm-12">
                <div class="thing_together_wrapper">
                    <h4>
                        <span class="why_Choose_lineTop">L</span>et’s do big things together.
                    </h4>
                    <h5>{{ optional($setting)->site_name }}</h5>
                    <p>{{ optional($setting)->site_slogan }}</p>
                    <p>{{ !empty($setting->address) ? $setting->address : '' }}</p>
                    <p>{{ optional($setting)->address_line_one }}</p>
                    <p>{{ optional($setting)->address_line_two }}</p>
                    <p><strong>Email: </strong>{{ optional($setting)->support_email }}</p>
                    <p><strong>Phone: </strong>{{ optional($setting)->primary_phone }}</p>
                    <!-- <h5><i class="fa-solid fa-phone"></i>NgenIT</h5> -->
                </div>
            </div>
            <!----------Sidebar Privacy Policy --------->
            <div class="col-lg-7 col-sm-12">
                <!-- form Sidebar -->
                <div class="background">
                    <div class="containers">
                        <div class="screen">
                            <div class="screen-header">
                                <div class="screen-header-left">
                                    <div class="screen-header-button maximize"></div>
                                    <div class="screen-header-button minimize"></div>
                                </div>
                                <div class="screen-header-right">
                                    <div class="screen-header-ellipsis"></div>
                                    <div class="screen-header-ellipsis"></div>
                                    <div class="screen-header-ellipsis"></div>
                                </div>
                            </div>
                            <div class="screen-body">
                                <div class="screen-body-item left">
                                    <div class="app-title">
                                        <span>CONTACT</span>
                                        <span>US</span>
                                    </div>
                                </div>
                                <form id="myform" action="{{ route('contactus.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="screen-body-item screen-body-item-right">
                                        <div class="app-form row">
                                            <div class="app-form-group">
                                                <input type="hidden" name="type" value="contact">
                                                <input name="name" class="app-form-control" placeholder="Full NAME"
                                                    value="{{ old('name') }}" required>
                                            </div>
                                            <div class="app-form-group">
                                                <input name="email" class="app-form-control" placeholder="EMAIL Id"
                                                    value="{{ old('email') }}" required>
                                            </div>
                                            <div class="app-form-group">
                                                <input name="phone" class="app-form-control" placeholder="CONTACT NO"
                                                    value="{{ old('phone') }}">
                                            </div>
                                            <div class="app-form-group message">
                                                <textarea name="message" class="app-form-control" rows="3" placeholder="Your Message"></textarea>

                                            </div>
                                            <div class="app-form-group buttons">
                                                <button class="app-form-button"
                                                    type="submit"><strong>SEND</strong></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!---------End -------->
