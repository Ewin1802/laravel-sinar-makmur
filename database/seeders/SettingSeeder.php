<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([

            'store_name' => 'SM Store',

            'store_tagline' => 'Furniture & Electronics',

            'store_description' =>
            'Menyediakan berbagai produk elektronik dan furniture berkualitas.',

            'hero_title' =>
            'Elektronik Berkualitas Untuk Rumah Anda',

            'hero_subtitle' =>
            'Temukan berbagai kebutuhan elektronik dan furniture dengan harga terbaik.',

            'hero_button' => 'Belanja Sekarang',

            'phone' => '081340985993',

            'whatsapp' => '6281340985993',

            'email' => 'info@email.com',

            'address' => 'Kab. Bolaang Mongondow Utara',

            'facebook' => '#',

            'instagram' => 'https://instagram.com/',

            'youtube' => '#',

            'tiktok' => '#',

            'meta_title' =>
            'SM Store',

            'meta_description' =>
            'Toko Elektronik dan Furniture',

            'meta_keywords' =>
            'elektronik,furniture',

            'copyright' =>
            '© '.date('Y').' SM Store'

        ]);
    }
}
