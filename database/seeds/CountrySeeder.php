<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = json_decode(file_get_contents(storage_path('countries.json')), true);
        $data = null;
        foreach ($countries as $country) {
            try {
                $data[] = [
                    'name' => $country['name_ar'],
                ];
            } catch (Exception $exception) {
                continue;
            }
        }

        \App\Country::insert($data);
    }
}
