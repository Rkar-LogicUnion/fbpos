<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public function cashiers(){
        return $this->belongsToMany(Cashier::class,'cashiers_shifts');
    }
}
