@extends ('layouts.admin')

@section('contents')
    <form method="POST" action="{{ isset($item) ? route('topics.update', [$item->id]) : route('topics.store') }}">
        @method(isset($item) ? 'PATCH' : 'POST')
        @csrf
        <input name="id" type="hidden" value="{{ isset($item) ? $item->id : null }}" />
        <input name="label" type="text" value="{{ isset($item) ? $item->label : null }}" />
        @isset($item)
            <input name="slug" type="text" value="{{ $item->slug }}" />
        @endisset
        <textarea name="description">
            @isset($item){{ $item->description }}@endisset
        </textarea>
        <input type="submit" />
    </form>
@endsection
