<?php

use App\Cashier;
use App\Item;
use App\Shift;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory(Shift::class,2)->create();
        // factory(Cashier::class,2)->create();
        factory(Item::class,5)->create();
    }
}
