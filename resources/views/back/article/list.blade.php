@extends('layouts.base')

@section('page-title')
    {{ count($rows) }} articles {{ $title ?? '' }}
@endsection

@section('contents')
    <table>
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
                <td><a href="">Edit</a></td>
                <td><a href="">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
