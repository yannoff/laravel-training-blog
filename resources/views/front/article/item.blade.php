@extends ('layouts.base')

@section ('page-title')
    {{ $row->title }}
@endsection

@section ('contents')

<i>
    Posted by <a href="/users/{{ $row->user?->id }}">{{ $row->user?->name }}</a>
    on {{ date_format($row->created_at, 'Y-m-d H:i') }}
    in <a href="{{ url('/topics', [$row->topic?->slug]) }}">{{ $row->topic?->label }}</a>
</i>
<p>{{ $row->contents }}</p>
<p>
    <b><i>Tags:
        @foreach ($row->tags as $tag)
            <a href="{{ route('by-tag',[ 'tag' => $tag->id ]) }}">{{ $tag->label }}</a>&nbsp;
        @endforeach
    </i></b>
</p>
@endsection
