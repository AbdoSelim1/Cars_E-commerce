@extends('admin.layouts.mian')
@section('title', 'انشاءالمديلات')
@section('breadcrumb')
    {{ Breadcrumbs::render('models.create') }}
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="col-12 text-center alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-12">
        <div class="col-12 p-3">
            <h2>@yield('title')</h2>
        </div>
        <form action="{{ route('models.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card card-statistics mb-30">
                <div class="card-body">
                    <h5 class="card-title">ادخل المديل </h5>
                    <div class="form-group">
                        <label for="exampleInputEmail1">اسم المديل باللغه العربيه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name[ar]"
                            placeholder="ادخل الاسم" value="{{ old('name.ar') }}">

                        @error('name.ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> اسم المديل باللغه الانجليزيه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name[en]"
                            placeholder="ادخل الاسم" value="{{ old('name.en') }}">

                        @error('name.en')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-15">
                        <h4 class="h4 text-white">سنه المديل</h4>
                        <input class="form-control" type="text" placeholder="سنه المديل" name="date_model"
                            value="{{ old('date_model') }}">
                        @error('date_model')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-15">
                        <h4 class="h4 text-white">اختر العلامه التجاريه</h4>
                        <select class="form-control form-control-lg mb-15" name="brand_id">
                            <option selected disaboled></option>
                            @forelse ($brands as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}</option>

                            @empty
                                <option>لا يوجد علامات تجاريه مفضلك اذهب لادخال علامه تجاريه</option>
                            @endforelse
                        </select>
                        @error('brand_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-15">
                        <h4 class="h4 text-white">اختر الحاله</h4>
                        <select class="form-control form-control-lg mb-15" name="status">
                            @foreach ($status as $key => $value)
                                <option value="{{ $value }}" @selected(old('status') == $value)>{{ $key }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <input name="image" type="file" class="custom-file-input d-none" id="inputGroupFile01"
                            onchange="previewImage(event)">
                        <label for="inputGroupFile01"> <img for="inputGroupFile01" id="image"
                                src="{{ asset('fileofdesgin_dashbord/images/dafelte.jpg') }}" class="w-100"
                                alt="dafelte" style="cursor: pointer"> </label>
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <div class="row my-3 pt-3">
                            <input type="checkbox" name="resize" value="yes" id="resize" class="form-check mx-3 "
                                onchange="hiddenAndVisableBox()">
                            <label for="resize" class="fs-5 text-white " style="user-select:none">احدد ابعاد الصوره</label>
                        </div>
                        <div class="row col-lg-5 justify-content-between d-none " id="box">
                            <div class="col-5">
                                <input type="number" name="width" placeholder="العرض....." class="form-control col-12">
                                @error('width')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-5">
                                <input type="number" name="height" placeholder="الطول....." class="form-control col-12">
                                @error('height')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="my-5">
                        <button type="submit" class="btn btn-primary" name="create" value="create">انشاء</button>
                        <button type="submit" class="btn btn-primary" name="create" value='return'>انشاء & رجوع</button>

                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        var previewImage = function(event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

@endsection
