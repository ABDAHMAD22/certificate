<?php

use Illuminate\Database\Seeder;

class AdsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\AdsType::create([
            'name' => 'شهادة معتمدة',
        ]);
    }
}
