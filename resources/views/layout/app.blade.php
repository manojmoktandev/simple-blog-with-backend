<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/templatemo-xtra-blog.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!--Include header file-->
    @include('include.header')

    <div class="container-fluid">
        <main class="tm-main">
            @yield('content')

            <!--Include footer file-->
            @include('include.footer')

        </main>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/templatemo-script.js') }}"></script>
</body>

</html>
