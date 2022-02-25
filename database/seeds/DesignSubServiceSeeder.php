<?php

use Illuminate\Database\Seeder;

class DesignSubServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\DesignSubService::create([
            'name' => 'تصميم شعار',
            'price' => 10,
            'design_service_id' => 1,
        ]);
        \App\DesignSubService::create([
            'name' => 'ورق المراسلات',
            'price' => 20,
            'design_service_id' => 1,
        ]);
        \App\DesignSubService::create([
            'name' => 'كرت العمل',
            'price' => 10,
            'design_service_id' => 1,
        ]);
        \App\DesignSubService::create([
            'name' => 'ظرف',
            'price' => 10,
            'design_service_id' => 1,
        ]);
        \App\DesignSubService::create([
            'name' => 'مذكرات',
            'price' => 10,
            'design_service_id' => 1,
        ]);
        \App\DesignSubService::create([
            'name' => 'فواتير',
            'price' => 10,
            'design_service_id' => 1,
        ]);
        \App\DesignSubService::create([
            'name' => 'مكتبة صور الهوية',
            'price' => 10,
            'design_service_id' => 1,
        ]);
        \App\DesignSubService::create([
            'name' => 'سندات',
            'price' => 10,
            'design_service_id' => 1,
        ]);

        \App\DesignSubService::create([
            'name' => 'البطاقات البريدية',
            'price' => 10,
            'design_service_id' => 2,
        ]);
        \App\DesignSubService::create([
            'name' => 'إعلانات المجلات',
            'price' => 10,
            'design_service_id' => 2,
        ]);
        \App\DesignSubService::create([
            'name' => 'إعلانات',
            'price' => 10,
            'design_service_id' => 2,
        ]);
        \App\DesignSubService::create([
            'name' => 'العروض التقدمية',
            'price' => 10,
            'design_service_id' => 2,
        ]);
        \App\DesignSubService::create([
            'name' => 'شهادات',
            'price' => 10,
            'design_service_id' => 2,
        ]);
        \App\DesignSubService::create([
            'name' => 'القوائم',
            'price' => 10,
            'design_service_id' => 2,
        ]);
        \App\DesignSubService::create([
            'name' => 'مكتبة صور الهوية',
            'price' => 10,
            'design_service_id' => 2,
        ]);
        \App\DesignSubService::create([
            'name' => 'الكاتلوجات',
            'price' => 10,
            'design_service_id' => 2,
        ]);
    }
}
