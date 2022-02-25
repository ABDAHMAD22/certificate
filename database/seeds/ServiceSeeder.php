<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Service::create([
            'title' => [
                'en'=>'Lorem Ipsum1',
                'ar'=>'لوريم إيبسوم1'
            ],
            'description' => [
                'en'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                'ar'=>'لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر'
            ],
            'details' => [
                'en'=>'<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>',
                'ar'=>'<p></p>',
            ],
        ]);
        \App\Service::create([
            'title' => [
                'en'=>'Lorem Ipsum2',
                'ar'=>'لوريم إيبسوم2'
            ],
            'description' => [
                'en'=>'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout',
                'ar'=>'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها'
            ],
            'details' => [
                'en'=>'<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</p>',
                'ar'=>'<p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها</p>',
            ],
        ]);
    }
}
