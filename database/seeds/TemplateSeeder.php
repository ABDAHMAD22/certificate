<?php

use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            "type_x" => 1000,
            "type_y" => 380,
            "type_size" => 100,
            "type_color" => '#0F7B62',
            "type_word_x" => 1150,
            "type_word_y" => 925,
            "type_word_size" => 58,
            "type_word_color" => '#5f605f',
            "student_name_x" => 1000,
            "student_name_y" => 702,
            "student_name_size" => 100,
            "student_name_color" => '#0F7B62',
            "trainer_name_x" => 0,
            "trainer_name_y" => 0,
            "trainer_name_size" => 50,
            "trainer_name_color" => '#0F7B62',
            "accreditation_no_x" => 1550,
            "accreditation_no_y" => 835,
            "accreditation_no_size" => 35,
            "accreditation_no_color" => '#5f605f',
            "id_no_x" => 590,
            "id_no_y" => 835,
            "id_no_size" => 35,
            "id_no_color" => '#5f605f',
            "title_x" => 1000,
            "title_y" => 1060,
            "title_size" => 75,
            "title_color" => '#0F7B62',
            "subtitle_y" => 1120,
            "date_x" => 1000,
            "date_y" => 1210,
            "date_size" => 42,
            "date_color" => '#5f605f',
            "days_x" => 1358,
            "days_y" => 1278,
            "days_size" => 35,
            "days_color" => '#0F7B62',
            "hours_x" => 1100,
            "hours_y" => 1278,
            "hours_size" => 42,
            "hours_color" => '#0F7B62',
        ];
        \App\Template::create([
            'name' => null,
            'image' => 'certificate_img1.jpg',
            'type_id' => 1,
            'font_id' => 1,
            'settings' => $settings,
        ]);
        \App\Template::create([
            'name' => null,
            'image' => 'certificate_img2.jpeg',
            'type_id' => 1,
            'font_id' => 2,
            'settings' => $settings,
        ]);

        \App\Template::create([
            'name' => null,
            'image' => 'certificate_img3.png',
            'type_id' => 1,
            'font_id' => 1,
            'settings' => [
                "type_x" => 0,
                "type_y" => 0,
                "type_size" => 0,
                "type_color" => '#000000',
                "type_word_x" => 0,
                "type_word_y" => 0,
                "type_word_size" => 0,
                "type_word_color" => '#000000',
                "student_name_x" => 1000,
                "student_name_y" => 1130,
                "student_name_size" => 110,
                "student_name_color" => '#007b76',
                "trainer_name_x" => 0,
                "trainer_name_y" => 0,
                "trainer_name_size" => 0,
                "trainer_name_color" => '#000000',
                "accreditation_no_x" => 0,
                "accreditation_no_y" => 0,
                "accreditation_no_size" => 0,
                "accreditation_no_color" => '#000000',
                "id_no_x" => 1655,
                "id_no_y" => 1285,
                "id_no_size" => 45,
                "id_no_color" => '#000000',
                "title_x" => 0,
                "title_y" => 0,
                "title_size" => 0,
                "title_color" => '#007b76',
                "subtitle_y" => 0,
                "date_x" => 0,
                "date_y" => 0,
                "date_size" => 0,
                "date_color" => '#000000',
                "days_x" => 0,
                "days_y" => 0,
                "days_size" => 0,
                "days_color" => '#000000',
                "hours_x" => 0,
                "hours_y" => 0,
                "hours_size" => 0,
                "hours_color" => '#000000',
            ],
        ]);

        \App\Template::create([
            'name' => null,
            'image' => 'ads_img1.png',
            'type_id' => 2,
            'font_id' => 1,
            'settings' => [
                "title_size" => "40",
                "trainer_size" => "30",
                "trainer_about_size" => "25",
                "price_size" => "50",
                "currency_size" => "40",
                "type_size" => "16",
                "mobile_size" => "22",
                "whatsapp_size" => "22",
                "hours_no_size" => "22",
                "date_size" => "16",
                "place_size" => "18",
                "axes_size" => "18",
                "features_size" => "18",
                "time_size" => "18",
            ],
        ]);
        \App\Template::create([
            'name' => null,
            'image' => 'ads_img2.png',
            'type_id' => 2,
            'font_id' => 2,
            'settings' => [
                "title_size" => "40",
                "trainer_size" => "30",
                "trainer_about_size" => "25",
                "price_size" => "50",
                "currency_size" => "40",
                "type_size" => "16",
                "mobile_size" => "22",
                "whatsapp_size" => "22",
                "hours_no_size" => "22",
                "date_size" => "16",
                "place_size" => "18",
                "axes_size" => "18",
                "features_size" => "18",
                "time_size" => "18",
            ],
        ]);
    }
}
