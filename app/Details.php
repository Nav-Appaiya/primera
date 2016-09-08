<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    protected $table = 'details';

    public $timestamps = false;

//    protected $fillable = [];

//    protected $guarded = [];

    public function property()
    {
        return $this->hasMany('App\Property', 'detail_id', 'id');
    }

    public static function groupDetails(){

        foreach (\App\Details::groupBy('type')->get() as $parent){

            $array[$parent->type] = array();

            foreach(\App\Details::where('type', $parent->type)->get() as $attribute) {
                $array[$parent->type][$attribute->id] = $attribute->value;
            }
        }
        return $array;
    }

}
