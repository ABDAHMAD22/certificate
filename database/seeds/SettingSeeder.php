<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->insert(array (
            array (
                'section' => 'Contact',
                'key' => 'mobile',
                'value' => '+966-100200',
                'type' => 'Text',
                'status' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'section' => 'Contact',
                'key' => 'email',
                'value' => 'info@shahadatech.com',
                'type' => 'Text',
                'status' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'section' => 'Contact',
                'key' => 'address_en',
                'value' => '<p>Riyadh</p>
                <p>Jeddah 1234</p>',
                'type' => 'Trix',
                'status' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'section' => 'Contact',
                'key' => 'address_ar',
                'value' => '<p>الرياض</p>
                <p>جدة 1234</p>',
                'type' => 'Trix',
                'status' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'section' => 'Social',
                'key' => 'facebook',
                'value' => 'https://facebook.com',
                'type' => 'Text',
                'status' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'section' => 'Social',
                'key' => 'twitter',
                'value' => 'https://twitter.com/',
                'type' => 'Text',
                'status' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'section' => 'Social',
                'key' => 'instagram',
                'value' => 'https://instagram.com',
                'type' => 'Text',
                'status' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'section' => 'Social',
                'key' => 'youtube',
                'value' => NULL,
                'type' => 'Text',
                'status' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            array (
                'section' => 'Social',
                'key' => 'linkedin',
                'value' => 'https://www.linkedin.com/',
                'type' => 'Text',
                'status' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
