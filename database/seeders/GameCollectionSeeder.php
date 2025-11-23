<?php

namespace Database\Seeders;

use App\Models\Platform;
use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Platforms
        $platforms = [
            [
                'name' => 'PlayStation 5',
                'manufacturer' => 'Sony',
                'release_year' => 2020,
                'description' => 'Sony\'s latest generation gaming console featuring ray tracing and ultra-fast SSD.',
            ],
            [
                'name' => 'Xbox Series X',
                'manufacturer' => 'Microsoft',
                'release_year' => 2020,
                'description' => 'Microsoft\'s most powerful console with 4K gaming and Game Pass integration.',
            ],
            [
                'name' => 'Nintendo Switch',
                'manufacturer' => 'Nintendo',
                'release_year' => 2017,
                'description' => 'Hybrid gaming console that can be used as both a home and portable device.',
            ],
            [
                'name' => 'PC (Steam)',
                'manufacturer' => 'Various',
                'release_year' => null,
                'description' => 'Personal computer gaming platform with access to thousands of games.',
            ],
            [
                'name' => 'PlayStation 4',
                'manufacturer' => 'Sony',
                'release_year' => 2013,
                'description' => 'Sony\'s previous generation console with a massive game library.',
            ],
            [
                'name' => 'Xbox One',
                'manufacturer' => 'Microsoft',
                'release_year' => 2013,
                'description' => 'Microsoft\'s previous generation console with multimedia features.',
            ],
        ];

        $createdPlatforms = [];
        foreach ($platforms as $platformData) {
            $createdPlatforms[] = Platform::create($platformData);
        }

        // Create Games
        $games = [
            [
                'title' => 'The Legend of Zelda: Breath of the Wild',
                'genre' => 'Action-Adventure',
                'release_year' => 2017,
                'developer' => 'Nintendo EPD',
                'platform_id' => $createdPlatforms[2]->id, // Nintendo Switch
                'description' => 'An open-world action-adventure game where you explore the kingdom of Hyrule.',
            ],
            [
                'title' => 'God of War Ragnarök',
                'genre' => 'Action-Adventure',
                'release_year' => 2022,
                'developer' => 'Santa Monica Studio',
                'platform_id' => $createdPlatforms[0]->id, // PlayStation 5
                'description' => 'Kratos and Atreus embark on a mythic journey through the Nine Realms.',
            ],
            [
                'title' => 'Halo Infinite',
                'genre' => 'First-Person Shooter',
                'release_year' => 2021,
                'developer' => '343 Industries',
                'platform_id' => $createdPlatforms[1]->id, // Xbox Series X
                'description' => 'Master Chief returns to continue the fight against the Banished.',
            ],
            [
                'title' => 'Elden Ring',
                'genre' => 'Action RPG',
                'release_year' => 2022,
                'developer' => 'FromSoftware',
                'platform_id' => $createdPlatforms[3]->id, // PC (Steam)
                'description' => 'A fantasy action RPG set in a world created by Hidetaka Miyazaki and George R. R. Martin.',
            ],
            [
                'title' => 'The Last of Us Part II',
                'genre' => 'Action-Adventure',
                'release_year' => 2020,
                'developer' => 'Naughty Dog',
                'platform_id' => $createdPlatforms[4]->id, // PlayStation 4
                'description' => 'Follow Ellie\'s journey of revenge in a post-apocalyptic world.',
            ],
            [
                'title' => 'Forza Horizon 5',
                'genre' => 'Racing',
                'release_year' => 2021,
                'developer' => 'Playground Games',
                'platform_id' => $createdPlatforms[1]->id, // Xbox Series X
                'description' => 'Explore the vibrant open-world landscapes of Mexico in this racing adventure.',
            ],
            [
                'title' => 'Super Mario Odyssey',
                'genre' => 'Platform',
                'release_year' => 2017,
                'developer' => 'Nintendo EPD',
                'platform_id' => $createdPlatforms[2]->id, // Nintendo Switch
                'description' => 'Join Mario on a globe-trotting 3D platforming adventure.',
            ],
            [
                'title' => 'Cyberpunk 2077',
                'genre' => 'Action RPG',
                'release_year' => 2020,
                'developer' => 'CD Projekt Red',
                'platform_id' => null, // No platform - demonstrating nullable foreign key
                'description' => 'An open-world action-adventure story set in the megalopolis of Night City.',
            ],
        ];

        foreach ($games as $gameData) {
            Game::create($gameData);
        }
    }
}
