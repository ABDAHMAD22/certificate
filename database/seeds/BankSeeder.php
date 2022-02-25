<?php

use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Bank::create([
            'name' => 'حساب راجحي',
            'account_no' => '100200',
        ]);
        \App\Bank::create([
            'name' => 'حساب أهلي',
            'account_no' => '200300',
        ]);
    }
}
