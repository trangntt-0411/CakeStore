<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Slide;
use App\Product;
use App\ProductType;
use App\User;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\OrderCustomer;
use Session;

use Hash;

class PageController extends Controller
{
    public function getIndex() {
            $slide = Slide::all();
            $new_product = Product::where('new', 1)->paginate(8);
            $sale_product = Product::where('promotion_price', '<>', 0)->paginate(4);
            return view('master', compact('slide','new_product','sale_product'));        
    }

    public function postIndex(Request $req) {
        $order_customer = new OrderCustomer;
        $order_customer->name = $req->name;
        $order_customer->email = $req->email;
        $order_customer->phone = $req->phone;
       // $order_customer->message = $req->message;

        $order_customer->save();
        return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ hồi âm bạn sớm nhất có thể.');
    }

    public function getProductType($type) {
        $product = Product::where('id_type', $type)->paginate(8);
        $p_type_name = ProductType::all();
        $p_type_now = ProductType::where('id', $type)->first();

        return view('page.product_type', compact('product', 'p_type_name', 'p_type_now'));
    }

    public function getProduct($id) {
        $product = Product::where('id', $id)->first();
        $p_type = Product::where('id', '<>', $id)->paginate(4);

        return view('page.product', compact('product', 'p_type'));
    }

    public function getRegister() {
        return view('page.register');
    }


    public function postRegister(Request $req) {
        $req->validate( 
        [
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'fullname'=>'required',
            'repassword'=>'required|same:password'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng đinh dạng email',
            'email.unique'=>'Email đã có người sử dụng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'repassword.same'=>'Mật khẩu nhập lại chưa đúng',
            'repassword.required'=>'Vui lòng nhập lại mật khẩu',
            'password.min'=>'Mật khẩu chứa tối thiểu 6 kí tự',
            'fullname.required'=>'Vui lòng nhập họ tên đầy đủ'
        ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();

        return redirect('register')->with('success', 'Tạo tài khoản thành công');
    }


    public function getLogin() {
        return view('page.login');
    }

    public function postLogin(Request $req) {
        $req->validate( 
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20',
    
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng đinh dạng email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu chứa tối thiểu 6 kí tự',
                'password.max'=>'Mật khẩu chứa tối đa 20 kí tự'
            ]);
            // $credentials = $req->only('email', 'password');
            $credentials = array('email'=>$req->email, 'password'=>$req->password);

            if(Auth::attempt($credentials)) {
                return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
            } else {
                return redirect()->back()->with(['flag'=>'danger','success'=>'Đăng nhập không thành công']);
            }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('home-page');
    }

    public function getAddCart(Request $req, $id) {
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back()->with('message', 'Thêm giỏ hàng thành công' );
    }

    public function getRemoveCart($id) {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->remove($id);
        Session::put('cart', $cart);
        return redirect()->back();
    }


    public function getSearch(Request $req) {
        $product = Product::where('name', 'like', '%'.$req->key.'%')
                            ->orWhere('unit_price', $req->key)
                            ->get();
        return view('page.search', compact('product'));
    }

    public function getCheckout() {
     
        return view('page.cart');
    }

    public function postCheckout(Request $req) {
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->message;
        
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->note = $req->message;

        $bill->save();
        
        foreach($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price'])/($value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');

    }
}
