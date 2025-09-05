@extends('admin.pages.build')
@section('title',__('Projeler'))
@push('css')
    <link rel="stylesheet" href="/panel/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="/panel/assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css" />
    <link rel="stylesheet" href="/panel/assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header pb-0 d-flex justify-content-between">
                @if(in_array('project_delete', $authUserRoles))
                    @if(isset($_GET['trashed']))
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-info">
                            <i class="menu-icon icon-base ti tabler-arrow-left"></i>{{ __('Projeler') }}
                        </a>
                    @else
                        <a href="{{ route('admin.projects.index', ['trashed'=>true]) }}" class="btn btn-danger">
                            <i class="menu-icon icon-base ti tabler-recycle"></i>{{ __('Geri Dönüşüm') }}
                        </a>
                    @endif
                @endif

                @if(in_array('project_add', $authUserRoles))
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">{{ __('Yeni Kayıt Ekle') }}</a>
                @endif
            </h5>

            <div class="card-datatable text-nowrap">
                <table class="datatables-ajax table table-bordered">
                    <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Görsel') }}</th>
                        <th>{{ __('Kategori') }}</th>
                        <th>{{ __('Proje Adı') }}</th>
                        <th>{{ __('Gösterim Sırası') }}</th>
                        <th>{{ __('İşlemler') }}</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="/panel/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script>
        let dt_ajax = new DataTable(document.querySelector('.datatables-ajax'), {
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('admin.ajax.projects') }}',
                type: 'POST', // 🔸 POST olarak ayarlandı
                @if(isset($_GET['trashed']))
                    data: {
                        trashed:{{ $_GET['trashed'] }}
                    },
                @endif
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // 🔸 CSRF token ekleniyor
                },
                dataSrc: 'data'
            },
            columns: [
                { data: 'id', orderable: true, searchable: true },
                { data: 'image', orderable: false, searchable: false },
                { data: 'category_name', orderable: false, searchable: true },
                { data: 'name', orderable: true, searchable: true },
                { data: 'rank', orderable: true, searchable: false },
                { data: 'actions', orderable: false, searchable: false },
            ],
            layout: {
                topStart: {
                    rowClass: 'row mx-3 my-0 justify-content-between',
                    features: [
                        {
                            pageLength: {
                                menu: [7, 10, 25, 50, 100],
                            }
                        }
                    ]
                },
                topEnd: {
                    search: {
                        placeholder: ''
                    }
                },
                bottomStart: {
                    rowClass: 'row mx-3 justify-content-between',
                    features: ['info']
                },
                bottomEnd: 'paging'
            },
            language: {
                processing:     "{{ __('Yükleniyor...') }}",
                search:         "{{ __('Ara:') }}",
                lengthMenu:     "_MENU_ {{ __('kayıt göster') }}",
                info:           "_TOTAL_ {{ __('kayıttan') }} _START_ - _END_ {{ __('arası gösteriliyor') }}",
                infoEmpty:      "{{ __('Kayıt yok') }}",
                infoFiltered:   "(_MAX_ {{ __('kayıt içerisinden filtrelendi') }})",
                loadingRecords: "{{ __('Yükleniyor...') }}",
                zeroRecords:    "{{ __('Eşleşen kayıt bulunamadı') }}",
                emptyTable:     "{{ __('Tabloda veri yok') }}",
                paginate: {
                    next: '<i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i>',
                    previous: '<i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i>',
                    first: '<i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i>',
                    last: '<i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i>'
                },
                aria: {
                    sortAscending:  ": {{ __('artan sütun sıralamasını aktifleştir') }}",
                    sortDescending: ": {{ __('azalan sütun sıralamasını aktifleştir') }}"
                }
            },
            scrollX: true,
            scrollCollapse: true,
            fixedColumns: {
                start: 0,
                end: 1
            },
        });

    </script>
@endpush
