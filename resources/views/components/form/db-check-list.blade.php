<ul {{ $attributes }}>
@foreach ($elements as $element)
    @php
    $id = sprintf('%s-option-%s', $name, $element->id);
    @endphp
    <li @if($attributes->has('inline'))class="form-check form-check-inline"@endif>
        <input class="form-check-input" name="{{ $name }}[]" type="checkbox" id="{{ $id }}" value="{{ $element->$valueColumn }}" @if(in_array($element->$valueColumn, $selected))checked="checked"@endif/>
        <label class="form-check-label" for="{{ $id }}">{{ $element->$labelColumn }}</label>
    </li>
@endforeach
</ul>
