<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';

    public $timestamps = true;

    public static $rules = [
        'product_id' => 'required',
        'user_id' => 'required',
        'description' => 'required',
        'rating' => 'required|max:5'
    ];

    protected $fillable =  [
        'product_id',
        'user_id',
        'description',
        'created_at',
        'updated_at',
        'rating'
    ];


    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
