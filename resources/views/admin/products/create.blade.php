@extends('admin.layouts.mian')
@section('title', 'انشاء منتج')
@section('breadcrumb')
{{Breadcrumbs::render('products.create')}}
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
                <h5 class="card-title">ادخل بيانات المنتج</h5>
                <form class="ui grid form" method="post" action="{{ route('products.store') }}">
                    @csrf
                    <div class="row field">
                        <label class="twelve wide column" for="name">الاسم</label>
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
                        <label class="twelve wide column" for="price">السعر</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <input id="price" name="price" type="number" placeholder="السعر" />
                            </div>
                        </div>
                    </div>

                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="row field">
                        <label class="twelve wide column" for="quantity">الكميه</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <input id="quantity" name="quantity" type="number" placeholder="الكميه" />
                            </div>
                        </div>
                    </div>

                    @error('quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="row field">
                        <label class="twelve wide column" for="status">الحاله</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <select name="status" id="status">
                                    @foreach ($status as $key => $value)
                                        <option value="{{ $value }}" @selected(old('status') == $value)>{{ $key }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="row field">
                        <label class="twelve wide column" for="seller">التاجر</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <select name="seller_id" id="seller">
                                    @foreach ($sellers as $seller)
                                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    @error('seller_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="row field">
                        <label class="twelve wide column" for="category">القسم</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <select name="categorey_id" id="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    @error('categorey_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="row field">
                        <label class="twelve wide column" for="model">المديل</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <select name="model_id" id="model">
                                    @foreach ($models as $model)
                                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    @error('model_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="row field">
                        <label class="twelve wide column" for="description">الوصف</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <textarea name="description" id="description" cols="30"
                                    rows="10">description Lorem ipsum dolor sit amet consectetur adipisicing elit. In id nesciunt quam adipisci doloremque, sequi voluptatem odit error qui est at. Temporibus sint asperiores quasi magnam praesentium consequatur delectus provident.</textarea>
                            </div>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
