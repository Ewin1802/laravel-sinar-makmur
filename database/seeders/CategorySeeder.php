<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            [
                'name' => 'Elektronik',
                'description' => 'Berbagai produk elektronik rumah tangga seperti televisi, kulkas, mesin cuci, kipas angin, speaker, dan perangkat elektronik lainnya.',
                'image' => null,
            ],

            [
                'name' => 'Bahan Bangunan',
                'description' => 'Material bangunan seperti semen, cat, besi, keramik, pipa, seng, dan perlengkapan konstruksi lainnya.',
                'image' => null,
            ],

            [
                'name' => 'Mebel',
                'description' => 'Perabot rumah tangga seperti sofa, lemari, meja, kursi, tempat tidur, rak, dan furnitur lainnya.',
                'image' => null,
            ],

        ];

        foreach ($categories as $category) {

            Category::updateOrCreate(
                ['name' => $category['name']],
                $category
            );

        }
    }
}
