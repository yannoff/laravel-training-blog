@extends ('layouts.base')

@section ('page')
    <div class="row">
        <div class="col-xl-2">
            <a href="{{ url('/blog') }}">All articles</a>
            <x-filter-list name="topic" filter-col="slug" />
            <x-filter-list name="author" model="User" label-col="name" />
            <x-filter-list name="tag" />
        </div>
        <div class="col-xl-10">
            <h1>
                <span class="seo">{{ config('app.name') }}</span>
                @yield('page-title')
            </h1>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield ('contents')
        </div>
    </div>
@endsection
