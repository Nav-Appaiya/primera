<?php

namespace App\Http\Controllers\admin;

//use App\ProductProperty;
use App\Property;
use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
//    protected $product_property;
    protected $property;

    public function __construct()
    {
//        $this->product_property = new Property();
        $this->property = new Property();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.admin.product_property.create');
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

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_product_property_create', $request->id)
                ->withErrors($validator)
                ->withInput();
        }

        $product = $this->property;

        $product->product_id = $request->id;
        $product->stock = $request->stock;
        $product->serialNumber = $request->serialNumber;
        $product->color = $request->color;
        $product->nicotine = $request->nicotine;
        $product->mah = $request->battery;

//       $properties = array(
//            ['value_id' => $request->color, 'property_id' => $request->color],
//            ['value_id' => $request->nicotine, 'property_id' => $request->nicotine],
//            ['value_id' => $request->battery, 'property_id' => $request->battery]
//        );
//        $this->property->insert($properties);

        $product->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_product_edit', $request->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin-panel.admin.product_property.edit')->with('property', $this->property->find($id));
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
        $messages = [];

        $rules = [];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_product_property_edit', $request->_id)
                ->withErrors($validator)
                ->withInput();
        }

        $product = $this->property->find($request->_id);

        $product->stock = $request->stock;
        $product->serialNumber = $request->serialNumber;
        $product->color = $request->color;
        $product->nicotine = $request->nicotine;
        $product->mah = $request->battery;

        $product->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_product_edit', $request->_product);

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
