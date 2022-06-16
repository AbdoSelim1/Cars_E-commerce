<?php

namespace App\Http\Controllers\Admin;

use App\Models\Model;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Product\StoreProductRequest;
use App\Http\Requests\Dashboard\product\UpdateProductReqest;
use App\Models\Category;

class ProductController extends Controller
{
    public const AVELABLE_STATUS = ['مفعل' => 1, 'غير مفعل' => 0];

    public function index()
    {
        $products = DB::select("SELECT `products`.*,`models`.`name` AS 'model_name',`sellers`.`name` AS 'seller_name' , `categories`.`name` AS 'category_name' FROM `products` JOIN `models` ON `products`.`model_id` = `models`.`id` JOIN `categories` ON `categories`.`id` = `products`.`categorey_id` JOIN `sellers` ON `products`.`seller_id` = `sellers`.`id`");
        return view('admin.products.index', compact('products'));
    }

    public function create()

    {
        $models = Model::all();
        $categories = Category::all();
        $sellers = Seller::all();
        return view('admin.products.create', ['models' => $models, 'categories' => $categories, 'sellers' => $sellers, 'status' => self::AVELABLE_STATUS]);
    }

    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());

 
        if ($request->create == 'create') {
            return redirect()->route('products.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
        } elseif ($request->create == 'return') {
            return redirect()->back()->with(['success' => 'تمت عمليه الانشاء بنجاح']);
        }
    }

    public function edit($id){
    
        $product = DB::table('products')->join('models','products.model_id','=','models.id')->join('categories','categories.id','=','products.categorey_id')->join('sellers','products.seller_id','=','sellers.id')->where('products.id',$id)->first();
        // dd($product);
        $models = Model::all();
        $categories = Category::all();
        $sellers = Seller::all();

        return view('admin.products.edit',['models' => $models, 'categories' => $categories, 'sellers' => $sellers, 'status' => self::AVELABLE_STATUS ,'product'=>$product]);
    }

    public function update(UpdateProductReqest $request){
        Product::find($request->id)->update($request->validated());
        return redirect()->route('products.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
    }

    public function destroy($id){
        Product::find($id)->delete();
        return redirect()->route('products.index')->with(['success' => 'تمت عمليه الانشاء بنجاح']);
    }
}
