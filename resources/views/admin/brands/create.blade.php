@extends('admin.layouts.mian')
@section('title', 'انشاء علامه تجاريه')
@section('breadcrumb')
    {{ Breadcrumbs::render('brands.create') }}
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="col-12 text-center alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-12">
        <div class="card card-statistics mb-30">
            <div class="card-body">
                <h5 class="card-title p-3">@yield('title') </h5>
                <form method="post" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">اسم العلامه التجاريه باللغه العربيه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name[ar]"
                            placeholder="ادخل الاسم" value="{{ old('name.ar') }}">

                        @error('name.ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> اسم العلامه التجاريه باللغه الانجليزيه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name[en]"
                            placeholder="ادخل الاسم" value="{{ old('name.en') }}">

                        @error('name.en')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">الحاله</label>
                        <select name="status" id="exampleInputPassword1" class="form-control">
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
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary" name="create" value="create">انشاء</button>
                        <button type="submit" class="btn btn-primary" name="create" value='return'>انشاء & رجوع</button>

                    </div>
                </form>
            </div>
        </div>
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
