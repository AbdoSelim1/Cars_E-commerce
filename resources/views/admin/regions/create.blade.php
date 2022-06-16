@extends('admin.layouts.mian')
@section('title', 'انشاء منطقه')
@section('breadcrumb')
    {{ Breadcrumbs::render('regions.create') }}
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
                <form method="post" action="{{ route('regions.store') }}">
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
                    <div class="row mb-4">
                        <div class="col">
                            <label for="status">الحاله</label>
                            <select name="status" id="status" class="form-control">
                                @foreach ($status as $key => $value)
                                    <option value="{{ $value }}" @selected(old('status') == $value)>{{ $key }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="city_id">الحاله</label>
                            <select name="city_id" id="city_id" class="form-control">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" @selected(old('city_id') == $city->id)>
                                        {{ $city->getTranslation('name', 'en') . '-' . $city->getTranslation('name', 'ar') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="number" name="latitude" class="form-control" placeholder="خطوط الطول">
                        </div>
                        @error('latitude')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col">
                            <input type="number" name="longitude" class="form-control" placeholder="دوئر العرض ">
                        </div>
                        @error('longitude')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="notes"> ملاحظات </label>
                        <textarea class="form-control" id="notes" name="notes" cols="30">{{ old('notes') }}</textarea>
                        @error('notes')
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
