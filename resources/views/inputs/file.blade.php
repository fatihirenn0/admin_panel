@php
    // name[tr] -> name.tr
    $oldKey = isset($name) ? str_replace(['[', ']'], ['.', ''], $name) : '';
@endphp
<div class="form-group">
    <label for="{{ $id ?? '' }}" class="form-label">{{ $title ?? '' }}</label>
    <input class="dropify {{ $class ?? '' }}
           @if(!empty($oldKey)) @error($oldKey) is-invalid @enderror @endif {{ isset($cropWidth) ? 'crop-image' : '' }}"
           data-cropWidth="{{ $cropWidth ?? '' }}" data-cropHeight="{{ $cropHeight ?? '' }}"
           type="file"
           id="{{ $id ?? '' }}"
           data-default-file="{{ $value ?? '' }}"
           name="{{ $name ?? '' }}"
           {{ isset($multiple) ? 'multiple' : '' }}
        {{ isset($required) && $required === true ? 'required' : '' }}
    />
    @if(!empty($oldKey))
        @error($oldKey)
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>
