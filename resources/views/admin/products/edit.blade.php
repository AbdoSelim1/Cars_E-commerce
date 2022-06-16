
@extends('admin.layouts.mian')
@section('title', "تعديل {$product->name}")
@section('breadcrumb')
{{-- {{Breadcrumbs::render('products.edit',$product)}} --}}
{{-- {{dd($product)}} --}}
@endsection
@section('content')
    <div class="col-xl-6 mb-30 mx-auto">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <h5 class="card-title">@yield('title')</h5>
                <form class="ui grid form" method="post" action="{{ route('products.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="row field">
                        <label class="twelve wide column" for="name">الاسم</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <input id="name" name="name" type="text" placeholder=" الاسم"
                                    value="{{ $product->name }}" />
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row field">
                        <label class="twelve wide column" for="price">السعر</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <input id="price" name="price" type="number" placeholder="السعر"
                                    value="{{ $product->price }}" />
                            </div>
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row field">
                        <label class="twelve wide column" for="quantity">الكميه</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <input id="quantity" name="quantity" type="number" placeholder="الكميه"
                                    value="{{ $product->quantity }}" />
                            </div>
                            @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row field">
                        <label class="twelve wide column" for="status">الحاله</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <select name="status" id="status">
                                    @foreach ($status as $key => $value)
                                        <option value="{{ $value }}" @selected($value === $product->status)>{{ $key }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row field">
                        <label class="twelve wide column" for="seller">التاجر</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <select name="seller_id" id="seller">
                                    @foreach ($sellers as $seller)
                                        <option value="{{ $seller->id }}" @selected($seller->id === $product->seller_id)>
                                            {{ $seller->name }}</option>
                                    @endforeach
                                </select>
                                @error('seller_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row field">
                        <label class="twelve wide column" for="category">القسم</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <select name="categorey_id" id="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected($category->id === $product->categorey_id)>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('categorey_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row field">
                        <label class="twelve wide column" for="model">المديل</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <select name="model_id" id="model">
                                    @foreach ($models as $model)
                                        <option value="{{ $model->id }}" @selected($model->id === $product->model_id)>
                                            {{ $model->name }}</option>
                                    @endforeach
                                </select>
                                @error('model_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row field">
                        <label class="twelve wide column" for="description">الوصف</label>
                        <div class="twelve wide column">
                            <div class="ui input">
                                <textarea name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
                            </div>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="mt-5">
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">تعديل</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
