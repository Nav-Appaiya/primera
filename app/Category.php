<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $guarded = ['id'];
    
    protected $fillable = [
        'title', 'image', 'category_id',
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->hasMany('App\Product');
    }

    public function parent()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'category_id');
    }

    //makes a clean grouped array from the categories
    public static function groupList()
    {
        $category = Category::all();
        $array = [];
        foreach ($category->where('category_id', 0) as $parent){

            $array[$parent->title] = array();

            foreach($parent->children as $attribute) {
                $array[$parent->title][$attribute->id] = $attribute->title;
            }
        }

        return $array;
    }

}
