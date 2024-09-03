<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ !empty($setting->site_name) ? $setting->site_name : 'Path Foundation' }}</title>

    
    <link rel="icon" type="image/x-icon"
        href="{{ !empty(optional($setting)->site_favicon) && file_exists(public_path('storage/' . optional($setting)->site_favicon)) ? asset('storage/' . optional($setting)->site_favicon) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    
    
    <link href="{{ asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    
    <link href="{{ asset('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/tagsinput.css') }}" rel="stylesheet" type="text/css" />
    
    <script src="https://kit.fontawesome.com/69b7156a94.js" crossorigin="anonymous"></script>
    @props(['title'])
    <title>{{ $title ?? config('app.name', '') }}</title>

</head>

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    
    
    <div class="d-flex flex-column flex-root">
        
        <div class="page d-flex flex-row flex-column-fluid">

            
            @include('admin.layouts.sidebar')
            

            
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                
                @include('admin.layouts.header')
                

                
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">



                    
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        
                        <div id="kt_content_container" class="container-fluid">
                            
                            {{ $slot }}
                            
                        </div>
                        
                    </div>
                    
                </div>
                
                
                @include('admin.layouts.footer')
                
            </div>
            
        </div>
        
    </div>
    
    
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
        
    </div>
    
    
    @php
        $hostUrl = 'admin/assets/';
    @endphp
    
    <script src="{{ asset($hostUrl . 'plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset($hostUrl . 'js/scripts.bundle.js') }}"></script>
    
    
    <script src="{{ asset($hostUrl . 'plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset($hostUrl . 'plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset($hostUrl . 'plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset($hostUrl . 'plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

    
    
    <script src="{{ asset($hostUrl . 'js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="{{ asset($hostUrl . 'js/custom/account/settings/profile-details.js') }}"></script>
    <script src="{{ asset($hostUrl . 'js/custom/account/settings/deactivate-account.js') }}"></script>
    <script src="{{ asset($hostUrl . 'js/custom/apps/ecommerce/catalog/save-product.js') }}"></script>
    <script src="{{ asset($hostUrl . 'js/widgets.bundle.js') }}"></script>
    <script src="{{ asset($hostUrl . 'js/custom/widgets.js') }}"></script>
    <script src="{{ asset($hostUrl . 'js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset($hostUrl . 'js/custom/documentation/editors/tinymce/plugins.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/n4jpbhtanca801bcjejx1pc9j033yn0de5ral6e7r0wd6383/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <script src="{{ asset('admin/js/validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/tagsinput.js') }}"></script>

    {{-- {!! Toastr::message() !!}

    @include('toastr') --}}

    @stack('scripts')

    {{-- <script>
        tinymce.init({
            selector: 'textarea.kt_docs_tinymce_plugins',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script> --}}
    
    

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script>
        document.querySelectorAll('.ckeditor').forEach(element => {
            if (!element.classList.contains('ck-editor__editable_inline')) {
                ClassicEditor
                    .create(element)
                    .then(editor => {
                        console.log('CKEditor initialized:', editor);
                    })
                    .catch(error => {
                        console.error('CKEditor initialization error:', error);
                    });
            }
        });
    </script>
{!! Toastr::message() !!}
</body>

</html>
