<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Review;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->review = Review::all();
        $this->product = Product::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-panel.admin.review.index')
                ->with('products', $this->product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::find($id)->first();
        
        return view('admin-panel.admin.review.show')
                    ->with('review', $review);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $review = Review::find($id);

        if(is_null($review)){
            return Redirect::route('admin_review_index');
        }

        return view('admin-panel.admin.review.edit')
                ->with('review', $review);
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
        $input = Input::all();

        $validator = Validator::make($input, Review::$rules);

        if($validator->passes()){
            $review = Review::find($id);
            $review->update($input);

            return Redirect::route('admin_review_index', $id);
        }

        return Redirect::route('admin_review_edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');

        \Session::flash('succes_message','successfully.');

        return redirect()->route('admin_product_edit', $request->_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return view()->route('admin_reviews_all');
    }
}
