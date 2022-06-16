<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Dashboard\Model\StoreModelRequest;
use App\Http\Requests\Dashboard\Model\UpdateModelRequest;

class ModelController extends Controller
{
    public const AVELABLE_STATUS = ['مفعل' => 1, 'غير مفعل' => 0];


    public function index()
    {
        $models = DB::select("SELECT `models`.*,`brands`.`name` AS 'brand_name' FROM `models` JOIN `brands` ON `brands`.`id` = `models`.`brand_id` ");
        return view('admin.models.index', compact('models'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.models.create', ['brands' => $brands, 'status' => self::AVELABLE_STATUS]);
    }

    public function store(StoreModelRequest $request)
    {
        $model =  Model::create($request->validated());
        $model->addMediaFromRequest('image')->toMediaCollection('models', 'public');
        $img = Image::make($model->getFirstMediaPath('models'));
        if (isset($request->resize)) {
            $img->resize($request->width, $request->height)->save($model->getFirstMediaPath('models'));
        }
        if ($request->create == 'create') {
            return redirect()->route('models.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
        } elseif ($request->create == 'return') {
            return redirect()->back()->with(['success' => 'تمت عمليه الانشاء بنجاح']);
        }
    }

    public function edit($id)
    {
        $model = Model::where('id', $id)->first();
        $brands = Brand::all();
        return view('admin.models.edit', compact('model', 'brands'));
    }

    public function update(UpdateModelRequest $request)
    {

        $model = Model::findOrFail($request->id);
        $model->update($request->validated());


        if ($request->hasFile('image')) {
            if (isset($model->getMedia('models')[0])) {
                $model->getMedia('models')[0]->delete();
                $model->addMediaFromRequest('image')->toMediaCollection('models', 'public');
            }
        }

        if ($request->has('resize')) {
            $model = Model::findOrFail($model->id);
            Image::make($model->getFirstMediaPath('models'))->resize($request->width, $request->height)->save();
        }
        return redirect()->route('models.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
    }

    public function destroy(Request $request)
    {
        $request->validate(
            [
                'id' => ['required', 'integer', 'exists:models,id']
            ]
        );
        Model::findOrFail($request->id)->delete();
        return redirect()->route('models.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
    }
}
