<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Mail;
class CartController extends Controller
{
    public function getAddCart($id){

    	$product = Product::find($id);
    	Cart::add(['id' => $id, 'name' => $product->prod_name, 'qty' => 1, 'price' => $product->prod_price, 'options' => ['img' => $product->prod_img]]);
    	return redirect('cart/show');



    }

    public function getShowCart(){
    	$data['total'] = Cart::total();
    	$data['items'] = Cart::content();
    	return view('frontend.cart',$data);


    }
    public function getDeleteCart($id){

    	if($id=='all'){
    		Cart::destroy();

    	}else{
    		Cart::remove($id);
    	}
    	return back();


    }


    public function getUpdateCart(Request $request){
        Cart::update($request->rowId,$request->qty);
    }

    public function updateSoLuong($id,Request $request){
        Cart::update($id,$request->qty);
        return back();
    }

    public function postComplete(Request $request){
        $data['info'] = $request->all();
        
        $data['total']= Cart::total();
        $data['cart'] = Cart::content();

        $email = $request->email;
        Mail::send('frontend.email', $data, function($message) use ($email){
            $message->from('tainguyen969706@gmai.com', 'Cửa hàng');
            $message->to($email,$email);
            $message->cc('taib1507302@student.ctu.edu.vn','Tai Nguyen');
            $message->subject('Xác nhận hoá đơn mua hàng');
        });

        Cart::destroy();
        return redirect('complete');


     }
     public function getComplete(){
        return view ('frontend.complete');
     }
     
}


