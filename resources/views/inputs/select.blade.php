@php
    // name[tr] -> name.tr
    $oldKey = isset($name) ? str_replace(['[', ']'], ['.', ''], $name) : '';
    $selected = isset($selected) ? (is_array($selected) ? $selected : [$selected]) : [];
@endphp

<div class="form-group mb-2">
    <label for="{{ $id ?? '' }}" class="form-label">{{ $title ?? '' }}</label>
    <div class="select2-primary">
        <select id="{{ $id ?? '' }}"
                class="{{ isset($multiple) ? 'select2' : 'form-control' }} form-select {{ $class ?? '' }} @if(!empty($oldKey)) @error($oldKey) is-invalid @enderror @endif"
                {{ isset($multiple) ? 'multiple' : '' }}
                name="{{ $name ?? '' }}"
                {{ isset($required) && $required === true ? 'required' : '' }}
        >
            @foreach($options ?? [] as $value => $option)
                <option @if(in_array($value,$selected)) selected @endif value="{{ $value }}">{{ $option }}</option>
            @endforeach
        </select>
    </div>
    @if(!empty($oldKey))
        @error($oldKey)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>


@if(isset($multiple) && $loopIndex == 0)
    @push('css')
        <link rel="stylesheet" href="/panel/assets/vendor/libs/select2/select2.css" />
    @endpush
    @push('js')
        <script src="/panel/assets/vendor/libs/select2/select2.js"></script>
        <script>
            $('.select2').each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>').select2({
                    placeholder: '{{ __('Seçilmedi') }}',
                    dropdownParent: $this.parent()
                });
            });
        </script>
    @endpush
@endif

