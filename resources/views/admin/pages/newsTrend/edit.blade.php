<x-admin-app-layout :title="'News and Trend edit'">
    <div class="card card-flash">
        <div class="card-header">
            <div class="card-title">
            </div>

            <div class="card-toolbar">
                <a href="{{ route('admin.news-trend.index') }}" class="btn btn-light-primary rounded-2">
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
                    </span> Back to List
                </a>
            </div>
        </div>
        <form action="{{ route('admin.news-trend.store') }}" class="needs-validation" method="POST"
            enctype="multipart/form-data" novalidate>
            @csrf
            <div class="card-body">
                <div class="container px-0">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 pb-7">
                                    <label for="validationCustom010" class="form-label required mb-0">Course
                                        Name</label>
                                    <select class="form-select form-select-solid multiselect" data-control="select2"
                                        data-placeholder="Select an option" data-allow-clear="true" name="course_id[]"
                                        multiple="multiple" required>
                                        <option></option>
                                        @php
                                            $courseIds = isset($newsTrend->course_id)
                                                ? json_decode($newsTrend->course_id, true)
                                                : [];
                                            $courses = App\Models\Course::pluck('name', 'id')->toArray();
                                        @endphp
                                        @foreach ($courses as $id => $title)
                                            <option value="{{ $id }}"
                                                {{ is_array($courseIds) && in_array($id, $courseIds) ? 'selected' : '' }}>
                                                {{ $title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"> Please Select Course Name. </div>
                                </div>


                                <div class="col-md-4 pb-7">
                                    <label for="validationCustom010" class="form-label required mb-0">Featured</label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Select an option" data-allow-clear="true" name="featured"
                                        data-hide-search="true" required>
                                        <option></option>
                                        <option value="0" @selected($newsTrend->featured == '0')>No</option>
                                        <option value="1" @selected($newsTrend->featured == '1')>Yes</option>
                                    </select>
                                    <div class="invalid-feedback"> Please Select Featured. </div>
                                </div>
                                <div class="col-md-4 pb-7">
                                    <label for="validationCustom010" class="form-label required mb-0">Type</label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Select an option" data-allow-clear="true" name="type"
                                        data-hide-search="true" required>
                                        <option></option>
                                        <option value="news"@selected($newsTrend->featured == 'news')>News</option>
                                        <option value="trends"@selected($newsTrend->featured == 'trends')>Trends</option>
                                    </select>
                                    <div class="invalid-feedback"> Please Select Type. </div>
                                </div>

                                <div class="col-md-4 pb-7">
                                    <label for="validationCustom01" class="form-label required ">Badge
                                    </label>
                                    <input type="text" class="form-control form-control-solid form-control-sm" value="{{$newsTrend->badge}}"
                                        id="validationCustom01" placeholder="Enter Badge" name="badge" required>
                                    <div class="invalid-feedback"> Please Enter Badge </div>
                                </div>
                                <div class="col-md-4 pb-7">
                                    <label for="validationCustom01" class="form-label required ">Title</label>
                                    <input type="text" class="form-control form-control-solid form-control-sm" value="{{$newsTrend->title}}"
                                        id="validationCustom01" placeholder="Enter Title" name="title" required>
                                    <div class="invalid-feedback"> Please Enter Title </div>
                                </div>
                                <div class="col-md-4 pb-7">
                                    <label for="validationCustom01" class="form-label required ">Author</label>
                                    <input type="text" class="form-control form-control-solid form-control-sm" value="{{$newsTrend->author}}"
                                        id="validationCustom01" placeholder="Enter Author" name="author">
                                    <div class="invalid-feedback"> Please Enter Author </div>
                                </div>
                                <div class="col-md-4 pb-7">
                                    <label for="validationCustom01" class="form-label required ">Banner
                                        Image</label>
                                    <input type="file" class="form-control form-control-solid form-control-sm"
                                        id="validationCustom01" placeholder="Enter Banner Image" name="banner_image" value="{{$newsTrend->banner_image}}"
                                        required>
                                    <div class="invalid-feedback"> Please Enter Banner Image </div>
                                </div>
                                <div class="col-md-4 pb-7">
                                    <label for="validationCustom01" class="form-label required ">Thumbnail
                                        Image</label>
                                    <input type="file" class="form-control form-control-solid form-control-sm"
                                        id="validationCustom01" placeholder="Enter Thumbnail Image"
                                        name="thumbnail_image" required>
                                    <div class="invalid-feedback"> Please Enter Thumbnail Image </div>
                                </div>
                                <div class="col-md-4 pb-7">
                                    <label for="validationCustom01" class="form-label required ">Aditional
                                        URL</label>
                                    <input type="url" class="form-control form-control-solid form-control-sm"
                                        id="validationCustom01" placeholder="Enter Additional URL" value="{{$newsTrend->additional_url}}"
                                        name="additional_url" required>
                                    <div class="invalid-feedback"> Please Enter Additional URL</div>
                                </div>
                                <div class="col-md-12 pb-7">
                                    <label for="validationCustom010" class="form-label required mb-0">Header</label>
                                    <textarea rows="1" name="header" class="form-control form-control-sm form-control-solid"
                                        placeholder="Enter Header" required>{{$newsTrend->header}}</textarea>
                                    <div class="invalid-feedback"> Please Enter Header</div>
                                </div>
                                <div class="col-md-12 pb-7">
                                    <label for="validationCustom010" class="form-label required mb-0">Address</label>
                                    <textarea rows="1" name="address" class="form-control form-control-sm form-control-solid"
                                        placeholder="Enter Address" required>{{$newsTrend->address}}</textarea>
                                    <div class="invalid-feedback"> Please Enter Address</div>
                                </div>
                                <div class="col-md-12 pb-7">
                                    <label for="validationCustom010" class="form-label required mb-0">Footer</label>
                                    <textarea rows="1" name="footer" class="form-control form-control-sm form-control-solid"
                                        placeholder="Enter Footer" required>{{$newsTrend->footer}}</textarea>
                                    <div class="invalid-feedback"> Please Enter Footer</div>
                                </div>
                                <div class="col-md-12 mb-1 pt-7">
                                    <label for="validationCustom01" class="form-label required mb-0">Short
                                        Description</label>
                                    <textarea name="short_des" class="tox-target kt_docs_tinymce_plugins">
                                        {{$newsTrend->short_des}}</textarea>
                                    <div class="invalid-feedback"> Please Enter Title </div>
                                </div>
                                <div class="col-md-12 mb-1 pt-7">
                                    <label for="validationCustom01" class="form-label required mb-0">Long
                                        Description</label>
                                    <textarea name="long_des" class="tox-target kt_docs_tinymce_plugins"> {{$newsTrend->long_des}}</textarea>
                                    <div class="invalid-feedback"> Please Enter Title </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer p-2">
                <button type="submit" class="btn btn-sm btn-light-primary rounded-0">Submit</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script></script>
    @endpush
</x-admin-app-layout>


