@extends('admin.layouts.mian')
@section('title',"التعديل {$category->name}")
@section('breadcrumb')
{{Breadcrumbs::render('categories.edit',$category)}}
@endsection
@section('content')
<div class="col-12">
    <div class="card card-statistics mb-30">
        <div class="card-body">
            <h5 class="card-title">@yield('title')<h5>
            <form method="post" action="{{route('categories.update',$category->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1">اسم القسم باللغه العربيه </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name[ar]"
                        placeholder="ادخل الاسم" value='{{$category->getTranslation('name','ar')}}'>

                    @error('name.ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">اسم القسم باللغه الانجليزيه </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name[en]"
                        placeholder="ادخل الاسم" value='{{$category->getTranslation('name','en')}}'>

                    @error('name.en')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">الحاله</label>
                    <select name="status" id="exampleInputPassword1" class="form-control">

                        <option disboled selected></option>
                        <option value="1" {{$category->status === 1? 'selected' : ''}}>مفعل</option>
                        <option value="0"  {{$category->status ===0? 'selected' : ''}}>غير مفعل</option>

                    </select>

                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="parnet_id">القسم التابع له</label>
                    <select name="parnet_id" id="parnet_id" class="form-control">
                        <option value="">رئيسى</option>
                        @foreach ($categories as $category1)
                            <option value="{{ $category1->id }}" @selected($category1->id === $category->parent_id)>
                                {{ $category1->getTranslation('name', 'en') . '-' . $category1->getTranslation('name', 'ar') }}
                            </option>
                        @endforeach
                    </select>

                    @error('parnet_id')
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