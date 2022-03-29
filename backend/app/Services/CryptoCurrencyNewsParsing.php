<?php

namespace App\Services;

use GuzzleHttp\Client;

class CryptoCurrencyNewsParsing
{
    protected PostService $postService;
    protected KeywordService $keywordService;
    protected Client $httpClient;

    public function __construct(PostService $postService, Client $httpClient, KeywordService $keywordService)
    {
        $this->postService = $postService;
        $this->httpClient = $httpClient;
        $this->keywordService = $keywordService;
    }

    public function parsing(): void
    {
        $keywords = $this->keywordService->get();

        foreach ($keywords as $keyword) {
            try {
                $response = $this->getResponse($keyword->name);
            } catch (\Exception $e) {
                continue;
            }

            $this->save($response['articles'], $keyword->name);
        }
    }

    protected function getResponse(string $keyword): array
    {
        $date = date('Y-m-d');
        $apiKey = env('NEWSAPI_API_KEY');

        $url = $this->getUrl($keyword, $date, $apiKey);

        $response = $this->httpClient->get($url);

        return json_decode((string) $response->getBody(), true);
    }

    protected function getUrl(string $keyword, string $date, string $apiKey): string
    {
        return "https://newsapi.org/v2/everything?q=$keyword&from=$date&sortBy=publishedAt&apiKey=$apiKey";
    }

    protected function save(array $articles, string $keyword): void
    {
        foreach ($articles as $article) {

            $article['keyword'] = $keyword;

            try {
                $this->postService->create($article);
                break;
            } catch (\Exception $e) {
                continue;
            }
        }
    }
}
