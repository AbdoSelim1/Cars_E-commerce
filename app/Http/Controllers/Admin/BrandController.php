<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Dashboard\Brand\StoreBrandRequest;
use App\Http\Requests\Dashboard\Brand\UpdateBrandRequest;

class BrandController extends Controller
{
    public const AVELABLE_STATUS = ['مفعل' => 1, 'غير مفعل' => 0];

    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create', ['status' => self::AVELABLE_STATUS]);
    }

    public function store(StoreBrandRequest $request)
    {

        $brand = Brand::create($request->validated());

        $brand->addMediaFromRequest('image')->toMediaCollection('brands', 'public');
        $img = Image::make($brand->getFirstMediaPath('brands'));
        if (isset($request->resize)) {
            $img->resize($request->width, $request->height)->save($brand->getFirstMediaPath('brands'));
        }

        if ($request->create == 'create') {
            return redirect()->route('brands.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
        } elseif ($request->create == 'return') {
            return redirect()->back()->with(['success' => 'تمت عمليه الانشاء بنجاح']);
        }
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request)
    {

        $brand = Brand::findOrFail($request->id);
        $brand->update($request->validated());

        if ($request->hasFile('image')) {
            if (isset($brand->getMedia('brands')[0])) {
                $brand->getMedia('brands')[0]->delete();
                $brand->addMediaFromRequest('image')->toMediaCollection('brands', 'public');
            }
        }

        if ($request->has('resize')) {
            $brand = Brand::findOrFail($brand->id);
            Image::make($brand->getFirstMediaPath('brands'))->resize($request->width, $request->height)->save();
        }

        return redirect()->route('brands.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->back()->with(['success' => 'تمت عمليه الانشاء بنجاح']);
    }
}
