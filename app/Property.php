<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    protected $fillable = [
        'name', 'created_at', 'updated_at',
    ];
    public function productproperty()
    {
        return $this->belongsTo('App\ProductProperty');
    }
}
