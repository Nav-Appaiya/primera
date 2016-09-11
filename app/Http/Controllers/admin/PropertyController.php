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
        $rules = [
            'detail' => 'required|unique:property,detail_id,'.$request->detail.',product_id',
            'stock' => 'required',
//            'detail' => 'required|unique:property,id,detail_id,product_id',
            'serialNumber' => 'required|unique:property'
        ];

        $validator = Validator::make($request->all(), $rules);

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
        $product->detail_id = $request->detail;
//        $product->color = $request->color;
//        $product->nicotine = $request->nicotine;
//        $product->mah = $request->battery;

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
        $rules = [
            'detail' => 'required|unique:property,detail_id,product_id',
            'stock' => 'required',
            'serialNumber' => 'required|unique:property,serialnumber,'.$request->_id

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_product_property_edit', $request->_id)
                ->withErrors($validator)
                ->withInput();
        }

        $product = $this->property->find($request->_id);

        $product->stock = $request->stock;
        $product->serialNumber = $request->serialNumber;
        $product->detail_id = $request->detail;
//
//        $product->color = $request->color;
//        $product->nicotine = $request->nicotine;
//        $product->mah = $request->battery;

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

    public function AddStock(Request $request)
    {
        $array = implode(',',$this->property->pluck('serialNumber')->toArray());

        $messages = [
            'serialNumber.in' => 'Dit product nummer bestaad niet in het systeem'
        ];

        $rules = [
            'serialNumber' => 'required|in:'.$array.'',
            'stock' => 'required',
        ];
//
//        if(!$this->property->where('serialNumber', $request->serialNumber)->first()){
//            array_push($rules, ['serialNumber' => 'required']);
//        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_product_index')
                ->withErrors($validator)
                ->withInput();
        }

        $product = $this->property->where('serialNumber', $request->serialNumber)->first();

        $product->stock = $product->stock + $request->stock;

        $product->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_product_index');
    }

}
