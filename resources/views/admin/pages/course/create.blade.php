<x-admin-app-layout :title="'Course Create'">
    <div class="card card-flash">
        <div class="card-header">
            <div class="card-title">
            </div>

            <div class="card-toolbar">
                <a href="{{ route('admin.course.index') }}" class="btn btn-light-primary rounded-2">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                fill="currentColor" />
                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                fill="currentColor" />
                        </svg>
                    </span> Back to list
                </a>

            </div>
        </div>
        <div class="card-body">
            <form id="myform" method="post" action="{{ route('admin.course.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row p-1">

                        <div class="card">
                            <div class="row">

                                <div class="col-8 rounded bg-light p-3">
                                    <div class="row">

                                        <div class="col-lg-12 col-sm-12 mb-3">
                                            <span class="mt-1 fw-bold text-info">Course Section</span>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Course Name</label>
                                                <input type="text" name="name" placeholder="Corse Name" class="form-control form-control-sm" value="{{ old('name') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-6 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Tags</label>
                                                <input type="text" name="name" placeholder="" class="form-control form-control-sm" value="{{ old('tags') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-4 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Lecture</label>
                                                <input type="text" name="lecture" placeholder="25 Leacture" class="form-control form-control-sm" value="{{ old('lecture') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Project</label>
                                                <input type="text" name="project" placeholder="Five Project" class="form-control form-control-sm" value="{{ old('project') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Course Duration</label>
                                                <input type="text" name="course_duration" placeholder="6 Months" class="form-control form-control-sm" value="{{ old('course_duration') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Course Time</label>
                                                <input type="text" name="course_time" placeholder="Eg: 2.00-4.00 Pm (Sat-Fri)" class="form-control form-control-sm" value="{{ old('course_time') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Available Seats</label>
                                                <input type="text" name="available_seats" placeholder="Eg: 10" class="form-control form-control-sm" value="{{ old('available_seats') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Price</label>
                                                <input type="text" name="price" placeholder="Eg:20000" class="form-control form-control-sm" value="{{ old('price') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Discount Price</label>
                                                <input type="text" name="discount_price" placeholder="Eg:10000" class="form-control form-control-sm" value="{{ old('discount_price') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Online Price</label>
                                                <input type="text" name="online_price" placeholder="Eg:5000" class="form-control form-control-sm" value="{{ old('online_price') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Discount Start Date</label>
                                                <input type="date" name="discount_start_date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control form-control-sm">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Discount End Date</label>
                                                <input type="date" name="discount_end_date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control form-control-sm">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Class Start Date</label>
                                                <input type="date" name="class_start_date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control form-control-sm">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Class End Date</label>
                                                <input type="date" name="class_end_date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control form-control-sm">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Registration Start Date</label>
                                                <input type="date" name="registration_start_date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control form-control-sm">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Registration End Date</label>
                                                <input type="date" name="registration_end_date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control form-control-sm">
                                            </div>
                                        </div>
            
                                    </div>
                                </div>

                                <div class="col-4 rounded bg-light p-3">
                                    <div class="row">

                                        <div class="col-lg-12 col-sm-12 mb-3">
                                            <span class="mt-1 fw-bold text-info">Course Section</span>
                                        </div>

            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Course Duration</label>
                                                <input type="text" name="course_duration" placeholder="6 Months" class="form-control form-control-sm" value="{{ old('course_duration') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Course Time</label>
                                                <input type="text" name="course_time" placeholder="Eg: 2.00-4.00 Pm (Sat-Fri)" class="form-control form-control-sm" value="{{ old('course_time') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Available Seats</label>
                                                <input type="text" name="available_seats" placeholder="Eg: 10" class="form-control form-control-sm" value="{{ old('available_seats') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Price</label>
                                                <input type="text" name="price" placeholder="Eg:20000" class="form-control form-control-sm" value="{{ old('price') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Discount Price</label>
                                                <input type="text" name="discount_price" placeholder="Eg:10000" class="form-control form-control-sm" value="{{ old('discount_price') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Online Price</label>
                                                <input type="text" name="online_price" placeholder="Eg:5000" class="form-control form-control-sm" value="{{ old('online_price') }}">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Discount Start Date</label>
                                                <input type="date" name="discount_start_date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control form-control-sm">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Discount End Date</label>
                                                <input type="date" name="discount_end_date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control form-control-sm">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Class Start Date</label>
                                                <input type="date" name="class_start_date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control form-control-sm">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Class End Date</label>
                                                <input type="date" name="class_end_date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control form-control-sm">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Registration Start Date</label>
                                                <input type="date" name="registration_start_date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control form-control-sm">
                                            </div>
                                        </div>
            
                                        <div class="col-3 mb-3">
                                            <div class="form-group">
                                                <label for="" class="mb-2">Registration End Date</label>
                                                <input type="date" name="registration_end_date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control form-control-sm">
                                            </div>
                                        </div>
            
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-8 col-sm-12 bg-light rounded-2">
                            
                            <div class="row">
                                <div class="col-lg-6 pb-7">
                                    <div class="row pb-7">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Name</span>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="name"
                                                class="form-control form-control-sm" maxlength="255" placeholder="Course Name" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row pb-7">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Title</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <input type="text" name="title" class="form-control form-control-sm"
                                                maxlength="255" placeholder="Feature Title" required />
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row pb-7">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Logo</span>
                                        </div>
                                        <div class="col-lg-10 col-sm-12">
                                            <input type="file" name="logo" class="form-control form-control-sm"
                                                id="image" accept="image/*" />
                                        </div>
                                        <div class="col-lg-2 col-sm-12 text-end">
                                            <img id="showImage" height="25px" width="25px"
                                                src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png"
                                                alt="">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="row pb-7">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Banner Image</span>
                                        </div>
                                        <div class="col-lg-10 col-sm-12">
                                            <input type="file" name="image" class="form-control form-control-sm"
                                                id="image1" accept="image/*" />
                                        </div>
                                        <div class="col-lg-2 col-sm-12 text-end">
                                            <img id="showImage1" height="25px" width="25px"
                                                src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 pb-7">
                                    <div class="row pb-7">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Short Description</span>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <textarea name="header" class="form-control form-control-sm" rows="3" style=" font-size: 12px; font-weight: 500;"
                                                placeholder="Short Description For Homepage"></textarea>
                                        </div>
                                    </div>
                                    <div class="row pb-7">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Banner Button name</span>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="banner_btn_name"
                                                class="form-control form-control-sm" maxlength="255"
                                                placeholder="Button name" required />
                                        </div>
                                    </div>
                                    <div class="row pb-7">
                                        <div class="col-lg-12 col-sm-12">
                                            <span>Banner Button link</span>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="banner_btn_link"
                                                class="form-control form-control-sm" maxlength="255"
                                                placeholder="Button link" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <span class="mt-1 fw-bold text-info">Description</span>
                            <div class="px-2 py-2 rounded bg-light ">

                                <div class="row pb-7 justify-content-center">
                                    <div class="col-lg-4 col-sm-12">
                                        <span title="Row With List">Row with List</span>
                                    </div>
                                    <div class="col-lg-8 col-sm-12">
                                        <select name="row_one_id" data-placeholder="Select Row One.."
                                            class="form-select" data-control="select2" data-placeholder="Select an option" style="width: 100%;">
                                            
                                                <option class="form-control" value=""></option>
                                            
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 mt-2">
                            <span class="mt-1 fw-bold text-info">Background Image Row</span>
                            <div class="px-2 py-2 rounded bg-light">
                                {{--  --}}
                                <div class="row pb-7">
                                    <div class="col-lg-4 col-sm-12">
                                        <span>Title</span>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="text" name="row_four_title"
                                            class="form-control form-control-sm" maxlength="255"
                                            placeholder="Feature Title" required />
                                    </div>
                                </div>

                                {{--  --}}

                                <div class="row pb-7">
                                    <div class="col-lg-12 col-sm-12">
                                        <span>Background Image(Row Three) </span>
                                    </div>
                                    <div class="col-lg-11 col-sm-12">
                                        <input type="file" name="row_four_image"
                                            class="form-control form-control-sm" id="image" accept="image/*" />
                                    </div>
                                    <div class="col-lg-1 col-sm-12 text-end">
                                        <img id="showImage" height="25px" width="25px"
                                            src="https://cdn.pixabay.com/photo/2017/02/07/02/16/cloud-2044823_960_720.png"
                                            alt="">
                                    </div>
                                </div>
                                <div class="row pb-7">
                                    <div class="col-lg-4 col-sm-12">
                                        <span>Short Description</span>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <textarea name="row_four_header" id="" class="form-control" cols="30" rows="8"
                                            placeholder="Short Description for Contact"></textarea>
                                    </div>
                                </div>

                                {{--  --}}


                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 mt-2">
                            <span class="mt-1 fw-bold text-info">Background Color Row</span>
                            <div class="px-2 py-2 rounded bg-light">
                                <div class="row pb-7">
                                    <div class="col-lg-12 col-sm-12">
                                        <span>Row Five Title</span>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <input type="text" name="row_three_title"
                                            class="form-control form-control-sm" maxlength="255"
                                            placeholder="Row Three Title" />
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row pb-7">
                                    <div class="col-lg-12 col-sm-12">
                                        <span>Row Five Short Description</span>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <textarea name="row_three_header" id="" class="form-control" cols="30" rows="1"
                                            placeholder="Row Three Short Description"></textarea>
                                    </div>
                                </div>


                            </div>
                            <span class="mt-1 fw-bold text-info">More Feature Row</span>
                            <div class="px-2 py-2 rounded bg-light">
                                <div class="row pb-7">
                                    <div class="col-lg-12 col-sm-12">
                                        <span>Row Seven Title</span>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <input type="text" name="row_five_title"
                                            class="form-control form-control-sm maxlength" maxlength="255"
                                            placeholder="Related Feature Row Title" />
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row pb-7">
                                    <div class="col-lg-12 col-sm-12">
                                        <span>Row Seven Short Description</span>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <textarea name="row_five_header" id="" class="form-control" cols="30" rows="1"
                                            placeholder="Related Feature Row Short Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                    <div class="row">
                        <div class="col">
                            <div class="row py-7">
                                <div class="col-lg-12 col-sm-12">
                                    <span>Footer</span>
                                    <textarea class="form-control" name="footer" id="footer" style=" font-size: 12px; font-weight: 500;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-4 text-secondary">
                        <button type="submit" class="btn btn-primary" id="submitbtn">Submit<i
                                class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </div>


            </form>
        </div>

    </div>

    @push('scripts')
        <script></script>
    @endpush
</x-admin-app-layout>
