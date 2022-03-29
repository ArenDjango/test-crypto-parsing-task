<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class PostDTO extends DataTransferObject
{
    public ?string $author = null;

    public string $title;

    public string $description;

    public string $url;

    public ?string $urlToImage = null;

    public string $content;

    public array $source;

    public string $tag;
}
