<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use DB;
class ProductController extends Controller
{
    public function getProduct(){
        $data['productlist'] = DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->orderBy('prod_id','desc')->get();
    	return view('backend.product',$data);

    }

    public function getAddProduct(){
    	
        $data['catelist'] = Category::all();
        return view('backend.addproduct',$data);

    }

    public function postAddProduct(Request $request){
        
        $filename = $request->img->getClientOriginalName();
        $product = new Product;
        $product->prod_name = $request->name;
        $product->prod_slug = str_slug($request->name);
        $product->prod_img = $filename;
        $product->prod_accessories = $request->accessories;
        $product->prod_price = $request->price;
        $product->prod_warranty = $request->warranty;
        $product->prod_promotion = $request->promotion;
        $product->prod_condition = $request->condition;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_cate = $request->cate;
        $product->prod_featured = $request->featured;
        $product->save();
        $file = $request->img;
         $file->move('upload', $file->getClientOriginalName());
$data['productlist'] = DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->orderBy('prod_id','desc')->get();
        return view('backend.product',$data);
        

    }

    public function getEditProduct($id){
        $data = Product::find($id);

        $catas = Category::all();
    	return view('backend.editproduct')
        ->with('data', $data)
        ->with('catas', $catas);
        


    }

    public function postEditProduct(Request $request,$id){
        
        

        $product = Product::find($id);
        $product->prod_name = $request->name;
        $product->prod_name = ($request->name);
        $product->prod_accessories = $request->accessories;
        $product->prod_price = $request->price;
        $product->prod_warranty = $request->warranty;
        $product->prod_promotion = $request->promotion;
        $product->prod_condition = $request->condition;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_cate = $request->cate;
        $product->prod_featured = $request->featured;
        if($request->hasFile('img')){
           $file = $request->img;
           $product->prod_img = $file->getClientOriginalName();
           $file->move('upload', $product->prod_img);
       }
        $product->save();
        return redirect(route('product'));


    }

    public function getDeleteProduct($id){
        Product::destroy($id);
       return redirect(route('product'));

    }


}
