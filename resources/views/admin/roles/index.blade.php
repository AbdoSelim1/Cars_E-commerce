@extends('admin.layouts.mian')
@section('title', 'الوطائف')
@section('breadcrumb')
    {{ Breadcrumbs::render('roles.index') }}
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="col-12 text-center alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="col-12 text-center alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="col-12">
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block">
                                <h5 class="card-title pb-0 border-0">كل الوظائف </h5>
                            </div>
                            <div class="d-block d-md-flex clearfix sm-mt-20">
                                <div class="widget-search ml-0 clearfix">
                                    <i class="fa fa-search"></i>
                                    <input type="search" class="form-control" placeholder="بحث">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            @if (can('create Roles', 'admin'))
                                <a href="{{ route('roles.create') }}" class="btn btn-success my-3">انشاء وظيفه
                                </a>
                            @endif
                        </div>
                        <div class="table-responsive mt-15">
                            <table class="table center-aligned-table mb-0">
                                <thead>
                                    <tr class="text-dark">
                                        <th class="text-center">الرقم</th>
                                        <th class="text-center">اسم الوظيفه</th>
                                        <th class="text-center">تاريخ الانشاء</th>
                                        <th class="text-center">تاريخ التعديل</th>
                                        <th class="text-center">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $role->name }}</td>
                                            <td class="text-center">{{ $role->created_at }}</td>
                                            <td class="text-center">{{ $role->updated_at }}</td>
                                            <td class="text-center">
                                                @if (can('update Roles', 'admin'))
                                                    <a href="{{ route('roles.edit', $role->id) }}"
                                                        class="btn btn-outline-success">تعديل</a>
                                                @endif
                                                @if (can('destroy Roles', 'admin'))
                                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="حذف"
                                                            class="btn btn-outline-danger btn-sm mx-2">
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-danger fs-1">لا يوجد وظائف </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
