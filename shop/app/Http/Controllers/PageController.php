<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Session;
use App\Http\Controllers\DB;
use \App\Models\Slide;
use \App\Models\Product;
use \App\Models\ProductType;
use \App\Models\Cart;
use \App\Models\Customer;
use \App\Models\Bill;
use \App\Models\BillDeTail;


class PageController extends Controller
{
    public function getIndex(){
        $slide= Slide::all();
        $new_product=Product::where('new',1)->paginate(4);
        $sale_product=Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',['slide'=>$slide,
                                'new_product'=>$new_product,
                                'sale_product'=>$sale_product
                                ]);
    }
    public function getLoaiSp($type){
        $sp_theoloai=Product::where('id_type',$type)->get();
        $loai= ProductType::all();
        $ten=ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',['sp_theoloai'=>$sp_theoloai,
                                'loai'=>$loai,
                                'ten'=>$ten      
                                ]);
    }
    public function getChitiet(Request $request){
        $sanpham= Product::where('id',$request->id)->first();
        $sp_tuongtu=Product::where('id_type',$sanpham->id_type)->paginate(3);
        return view('page.chitiet_sanpham',['sanpham'=>$sanpham,
                                'sp_tuongtu'=>$sp_tuongtu 
                                ]);
    }
    public function getLienHe(){
        return view('page.lienhe');
    }
    public function getGioiThieu(){
        return view('page.gioithieu');
    }
    public function AddCart(Request $request, $id){
        $product= \DB::table('products')->where('id',$id)->first();
        if($product != null){
            $oldcart= Session('Cart') ? Session('Cart') :null;
            $newCart = new Cart($oldcart);
            $newCart->AddCart($product,$id);
            $request->session()->put('Cart', $newCart);
        }
        return view('page.cart',['newCart'=>$newCart]);
    }
    public function DeleteItemCart(Request $request, $id){
        $oldcart= Session('Cart') ? Session('Cart') :null;
        $newCart = new Cart($oldcart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart->products) > 0)
        {
            $request->Session()->put('Cart', $newCart);
        }
        else
        {
            $request->Session()->forget('Cart');
        }
            
        return view('page.cart',['newCart'=>$newCart]);
    }
    public function List(){
        return view('page.list');
    }
    public function DeleteListCart(Request $request, $id){
        $oldcart= Session('Cart') ? Session('Cart') :null;
        $newCart = new Cart($oldcart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart->products) > 0)
        {
            $request->Session()->put('Cart', $newCart);
        }
        else
        {
            $request->Session()->forget('Cart');
        }
            
        return view('page.list_cart',['newCart'=>$newCart]);
    }
    public function SaveListCart(Request $request, $id, $quanty)
    {
        $oldcart= Session('Cart') ? Session('Cart') :null;
        $newCart = new Cart($oldcart);
        $newCart->UpdateItemCart($id,$quanty);
    
        $request->Session()->put('Cart', $newCart);
            
        return view('page.list_cart',['newCart'=>$newCart]);
    }
    public function getCheckout(){
        return view('page.checkout');
    }
    public function postCheckout(Request $request){
        $cart = $request->session()->get('Cart');
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'note' => 'required',
        ]);
        $customer= new Customer;
            $customer->name= $request->name;
            $customer->gender= $request->gender;
            $customer->email= $request->email;
            $customer->address= $request->address;
            $customer->phone_number= $request->phone;
            $customer->save();
        $bill= new Bill;
            $bill->id_customer= $customer->id;
            $bill->date_order= date('Y-m-d');
            $bill->total= $cart->totalPrice;
            $bill->payment= $request->payment;
            $bill->note= $request->note;
            $bill->save();
        foreach($cart->products as $key => $value)
        {
            $bill_detail= new BillDeTail;
                $bill_detail->id_bill= $bill->id;
                $bill_detail->id_product= $key;
                $bill_detail->quantity= $value['quanty'];
                $bill_detail->unit_price= $value['price'];
                $bill_detail->save();
        }
        $request->session()->flash('mess','Bạn Đã Đặt Hàng Thành Công, Chúc Bạn Ngày Mới Vui Vẻ và Có Tiền Là Mua Bánh');
        $request->Session()->forget('Cart'); 
        return redirect('index')->with('tb', 'Đặt Hàng Thành Công');
        
    }
    
    
}
