<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset("assets/vendors/iconfonts/font-awesome/css/all.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/css/vendor.bundle.base.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/css/vendor.bundle.addons.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <!-- endinject -->
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="{{ asset("assets/js/toastDemo.js")}}"></script>
    <script src="{{ asset("assets/js/custom.js")}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
    @stack('style_src')
    <style>
    .btn-circle { 
            width: 50px; 
            height: 50px; 
            padding: 7px 10px; 
            border-radius: 25px; 
            font-size: 10px; 
            text-align: center; 
    }

    .invalid-feedback{
        color: red;
    }
    .select2-container--default .select2-selection--multiple {
        background-color: white;
        border: 1px solid #aaa;
        border-radius: 4px;
        cursor: text;
        width: 374px;
    }
    .select2-selection__choice{
    background: #392C70;
    height: 27px;
    width: 65px;
    font-size: 15px;
    padding: 5px;
    }
    .bootstrap-tagsinput{
            width: 100%;
        }
        .label-info{
            background-color: #17a2b8;

        }
        .label {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,
            border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .loader{
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: rgba(255,255,255,0.9);
    }
    .rm-circ{
        border: transparent;
    }
    </style>
    @stack('style')
    @livewireStyles
</head>
<body>
    <div class="container-scroller">
        {{-- <div class="col-md-12 col-sm-12 grid-margin stretch-card loader">
            <div class="loader-demo-box">
              <div class="dot-opacity-loader">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
        </div> --}}
        @include('layouts.partials.header')
        <div class="container-fluid page-body-wrapper">
        @include('layouts.partials.sidebar')
        <div class="main-panel">
        <main class="py-3">
            @yield('content')
        </main>
        </div>
        </div>
        @include('layouts.partials.footer')
        @include('layouts.partials.footer-scripts')
        @livewireScripts
        @stack('script_src')
        @stack('script')
    </div>
</body>
</html>