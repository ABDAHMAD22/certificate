<?php

use Illuminate\Database\Seeder;

class CertificateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\CertificateType::create([
            'name' => 'شهادة حضور',
            'word' => 'لحضور',
        ]);
        \App\CertificateType::create([
            'name' => 'شهادة اجتياز',
            'word' => 'لاجتياز',
        ]);
    }
}
