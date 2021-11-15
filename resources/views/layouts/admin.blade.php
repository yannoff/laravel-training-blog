@extends ('layouts.base')

@section ('page')
    <div class="row">
        <div class="col-xl-1">
            @foreach (['tag', 'topic', 'user', 'article'] as $model)
            <table class="table">
                <thead><tr><th>{{ ucfirst($model) }}s</th></tr></thead>
                <tbody>
                @foreach (['create' => 'New ' . $model, 'index' => 'List ' . $model . 's'] as $action => $label)
                    <tr><td><a href="{{ route($model . 's.' . $action) }}">{{ $label }}</a></td></tr>
                @endforeach
                </tbody>
            </table>
            @endforeach
        </div>
        <div class="col-xl-11">
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
