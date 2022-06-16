@extends('admin.layouts.mian')
@section('title', 'انشاء وظيفه')
@section('breadcrumb')
    {{ Breadcrumbs::render('roles.create') }}
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="col-12 text-center alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="col-12 text-center alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="col-12">
        <div class="card card-statistics mb-30">
            <div class="card-body">
                <h5 class="card-title p-3">@yield('title') </h5>
                <form method="post" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">اسم الوظيفه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                            placeholder="ادخل الاسم" value="{{ old('name') }}">

                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        @foreach ($permissions as $controller => $permission)
                            <div class="my-3">
                                <h5>{{ $controller }}</h5>
                                @foreach ($permission as $item)
                                    <div class="row">
                                        <input type="checkbox" name="permissions_id[]" id="{{ $item->id }}"
                                            class="form-check mx-3" value="{{ $item->id }}">
                                        <label for="{{ $item->id }}">{{ $item->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        @error('permissions_id')
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
@section('js')
    <script>

    </script>

@endsection
@section('css')
    <style>
        label {
            font-size: 16px
        }

    </style>
@endsection
