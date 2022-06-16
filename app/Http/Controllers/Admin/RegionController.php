<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Region\StoreRegionRequest;
use App\Http\Requests\Dashboard\Region\UpdateRegionRequest;
use App\Models\City;
use App\Models\Region;

class RegionController extends Controller
{
    public const AVELABLE_STATUS = ['متاح للتوصيل' => 1, 'غير متاح للتوصيل' => 0];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();
        return view('admin.regions.indxe',compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.regions.create',['cities'=>$cities,'status'=>self::AVELABLE_STATUS]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegionRequest $request)
    {
        Region::create($request->validated());

        if ($request->create == 'create') {
            return redirect()->route('regions.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
        } elseif ($request->create == 'return') {
            return redirect()->back()->with(['success' => 'تمت عمليه الانشاء بنجاح']);
        }
    }


    public function edit(Region $region)
    {
        $cities = City::all();

        return view('admin.regions.edit',['cities'=>$cities,'region'=>$region,'status'=>self::AVELABLE_STATUS]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegionRequest $request, Region $region)
    {
        
        $region->update($request->validated());
        return redirect()->route('regions.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('regions.index')->with(['success'=>"تمت العمليه بنجاح"]);
    }
}
