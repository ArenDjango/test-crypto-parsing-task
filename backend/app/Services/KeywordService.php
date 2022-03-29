<?php

namespace App\Services;

use App\Models\Keyword;
use Illuminate\Database\Eloquent\Collection;

class KeywordService
{
    public function get(): Collection|array
    {
        return Keyword::all();
    }
}
