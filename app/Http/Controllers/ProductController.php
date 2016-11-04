<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 05-06-16
 * Time: 08:53
 */

namespace App\Http\Controllers;

use App\Category;
use App\Details;
use App\ProductImage;
use App\Pages;
use App\ProductProperty;
use App\Property;
use App\Review;
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
    private $reviews;
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->image = new ProductImage();
        $this->product = new Product();
        $this->reviews = new Review();
        $this->category = new Category();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($name1, $name2, $id)
    {
        $property = Property::whereHas('product', function($q) use ($id){

            $max = Input::has('max') ? Input::get('max') : $max = 0;
            $min = Input::has('min') ? Input::get('min') : $min = 0;

            if($max || $min) {
                $q->where('price', '>=', $min);
                $q->where('price', '<=', $max);
            }

            $q->where('status', 'on');
            $q->where('category_id', $id);
        })
        ->whereHas('detail', function($q) use ($id){
//           $q->where('value', 'wit');
        })
        ->groupBy('product_id')
        ->get();

//        dd($this->product->property->detail);
//        dd(
//
//            $details = Product::whereHas('property', function ($q) use ($id) {} )->whereHas('detail', function ($q) use ($id) { } )
////            ->whereHas('product', function ($q) use ($id) {
////                $q->where('category_id', $id);
////            })
////            ->select('value', DB::raw('count(*) as total'))
////            ->groupBy('value')
//            ->get()
//
////            $details = Property::with(['detail' => function ($d){
////               $d->groupBy('value');
////               $d->count('value');
////            }])
////            ->whereHas('product', function ($q) use ($id) {
////                $q->where('category_id', $id);
////            })
////            ->get()
//        );

        $min_price = Property::first()->product->where('category_id', $id)->min('price');
        $max_price = Property::first()->product->where('category_id', $id)->max('price');
        $max = Input::has('max') ? Input::get('max') : $max_price;
        $min = Input::has('min') ? Input::get('min') : $min_price;

        return view('product.index')
            ->with('category', $this->category->find($id))
            ->with('property', $property)
            ->with('min_price', $min_price)
            ->with('max_price', $max_price)
            ->with('min', $min)
            ->with('max', $max);
    }

    public function show($title, $id)
    {
        $product = $this->product->where('id', $id)->where('status', 'on')->first();

        if(empty($product)){
            abort(404);
        }

        return view('product.show')
            ->with('product', $product);
    }

}

