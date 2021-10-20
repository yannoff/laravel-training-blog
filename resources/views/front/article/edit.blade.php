@extends ('layouts.front')

@section ('contents')
    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <div class="label">User</div>
            <div>
                <x-form.db-select name="user_id" model="User" value-column="id" label-column="name" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="label">Topic</div>
            <div>
                <x-form.db-select name="topic_id" model="Topic" value-column="id" label-column="label" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="label">Title</div>
            <div>
                <input class="form-control" type="text" name="title" value="" />
            </div>
        </div>
        <div class="form-group">
            <div class="label">Contents</div>
            <div>
                <textarea class="form-control" name="contents"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label">Tags</div>
            <div>
                <x-form.db-check-list name="tags" model="Tag" value-column="id" label-column="label" class="form-control" inline />
            </div>
        </div>
        <div class="row">
            <button type="submit">Save</button>
        </div>
    </form>
@endsection
