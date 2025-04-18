<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class TmdbService
{
    private HttpClientInterface $httpClient;
    private string $apiKey = "86533c13f5646bdeb5295938d02a5d82";

    public function __construct(HttpClientInterface $httpClient, string $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
    }

    public function getMovie(int $movieId): array
    {
        $response = $this->httpClient->request('GET', "https://api.themoviedb.org/3/movie/{$movieId}", [
            'query' => [
                'api_key' => $this->apiKey,
                'language' => 'fr-FR', // Optionnel : langue française
            ],
        ]);

        return $response->toArray();
    }

    public function getPopularMovies(): array
    {
        $response = $this->httpClient->request('GET', 'https://api.themoviedb.org/3/movie/popular', [
            
            'query' => [
                'api_key' => $this->apiKey,
                'language' => 'fr-FR',
            ],
        ]);

        return $response->toArray()['results'];
    }

    public function searchMovies(string $query): array
    {
        $response = $this->httpClient->request('GET', 'https://api.themoviedb.org/3/search/movie', [
            'query' => [
                'api_key' => $this->apiKey,
                'query' => $query,
                'language' => 'fr-FR',
            ],
        ]);

        return $response->toArray()['results'];
    }
}