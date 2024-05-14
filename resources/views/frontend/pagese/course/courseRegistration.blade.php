@extends('frontend.master')
@section('content')
    <style>
        .showcase-courses {
            width: 100%;
            height: 300px;
            position: relative;
            color: white;
            text-align: center;
        }

        .showcase-courses img {
            width: 100%;
            height: 100%;
            position: absolute;
            object-fit: cover;
            /* Make the image cover the entire area */
            top: 0;
            left: 0;
            z-index: 99;
        }

        .showcase-courses .overlay-courses {
            width: 100%;
            height: 300px;
            background-color: rgba(0, 35, 82, 0.7);
            position: absolute;
            top: 0;
            left: 0;
            z-index: 99;
        }

        .showcase-courses h2 {
            margin-top: 100px;
            font-size: 3em;
        }

        .showcase-courses p {
            margin-top: 8px;
            font-size: 1.2em;
        }

        .page_title {
            font-size: 50px;
            text-align: center;
            color: white;
            font-weight: bold;
        }

        .form-title {
            font-size: 30px;
            font-weight: 600;
        }

        .form-desc {
            font-size: 16px;
        }

        .form-area {
            padding: 40px;
            border-radius: 12px;
            border: 1px solid #686868;
        }

        .form-color {
            font-size: 15px;
            font-weight: 400;
            background-color: #111E30 !important;
            padding-bottom: 13px !important;
            border-radius: 5px;
            border: 1px solid #FFFFFF33;
            color: white;
        }

        .form-color:focus {
            font-size: 15px;
            font-weight: 400;
            background-color: #111E30 !important;
            padding-bottom: 13px !important;
            border-radius: 5px;
            color: white;
            border: 1px solid #FFFFFF33;
        }

        .input-field-gap {
            margin-bottom: 14px;
        }

        .form-select:focus {
            box-shadow: none;
            outline: none;
        }

        .form-side-area {
            border-radius: 12px;
        }

        .sidebar-content {
            background-color: rgb(217 217 217 / 70%);
            width: 464px;
            height: 104px;
            position: relative;
            margin-top: -130px;
            padding: 18px 15px 5px;
            border-radius: 11px;
        }

        .sidebar-areas {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        @media (max-width: 768px) {
            .page_title {
                font-size: 40px;
            }

            .form-title {
                font-size: 20px;
                font-weight: 600;
            }

            .showcase-courses h2 {
                margin-top: 45px;
                font-size: 2.7em;
            }
        }
    </style>
    <section class="showcase-courses">
        <img src="https://promisetrainingglobal.com/wp-content/uploads/2019/03/course-banner.jpg?id=8892" alt="Picture">
        <div class="overlay-courses">
            <h2>Course Registration</h2>
            <p>One-Stop Learning &amp; Development Solutions</p>
        </div>
    </section>
    <section style="background-color: #051225;">
        <div class="container py-lg-5 py-3">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class=" pb-lg-5 pb-3">
                        <h1 class="page_title">Get Scholarship</h1>
                        <p class="text-center text-white">Strategies to Maximize Financial Aid Opportunities for Course
                            Enrollment</p>
                    </div>
                </div>
            </div> --}}
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="col-lg-6 form-area">
                                <div class="input-field-gap">
                                    <h2 class="text-white form-title">Let’s connect constellations</h2>
                                    <p class="text-white form-desc">Let's align our constellations! Reach out and let the
                                        magic of collaboration illuminate our skies.</p>
                                </div>
                                <div class="input-field-gap">
                                    <input type="text" class="form-control form-color" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="name" placeholder="Your Name Here">
                                </div>
                                <div class="input-field-gap">
                                    <input type="text" class="form-control form-color" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="email" placeholder="Email Id:example@example.com">
                                </div>
                                <div class="input-field-gap">
                                    <input type="text" class="form-control form-color" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="phone" placeholder="Phone;Eg:017*******">
                                </div>
                                <div class="input-field-gap">
                                    <select class="form-select form-color" name="course_id" aria-label="Select Course" placeholder="Select Course">
                                        <option value="" disabled selected>Select Course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{$course->id}}">{{$course->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-field-gap">
                                    <textarea class="form-control form-color" name="address" rows="3"
                                        placeholder="Your Address"></textarea>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-white w-100">Submit</button>
                                </div>
                            </div>
                            <div class="col-lg-6 d-lg-block d-sm-none">
                                <div class="sidebar-areas">
                                    <img class="form-side-area" width="516px" height="580px"
                                        src="https://s3-alpha-sig.figma.com/img/e06f/81ea/ca7373a32f6ed29f5b5f2700f7440159?Expires=1716163200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=QMmGlf6A86NGhvbQsjuT9fW-vCTRFHD-6fIOUg7DYnPV0LoNOQdstOCyehUaSKDtEJ2B-WT8l-CmtT8tKAQBfnEzW6FuKY5gv-QFJIiGEf8oCXN-mTiDQgJcUaSUyZUILTmDNfvO6ul6dHMtQEjuQd7MRHXZsL-AqTAP7AAft4GUAgJn~AflAzAdaIqWVdRmcl2emt7-Prgaki-Iy3yLFjH-q2vNX1BpPPnYGwXTzInK61ORqH8UxR8oG1geVBsBe2ioKVdHJ6jaS5MytjBfdxlZUzxWf~91T1Oe7xIMujQ78A5Ji5GE--UrpxQLjXZghGxIgxaKGQbJgX6JySgVHg__"
                                        alt="">
                                    <div class="sidebar-content">
                                        <p>"Skill development is not just about acquiring knowledge;
                                            it's about cultivating the ability to adapt and thrive
                                            in a rapidly changing world." <span class="fw-bold text-danger">- Tony
                                                Wagner</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
