<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ config('app.name')}}</title>

    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/feather/feather.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/icons/flags/flags.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">

    @yield('css')
    
    <link rel="stylesheet" href="{{asset('plugins/toastr/toatr.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body
@if (Session::has('notification'))
data-notification={{true}}
data-notification-type='{{ Session::get('notification')['type'] }}'
data-notification-message='{{ json_encode(Session::get('notification')['message']) }}'
{{Session::forget('notification')}}
@endif
>

    <div class="main-wrapper">

        @include('layouts.header')

        @include('layouts.sidemenu')

        <div class="page-wrapper">
            @yield('content') 
        </div>

        <footer>
            <p>Copyright © 2023 Indo.</p>
        </footer>

    </div>


    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('js/feather.min.js')}}"></script>

    <script src="{{asset('plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    @yield('js')

    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('plugins/toastr/toastr.js')}}"></script>
    <script src="{{asset('js/notif.js')}}"></script>
</body>

</html>