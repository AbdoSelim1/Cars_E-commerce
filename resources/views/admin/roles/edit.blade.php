@extends('admin.layouts.mian')
@section('title', "تعديل {$role->name}")
@section('breadcrumb')
    {{ Breadcrumbs::render('roles.edit', $role) }}
@endsection
@section('content')
    <div class="col-12">
        <div class="card card-statistics mb-30">
            <div class="card-body">
                <h5 class="card-title">@yield('title')</h5>
                <form method="post" action="{{ route('roles.update',$role->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">اسم الوظيفه</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                            placeholder="ادخل الاسم" value="{{ $role->name }}">

                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        @foreach ($permissions as $controller => $permissions)
                            <div class="my-3">
                                <h5>{{ $controller }}</h5>
                                @foreach ($permissions as $permission)
                                    <div class="row">
                                        <input type="checkbox" name="permissions_id[]" id="{{ $permission->id }}"
                                            @checked(in_array($permission->id,$role_permissions_ids)) class="form-check mx-3"
                                            value="{{ $permission->id }}">
                                        <label for="{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        @error('permissions_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <input type="hidden" name="id" value="{{ $role->id }}">
                        <button type="submit" class="btn btn-primary">تعديل</button>
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
