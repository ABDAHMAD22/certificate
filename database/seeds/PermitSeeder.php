<?php

use Illuminate\Database\Seeder;

class PermitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Permit::create([
            'name' => 'إصدار شهادة',
            'key' => 'certificate',
            'type' => 'editor',
        ]);
        \App\Permit::create([
            'name' => 'إصدار إعلان',
            'key' => 'ads',
            'type' => 'editor',
        ]);
        \App\Permit::create([
            'name' => 'تجديد إشتراك',
            'key' => 'subscription',
            'type' => 'editor',
        ]);
        \App\Permit::create([
            'name' => 'تعديل شهادة',
            'key' => 'update_certificate',
            'type' => 'user',
        ]);
    }
}
