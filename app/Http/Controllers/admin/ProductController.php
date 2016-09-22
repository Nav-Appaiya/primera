<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

use Validator;
use Illuminate\Support\Facades\Input;
use Session;

//use Input;
use Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $product;
    protected $image;
    protected $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->image = new ProductImage();
        $this->category = new Category();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.admin.product.index')->with('products', $this->product->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.admin.product.create')->with('category', $this->category->all());;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->replace(array('prijs' => str_replace(",", ".", $request->prijs)) );
        $message = [
            'status.alpha' => 'Het :attribute veld is verplicht.',
        ];

        $rules = [
            'naam' => 'required',
            'beschrijving' => 'required',
            'images.*' => 'mimes:jpeg,jpg,png,webm|max:10000',
            'prijs' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'korting' => 'regex:/^\d*(\.\d{1,2})?$/',
            'categorie' => 'required',
            'status' => 'required|alpha'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_product_create')
                ->withErrors($validator)
                ->withInput();
        }

        $product = $this->product;

        $product->name = $request->naam;
        $product->description = $request->beschrijving;
        $product->status = $request->status;
        $product->discount = $request->korting;
        $product->price = $request->prijs;
        $product->category_id = $request->categorie;

        $product->save();

        $images = Input::file('images');
        if (Input::hasFile('images')){
            foreach ($images as $image){
                $extension = $image->getClientOriginalExtension();
                $new_filename = str_random(10) . '.' . $extension;
                $image->move(public_path() . '/images/product', $new_filename);
                $this->image->insert([
                    [
                        'imagePath' => $new_filename,
                        'product_id' => $product->id,
                    ],
                ]);
            }
        }

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_product_index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin-panel.admin.product.edit')->with('product', $this->product->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $message = [
            'status.alpha' => 'Het :attribute veld is verplicht.',
        ];

        $rules = [
            'name' => 'required',
            'description' => 'required',
            'images.*' => 'mimes:jpeg,jpg,png,webm|max:10000',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'discount' => 'regex:/^\d*(\.\d{1,2})?$/',
            'category_id' => 'required',
            'status' => 'required|alpha'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_product_edit', $request->_id)
                ->withErrors($validator)
                ->withInput();
        }

        $product = $this->product->find($request->_id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->discount = $request->discount;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        $product->save();

        $images = Input::file('images');
        if (Input::hasFile('images')){
            foreach ($images as $image){
                $extension = $image->getClientOriginalExtension();
                $new_filename = str_random(10) . '.' . $extension;
                $image->move(public_path() . '/images/product', $new_filename);
                $this->image->insert([
                    [
                        'imagePath' => $new_filename,
                        'product_id' => $product->id,
                    ],
                ]);
            }
        }

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_product_edit', $request->_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);
        $product->delete();


//        return route();
    }
}
