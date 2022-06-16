@extends('admin.layouts.mian')
@section('title', 'اقسام المنتجات')
@section('breadcrumb')
{{Breadcrumbs::render('categories.index')}}
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="col-12 text-center alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-12">
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block">
                                <h5 class="card-title pb-0 border-0">كل اقسام المنتجات </h5>
                            </div>
                            <div class="d-block d-md-flex clearfix sm-mt-20">
                                <div class="widget-search ml-0 clearfix">
                                    <i class="fa fa-search"></i>
                                    <input type="search" class="form-control" placeholder="بحث">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <a href="{{ route('categories.create') }}" class="btn btn-success my-3">انشاء قسم
                                للمنتجات</a>
                        </div>
                        <div class="table-responsive mt-15">
                            <table class="table center-aligned-table mb-0">
                                <thead>
                                    <tr class="text-dark">
                                        <th class="text-center">الرقم</th>
                                        <th class="text-center">اسم القسم</th>
                                        <th class="text-center">تاريخ الانشاء</th>
                                        <th class="text-center">تاريخ التعديل</th>
                                        <th class="text-center">الحاله</th>
                                        <th class="text-center">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $category->name }}</td>
                                            <td class="text-center">{{ $category->created_at }}</td>
                                            <td class="text-center">{{ $category->updated_at }}</td>
                                            <td class="text-center">
                                                @if ($category->status === 1)
                                                    <label class="badge badge-success">{{ 'مفعل' }}</label>
                                                @elseif ($category->status === 0)
                                                    <label class="badge badge-danger">{{ 'غير مفعل' }}</label>
                                                @endif
                                            </td>
                                            <td class="text-center"><a
                                                    href="{{ route('categories.edit', $category->id) }}"
                                                    class="btn btn-outline-success btn-sm">تعديل</a>
                                                <form action="{{ route('categories.destroy', $category->id) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="حذف"
                                                        class="btn btn-outline-danger btn-sm mx-2">
                                                </form>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-danger fs-1">لا يوجد اقسام للمنتجات </td>
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
