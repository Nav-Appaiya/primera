<?php

namespace App\Http\Controllers\admin;

use App\Property;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{

    protected $property;

    public function __construct()
    {
        $this->property = new Property();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.admin.property.index')->with('property', $this->property->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.admin.property.create');

//        return'asdas';
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
//            'image.required' => 'Select a profile image',
        ];

        $rules = [
            'name'     => 'required|max:25'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
//            log::error('.');

            return redirect()
                ->route('admin_property_create')
                ->withErrors($validator)
                ->withInput();
        } else {

            $this->property->name = $request->name;
            $this->property->save();

//            Log::info('made new category', ['name' => $request->name]);

            return redirect()->route('admin_property_index');
        }
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
        return view('admin-panel.admin.property.edit')->with('property', $this->property->find($id));
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
