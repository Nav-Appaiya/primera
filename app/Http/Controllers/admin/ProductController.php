<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

use Validator;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $product;
    protected $image;

    public function __construct()
    {
        $this->product = new Product();
        $this->image = new ProductImage();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [

        ];
        $rules = [
            'name'          => 'required',
            'price'          => 'required',
            'category'          => 'required',
            'description'          => 'required',
            'images'     => 'mimes:jpg,jpeg',
//            'video'          => 'mimes:mp4,webm',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_product_new')
                ->withErrors($validator)
                ->withInput();
        }

        $images = Input::file('images');

        if(empty($images)) {
            foreach ($images as $image){
                $extension = $image->getClientOriginalExtension();
                $new_filename = str_random(10) . '.' . $extension;
                $image->move(public_path() . '/images/product/', $new_filename);

                $img = $this->image;
                $img->imagePath = $new_filename;
                $img->save();
            }
        }

        $product = $this->product;

        $product->name = $request->name;
        $product->category = $request->category;

        $product->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_product_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
