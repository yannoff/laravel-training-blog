@extends ('layouts.admin')

@section ('contents')
    @php
    $itemTags = isset($item) ? array_column($item->tags->toArray() ?? [], 'id') : [];
    $action = isset($item) ? '/admin/articles/' . $item->id : '/admin/articles';
    $method = isset($item) ? 'PATCH' : 'POST';
    @endphp
    <form action="{{ url($action) }}" method="POST">
        @csrf
        @method($method)
        <input type="hidden" name="id" @isset($item)value="{{ $item->id }}"@endisset />
        <div class="form-group">
            <div class="label">User</div>
            <div>
                <x-form.db-select name="user_id" model="User" value-column="id" label-column="name" class="form-control" :value="(isset($item) ? $item->user_id : null)" />
            </div>
        </div>
        <div class="form-group">
            <div class="label">Topic</div>
            <div>
                <x-form.db-select name="topic_id" model="Topic" value-column="id" label-column="label" class="form-control" :value="(isset($item) ? $item->topic_id : null)" />
            </div>
        </div>
        <div class="form-group">
            <div class="label">Title</div>
            <div>
                <input class="form-control" type="text" name="title" value="@isset($item){{ $item?->title }}@endisset" />
            </div>
        </div>
        <div class="form-group">
            <div class="label">Contents</div>
            <div>
                <textarea class="form-control" name="contents">@isset($item){{ $item?->contents }}@endisset</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label">Tags</div>
            <div>
                <x-form.db-check-list name="tags" model="Tag" value-column="id" label-column="label" :selected="$itemTags" />
            </div>
        </div>
        <div class="row">
            <button type="submit">Save</button>
        </div>
    </form>
@endsection
