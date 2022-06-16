@extends('admin.layouts.mian')
@section('title', 'الصفحه الشخصيه')
@section('content')
    <div class="col-12">
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
        <div class=" profile-page">
            <div class="row">
                <div class="col-lg-12 mb-30">
                    <div class="card">
                        <div class="card-body">
                            <div class="user-bg" style="background: url(images/user-bg.jpg);">
                                <div class="user-info">
                                    <div class="row">
                                        <div class="col-lg-6 align-self-center">
                                            <div class="user-dp "> <input name="image" type="file"
                                                    class="custom-file-input d-none" id="inputGroupFile01" form="profile"
                                                    onchange="previewImage(event)">
                                                <label for="inputGroupFile01">
                                                    <img for="inputGroupFile01" id="image"
                                                        src="{{ $admin->getFirstMediaUrl('admins') ? asset($admin->getFirstMediaUrl('admins')) : asset('assets/admin/images/default.png') }}"
                                                        class=" " alt="{{ $admin->name }}"
                                                        style="cursor: pointer;">
                                                </label>
                                            </div>
                                            <div class="user-detail px-3">
                                                <h2 class="name">{{ $admin->name }}</h2>
                                                <p class="designation mb-0 " style="font-size: 16px">
                                                    {{ $admin->getRoleNames()->toArray()[0] }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-right align-self-center">
                                            <button type="button" class="btn btn-sm btn-danger"><i
                                                    class="ti-user pr-1"></i>Follow</button>
                                            <button type="button" class="btn btn-sm btn-success"><i
                                                    class="ti-email pr-1"></i>Message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="edit" id="edit">
                <div class="col-12 ">
                    <form action="{{ route('profile.update', $admin->id) }}" method="post" enctype="multipart/form-data"
                        id="profile">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-11 col-lg-4 mx-auto bg-dark py-3 mb-30">
                                <div class="form-group">
                                    <label for="Name">الأسم</label>
                                    <input type="text" name="name" id="Name" class="form-control" placeholder=""
                                        aria-describedby="helpId" value="{{ $admin->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">البريد الالكترونى</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder=""
                                        aria-describedby="helpId" value="{{ $admin->email }}">
                                </div>
                                <div class="form-group">
                                    <a class="text-primary" href="{{route('profile.password-reset')}}" class="float-right">هل تريد تعديل كلمة
                                        المرور؟</a>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-success rounded"> تعديل </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
{{-- @push('js')
  
@endpush --}}
