<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/images/favicon-96x96.png" />
    <link rel="stylesheet" href="/css/global.css">
    <script>
        window.Laravel = { csrfToken: '{{ csrf_token() }}' };
    </script>
</head>

<body>
    <div class="container-fluid" id="app">
        <main class="main d-flex flex-column" role="main">
            @include('layouts.main-nav')

            <content>
                @yield('content')
            </content>
            
            @include('layouts.footer')
        </main>
        @include('layouts.sidebars')
    </div>
    <script src="/js/global.js"></script>
</body>

</html>
