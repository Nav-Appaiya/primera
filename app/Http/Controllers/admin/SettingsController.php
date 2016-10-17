<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
//  TODO  http://stackoverflow.com/questions/32307426/how-to-change-variables-in-the-env-file-dynamically-in-laravel

    private $path;

    public function __construct()
    {
        $this->path = base_path('.env');
    }

    public function index()
    {
        return view('admin-panel.admin.settings')->with('path', $this->path );
    }

    public function update(Request $request)
    {

//dd($request);
        if (file_exists($this->path )) {
            file_put_contents($this->path, str_replace(
                'PACKAGE_GET_PRICE='.env('PACKAGE_GET_PRICE'), 'PACKAGE_GET_PRICE='.$request->PACKAGE_GET_PRICE, file_get_contents($this->path)
            ));
            file_put_contents($this->path, str_replace(
                'PACKAGE_POST_PRICE='.env('PACKAGE_POST_PRICE'), 'PACKAGE_POST_PRICE='.$request->PACKAGE_POST_PRICE, file_get_contents($this->path)
            ));
            file_put_contents($this->path, str_replace(
                'MOLLIE_KEY_LIVE='.env('MOLLIE_KEY_LIVE'), 'MOLLIE_KEY_LIVE='.$request->MOLLIE_KEY_LIVE, file_get_contents($this->path)
            ));
            file_put_contents($this->path, str_replace(
                'MOLLIE_KEY_TEST='.env('MOLLIE_KEY_TEST'), 'MOLLIE_KEY_TEST='.$request->MOLLIE_KEY_TEST, file_get_contents($this->path)
            ));
            file_put_contents($this->path, str_replace(
                'MOLLIE_TEST_MODE='.env('MOLLIE_TEST_MODE'), 'MOLLIE_TEST_MODE='.$request->MOLLIE_TEST_MODE, file_get_contents($this->path)
            ));
        }

        \Session::flash('succes_message','successfully.');

        return redirect()->route('dashboard.settings.update');

    }

//

//
}
