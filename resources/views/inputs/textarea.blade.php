@php
    // name[tr] → name.tr
    $oldKey = isset($name) ? str_replace(['[', ']'], ['.', ''], $name) : '';
@endphp
<div class="input-group form-group">
    <label class="input-group-text">{{ $title ?? '' }}</label>
    <textarea class="form-control {{ $class ?? '' }} @if(!empty($oldKey)) @error($oldKey) is-invalid @enderror @endif"
              aria-label="{{ $title ?? '' }}"
              id="{{ $id ?? $name ?? '' }}"
              name="{{ $name ?? '' }}"
              placeholder="{{ $placeholder ?? '' }}"
          {{ isset($required) && $required === true ? 'required' : '' }}
        rows="{{ $rows ?? '' }}"
    >{!! old($oldKey, $value ?? '') !!}</textarea>

    @if(!empty($oldKey))
        @error($oldKey)
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>
