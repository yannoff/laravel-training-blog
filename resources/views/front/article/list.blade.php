@extends ('layouts.front')

@section ('page-title')
    {{ count($rows) }} articles {{ $title ?? '' }}
@endsection

@section ('contents')
    <nav>
        <ul>
            <li>
                <a href="{{ route('blog.create') }}">+ New article</a>
            </li>
        </ul>
    </nav>
    @foreach ($rows as $row)
        <p>
            <b><a href="/blog/{{ $row->slug }}">{{ $row->title }}</a></b>
            <i>
                Posted by <a href="/authors/{{ $row->user?->id }}">{{ $row->user?->name }}</a>
                on {{ date_format($row->created_at, 'Y-m-d H:i') }}
                in <a href="{{ url('/topics', [$row->topic?->slug]) }}">{{ $row->topic?->label }}</a>
            </i>
        </p>
    @endforeach
@endsection
