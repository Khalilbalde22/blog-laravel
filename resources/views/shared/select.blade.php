@php
    $class ??= null;
    $name ??='';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp

    <div @class(['form-check form-switch', $class])>

        <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>

        <select class="form-control" name="{{ $name }}" id="{{ $name }}">
            @foreach ($categories as $k => $v)
                <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
            @endforeach
        </select>

         @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>