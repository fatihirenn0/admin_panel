@extends('admin.pages.build')
@section('parent_menu', __('Yetki Grupları'))
@section('parent_menu_link', route('admin.role-groups.index'))
@section('title',__('Yetki Grubu Ekle'))
@push('css')

@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="mainForm" method="post" action="{{ route('admin.role-groups.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-6">
                <div class="col-xxl-3 col-xl-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    @include('inputs.input',[
                                        'title'=>__('Yetki Grubu Adı'),
                                        'name'=>"name",
                                        'required' => true
                                    ])
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">{{ __('Kaydet') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-xl-8 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-flush-spacing">
                                    <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <div class="d-flex justify-content-end">
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" id="selectAll" />
                                                    <label class="form-check-label" for="selectAll"> Tümünü Seç </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @foreach(config('role') as $key => $title)
                                        <tr>
                                            <td class="text-nowrap fw-medium text-heading">{{ $title }}</td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <div class="form-check mb-0 me-4 me-lg-12">
                                                        <input class="form-check-input" type="checkbox" id="{{ $key }}_list" name="role[]" value="{{ $key }}_list"/>
                                                        <label class="form-check-label" for="{{ $key }}_list"> Listele </label>
                                                    </div>
                                                    <div class="form-check mb-0 me-4 me-lg-12">
                                                        <input class="form-check-input" type="checkbox" id="{{ $key }}_add" name="role[]" value="{{ $key }}_list"/>
                                                        <label class="form-check-label" for="{{ $key }}_add"> Ekle </label>
                                                    </div>
                                                    <div class="form-check mb-0 me-4 me-lg-12">
                                                        <input class="form-check-input" type="checkbox" id="{{ $key }}_edit" name="role[]" value="{{ $key }}_list"/>
                                                        <label class="form-check-label" for="{{ $key }}_edit"> Güncelle </label>
                                                    </div>
                                                    <div class="form-check mb-0">
                                                        <input class="form-check-input" type="checkbox" id="{{ $key }}_delete" name="role[]" value="{{ $key }}_list"/>
                                                        <label class="form-check-label" for="{{ $key }}_delete"> Sil </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.querySelector('.table-responsive');
            const selectAll = container.querySelector('#selectAll');
            const roleBoxes = container.querySelectorAll('input[name="role[]"]');

            function syncSelectAll() {
                const total = roleBoxes.length;
                const checked = [...roleBoxes].filter(b => b.checked).length;
                selectAll.checked = checked === total;
                selectAll.indeterminate = checked > 0 && checked < total;
            }

            // Tümünü Seç
            selectAll.addEventListener('change', function () {
                roleBoxes.forEach(b => { b.checked = selectAll.checked; });
                syncSelectAll();
            });

            // Tek tek değişince üstü güncelle
            roleBoxes.forEach(b => b.addEventListener('change', syncSelectAll));

            // Başlığa tıklayınca satırın tamamını seç
            container.querySelectorAll('tbody tr').forEach(tr => {
                const titleCell = tr.querySelector('td:first-child');
                const rowBoxes = tr.querySelectorAll('input[name="role[]"]');
                if (!titleCell || rowBoxes.length === 0) return;

                titleCell.style.cursor = 'pointer';
                titleCell.addEventListener('click', function () {
                    const anyUnchecked = [...rowBoxes].some(b => !b.checked);
                    rowBoxes.forEach(b => { b.checked = anyUnchecked; });
                    syncSelectAll();
                });
            });

            // İlk durum
            syncSelectAll();
        });
    </script>

@endpush
