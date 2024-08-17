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
            <h2>Member Registration</h2>
            <p>"Volunteer with PATH for building better Bangladesh."</p>
        </div>
    </section>
    <section style="background-color: #051225;">
        <div class="container py-lg-5 py-3">

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="col-lg-6 form-area">
                                <div class="input-field-gap">
                                    <h2 class="text-white form-title">Join Our Team</h2>
                                </div>

                                <div class="input-field-gap">
                                    <input type="text" class="form-control form-color" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required name="name" value="{{ old('name') }}" placeholder="Your Name Here">
                                </div>

                                <div class="input-field-gap">
                                    <input type="text" class="form-control form-color" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required name="email" value="{{ old('email') }}" placeholder="Email Id:example@example.com">
                                </div>

                                <div class="input-field-gap">
                                    <input type="tel" class="form-control form-color" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required name="phone" value="{{ old('phone') }}" placeholder="Phone;Eg:017*******">
                                </div>
                                <div class="input-field-gap">
                                    <input type="text" class="form-control form-color" id="district"
                                        aria-describedby="district" required name="district" value="{{ old('district') }}" placeholder="District;Eg:Khulna, Dhaka, Faridpur">
                                </div>
                                <div class="input-field-gap">
                                    <input type="text" class="form-control form-color" id="institution"
                                        aria-describedby="institution" name="institution" value="{{ old('institution') }}" placeholder="Institution;Eg:School, College, Working Place">
                                </div>
                                <div class="input-field-gap">
                                    <input type="text" class="form-control form-color" id="blood_group"
                                        aria-describedby="blood_group" name="blood_group" value="{{ old('blood_group') }}" placeholder="Blood Group;Eg:A+, B-, O+">
                                </div>
                                <div class="input-field-gap">
                                    <input type="text" class="form-control form-color" id="nid_number"
                                        aria-describedby="nid_number" name="nid_number" value="{{ old('nid_number') }}" placeholder="NID Number">
                                </div>
                                <div class="input-field-gap">
                                    <input type="password" class="form-control form-color" id="password"
                                        aria-describedby="password" name="password" value="{{ old('password') }}" placeholder="Password">
                                </div>
                                <div class="input-field-gap">
                                    <input type="password" class="form-control form-color" id="password_confirmation"
                                        aria-describedby="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Your Password">
                                </div>

                                <div class="input-field-gap">
                                    <textarea class="form-control form-color" name="address" rows="2"
                                        placeholder="Your Address">{{ old('address') }}</textarea>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-white w-100">Submit</button>
                                </div>

                            </div>
                            <div class="col-lg-6 d-lg-block d-sm-none">
                                <div class="sidebar-areas">
                                    <img class="form-side-area" width="516px" height="700px"
                                        src="{{ asset('frontend/images/registration.jpg') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
