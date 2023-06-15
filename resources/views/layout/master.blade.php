<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>
    
    <link rel="stylesheet" href="{{asset('assets/')}}/css/main/app.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/css/main/app-dark.css">
    <link rel="shortcut icon" href="{{asset('assets/')}}/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/')}}/images/logo/favicon.png" type="image/png">
    
    <link rel="stylesheet" href="{{asset('assets/')}}/css/shared/iconly.css">
    @yield('style') 
    
</head>

<body>
    <div id="app">
        {{-- SIDE BAR --}}
        @include('layout.sidebar')
        {{-- END SIDE BAR --}}


        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>@yield('heading')</h3>
            </div>
            @yield('content')
            @include('layout.footer')
        </div>
    </div>
    <script src="{{asset('assets/')}}/js/bootstrap.js"></script>
    <script src="{{asset('assets/')}}/js/app.js"></script>
    @yield('script')
    @include('sweetalert::alert')

        
</body>
