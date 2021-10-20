@extends ('layouts.base')

@section ('contents')
    @php
    $tags = App\Models\Tag::all()->sortBy('label');
    $users = App\Models\User::all();
    $categs = App\Models\Topic::all()->sortBy('label');
    @endphp
    <form action="{{ route('blog.store') }}" method="POST" />
        @csrf
        @method('POST')
        <div class="row">
            <div class="label">User</div>
            <div class="form-control">
                <select name="topic_id">
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="label">Topic</div>
            <div class="form-control">
                <select name="topic_id">
                @foreach ($categs as $c)
                    <option value="{{ $c->id }}">{{ $c->label }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="label">Title</div>
            <div class="form-control">
                <input type="text" name="title" value="" />
            </div>
        </div>
        <div class="row">
            <div class="label">Contents</div>
            <div class="form-control">
                <textarea name="contents"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="label">Tags</div>
            <div class="form-control">
                <ul>
                @foreach ($tags as $t)
                    <li>
                        <input name="tags[]" type="checkbox" value="{{ $t->id }}" /> {{ $t->label }}
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <button type="submit">Save</button>
        </div>
    </form>
@endsection
