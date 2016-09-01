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

    public static function groupList()
    {
        $category = Category::all();

        $array = [];
        $subArray= [];

        foreach ($category->where('category_id', 0) as $parent){
//            $array = array_push($parent);
            foreach ($parent->children as $child){
                if($parent->id == $child->category_id){
                    $subArray[$child->id] = $child->title;
                }
//            array_push($array, $subArray);
//            $arry = array_push($array, $subArray);
            }
            $array[$parent->title] = $subArray;

        }

        return $array;
    }

}
