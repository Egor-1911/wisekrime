<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Beat;
use App\Models\Tag;

class BeatSeeder extends Seeder
{
    public function run(): void
    {
        $beatsData = [
            [
                'title' => 'Ойкумена (163ONMYNECK) [2 + 1]',
                'duration' => '00:02:21',
                'bpm' => 180,
                'key' => 'Am',
                'price' => 4999.00,
                'cover_image' => '163onmyneck.jpg',
                'audio_file' => 'beat1.mp3',
                'genre' => 'Detroit',
                'availability' => true,
                'tags' => ['Detroit', 'Polyana', 'OG Buda']
            ],
            [
                'title' => 'ASPHALT 8 (MACAN) [3 + 1]',
                'duration' => '00:02:42',
                'bpm' => 154,
                'key' => 'Cm',
                'price' => 3499.00,
                'cover_image' => 'macan_cover.png',
                'audio_file' => 'beat2.mp3',
                'genre' => 'Memphis',
                'availability' => true,
                'tags' => ['Memphis', 'MACAN', 'ALBLAK52']
            ],
            [
                'title' => 'Сплинтер (Rocket) [2 + 1]',
                'duration' => '00:04:06',
                'bpm' => 115,
                'key' => 'Fm',
                'price' => 6999.00,
                'cover_image' => 'rocket_cover.png',
                'audio_file' => 'beat3.mp3',
                'genre' => 'Trap',
                'availability' => true,
                'tags' => ['Trap', 'Rocket', 'ShmoneySound']
            ],
        ];

        foreach ($beatsData as $data) {
            $tags = $data['tags'];
            unset($data['tags']); // Убираем теги из массива данных для создания бита
            
            // Создаем бит
            $beat = Beat::create($data);
            
            // Создаем связанные теги
            foreach ($tags as $tagName) {
                Tag::create([
                    'beat_id' => $beat->id,
                    'name' => $tagName
                ]);
            }
        }
    }
}