<?php

namespace App;

class Cart {
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart) {
  
        if($oldCart!=null) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id) {
        
        $cart = ['qty'=>0, 'price'=>$item->unit_price, 'item'=>$item];
        if($this->items){
            if(array_key_exists($id, $this->items)) {
                $cart = $this->items[$id];
            }
        }
        $cart['qty']++;
        if($item->promotion_price == 0) {
            $cart['price'] = $item->unit_price * $cart['qty'];
        } else {
             $cart['price'] = $item->promotion_price * $cart['qty'];
        }
        $this->items[$id] = $cart;
        $this->totalQty++;
        if($item->promotion_price == 0) {
            
            $this->totalPrice += $item->unit_price;
        } else {
           
            $this->totalPrice += $item->promotion_price;
        }
        
    }

    public function deleteItem($id) {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->$items[$id]['item']['price'];
        if($this->items[$id]['qty' <= 0]) {
            unset($this->items[$id]);
        }
    }

    public function remove($id) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

}