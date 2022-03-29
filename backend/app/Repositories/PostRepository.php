<?php

namespace App\Repositories;

use App\DTO\PostDTO;
use App\Models\Post;

class PostRepository
{
    protected SourceRepository $sourceRepository;

    public function __construct(SourceRepository $sourceRepository)
    {
        $this->sourceRepository = $sourceRepository;
    }

    public function create(PostDTO $data): Post
    {
        $source = $this->sourceRepository->create($data->source['name']);

        $data = $data->toArray();

        unset($data['source']);
        $data['source_id'] = $source->id;

        return Post::create($data);
    }

    public function get(?string $groupBy)
    {
        $query = Post::query();

        $groupByArray = [
            'source',
            'created_at',
            'tag',
        ];

        if ($groupBy && in_array($groupBy, $groupByArray)) {
            if ($groupBy === 'source') {
                $query = $query->with(['source' => function($query) {
                    return $query->groupBy('name');
                }]);
            } else {
                $query = $query->groupBy($groupBy);
            }
        }

        return $query->get();
    }
}
