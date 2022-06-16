@extends('admin.layouts.mian')
@section('title', 'المديلات')
@section('breadcrumb')
    {{  Breadcrumbs::render('models.index') }}
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="col-12 text-center alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-12">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card-body">

                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <h5 class="card-title pb-0 border-0">جميع الديلات الموجوده</h5>
                        </div>

                        <div class="d-block d-md-flex clearfix sm-mt-20">
                            <div class="clearfix">
                            </div>
                            <div class="widget-search ml-0 clearfix">
                                <i class="fa fa-search"></i>
                                <input type="search" class="form-control" placeholder="بحث....">
                            </div>
                        </div>
                    </div>
                    <div class="text-center my-4">
                        <a href="{{ route('models.create') }}" class="btn btn-success">انشاء مديل</a>
                    </div>
                    <div class="table-responsive mt-15">
                        <table class="table center-aligned-table mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th class="text-center">الرقم</th>
                                    <th class="text-center"> اسم المديل باللغه العربيه</th>
                                    <th class="text-center">اسم المديل باللغه الانجليزيه</th>
                                    <th class="text-center">سنه المديل</th>
                                    <th class="text-center">الحاله</th>
                                    <th class="text-center">تاريخ الانشاء</th>
                                    <th class="text-center">تاريخ التعديل</th>
                                    <th class="text-center">العلامه التجاريه التابع لها</th>
                                    <th class="text-center">العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $model)
                                    <tr>
                                        <td class="text-center">{{ $model->id }}</td>
                                        <td class="text-center"> {{ $model->name }}</td>
                                        <td class="text-center"> {{ $model->name }}</td>
                                        <td class="text-center">{{ $model->date_model }}</td>
                                        <td class="text-center">
                                            @if ($model->status === 1)
                                                <label class="badge badge-success">{{ 'مفعل' }}</label>
                                            @elseif ($model->status === 0)
                                                <label class="badge badge-danger">{{ 'غير مفعل' }}</label>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $model->created_at }}</td>
                                        <td class="text-center">{{ $model->updated_at }}</td>
                                        <td class="text-center">{{ $model->brand_name }}</td>
                                        <td class="text-center"><a href="{{ route('models.edit', $model->id) }}"
                                                class="btn btn-outline-success btn-sm mx-1">تعديل</a>
                                            <form action="{{ route('models.destroy') }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button name="id" value="{{ $model->id }}"
                                                    class="btn btn-outline-danger">حذف</button>

                                            </form>
                                        </td>

                                    </tr>


                                @empty
                                    <tr>
                                        <td class="text-center text-danger" colspan='8'>لا يوجد مديلات</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
