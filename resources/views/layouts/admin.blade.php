@extends ('layouts.base')

@section ('page')
    <h1>
        <span class="seo">{{ config('app.name') }}</span>
        @yield('page-title')
    </h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield ('contents')
@endsection
