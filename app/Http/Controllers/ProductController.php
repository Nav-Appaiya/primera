<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 05-06-16
 * Time: 08:53
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;

class ProductController extends Controller
{

    public function index(){
        $products = Product::all();
        return view('admin.products',['products' => $products]);
    }

    public function destroy($id){
        Product::destroy($id);
        return redirect('/admin/products');
    }

    public function newProduct(){
        return view('admin.new');
    }

    public function add(Request $request) {

        $product  = new Product();
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->imageurl = $request->get('imageurl');

        $product->save();

        return redirect('/admin/products');

    }
}

