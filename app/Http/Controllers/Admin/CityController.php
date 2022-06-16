<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\City\StoreCityRequest;
use App\Http\Requests\Dashboard\City\UpdateCityRequest;
use App\Models\City;

class CityController extends Controller
{
    public const AVELABLE_STATUS = ['متاح التوصيل' => 1, 'غير متاح للتوصيل' => 0];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', ['cities' => $cities, 'status' => self::AVELABLE_STATUS]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create', ['status' => self::AVELABLE_STATUS]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCityRequest $request)
    {

        City::create($request->validated());

        if ($request->create == 'create') {
            return redirect()->route('cities.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
        } elseif ($request->create == 'return') {
            return redirect()->back()->with(['success' => 'تمت عمليه الانشاء بنجاح']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.cities.edit', ['city' => $city, 'status' => self::AVELABLE_STATUS]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->validated());
        return redirect()->route('cities.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->back()->with(['success' => 'تمت عمليه الانشاء بنجاح']);
    }
}
