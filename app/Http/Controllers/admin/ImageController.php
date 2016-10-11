<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;

use App\ProductImage;
use File;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    protected $image;

    public function __construct()
    {
        $this->image = new ProductImage();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = $this->image->find($id);

        $full_path = public_path('/images/product/'.$image->imagePath);

        File::delete($full_path);

        if (!File::exists($full_path)){
            $image->delete();
        }

        return redirect()->back();
    }
}
