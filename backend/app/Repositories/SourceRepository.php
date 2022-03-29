<?php

namespace App\Repositories;

use App\Models\Source;

class SourceRepository
{
    public function create(string $name)
    {
        return Source::firstOrCreate([
            'name' => $name,
        ]);
    }
}
