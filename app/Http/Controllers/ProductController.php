<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 05-06-16
 * Time: 08:53
 */

namespace App\Http\Controllers;

use App\Category;
use App\Pages;
use App\Seotags;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Symfony\Component\DomCrawler\Form;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        // Turned this off, because product userviews are here also used.
        // $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $products = Product::all();

        return view('admin.products.products',[
            'products' => $products,
            'meta' => array('meta1', 'meta2', 'meta3')
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id){
        Product::destroy($id);
        return redirect('/admin/products');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){

        $product = Product::findOrFail($id);

        // show the edit form and pass the nerd
        return view('admin.products.edit', [
            'product' => $product
        ]);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newProduct(){
        return view('admin.products.new');
    }

    /**
     * @param Product $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(Product $id) {
        if(!isset($id->name)){
            $product = new Product();
            $product->save();
            Session::flash('message', 'Creating new product');
        }
        $product->name = Input::get('name');
        $product->description = Input::get('description');
        $product->price = Input::get('price');
        $product->imageurl = Input::get('imageurl');
        $product->save();
        Session::flash('message', 'Successfully updated product!');
        return redirect('/admin/products');

    }

    /**
     * @param Product $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Product $id)
    {

        return view('products.detail', [
            'product' => $id,
            'seotags' => $id->seotags()->getResults(),
            'related' => Product::all(),
            'categories' => Category::all(),
            'pages' => Pages::all()
        ]);
    }
}

