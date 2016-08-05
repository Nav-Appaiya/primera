<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public $category;

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
        return view('admin.categories.index')
            ->with('categories', $this->category->where('categoryID',0)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.create', [
            'categories' => $categories
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
        $rules = [
            'name'     => 'required|max:25',
            'category_id'     => 'required|max:20',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return view('admin.categories.create', [
                'errors' => $validator->errors(),
                'categories' => Category::all()
            ]);

        }
        $this->category->title = $request->name;
        $this->category->categoryID = $request->category_id;

        $this->category->save();

        $request->session()->flash('status', 'Category aangemaakt!');

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
        $category = Category::find($id);

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
     *
     */
    public function update(Request $request)
    {
        /** @var $validator \Illuminate\Validation\Validator */

        if($request->isMethod('patch')){
            $category = Category::find($request->id);

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'id' => 'required'
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }

            $category->title = $request->title;
            $category->categoryID = $request->id;
            if($category->save()){
                $request->session()->flash('status', 'saved changes!');
                return view('admin.categories.index', [
                    'categories' => Category::all()
                ]);
            }

        }


        if($request->isMethod('patch')){
            if($validator->fails()){
                return view('admin.categories.edit', [
                    'errors' => $validator->errors(),
                    'cate' => $this->category
                ]);
            } else{
                $category = Category::find($request->id);
                $category->title = $request->name;
                $category->categoryID = $request->id;
                if($category->save()){
                    dd($category);
                }

            }

        }

        return view('admin.categories.index');
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
