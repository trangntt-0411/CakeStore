<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use App\Cart;
use Session;

class PageController extends Controller
{
    public function getIndex() {
        $slide = Slide::all();
        $product = Product::where('new',1)->paginate(4);
        $product_sale = Product::where('promotion_price','<>',0)->paginate(8);
        return view('layout.home-page',compact('slide','product','product_sale'));
    }

    public function getProductType($type) {
        $product_type = Product::where('id_type',$type)->paginate(8);
        $type_p = ProductType::all();
        $tp = ProductType::where('id',$type)->first();
        return view('layout.product-type',compact('product_type','type_p','tp'));
    }

    public function getProduct(Request $req) {
        $product = Product::where('id',$req->id)->first();
        $p_type = ProductType::where('id', $product->id_type)->first();
        $p_like = Product::where('id_type',$product->id_type)->paginate(3);
        return view('layout.product',compact('product','p_type','p_like'));
    }

    public function getAddToCart(Request $req, $id) {
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
}
