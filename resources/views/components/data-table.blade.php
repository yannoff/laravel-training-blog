@php
    $routeGroup = strtolower($model) . 's';
    $fields = array_keys($rows[0]->toDataRow());
@endphp
<b>{{ count($rows) }} elements found.</b>
<table class="table">
    <thead>
        <tr>
            @foreach ($fields as $field)
            <th><a href="?sortBy={{ $field }}">{{ ucfirst($field) }}</a></th>
            @endforeach
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
        <tr>
            @foreach ($row->toDataRow() as $field => $value)
            <td>{{ $value }}</td>
            @endforeach
            <td><a href="{{ route($routeGroup . '.edit', $row->id) }}" title="edit"><span class="fa fa-edit"></span></a></td>
            <td>
                <form action="{{ route($routeGroup . '.destroy', $row->id) }}" method="POST">
                    @method('DELETE')
                    <a href="" onclick="this.parent.submit()" title="delete"><span class="fa fa-trash"></span></a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
