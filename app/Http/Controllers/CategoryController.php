<?php

namespace App\Http\Controllers;

use App\Category;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index')->with('categories', $this->category->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create')->with('categories', $this->category->where('cate_id', 0)->get());
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
            'image.required' => 'Select a profile image',
        ];
        $rules = [
            'name'     => 'required|max:25',
            'category_id'     => 'required|max:20',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('admin_category_create')
                ->withErrors($validator)
                ->withInput();
        }

        $this->category->title = $request->name;
        $this->category->cate_id = $request->category_id;

        $this->category->save();

        return redirect()->route('admin_category_index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('title', $id)->get()->first();

        return view('admin.categories.edit', [
            'cate'=>$category
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
        $cat = Category::find($request->id);
        $cat->title = $request->name;
        $cat->cate_id = $request->category;

        dd($cat);
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
