@php
    // name[tr] -> name.tr
    $oldKey = isset($name) ? str_replace(['[', ']'], ['.', ''], $name) : '';
@endphp

<div class="form-floating form-group">
    <input
        type="{{ $type ?? 'text' }}"
        class="form-control {{ $class ?? '' }} @if(!empty($oldKey)) @error($oldKey) is-invalid @enderror @endif"
        id="{{ $id ?? $name ?? '' }}"
        name="{{ $name ?? '' }}"
        placeholder="{{ $placeholder ?? '' }}"
        value="{{ old($oldKey, $value ?? '') }}"
        {{ isset($required) && $required === true ? 'required' : '' }}
    >
    <label for="{{ $id ?? $name ?? '' }}">{{ $title ?? '' }}</label>
    @if(!empty($oldKey))
        @error($oldKey)
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>
