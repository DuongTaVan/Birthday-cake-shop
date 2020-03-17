<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\Bill;
use App\User;
use App\BillDetail;
use Session;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    public function index(){
        $slide = Slide::all();
        $newP = Product::where('new',1)->paginate(8);
        $spkm = Product::where('promotion_price','<>',0)->paginate(8);

        // print_r($slide);
        // exit();
    	return view('pages.trangchu', compact('slide','newP','spkm'));
    }
    public function loaisanpham($type){
        $loaisp = ProductType::all();
        $id_loaisp = Product::where('id_type',$type)->paginate(6);
        $newP = Product::where('new',1)->paginate(3);
        $namesp = ProductType::where('id',$type)->first();
    	return view('pages.loaisanpham', compact('id_loaisp','loaisp','namesp','newP'));
    }
    public function chitietsanpham(Request $Request){
        $ctsp = Product::where('id',$Request->type)->first();
        $newP = Product::where('new',1)->paginate(3);
    	return view('pages.chitietsanpham', compact('ctsp','newP'));
    }
    public function gioithieu(){
    	return view('pages.gioithieu');
    }
    public function lienhe(){
    	return view('pages.lienhe');
    }
    public function addtocard(Request $Request, $id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart ->add($product,$id);
        $Request->Session()->put('cart',$cart);
        return redirect()->back();
    }
    public function delcard($id){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0)
        {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function dathang(){

        return view('pages.dathang');
    }
    public function postdathang(Request $Request){
        $cart = Session::get('cart');
        //dd($cart);
        $customer = new Customer;
        $customer->name = $Request->name;
        $customer->gender = $Request->gender;
        $customer->email = $Request->email;
        $customer->address = $Request->address;
        $customer->phone_number = $Request->phone;
        $customer->note = $Request->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $Request->payment_method;
        $bill->note = $Request->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();

        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Bạn đã đặt thành công sản phẩm! ');
        
    }
    public function dangki(){
        return view('pages.dangki');
    }
    function postdangki(Request $Request){
        $this->validate($Request , ['name'=>'required|min:3',
                                    'email'=>'required|email|unique:users,email',
                                    'password'=>'required|min:3|max:32',
                                    'passwordAgain'=>'required|same:password',
                                    'phone'=>'required',
                                    'address'=>'required',
                                    ],
            ['name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên phải có ít nhất 3 kí tự',
             'email.required'=>'Bạn chưa nhập email',
             'email.email'=>'Email chưa đúng dạng',
             'email.unique'=>'Email đã tồn tại',
             'password.required'=>'Bạn chưa nhâp password',
             'password.min'=>'password phải có ít nhất 3 kí tự',
             'password.max'=>'password phải có nhiều nhất 32 kí tự',
             'passwordAgain.required'=>'Bạn chưa nhập lại password',
             'passwordAgain.same'=>'Password không trùng với password vừa nhập',
             'phone.required'=>'Bạn chưa nhập số điện thoại',
             'address.required'=>'Bạn chưa nhập địa chỉ'
            ]);
        $user = new User;
        $user->full_name = $Request->name;
        $user->email = $Request->email;
        $user->password = bcrypt($Request->password);
        $user->phone = $Request->phone;
        $user->address = $Request->address;
        $user->save();
        return redirect('dangki')->with('thongbao', 'Chúc mừng bạn đã đăng kí thành công!');
    }
    public function dangnhap(){
        return view('pages.dangnhap');
    }
    function postdangnhap(Request $Request){
        $this->validate($Request,[
                                    'email'=>'required',
                                    'password'=>'required|min:3|max:32'
                                ],[
                                    'email.required'=>'Bạn chưa nhập email',
                                    'password.required'=>'Bạn chưa nhập password',
                                    'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
                                    'password.max'=>'Mật khẩu có không quá 32 kí tự'
                                ]);
        if(Auth::attempt(['email'=>$Request->email,'password'=>$Request->password]))
        {
            return redirect('index');
        }
        else{
            return redirect('dangnhap')->with('thongbao', 'Đăng nhập không thành công!');
        }
    }
    function timkem(Request $request)
    {
        // $tukhoa = $request->tukhoa;
        $tukhoa=$request->get('tukhoa');
        $product = Product::where('name','like','%'.$tukhoa.'%')->orWhere('unit_price','like','%'.$tukhoa.'%')->paginate(8);;
        return view('pages/timkiem',compact('product','tukhoa'));
    }
    function dangxuat(){
      
        Auth::logout();
        return redirect('index');
    }
}
