<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 05-06-16
 * Time: 08:53
 */

namespace App\Http\Controllers;

use App\Category;
use App\ProductImage;
use App\Pages;
use App\Seotags;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use Validator;
use Storage;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Session;
use Symfony\Component\DomCrawler\Form;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{

    private $product;
    private $category;
    private $image;
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->image = new ProductImage();
        $this->product = new Product();
        $this->category = new Category();
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
    public function newProduct()
    {
        return view('admin.products.new')->with('categories', $this->category->get());
    }

    /**
     * @param Product $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(Request $request)
    {
        $messages = [
//            'description.max' => 'something is wrong with the description',
        ];
        $rules = [
            'file' => 'mimes:png,gif,jpeg,jpg',
            'description' => 'required|max:255',
            'price' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_product_new')
                ->withErrors($validator)
                ->withInput();
        }


        $product = $this->product;

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;

        $product->save();
        foreach ($request->seotags as $seotag) {
            $newSeo = new Seotags();
            $newSeo->product_id = $product->id;
            $newSeo->seotag = $seotag;
            $newSeo->created_at = new \DateTime();
            $newSeo->save();
        }

        $files = $request->file('images');

        $data = array();

        if (!empty($files)){
            foreach ($files as $file => $value){
//                $image = $this->image;
                $filename = str_random(10).'.'.$value->getClientOriginalExtension();
                $value->move(base_path().'/public/uploads/img', $filename);

                $data[] = array('imagePath' => $filename, 'productID'=> $product->id);

            }
            ProductImage::insert($data); // Eloquent
        }

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_product_save');

    }

//   public function add(Product $id) {
//        if(!isset($id->name)){
//            $product = new Product();
//            $product->save();
//            Session::flash('message', 'Creating new product');
//        }
//        $product->name = Input::get('name');
//        $product->description = Input::get('description');
//        $product->price = Input::get('price');
//        $product->imageurl = Input::get('imageurl');
//        $product->save();
//        Session::flash('message', 'Successfully updated product!');
//        return redirect('/admin/products');
//
//    }

    /**
     * @param Product $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Product $id)
    {

        return view('products.detail', [
            'product' => $id,
//            'seotags' => $id->seotags()->getResults(),
//            'seotags' => $id->seotags()->getResults(),
//            'related' => Product::all(),
//            'categories' => Category::all(),
//            'pages' => Pages::all()
        ]);
    }
}

