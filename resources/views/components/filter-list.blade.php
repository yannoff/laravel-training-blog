<table class="table">
    <thead><tr><th>{{ ucfirst($name) }}s</th></tr></thead>
    <tbody>
        @foreach ($items as $item)
            <tr><td><a href="/{{ $name }}s/{{ $item->$filterCol }}">{{ $item->$labelCol }}</a></td></tr>
        @endforeach
    </tbody>
</table>
