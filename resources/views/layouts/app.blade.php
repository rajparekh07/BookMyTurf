<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <toolbar
            name="{{ env('APP_NAME') }}"
            auth="{!! Auth::user() !!}"
            getstartedurl="{{ route('getstarted') }}"
            searchurl="{{ route('turfs') }}"
        >

        </toolbar>


        <main class="main" >
            @yield('content')
        </main>


        <foot name="{{ env('APP_NAME') }}">

        </foot>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function () {
            M.AutoInit();
        })
    </script>
    @yield('script')

</body>
</html>
