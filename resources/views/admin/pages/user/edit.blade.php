@extends('admin.pages.build')
@section('parent_menu', __('Kullanıcılar'))
@section('parent_menu_link', route('admin.users.index'))
@section('title',__('Kullanıcı Düzenle'))
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row g-6">
            <div class="col-md-6 col-xl-5">
                <form id="mainForm" method="post" action="{{ route('admin.users.update',$user) }}" enctype="multipart/form-data">
                    @csrf @method('put')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('inputs.input',[
                                        'title'=>__('İsim'),
                                        'name' => 'name',
                                        'value'=>old('name',$user->name),
                                        'required' => true
                                    ])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @include('inputs.input',[
                                        'title'=>__('Email'),
                                       'type' => 'email',
                                       'name' => 'email',
                                       'value'=>old('email',$user->email),
                                        'required' => true
                                    ])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @include('inputs.input',[
                                        'title'=>__('Telefon'),
                                        'name' => 'telephone',
                                        'value'=>old('telephone',$user->telephone),
                                        'required' => true
                                    ])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @include('inputs.input',[
                                        'title'=>__('Şifre (Değiştirmeyecekseniz Boş Bırakın)'),
                                        'value'=>old('password'),
                                        'name' => 'password'
                                    ])
                                </div>
                                <div class="col-md-12 mt-2">
                                    @include('inputs.select',[
                                        'title'=>__('Yetki Grubu'),
                                        'name' => 'role_group_id',
                                        'options' => [''=>'Seçilmedi'] + $roleGroups->pluck('name','id')->toArray(),
                                        'selected'=>old('role_group_id',$user->role_group_id),
                                        'required' => true
                                    ])
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Kaydet</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
