<?php

use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('employees')->insert([
                'name' => str_random(10),
                'id_num' => str_random(40),
                'address' => str_random(32),
                'phone' => '09'.rand(100000000, 999999999),
                'tin_number' => rand(1000 , 9999).'-'.rand(1000 , 9999).'-'.rand(1000 , 9999).'-'.rand(1000 , 9999),
            ]);
    }
}
