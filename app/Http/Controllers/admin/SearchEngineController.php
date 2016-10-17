<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchEngineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $routeCollection = \Route::getRoutes();
        $array = [];
        foreach ($routeCollection as $value)
        {
            if( $value->getMethods()[0] == 'GET' && strpos($value->getPath(), 'admin') !== 0 && strpos($value->getPath(), '_debugbar') !== 0)
            {
                $array[]  = $value
//                    'method' => $value->getMethods()[0],
//                    'name' => $value->getAction(),
//                    'url' => $value->getPath(),
//                    'action' => $value->getActionName(),
                ;
            }
        }

        return view('admin-panel.admin.seo.index')->with('pages', $array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $file = \File::get('seo-tags');

//        if (\File::exists('seo-tags')){
//            $array['tags'] = ;
//        }else{
        $array = ['tags' => []];
//        }

//        array_forget($array, 'tags');
        $array = array_add($array, 'tags.as6', ['name' => 'testeeee']);
//        $array = array_add($array, 'tags.as6', ['name' => 'testeeee']);

//        $filename = 'test.php'; // the file to change
//        $search = 'Hi 2'; // the content after which you want to insert new stuff
//        $insert = 'Hi 3'; // your new stuff

//        $replace = $search. "\n". $insert;
//
//        file_put_contents($filename, str_replace($search, $replace, file_get_contents($filename)));

        \File::put('seo-tags', print_r($array, true));

        return dd($array);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
