<?php

use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PaymentType::create([
            'name' => 'حوالة بنكية',
        ]);
        \App\PaymentType::create([
            'name' => 'بطاقة الكترونية',
        ]);
        \App\PaymentType::create([
            'name' => 'PayPal',
        ]);
    }
}
