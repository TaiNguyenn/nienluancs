<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;



class CategoryController extends Controller
{
    //
    public function getCate(){
    	$data['catelist'] = Category::all();
    	return view('backend.category',$data);

    }

    public function postCate(Request $request){
        if(Category::where('cate_name','=',$request->name)->count()>1)
        {
            $error = 'Tên đã tồn tại';
            return redirect(route('categoryadmin'))->with('error',$error);
        }
        else 
            {
                $category = new Category;
                $category->cate_name = $request->name;
                $category->cate_slug = str_slug($request->name);
                $category->save();
                return back();
            }
       

    }


    public function getEditCate($id){
        $data['cate'] = Category::find($id);
    	return view('backend.editcategory',$data);
    }

    public function postEditCate(Request $request,$id){
        $category = Category::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->save();
        return redirect(route('categoryadmin'));



    }

    public function getDeleteCate($id){
        Category::destroy($id);
        return back();


    	
    }
}


