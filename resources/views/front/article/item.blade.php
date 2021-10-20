@extends ('layouts.front')

@section ('page-title')
    {{ $row->title }}
@endsection

@section ('contents')

<i>
    Posted by <a href="/authors/{{ $row->user?->id }}">{{ $row->user?->name }}</a>
    on {{ date_format($row->created_at, 'Y-m-d H:i') }}
    in <a href="{{ url('/topics', [$row->topic?->slug]) }}">{{ $row->topic?->label }}</a>
</i>
<p>
{!! $row->contents !!}
</p>
<p>
    <b><i>Tags:</i></b>
    @foreach ($row->tags as $tag)
        <span class="tag-badge"><a href="{{ route('by-tag',[ 'tag' => $tag->id ]) }}">{{ $tag->label }}</a></span>&nbsp;
    @endforeach
</p>
@endsection
