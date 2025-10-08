<x-admin-app-layout :title="'Learn More Edit'">
    <div class="card card-flash">
        <div class="card-header">
            <div class="card-title">
            </div>

            <div class="card-toolbar">
                <a href="{{ route('admin.learnmore.index') }}" class="btn btn-light-primary rounded-2">
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
        <form method="post" action="{{ route('admin.learnmore.update', $learnMore->id) }}"
            enctype="multipart/form-data" id="myform">
            @csrf
            @method('PUT')
            <div class="card-body">
                <!--Banner Section-->
                <div class="container-fluid">
                    <div class="row py-3">
                        <div class="col-lg-6 col-sm-12">
                            <span class="mt-1 fw-bold text-info">Description</span>
                            <div class="p-7 rounded bg-light mb-2">
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Badge</label>
                                    <div class="input-group">
                                        <input name="badge" maxlength="255" type="text"
                                            class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Learn More Badge" value="{{ $learnMore->badge }}">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Title</label>
                                    <div class="input-group">
                                        <input name="title" maxlength="255" type="text"
                                            class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Learn More Title" value="{{ $learnMore->title }}">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label for="validationCustom01" class="form-label ">Banner
                                        Image <span class="text-danger">(Image size must be 1920 * 350 )</span></label>
                                    <x-metronic.file-input id="image_banner" name="image_banner" :source="isset($learnMore->image_banner)
                                        ? asset('storage/' . $learnMore->image_banner)
                                        : null" />
                                    {{-- <label class="form-label">Banner
                                        Image</label>
                                    <div class="row">
                                        <div class="" style="width: 70%">
                                            <input name="image_banner" id="image" accept="image/*" type="file"
                                                class="form-control form-control-sm col-lg-12"
                                                placeholder="Enter Banner Image">
                                        </div>
                                        <div class=" ms-2" style="width: 10%">
                                            <img class="img-fluid" id="showImage"
                                                src="{{ asset('storage/' . $learnMore->image_banner) }}" alt=""
                                                style="width: 65px;
                                                    height: 40px;
                                                     margin-left: 2.5rem;">
                                        </div>
                                    </div> --}}

                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label for="validationCustom01" class="form-label ">Feature Page
                                        Image <span class="text-danger">(Image size must be 1920 * 0 )</span></label>
                                    <x-metronic.file-input id="background_image" name="background_image" :source="isset($learnMore->background_image)
                                        ? asset('storage/' . $learnMore->background_image)
                                        : null" />
                                    {{-- <label class="form-label">Background
                                        Image</label>
                                    <div class="row">
                                        <div class="" style="width: 70%">
                                            <input name="background_image" id="image" accept="image/*"
                                                type="file" class="form-control form-control-sm col-lg-12"
                                                placeholder="Enter Background Image">
                                        </div>
                                        <div class=" ms-2" style="width: 10%">
                                            <img class="img-fluid" id="showImage"
                                                src="{{ asset('storage/' . $learnMore->background_image) }}"
                                                alt=""
                                                style="width: 65px;
                                                    height: 40px;
                                                     margin-left: 2.5rem;">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <span class="mt-1 fw-bold text-info">Header</span>
                            <div class="p-7 rounded bg-light mb-2">
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Header
                                        One</label>
                                    <div class="input-group">
                                        <input name="header_one" maxlength="255" type="text"
                                            class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Header One" value="{{ $learnMore->header_one }}">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Header
                                        Two</label>
                                    <div class="input-group">
                                        <input name="header_two" maxlength="255" type="text"
                                            class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Header Two" value="{{ $learnMore->header_two }}">
                                    </div>
                                </div>
                            </div>
                            <span class="mt-1 fw-bold text-info">Extra Area</span>
                            <div class="p-7 rounded bg-light">
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Footer</label>
                                    <div class="input-group">
                                        <textarea name="footer" class="form-control form-control-sm col-lg-12" rows="1"
                                            style=" font-size: 12px; font-weight: 500;">{{ $learnMore->footer }}</textarea>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Consult
                                        Title </label>
                                    <div class="input-group">
                                        <input name="consult_title" type="text"
                                            class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Consult Title" value="{{ $learnMore->consult_title }}">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Consult
                                        Short Description</label>
                                    <div class="input-group">
                                        <textarea name="consult_short_des" type="text" rows="1" class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Consult Short Description">{{ $learnMore->consult_short_des }}</textarea>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Industry
                                        Header</label>
                                    <div class="input-group">
                                        <input type="text" value="{{ $learnMore->industry_header }}"
                                            name="industry_header" class="form-control form-control-sm col-lg-12"
                                            maxlength="100" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <span class="mt-1 fw-bold text-info">Box Area</span>
                            <div class="p-7 rounded bg-light mt-4">
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Box
                                        One Title </label>
                                    <div class="input-group">
                                        <input name="box_one_title" maxlength="255" type="text"
                                            class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Box One Title"
                                            value="{{ $learnMore->box_one_title }}">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Box
                                        One Short Description</label>
                                    <div class="input-group">
                                        <input name="box_one_short_des" type="text"
                                            class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Box One Short Description"
                                            value="{{ $learnMore->box_one_short_des }}">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Box
                                        One link</label>
                                    <div class="input-group">
                                        <input name="box_one_link" type="url"
                                            class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Box One link" value="{{ $learnMore->box_one_link }}">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Box
                                        Two Title</label>
                                    <div class="input-group">
                                        <input name="box_two_title" type="text"
                                            class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Box Two Title"
                                            value="{{ $learnMore->box_two_title }}">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Box
                                        Two Short Description</label>
                                    <div class="input-group">
                                        <textarea name="box_two_short_des" type="text" rows="3" class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Box Two Short Description">{{ $learnMore->box_two_short_des }}</textarea>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Box
                                        Two link</label>
                                    <div class="input-group">
                                        <input name="box_two_link" type="url"
                                            class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Box Two link" value="{{ $learnMore->box_two_link }}">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Box
                                        Three Title</label>
                                    <div class="input-group">
                                        <input name="box_three_title" type="text"
                                            class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Box Two link"
                                            value="{{ $learnMore->box_three_title }}">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Box
                                        Three Short Description</label>
                                    <div class="input-group">
                                        <textarea name="box_three_short_des" type="text" rows="3" class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Box Two link">{{ $learnMore->box_three_short_des }}</textarea>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="row align-items-center pb-7">
                                    <label class="form-label">Box
                                        Three link</label>
                                    <div class="input-group">
                                        <textarea name="box_three_link" type="text" rows="3" class="form-control form-control-sm col-lg-12"
                                            placeholder="Enter Box Three link">{{ $learnMore->box_three_link }}"</textarea>
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                        </div>
                        <div class="col-lg-12">
                            <span class="mt-1 fw-bold text-info">Client Area</span>
                            <div class="p-7 rounded bg-light">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="form-label">Success
                                            Story Title</label>
                                        <div class="input-group">
                                            <textarea name="success_story_title" type="text" rows="3" class="form-control form-control-sm col-lg-12"
                                                placeholder="Enter Success Story Title" value="{{ $learnMore->success_story_title }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label class="form-label">Client
                                                Story One</label>
                                            <div class="input-group">
                                                <select name="success_story_one_id"
                                                    class="form-control form-control-sm col-lg-12" id="select6">
                                                    <option></option>
                                                    @foreach ($storys as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $learnMore->success_story_one_id ? 'selected' : '' }}>
                                                            {{ $item->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label class="form-label">Client
                                                Story Two</label>
                                            <div class="input-group">
                                                <select name="success_story_two_id"
                                                    class="form-select form-select-sm select" id="select7">
                                                    <option></option>
                                                    @foreach ($storys as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $learnMore->success_story_two_id ? 'selected' : '' }}>
                                                            {{ $item->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label class="form-label">Client Story
                                                Three</label>
                                            <div class="input-group">
                                                <select name="success_story_three_id"
                                                    class="form-select form-select-sm select" id="select8">
                                                    <option></option>
                                                    @foreach ($storys as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $learnMore->success_story_three_id ? 'selected' : '' }}>
                                                            {{ $item->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-2">
                        <button type="submit" class="submit_btn from-prevent-multiple-submits px-3">Submit</button>
                    </div>
                </div>
        </form>
    </div>

    @push('scripts')
        <script></script>
    @endpush
</x-admin-app-layout>
