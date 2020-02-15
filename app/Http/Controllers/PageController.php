<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slide;
use App\Product;
use App\ProductType;

class PageController extends Controller
{
    public function getIndex() {
            $slide = Slide::all();
            $new_product = Product::where('new', 1)->paginate(8);
            $sale_product = Product::where('promotion_price', '<>', 0)->paginate(4);
            return view('master', compact('slide','new_product','sale_product'));        
    }

    public function getProductType($type) {
        $product = Product::where('id_type', $type)->paginate(8);
        $p_type_name = ProductType::all();

        return view('page.product_type', compact('product', 'p_type_name'));
    }

    public function getProduct($id) {
        $product = Product::where('id', $id)->first();
        $p_type = Product::where('id', '<>', $id)->paginate(3);

        return view('page.product', compact('product', 'p_type'));
    }
}
