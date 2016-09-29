<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
    public $qty = 0;
    public $price = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->qty = $oldCart->qty;
            $this->price = $oldCart->price;
        }
    }

    public function add($item, $id)
    {
        $storedItem = [
            'qty' => 0, 
            'price' =>  $this->price, 
            'item' => $item
        ];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->product->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->qty++;
        $this->price += $item->product->price;
    }

}
