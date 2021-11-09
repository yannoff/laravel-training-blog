<html>
    <head>
        <title>{{ config('app.name') }} - @yield('page-title')</title>
        <link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.css" integrity="sha512-4wfcoXlib1Aq0mUtsLLM74SZtmB73VHTafZAvxIp/Wk9u1PpIsrfmTvK0+yKetghCL8SHlZbMyEcV8Z21v42UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .seo { display: none !important; }
            .container-xxl { margin-left: 1em; margin-right: 1em; }
            .table td { padding: 0.0rem; vertical-align: middle; }
            .table form { margin: 0; }
            .dark,
            .dark pre,
            .dark .table { background-color: #2D2728; color: #aaaaaa; }
            .dark .table th,
            .dark .table td { border-top: 1px solid #4d4748; border-bottom: none; }
            .tag-badge { padding: 0.4em; border-radius: 0.4em; font-size: 0.8em; border: solid 1px #ccc; }
            .dark .tag-badge { border-color: #4d4748; background-color: #1d1718; }
            .dark pre,
            .dark code,
            .dark .form-control { border: solid 1px #4d4748; border-radius: 0.5rem; background-color: #1d1718; color: #aaaaaa; }
            pre { padding: 0.75rem; }
            code { padding-left: 0.4em; padding-right: 0.4em; padding-top: 0.25em; padding-bottom: 0; }
            pre code { border: none !important; }
            blockquote { padding-left: 1em; border-left: solid 2px #4d4748; color: #666666; }
        </style>
    </head>
    <body class="dark">
        <div class="container-xxl">
            @yield ('page')
        </div>
    </body>
</html>
