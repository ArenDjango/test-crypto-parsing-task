<?php

namespace Database\Seeders;

use App\Models\Keyword;
use Illuminate\Database\Seeder;

class KeywordSeeder extends Seeder
{
    public const KEYWORDS = [
        'Bitcoin',
        'Litecoin',
        'Ripple',
        'Dash',
        'Ethereum',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::KEYWORDS as $keyword) {
            Keyword::create([
                'name' => $keyword
            ]);
        }
    }
}
