<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    public function shifts(){
        return $this->belongsToMany(Shift::class,'cashiers_shifts');
    }
}
