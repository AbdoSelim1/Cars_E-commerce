@extends('admin.layouts.mian')
@section('title', "تعديل {$city->name}")
@section('breadcrumb')
    {{ Breadcrumbs::render('cities.edit', $city) }}
@endsection
@section('content')
    <div class="col-12">
        <div class="card card-statistics mb-30">
            <div class="card-body">
                <h5 class="card-title">@yield('title')</h5>
                <form method="post" action="{{ route('cities.update', $city->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">اسم العلامه التجاريه باللغه العربيه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name[ar]"
                            placeholder="ادخل الاسم" value="{{ $city->getTranslation('name', 'ar') }}">

                        @error('name.ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> اسم العلامه التجاريه باللغه الانجليزيه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name[en]"
                            placeholder="ادخل الاسم" value="{{ $city->getTranslation('name', 'en') }}">

                        @error('name.en')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">الحاله</label>
                        <select name="status" id="exampleInputPassword1" class="form-control">
                            @foreach ($status as $key => $value)
                                <option value="{{ $value }}" @selected($value === $city->status)>{{ $key }}
                                </option>
                            @endforeach


                        </select>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">تعديل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
