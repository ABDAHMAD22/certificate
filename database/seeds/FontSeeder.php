<?php

use Illuminate\Database\Seeder;

class FontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Font::create([
            'name' => 'SST Arabic',
            'file' => 'sst-arabic-medium.ttf',
        ]);
        \App\Font::create([
            'name' => 'JF Flat',
            'file' => 'JFFlat.ttf',
        ]);
        \App\Font::create([
            'name' => 'ae alarabiya',
            'file' => 'ae-alarabiya.ttf',
        ]);
        \App\Font::create([
            'name' => 'Swissra',
            'file' => 'swissra-medium.otf',
        ]);
        \App\Font::create([
            'name' => 'Cairo',
            'file' => 'cairo-bold.ttf',
        ]);//
        \App\Font::create([
            'name' => 'Montserrat',
            'file' => 'montserrat-medium.ttf',
        ]);//
        \App\Font::create([
            'name' => 'QFArabic',
            'file' => 'qfarabic-medium.otf',
        ]);//
        \App\Font::create([
            'name' => 'Arbfonts Somar',
            'file' => 'arbfonts-somar-medium.otf',
        ]);//
        \App\Font::create([
            'name' => 'FFShamel Family',
            'file' => 'ffshamelfamily-medium.ttf',
        ]);//
    }
}
