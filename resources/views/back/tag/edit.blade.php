@extends ('layouts.admin')

@section('contents')
    <form method="POST" action="{{ isset($item) ? route('tags.update', [$item->id]) : route('tags.store') }}">
        @method(isset($item) ? 'PATCH' : 'POST')
        @csrf
        <input name="id" type="hidden" value="{{ isset($item) ? $item->id : null }}" />
        <input name="label" type="text" value="{{ isset($item) ? $item->label : null }}" />
        @isset($item)
            <input name="slug" type="text" value="{{ $item->slug }}" />
        @endisset
        <input type="submit" />
    </form>
@endsection
