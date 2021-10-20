<select name="{{ $name }}" {{ $attributes }}>
    <option value="">--</option>
    @foreach ($elements as $element)
        <option value="{{ $element->$valueColumn }}"@if ($value == $element->$valueColumn) selected="selected"@endif>{{ $element->$labelColumn }}</option>
    @endforeach
</select>
