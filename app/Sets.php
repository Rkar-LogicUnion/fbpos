<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sets extends Model
{
    public function items(){
        return $this->belongsToMany(Item::class,'items_sets','sets_id','items_id')
                    ->withPivot([
                            'quantity'
                        ]);;
    }
    public function orders(){
        return $this->belongsToMany(Order::class,'orders_sets','set_id','order_id');
    }
}
