@extends('admin.layouts.mian')
@section('title', 'كل التجار')
@section('breadcrumb')
    {{ Breadcrumbs::render('sellers.index') }}
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
            {{-- @if (can('sotre seller', 'admin')) --}}
                <a href="{{ route('sellers.create') }}" class="btn btn-success my-3">انشاء تاجر</a>
            {{-- @endif --}}
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
                                        <th>الرقم القومى</th>
                                        <th>التليفون</th>
                                        <th>النوع</th>
                                        <th>الحاله</th>
                                        <th>روابط التواصل</th>
                                        <th>حاله التحقق</th>
                                        <th>تاريخ الانشاء</th>
                                        <th>تاريخ التعديل</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sellers as $seller)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $seller->name }}</td>
                                            <td>{{ $seller->email }}</td>
                                            <td>{{ $seller->national_id}}</td>
                                            <td>{{ $seller->phone}}</td>
                                            <td>{{ $seller->gender}}</td>
                                            <td>{{ $seller->status}}</td>
                                            <td>{{ $seller->social_links}}</td>
                                            <td>{{ $seller->email_verified_at }}</td>
                                            <td>{{ $seller->created_at }}</td>
                                            <td>{{ $seller->updated_at }}</td>
                                            <td>
                                                {{-- @if (can('update seller', 'admin')) --}}
                                                    <a href="{{ route('sellers.edit', $seller->id) }}"
                                                        class="btn btn-outline-success">تعديل</a>
                                                {{-- @endif --}}
                                                {{-- @if (can('destroy seller', 'admin')) --}}
                                                    <form action="{{ route('sellers.destroy', $seller->id) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="حذف" class="btn btn-outline-danger">
                                                    </form>
                                                {{-- @endif --}}
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
