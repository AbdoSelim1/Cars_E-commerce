@extends('admin.layouts.mian')
@section('title', 'كل المنتجات')
@section('breadcrumb')
{{Breadcrumbs::render('products.index')}}
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
            <a href="{{ route('products.create') }}" class="btn btn-success my-3">انشاء منتج</a>
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
                                        <th>السعر</th>
                                        <th>الكميه</th>
                                        <th>الحاله</th>
                                        <th>الصوره</th>
                                        <th>المديل</th>
                                        <th>القسم</th>
                                        <th>التاجر</th>
                                        <th>تاريخ الانشاء</th>
                                        <th>تاريخ التعديل</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td class="text-center">
                                                @if ($product->status === 1)
                                                    <label class="bg-success text-white">{{ 'مفعل' }}</label>
                                                @elseif ($product->status === 0)
                                                    <label class="bg-danger text-white">{{ 'غير مفعل' }}</label>
                                                @endif
                                            </td>
                                            <td>{{ $product->image }}</td>
                                            <td>{{ $product->model_name }}</td>
                                            <td>{{ $product->category_name }}</td>
                                            <td>{{ $product->seller_name }}</td>
                                            <td>{{ $product->created_at }}</td>
                                            <td>{{ $product->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-outline-success">تعديل</a>
                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="حذف" class="btn btn-outline-danger">
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-danger text-center" colspan="20">لا يوجد منتجات</td>
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
{{-- @section('js')
<script src="js/morris.init.js"></script>

<!-- datepicker -->
<script src="js/datepicker.js"></script>

<!-- sweetalert2 -->
<script src="js/sweetalert2.js"></script>

<!-- toastr -->
<script src="js/toastr.js"></script>

<!-- validation -->
<script src="js/validation.js"></script>

<!-- lobilist -->
<script src="js/lobilist.js"></script>
 
<!-- custom -->
<script src="js/custom.js"></script>
@endsection --}}
