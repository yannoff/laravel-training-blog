@extends('layouts.admin')

@section('page-title')
    {{ count($rows) }} articles {{ $title ?? '' }}
@endsection

@section('contents')
    <table class="table">
        <thead>
            <tr>
                <th>Slug</th>
                <th>Author</th>
                <th>Date</th>
                <th>Category</th>
                <th>Tags</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr>
                <td><a href="/blog/{{ $row->slug }}">{{ $row->title }}</a></td>
                <td><a href="?filters[author]={{ $row->user?->id }}">{{ $row->user?->name }}</a></td>
                <td>{{ date_format($row->created_at, 'Y-m-d H:i') }}</td>
                <td><a href="?filters[topic]={{ $row->topic?->id }}">{{ $row->topic?->label }}</a></td>
                <td style="font-size: 0.8em;">
                    @foreach($row->tags as $tag)
                        <a href="?filters[tag]={{ $tag->id }}">{{ $tag->label }}</a>&nbsp;
                    @endforeach
                </td>
                <td><a href="{{ route('articles.edit', $row->id) }}" title="edit"><span class="fa fa-edit"></span></a></td>
                <td>
                    <form action="{{ route('articles.destroy', $row->id) }}" method="POST">
                        @method('DELETE')
                        <a href="" onclick="form.submit()" title="delete"><span class="fa fa-trash"></span></a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
