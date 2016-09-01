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

   public function show($name)
   {
       $str_category = str_replace('-', ' ', $name);

       $cate = $this->category->where('title', $str_category)->first();

       return view('category.show')->with('category', $cate);
   }

}
