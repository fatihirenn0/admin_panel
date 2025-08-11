@php
    // name[tr] -> name.tr
    $oldKey = isset($name) ? str_replace(['[', ']'], ['.', ''], $name) : '';
@endphp

<label for="{{ $id ?? '' }}" class="form-label">{{ $title ?? '' }}</label>
<div id="{{ $id ?? '' }}">
    {!! old($oldKey,$value ?? '') ?? '' !!}
</div>
<input type="hidden" name="{{ $name ?? '' }}" id="{{ $id ?? '' }}_input">

@if($loopIndex == 0)
    @push('css')
        <link rel="stylesheet" href="/panel/assets/vendor/libs/quill/typography.css" />
        <link rel="stylesheet" href="/panel/assets/vendor/libs/highlight/highlight.css" />
        <link rel="stylesheet" href="/panel/assets/vendor/libs/quill/katex.css" />
        <link rel="stylesheet" href="/panel/assets/vendor/libs/quill/editor.css" />
    @endpush
    @push('js')
        <script src="/panel/assets//vendor/libs/highlight/highlight.js"></script>
        <script src="/panel/assets/vendor/libs/quill/quill.js"></script>
        <script>
            const fullToolbar = [
                [
                    {
                        font: []
                    },
                    {
                        size: []
                    }
                ],
                ['bold', 'italic', 'underline', 'strike'],
                [
                    {
                        color: []
                    },
                    {
                        background: []
                    }
                ],
                [
                    {
                        script: 'super'
                    },
                    {
                        script: 'sub'
                    }
                ],
                [
                    {
                        header: '1'
                    },
                    {
                        header: '2'
                    },
                    'blockquote',
                    'code-block'
                ],
                [
                    {
                        list: 'ordered'
                    },
                    {
                        indent: '-1'
                    },
                    {
                        indent: '+1'
                    }
                ],
                [{ direction: 'rtl' }, { align: [] }],
                ['link', 'image', 'video', 'formula'],
                ['clean']
            ];
        </script>
    @endpush
@endif
@push('js')
    <script>
        let {{ $id ?? '' }}fullEditor = new Quill('#{{ $id ?? '' }}', {
            bounds: '#{{ $id ?? '' }}',
            placeholder: '{{ $title ?? '' }}',
            modules: {
                syntax: true,
                toolbar: fullToolbar
            },
            theme: 'snow'
        });

        document.getElementById('mainForm').addEventListener('submit', function() {
            document.getElementById('{{ $id ?? '' }}_input').value =
                {{ $id ?? '' }}fullEditor.root.innerHTML;
        });
    </script>
@endpush
