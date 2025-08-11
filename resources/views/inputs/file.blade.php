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


@if($loopIndex == 0)
    @push('css')
        <link rel="stylesheet" href="/panel/assets/css/dropify.min.css" />
    @endpush
    @push('js')
        <script src="/panel/assets/js/dropify.min.js"></script>
        <script>
            $('.dropify').dropify({
                messages: {
                    'default': '{{__('Dosya Sürükle veya Tıkla')}}',
                    'replace': '{{ __('Dosya Sürükle veya Tıkla') }}',
                    'remove':  '{{ __('Kaldır') }}',
                    'error':   '{{ __('Bir Hata Ortaya Çıktı') }}'
                }
            }).on('dropify.afterClear', function(event, element) {
                // Mevcut resim varsa deleted_images[] olarak ekle
                var deletedImagePath = $(this).data('default-file').replace('/storage/','');
                if (deletedImagePath) {
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'deleted_images[]',
                        value: deletedImagePath
                    }).appendTo('form');
                }
            });

        </script>
    @endpush
@endif
