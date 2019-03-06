<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;

class PageController extends Controller
{
    public function getIndex(){
      $slide=Slide::all();
      $new_product=Product::where('new',1)->paginate(4, ['*'], 'pag');
      $promotional_product=Product::where('promotion_price','<>',0)->paginate(8);
      return view('pages.index', compact('slide','new_product','promotional_product'));
    }

    public function getProductType($type){
      $product_sorted_by_type=Product::where('id_type',$type)->paginate(9);
      $other_product=Product::where('id_type','<>',$type)->take(3)
                              ->get();
      $all_type=ProductType::all();
      $type_of_product=ProductType::where('id',$type)->first();
      return view('pages.product_type',compact('product_sorted_by_type','other_product','all_type','type_of_product'));
    }

    public function getAllProducts(){
      $all_products=Product::paginate(15);
      $all_type=ProductType::all();
      return view('pages.all_products',compact('all_products','all_type'));
    }

    public function getProduct($id){
      $product=Product::where('id',$id)->first();
      $related_product=Product::where('id_type',$product->id_type)
                                ->where('id','<>',$product->id)
                                ->take(6)
                                ->get();
      return view('pages.product',compact('product','related_product'));
    }

    public function getContact(){
      return view('pages.contact');
    }

    public function getAbout(){
      return view('pages.about');
    }

    public function getAddToCart(Request $req, $id){
      $product=Product::find($id);
      $oldCart=Session::has('cart')?Session::get('cart'):null;
      $cart=new Cart($oldCart);
      $cart->add($product, $product->id);
      $req->session()->put('cart',$cart);
      return redirect()->back();
    }

    public function getDelCart($id){
      $oldCart=Session::has('cart')?Session::get('cart'):null;
      $cart=new Cart($oldCart);
      $cart->removeItem($id);
      if(count($cart->items)>0){
        Session::put('cart',$cart);
      }else{
        Session::forget('cart');
      }

      return redirect()->back();
    }

    public function getCheckOut(){
      return view('pages.checkout');
    }

    public function postCheckOut(Request $req){
      $cart = Session::get('cart');

      $customer = new Customer;
      $customer->name=$req->name;
      $customer->gender=$req->gender;
      $customer->email=$req->email;
      $customer->address=$req->address;
      $customer->phone_number=$req->phone;
      $customer->note=$req->note;
      $customer->save();

      $bill = new Bill;
      $bill->id_customer=$customer->id;
      $bill->date_order=date('Y-m-d');
      $bill->total = $cart->totalPrice;
      $bill->payment=$req->payment_method;
      $bill->note=$req->note;
      $bill->save();

      foreach ($cart->items as $key => $value) {
        $bill_detail = new BillDetail;
        $bill_detail->id_bill=$bill->id;
        $bill_detail->id_product=$key;
        $bill_detail->quantity=$value['qty'];
        $bill_detail->unit_price=$value['price']/$value['qty'];
        $bill_detail->save();

      }
      Session::forget('cart');

      return redirect('index');
    }

    public function getLogin(){
      return view('pages.login');
    }

    public function getSignUp(){
      return view('pages.signup');
    }

    public function postSignUp(Request $req){
      $this->validate($req,
        [
          'email'=>'required|email|unique:users,email',
          'password'=>'required|min:6|max:20',
          'fullname'=>'required',
          're_password'=>'required|same:password'
        ],[
          'email.required'=>'Vui lòng nhập email',
          'email.email'=>'Vui lòng nhập đúng định dạng email',
          'email.unique'=>'Email đã có người dùng',
          'password.required'=>'Vui lòng nhập Password',
          'password.min'=>'Password ít nhất 6 ký tự',
          'password.max'=>'Password tối đa 20 ký tự',
          'fullname.required'=>'Vui lòng nhập tên',
          're_password.same'=>'Password không trùng khớp'
        ]);
      $user = new User();
      $user->full_name=$req->fullname;
      $user->email=$req->email;
      $user->password=Hash::make($req->password);
      $user->phone=$req->phone;
      $user->address=$req->address;
      $user->save();
      return redirect()->back();
    }

    public function postLogin(Request $req){
      $credentials=array('email'=>$req->email, 'password'=>$req->password);
      if(Auth::attempt($credentials)){
        return redirect()->intended('index');
      }else{
        return back()->with('error','Tài khoản hoặc mật khẩu chưa đúng');
      }
    }

    public function getLogout(){
      Auth::logout();
      return redirect()->back();
    }

    public function getSearch(Request $req){
      $product=Product::where('name','like','%'.$req->key.'%')
                        ->orWhere('unit_price',$req->key)
                        ->get();
      return view('pages.search_result',compact('product'));
    }
}
