@extends ('layouts.admin')

@section ('page-title')
{{ $model }}s
@endsection

@section ('contents')
    <x-data-table :rows="$rows" model="{{ $model }}" />
@endsection
