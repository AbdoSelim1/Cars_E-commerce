@extends('admin.layouts.mian')
@section('title', 'انشاء مشرف')
@section('breadcrumb')
    {{ Breadcrumbs::render('admins.create') }}
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="col-12 text-center alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-xl-6 mb-30 mx-auto">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <h5 class="card-title">ادخل بيانات المشرف</h5>
                <form class="ui grid form" method="post" action="{{ route('admins.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row field">
                        <label class="twelve wide column" for="name">اسم المشرف</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <input id="name" name="name" type="text" placeholder=" الاسم" />
                            </div>
                        </div>
                    </div>

                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="row field">
                        <label class="twelve wide column" for="email">البريد الالكترونى</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <input id="email" name="email" type="email" placeholder="البريد لالكترونى" />
                            </div>
                        </div>
                    </div>

                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="row field">
                        <label class="twelve wide column" for="password">كلمه المررو</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <input id="password" name="password" type="password" placeholder="كلمه المرور" />
                            </div>
                        </div>
                    </div>

                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="row field">
                        <label class="twelve wide column" for="password_confirm">تاكيد كلمه المرور</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <input id="password_confirm" name="password_confirm" type="password" placeholder="تاكيد كلمه المرور " />
                            </div>
                        </div>
                    </div>
                    @error('password_confirm')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="row field">
                        <label class="twelve wide column" for="email_verified_at">الحاله</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <select id="email_verified_at" name="email_verified_at">
                                    <option value="1">مفعل</option>
                                    <option value="0">غير مفعل</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row field">
                        <label class="twelve wide column" for="role_id">الوظيفه</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <select id="role_id" name="role_id">
                                   @foreach ($roles as $role)
                                       <option value="{{$role->id}}">{{$role->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @error('role_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-3 text-center">
                        <input name="image" type="file" class="custom-file-input d-none" id="inputGroupFile01"
                            onchange="previewImage(event)">
                        <label for="inputGroupFile01"> <img for="inputGroupFile01" id="image"
                                src="{{ asset('fileofdesgin_dashbord/images/admin.png') }}"style="border-radius:50% ;width:100px;height:100px"
                                alt="dafelte" style="cursor: pointer"> </label>
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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
