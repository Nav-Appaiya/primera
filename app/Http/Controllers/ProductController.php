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
use App\ProductProperty;
use App\Property;
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
    public function index($name1, $name2, $id)
    {
//     return $id;
        return view('product.index')->with('products', $this->category->find($id));
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
    public function edit(Request $request, $id){

        $product = Product::findOrFail($id);
        $properties = ProductProperty::where('productID', $product->id)->get();
        $categories = Category::all();

        foreach ($categories as $category) {
            $c[$category->category_id] = $category->title;
        }

        // show the edit form and pass the nerd
        return view('admin.products.edit', [
            'product' => $product,
            'properties'=>$properties,
            'categories' => $c
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
        $messages = [];
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

        if(isset($request->id)){
            $product = Product::find($request->id);
            $request->session()->flash('status', 'Product bijgewerkt');
        }else{
            $product = $this->product;
            $request->session()->flash('status', 'Product aangemaakt');
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->save();


        if($request->seotags){
            foreach ($request->seotags as $seotag) {
                $newSeo = new Seotags();
                $newSeo->product_id = $product->id;
                $newSeo->seotag = $seotag;
                $newSeo->created_at = new \DateTime();
                $newSeo->save();
            }
        }

        if($request->property){
            foreach ($request->property as $key => $val) {
                $foundProp = Property::find($key);
                $matches = ['productID'=>$product->id, 'propertyID'=>$foundProp->id];
                $productProperty = ProductProperty::where($matches)->get()->first();
                if(!$productProperty){
                    $productProperty = new ProductProperty();
                }
                $productProperty->productID = $product->id;
                $productProperty->propertyID = $foundProp->id;
                $productProperty->value = $val;
                $productProperty->save();
            }
        }

        $files = $request->file('images');
        $data = array();

        if(NULL !== $request->get('images')){
            header('Content-Type: text/plain');
            $images = $request->get('images');
            /** @var ProductImage $result */
            foreach ($product->productimages()->getResults() as $result) {
                $result->delete();
            }

            foreach ($images as $image) {
                $pi = new ProductImage();
                $pi->productID = $product->id;
                $pi->imagePath = $image;
                $pi->setCreatedAt(date('Y-m-d H:i:s'));
                $pi->setUpdatedAt(date('Y-m-d H:i:s'));
                $pi->save();
            }
        }

        if (isset($files[0])){
            foreach ($files as $file => $value){
//                $image = $this->image;
                $filename = str_random(10).'.'.$value->getClientOriginalExtension();
                $value->move(base_path().'/public/uploads/img', $filename);

                $data[] = array('imagePath' => $filename, 'productID'=> $product->id);

            }
            ProductImage::insert($data); // Eloquent
        }
        \Session::flash('status','successfully.');
        $request->session()->flash('status', 'Success');
        return redirect()->route('admin_product_index');

    }

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

