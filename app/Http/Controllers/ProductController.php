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
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Symfony\Component\DomCrawler\Form;

class ProductController extends Controller
{

    public function index(){
        $products = Product::all();

        return view('admin.products.products',[
            'products' => $products
        ]);
    }

    public function destroy($id){
        Product::destroy($id);
        return redirect('/admin/products');
    }

    public function edit($id){

        $product = Product::find($id);
        if (!$product) {
            $product = new Product();
        }
        // show the edit form and pass the nerd
        return view('admin.products.new', [
            'product' => $product
        ]);

    }

    public function newProduct(){
        return view('admin.products.new');
    }

    public function add(Product $id) {

        if(!isset($id->name)){
            $product = new Product();
        }
        $product->name = Input::get('name');
        $product->description = Input::get('description');
        $product->price = Input::get('price');
        $product->imageurl = Input::get('imageurl');

        Session::flash('message', 'Successfully updated product!');
        return redirect('/admin/products');

    }
}

