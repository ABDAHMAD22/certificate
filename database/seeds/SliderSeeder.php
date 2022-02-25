<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Slider::create([
            'title' => 'حين تكون التقنية بوابةً لخدمتك تكون شهادة تك',
            'description' => 'صدِّر شهاداتك وقم بتصميم إعلاناتك بخطواتٍ سهلة',
            'image' => 'slider-img1.svg',
            'button_text' => 'شاهد الفيديو',
            'button_icon' => 'play-icon.svg',
            'button_link' => 'https://www.youtube.com/watch?v=hpp3WA5l_FY&list=PLdWcYbFFqZr2vNb2XC4LmsbbjneZnbSwo',
        ]);
        \App\Slider::create([
            'title' => 'حين تكون التقنية بوابةً لخدمتك تكون شهادة تك2',
            'description' => 'صدِّر شهاداتك وقم بتصميم إعلاناتك بخطواتٍ سهلة2',
            'image' => 'slider-img1.svg',
        ]);
    }
}
