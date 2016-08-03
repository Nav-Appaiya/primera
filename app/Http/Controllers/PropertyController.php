<?php

namespace App\Http\Controllers;

use App\ProductProperty;
use App\Property;
use Illuminate\Http\Request;

use App\Http\Requests;

class PropertyController extends Controller
{
    public $product_property;
    public $property;

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prop = new Property();
        dd($prop);
        return view('admin.properties.create', [
            'property' => $prop
        ]);
    }

    public function show($id)
    {
        return view('admin.properties.create', [
            'property'=> Property::find($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Property();
        $p->name = $request->name;
        $p->save();

        $request->session()->flash('status', 'Property is successvol aangemaakt.');

        return view('admin.properties.index', [
            'properties' => Property::all()
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prop = Property::find($id);

        return view('admin.properties.edit', [
            'property' => $prop
        ]);
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
        $p = Property::find($request->id);
        $p->name = $request->name;
        $p->save();

        $request->session()->flash('status', 'property aangepast');

        return view('admin.properties.index', [
            'properties' => Property::all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Property::destroy($id);
        $request->session()->flash('status', 'Property verwijderd');

        return view('admin.properties.index', [
            'properties' => Property::all()
        ]);
    }
}
