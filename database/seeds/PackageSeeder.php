<?php

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Package::create([
            'name' => 'باقة ذهبية',
            'price' => 200,
            'certificates_no' => 40000,
            'certificates_free_no' => 10,
            'ads_no' => 60,
            'cards_no' => 1,
        ]);
        \App\Package::create([
            'name' => 'باقة فضية',
            'price' => 150,
            'certificates_no' => 250,
            'certificates_free_no' => 10,
            'ads_no' => 50,
            'cards_no' => 1,
        ]);
        \App\Package::create([
            'name' => 'باقة توفير',
            'price' => 100,
            'certificates_no' => 200,
            'certificates_free_no' => 10,
            'ads_no' => 40,
            'cards_no' => 1,
        ]);
        \App\Package::create([
            'name' => 'باقة ميكس',
            'price' => 50,
            'certificates_no' => 100,
            'certificates_free_no' => 10,
            'ads_no' => 30,
            'cards_no' => 1,
        ]);
    }
}
