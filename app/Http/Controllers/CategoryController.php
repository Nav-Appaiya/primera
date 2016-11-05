<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 16-09-16
 * Time: 14:24
 */
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

   public function show($name, $id)
   {
       $cate = $this->category->find($id);

       return view('category.show')->with('category', $cate);
   }

}
