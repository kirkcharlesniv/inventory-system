<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('item_records')->insert([
                'name' => str_random(32),
                'description' => str_random(64),
                'initial_stocks' => 100,
                'remaining_stocks' => 100,
                'stock_type' => rand(0,4),
                'inventory_type' => rand(0, 1),
                'material_unit' => rand(0, 9)
            ]);
    }
}
