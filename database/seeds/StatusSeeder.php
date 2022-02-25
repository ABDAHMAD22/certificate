<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Status::create([
            'name' => 'قيد الانتظار',
        ]);
        \App\Status::create([
            'name' => 'تم الدفع',
        ]);
        \App\Status::create([
            'name' => 'فشل',
        ]);
        \App\Status::create([
            'name' => 'حظر',
        ]);
    }
}
