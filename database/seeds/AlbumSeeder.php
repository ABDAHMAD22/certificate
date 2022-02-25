<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $album1 = \App\Album::create([
            'name' => 'اكسسوارات',
        ]);
        $album2 = \App\Album::create([
            'name' => 'سيارات',
        ]);

        $album1->media()->create([
            'collection_name' => 'images',
            'name' => 'image1',
            'file_name' => 'image1.jpg',
            'mime_type' => 'image/jpeg',
            'disk' => 'public',
            'conversions_disk' => 'public',
            'size' => 472096,
            'manipulations' => '[]',
            'custom_properties' => '[]',
            'responsive_images' => '[]',
            'order_column' => 1
        ]);
        $album1->media()->create([
            'collection_name' => 'images',
            'name' => 'image2',
            'file_name' => 'image2.jpg',
            'mime_type' => 'image/jpeg',
            'disk' => 'public',
            'conversions_disk' => 'public',
            'size' => 99521,
            'manipulations' => '[]',
            'custom_properties' => '[]',
            'responsive_images' => '[]',
            'order_column' => 2
        ]);
        $album1->media()->create([
            'collection_name' => 'images',
            'name' => 'image3',
            'file_name' => 'image3.jpg',
            'mime_type' => 'image/jpeg',
            'disk' => 'public',
            'conversions_disk' => 'public',
            'size' => 161339,
            'manipulations' => '[]',
            'custom_properties' => '[]',
            'responsive_images' => '[]',
            'order_column' => 2
        ]);
        $album2->media()->create([
            'collection_name' => 'images',
            'name' => 'car1',
            'file_name' => 'car1.jpg',
            'mime_type' => 'image/jpeg',
            'disk' => 'public',
            'conversions_disk' => 'public',
            'size' => 100839,
            'manipulations' => '[]',
            'custom_properties' => '[]',
            'responsive_images' => '[]',
            'order_column' => 1
        ]);
        $album2->media()->create([
            'collection_name' => 'images',
            'name' => 'car2',
            'file_name' => 'car2.jpg',
            'mime_type' => 'image/jpeg',
            'disk' => 'public',
            'conversions_disk' => 'public',
            'size' => 66641,
            'manipulations' => '[]',
            'custom_properties' => '[]',
            'responsive_images' => '[]',
            'order_column' => 2
        ]);
        $album2->media()->create([
            'collection_name' => 'images',
            'name' => 'car3',
            'file_name' => 'car3.jpg',
            'mime_type' => 'image/jpeg',
            'disk' => 'public',
            'conversions_disk' => 'public',
            'size' => 279097,
            'manipulations' => '[]',
            'custom_properties' => '[]',
            'responsive_images' => '[]',
            'order_column' => 3
        ]);
    }
}
