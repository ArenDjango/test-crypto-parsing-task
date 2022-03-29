<?php

namespace App\Services;

use App\DTO\PostDTO;
use App\Models\Post;
use App\Repositories\PostRepository;

class PostService
{
    protected PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create(array $data): ?Post
    {
        $data = new PostDTO(
            author: $data['author'],
            title: $data['title'],
            description: $data['description'],
            url: $data['url'],
            urlToImage: $data['urlToImage'],
            content: $data['content'],
            source: $data['source'],
            tag: $data['keyword']
        );

        return $this->postRepository->create($data);
    }

    public function get(?string $groupBy)
    {
        return $this->postRepository->get($groupBy);
    }
}
