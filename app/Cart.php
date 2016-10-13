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
        $total_price = $item->product->price - $item->product->discount;
        $storedItem['qty']++;
        $storedItem['price'] = $total_price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->qty++;
        $this->price += $total_price;
    }

    public function remove($item, $id)
    {
        $storedItem = [
            'qty' => 0,
            'price' =>  $this->price,
            'item' => $item
        ];
        if ($this->items) {
            if (array_key_exists($id, $this->items) || $this->items['qty'] != 0) {
                $storedItem = $this->items[$id];
            }
        }
        $total_price = $item->product->price - $item->product->discount;
        $storedItem['qty']--;
        $storedItem['price'] = $total_price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->qty--;
        $this->price -= $total_price;
    }

}
