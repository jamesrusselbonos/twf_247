<?php

namespace App;


class Cart 
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){

    	if($oldCart){

    		$this->items=$oldCart->items;
    		$this->totalQty=$oldCart->totalQty;
    		$this->totalPrice =$oldCart->totalPrice;
    	}
    }
    public function add($item, $id){

    	$storedItem = [ 'qty' => 0, 'price' => $item->price, 'item' =>$item];
    	if($this->items){
    		if (array_key_exists($id, $this->items)){
    			var_dump('Already');
    		}
    	}
    	$storedItem['qty']++;
    	$storedItem['price'] = $item->price * $storedItem['qty'];
    	$this->items[$id] = $storedItem;
    	
    	$this->totalQty++;
    	$this->totalPrice += $item->price;
    }
    public function removeItem($id) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
