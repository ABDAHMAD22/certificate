<?php

use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Partner::create([
            'name' => 'مركز مسار للتدريب',
            'logo' => 'masar-logo.png',
            'link' => 'http://masar.sa'
        ]);
        \App\Partner::create([
            'name' => 'مركز القياس الوطني',
            'logo' => 'qiyas-logo.png',
            'link' => null
        ]);
        \App\Partner::create([
            'name' => 'هيئة تقويم التعليم والتدريب',
            'logo' => 'education-logo.png',
            'link' => null
        ]);
        \App\Partner::create([
            'name' => 'مركز اعتماد للتدريب',
            'logo' => 'ncaaa-logo.png',
            'link' => null
        ]);
        \App\Partner::create([
            'name' => 'الهيئة السعودية للمهندسين',
            'logo' => 'ncsee-logo.png',
            'link' => null
        ]);
        \App\Partner::create([
            'name' => 'استثمار المرافق التعليمية',
            'logo' => 'facilities-logo.png',
            'link' => null
        ]);

//        \App\Partner::create([
//            'name' => 'واقف',
//            'logo' => 'partner1.png',
//            'link' => 'https://google.com',
//        ]);
//        \App\Partner::create([
//            'name' => 'قد',
//            'logo' => 'partner2.png',
//            'link' => 'https://google.com',
//        ]);
//        \App\Partner::create([
//            'name' => 'تكوين',
//            'logo' => 'partner3.png',
//            'link' => 'https://google.com',
//        ]);
    }
}
