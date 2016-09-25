<?php

namespace App\Http\Controllers\Admin;

use App\Category;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    protected $category;

    public function __construct()
    {
        $this->category = new Category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.admin.category.index')->with('categories', $this->category->where('category_id', '0')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-panel.admin.category.create');
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
            'title'     => 'required|max:25',
            'category_id'     => 'required|max:20',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_category_create')
                ->withErrors($validator)
                ->withInput();
        }

        $this->category->title = $request->title;
        $this->category->category_id = $request->category_id;
        $this->category->save();

        \Session::flash('succes_message', 'successfully.');

        return redirect()->route('admin_category_index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $cate = $this->category->find($category);

        return view('admin-panel.admin.category.edit')->with('cate', $cate);
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
            'title'     => 'required|max:25',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_category_edit', $request->id)
                ->withErrors($validator)
                ->withInput();
        }

        $category = $this->category->find($request->id);

        $category->title = $request->title;

        $category->save();

        \Session::flash('succes_message', 'successfully.');

        return redirect()->route('admin_category_index');
    }

}
