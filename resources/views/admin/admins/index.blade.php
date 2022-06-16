@extends('admin.layouts.mian')
@section('title', 'كل المشرفين')
@section('breadcrumb')
    {{ Breadcrumbs::render('admins.index') }}
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="col-12 text-center alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-12">
        <div class="col-12 pt-2">
            <h2>@yield('title')</h2>
        </div>
        <div class="col-12 text-center">
            @if (can('sotre Admin', 'admin'))
                <a href="{{ route('admins.create') }}" class="btn btn-success my-3">انشاء مشرف</a>
            @endif
        </div>
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead>
                                    <tr>
                                        <th>الرقم</th>
                                        <th>الاسم</th>
                                        <th>البريد الالكترونى</th>
                                        {{-- <th>الوظيفه</th> --}}
                                        <th>الحاله</th>
                                        <th>تاريخ الانشاء</th>
                                        <th>تاريخ التعديل</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($admins as $admin)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            {{-- <td>{{ dd($admin->getRoleNames())}}</td> --}}
                                            <td>{{ $admin->email_verified_at }}</td>
                                            <td>{{ $admin->created_at }}</td>
                                            <td>{{ $admin->updated_at }}</td>
                                            <td>
                                                @if (can('update Admin', 'admin'))
                                                    <a href="{{ route('admins.edit', $admin->id) }}"
                                                        class="btn btn-outline-success">تعديل</a>
                                                @endif
                                                @if (can('destroy Admin', 'admin'))
                                                    <form action="{{ route('admins.destroy', $admin->id) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="حذف" class="btn btn-outline-danger">
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-danger text-center" colspan="20">لا يوجد مشرفين</td>
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
