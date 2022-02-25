<?php

use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Target::create([
            'name' => 'رجال',
        ]);
        \App\Target::create([
            'name' => 'نساء',
        ]);
        \App\Target::create([
            'name' => 'رجال ونساء',
        ]);
        \App\Target::create([
            'name' => 'بدون',
        ]);
        \App\Target::create([
            'name' => 'آخرون',
        ]);
    }
}
