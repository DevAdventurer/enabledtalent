<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="referrer" content="no-referrer" />
    <title>
        {{ get_app_setting('app_name') }} | 
        @if(auth()->guard('company')->check())
            {{ auth('company')->user()->details->company_name }}
        @else
            @if(request()->segment(3))
                {{ Str::title(str_replace('-', ' ', request()->segment(3))) }}
            @elseif(request()->segment(2))
                {{ Str::title(str_replace('-', ' ', request()->segment(2))) }}
            @elseif(request()->segment(1))
                {{ Str::title(str_replace('-', ' ', request()->segment(1))) }}
            @else
                Home
            @endif
        @endif
    </title>



    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset(get_app_setting('favicon')??'admin-assets/images/favicon.png')}}">

    <!-- css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/all-fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/feather.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?version={{ time() }}">

    @stack('links')
</head>

<body class="home-3">

    <!-- preloader -->
    <div class="preloader">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
  


    @include('common.layouts.header')
    <main class="main">
      @section('main')
                @show 
        </main>
    @include('common.layouts.footer')
   
    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="far fa-angle-up"></i></a>
    <!-- scroll-top end -->


    <!-- js -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.appear.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/counter-up.js')}}"></script>
    <script src="{{asset('assets/js/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/nice-select.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets/js/main.js')}}?version={{ time() }}"></script>

    @stack('scripts')

    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/crudAjax.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @if (Session::has('message'))
      <script type="text/javascript">
        Toastify({
          text: "{{Session::get('message')}}",
          duration: 3000,
          close: true,
          gravity: "top", // `top` or `bottom`
          position: "right", // `left`, `center` or `right`
          stopOnFocus: true, // Prevents dismissing of toast on hover
          className: "{{Session::get('class')}}",
        }).showToast();
      </script>
    @endif
    @include('common.layouts.script')
    @include('common.layouts.alert-popup')
  </body>
</html>