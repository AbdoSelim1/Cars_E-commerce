<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\StoreCategoryRequest;
use App\Http\Requests\Dashboard\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public const AVELABLE_STATUS = ['مفعل' => 1, 'غير مفعل' => 0];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // dd($categories);
        return view('admin.categories.create', ['categories' => $categories, 'status' => self::AVELABLE_STATUS]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        $category = Category::create($request->validated());
        $category->parent()->associate($request->parnet_id)->save();
        if ($request->create == 'create') {
            return redirect()->route('categories.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
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
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // if($request->parent_id){
        //     $parent = Category::findOrFail($request->parent_id); // electronics
        //     $category->appendToNode($parent)->save();
        //     $category->update( $request->validated() );
        // }else{
        //     $category->parent_id = NULL;
        //     $category->update( $request->validated() );
        // }
        return redirect()->route('categories.index')->with(['success' => 'تمت العمليه بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete($category->id);
        return redirect()->route('categories.index')->with(['success'=>'تمت العمليه بنجاح']);
    }
}
