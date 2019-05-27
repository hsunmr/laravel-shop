<?php

namespace App\Models\Products;

class Cart 
{
   public $items = null;
   public $totalQty = 0;
   public $totalPrice = 0;

   public function __construct($oldCart){
       if($oldCart){
           $this->items = $oldCart->items;
           $this->totalQty = $oldCart->totalQty;
           $this->totalPrice = $oldCart->totalPrice;
       }
   }
   public function add($item,$id){
        $storedItem = ['qty' => 0, 'price'=>$item->price, 'item'=>$item];
        //detetmine whether has same item
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $storedItem['qty'] *  $item->price;
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
   }
   public function update($id,$quantity,$item){

        $this->items[$id]['qty'] = $quantity;
        $this->items[$id]['price'] =  $quantity * $item->price;
        $this->totalQty = 0;
        $this->totalPrice = 0;
        foreach($this->items as $element) {
            $this->totalQty += $element['qty'];
            $this->totalPrice += $element['price'];
        }
   }
   public function delete($id){
       
        unset($this->items[$id]);
        $this->totalQty = 0;
        $this->totalPrice = 0;
        foreach($this->items as $element) {
            $this->totalQty += $element['qty'];
            $this->totalPrice += $element['price'];
        }
   }
}
