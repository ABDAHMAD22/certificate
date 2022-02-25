<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\City::create([
            'name' => 'الرياض',
            'country_id' => 194,
        ]);
        \App\City::create([
            'name' => 'جدة',
            'country_id' => 194,
        ]);
        \App\City::create([
            'name' => 'غزة',
            'country_id' => 171,
        ]);
    }
}
