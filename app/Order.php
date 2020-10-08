<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function sets(){
        return $this->belongsToMany(Sets::class,'orders_sets','order_id','set_id')->withPivot('quantity');
    }
    public function items(){
        return $this->belongsToMany(Item::class,'order_items','order_id','item_id')->withPivot('quantity');
    }
    public function addons(){
        return $this->belongsToMany(Addon::class,'orders_items_addons','order_id','addon_id')->withPivot(['item_id','quantity']);;
    }
    public function addons_item(){
        return $this->belongsToMany(Addon::class,'orders_items_addons','order_id','item_id')->withPivot(['addon_id','quantity']);
    }
    public function shift(){
        return $this->belongsTo(Shift::class,'shifts_id','id');
    }
    public function cashier(){
        return $this->belongsTo(Cashier::class,'cashiers_id','id');
    }
    public function type(){
        return $this->belongsTo(Type::class,'type_id','id');
    }
    public function discount(){
        return $this->belongsTo(Discount::class,'discount_id','id');
    }
}
