<?php

use Illuminate\Database\Seeder;

class CenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Center::create([
            'name' => 'مركز مسار للتدريب',
            'logo' => 'masar-logo.png',
            'address' => 'الرياض - السعودبة',
        ]);
        \App\Center::create([
            'name' => 'مركز القياس الوطني',
            'logo' => 'qiyas-logo.png',
            'address' => 'الرياض - السعودبة',
        ]);
        \App\Center::create([
            'name' => 'هيئة تقويم التعليم والتدريب',
            'logo' => 'education-logo.png',
            'address' => 'الرياض - السعودبة',
        ]);
        \App\Center::create([
            'name' => 'مركز اعتماد للتدريب',
            'logo' => 'ncaaa-logo.png',
            'address' => 'الرياض - السعودبة',
        ]);
        \App\Center::create([
            'name' => 'استثمار المرافق التعليمية',
            'logo' => 'facilities-logo.png',
            'address' => 'الرياض - السعودبة',
        ]);
    }
}
