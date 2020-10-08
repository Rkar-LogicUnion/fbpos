<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    public function addons_item(){
        return $this->belongsToMany(Item::class,'orders_items_addons','addon_id','item_id')->withPivot('quantity');
    }
}
