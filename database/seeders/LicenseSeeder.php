<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\License;

class LicenseSeeder extends Seeder
{
    public function run(): void
    {
        $licenses = [
            [
                'name' => 'Лицензия на песню',
                'description' => 'MP3 + WAV | Без права на музыкальный клип',
                'price' => 4999.00,
                'type' => 'song'
            ],
            [
                'name' => 'Лицензия на клип',
                'description' => 'MP3 + WAV | Включает право на музыкальный клип',
                'price' => 9999.00,
                'type' => 'clip'
            ],
            [
                'name' => 'Премиум лицензия',
                'description' => 'WAV + Trackout | Включает право на клип',
                'price' => 19999.00,
                'type' => 'premium'
            ],
            [
                'name' => 'Миксинг',
                'description' => 'Миксинг трека | С правом на релиз',
                'price' => 4999.00,
                'type' => 'mixing'
            ],
            [
                'name' => 'Мастеринг',
                'description' => 'Мастеринг трека | Включает миксинг',
                'price' => 7999.00,
                'type' => 'mastering'
            ],
            [
                'name' => 'Обложка',
                'description' => 'Cover Art | Качество индустриального стандарта',
                'price' => 3999.00,
                'type' => 'cover'
            ],
        ];

        foreach ($licenses as $license) {
            License::create($license);
        }
    }
}