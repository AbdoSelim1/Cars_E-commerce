@extends('admin.layouts.mian')
@section('title', 'انشاء مدن')
@section('breadcrumb')
    {{ Breadcrumbs::render('cities.create') }}
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
                <form method="post" action="{{ route('cities.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">اسم المدينه باللغه العربيه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name[ar]"
                            placeholder="ادخل الاسم" value="{{ old('name.ar') }}">

                        @error('name.ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> اسم المدينه باللغه الانجليزيه</label>
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
                   
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary" name="create" value="create">انشاء</button>
                        <button type="submit" class="btn btn-primary" name="create" value='return'>انشاء & رجوع</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

