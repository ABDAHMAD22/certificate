<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Language::create([
            'name' => 'العربية',
        ]);
        \App\Language::create([
            'name' => 'الانجليزية',
        ]);
        \App\Language::create([
            'name' => 'العربية والانجليزية',
        ]);
    }
}
