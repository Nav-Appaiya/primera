<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * Product constructor.
     */
    public function __construct()
    {
    }

    public function seotags()
    {
        return $this->hasMany('App\Seotags');
    }
}
