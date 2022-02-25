<?php

use Illuminate\Database\Seeder;

class DesignServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\DesignService::create([
            'name' => 'خدمات الهوية',
        ]);
        \App\DesignService::create([
            'name' => 'خدمات الاعمال و التسويق',
        ]);
    }
}
