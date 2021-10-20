<html>
    <head>
        <title>Blog - @yield('page-title')</title>
    </head>
    <body>
        <h1>@yield('page-title')</h1>
        <div class="container-xl">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield ('contents')
        </div>
    </body>
</html>
