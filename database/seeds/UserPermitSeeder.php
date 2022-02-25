<?php

use Illuminate\Database\Seeder;

class UserPermitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\UserPermit::create([
            'user_id' => 1,
            'permit_id' => 4,
        ]);
    }
}
