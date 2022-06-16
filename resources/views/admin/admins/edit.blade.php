@extends('admin.layouts.mian')
@section('title', "تعديل {$admin->name}")
@section('breadcrumb')
    {{ Breadcrumbs::render('admins.edit', $admin) }}
@endsection
@section('content')
    <div class="col-xl-6 mb-30 mx-auto">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <h5 class="card-title">  تعديل بيانات المشرف </h5>
                <form class="ui grid form" method="post" action="{{ route('admins.update',$admin->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row field">
                        <label class="twelve wide column" for="name">اسم المشرف</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <input id="name" name="name" type="text" placeholder=" الاسم" value="{{$admin->name}}" />
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
                                <input id="email" name="email" type="email" placeholder="البريد لالكترونى" value="{{$admin->email}}"/>
                            </div>
                        </div>
                    </div>

                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror                  
                    <div class="row field">
                        <label class="twelve wide column" for="email_verified_at">الحاله</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <select id="email_verified_at" name="email_verified_at">
                                    <option value="0"@selected($admin->email_verified_at === NULL)>غير مفعل</option>
                                    <option value="1" @selected($admin->email_verified_at !== NULL)> مفعل</option>
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
                                        <option value="{{ $role->id }}"  @selected(in_array($role->name, $admin->getRoleNames()->toArray()))>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @error('role_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-3">
                        <input name="image" type="file" class="custom-file-input d-none" id="inputGroupFile01"
                            onchange="previewImage(event)">
                        <label for="inputGroupFile01"> <img for="inputGroupFile01" id="image"
                                src="{{ $admin->getFirstMediaUrl('admins') ? asset($admin->getFirstMediaUrl('admins')): asset('fileofdesgin_dashbord/images/admin.png')}}" class="w-100"
                                alt="{{ $admin->name }}" style="cursor: pointer"> </label>
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">تعديل</button>
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
