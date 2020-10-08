<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function sets(){
        return $this->belongsToMany(Sets::class,'items_sets','items_id','sets_id');
    }
    public function addons(){
         return $this->belongsToMany(Addon::class,'items_addons','item_id','addon_id');
    }
    public function orders(){
        return $this->belongsToMany(Order::class,'order_items','item_id','order_id');
    }
    public function addons_item($id){
        return $this->belongsToMany(Addon::class,'orders_items_addons','item_id','addon_id')->withPivot('order_id')->wherePivot('order_id',12);
    }
}
