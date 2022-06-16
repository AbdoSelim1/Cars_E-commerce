@extends('admin.layouts.app')
@section('title', 'انشاء حساب')
@section('content')
    <section class="height-100vh d-flex align-items-center page-section-ptb login">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col-lg-4 col-md-6 bg-dark">
                    <form action="{{ route('register') }}" method='POST'>
                        @csrf
                        <div class="login-fancy pb-40 clearfix">
                            <h1 class="text-center my-3">انشاء حساب جديد</h1>
                            <div class="section-field mb-20 ">
                                <label class="mb-10" for="name">اسم المشرف* </label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10" for="email">البريد الاكترونى* </label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10" for="password">كلمه المرور* </label>
                                <input id="password" type="password"
                                    class="Password form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10" for="conferm">تاكيد كلمه المرور* </label>
                                <input id="password-confirm" type="password" class="Password form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <button class="button">
                                <span> أنشاء حساب جديد</span>
                                <i class="fa fa-check"></i>
                            </button>
                            {{-- <p class="mt-20 mb-0">Don't have an account? <a href="login.html"> Create one here</a></p> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

