<?php

namespace App\Http\Controllers\admin;

use App\Details;
use Illuminate\Http\Request;

use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{

    protected $detail;

    public function __construct()
    {
        $this->detail = new Details();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.admin.property.index')->with('property', $this->detail->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.admin.property.create');
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
            'value'          => 'required|unique:details,value',
//            'name'          => 'required',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_property_create')
                ->withErrors($validator)
                ->withInput();
        }

        $details = $this->detail;

        $details->type = $request->type;
        $details->value = $request->value;

        $details->save();


        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_property_index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin-panel.admin.property.edit')->with('property', $this->detail->find($id));
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
        $messages = [

        ];

        $rules = [
//            'name'          => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_property_edit')
                ->withErrors($validator)
                ->withInput();
        }

        $details = $this->detail->find($request->id);

        $details->type = $request->type;
        $details->value = $request->value;

        $details->save();

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_property_index');
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
