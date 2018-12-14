<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;

class FrontendController extends Controller
{
    
    public function getHome()
    {
       $data['featured'] = Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
       $data['news'] = Product::where('prod_featured',0)->orderBy('prod_id','desc')->take(8)->get();
       
       return view('frontend.home',$data);
   }

   public function getDetail($id){

   	$data['item'] = Product::find($id);
   	$data['comments'] = Comment::where('com_product',$id)->get();

   	return view('frontend.details',$data);
   }

   public function getCategory($id){
   	
   	$data = Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(8);
   	return view('frontend.category')
   	->with('data',$data);
   }

   public function postComment(Request $request,$id){
   	$comment = new Comment;
   	$comment->com_name = $request->name;
   	$comment->com_email = $request->email;
   	$comment->com_content = $request->content;
   	$comment->com_product = $id;
   	$comment->save();
   	return back();

   }

   public function getSearch(Request $request){
    $result = $request->text;
    $data = Product::where('prod_name','LIKE',"%{$result}%");
    return view('frontend.search')
    ->with('data',$data);

   }
   public function timkiem(Request $request)
 {
  if($request->text=='')
  {
   return redirect()->route('timkiem','a');
 }
 else 
 {
  $tu= str_slug($request->text);
  return redirect()->route('timkiem',$tu);
}
}
public function trangtimkiem($tukhoa)
{
  $ta = str_replace('-',' ',$tukhoa); 
  
  $data = Product::where('prod_name','LIKE',"%{$ta}%")->paginate(8);
    return view('frontend.search')
    ->with('data',$data)
    ->with('ta',$ta);
  
}




    
}
