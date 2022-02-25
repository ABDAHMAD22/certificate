<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => 'التقنية للمعلومات',
            'name_en' => 'Techno',
            'email' => 'user@gmail.com',
            'mobile' => '0599100200',
            'password' => bcrypt('123123'),
            'country_id' => 171,
            'city_id' => 3,
            'region' => 'Gaza',
            'manager_name' => 'Ahmad',
            'training_licence' => 'license.jpg',
            'commercial_register' => 'license.jpg',
            'training_licence_no' => '112233',
            'commercial_register_no' => '102030',
            'account_manager' => 'Ahmad',
            'account_manager_mobile' => '0599100200',
            'account_manager_email' => 'ahmad@gmail.com',
            'image' => 'user-img1.jpg',
            'status' => 1,
            'is_completed' => 1,
            'social_links' => [
                'website' => 'http://google.com',
                'twitter' => 'http://twitter.com',
            ],
        ]);
    }
}
