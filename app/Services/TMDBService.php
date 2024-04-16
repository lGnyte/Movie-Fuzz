<?php

namespace App\Services;

class TMDBService
{
    public function getPopularMovies()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?language=en-US&page=1', [
          'headers' => [
            'Authorization' => 'Bearer ' .env('TMDB_API_KEY'),
            'accept' => 'application/json',
          ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function searchMovie($query)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.themoviedb.org/3/search/movie?include_adult=false&language=en-US&page=1&query=' . $query, [
          'headers' => [
            'Authorization' => 'Bearer ' .env('TMDB_API_KEY'),
            'accept' => 'application/json',
          ],
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function getMovie($id)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.themoviedb.org/3/search/movie?query=asd&include_adult=false&language=en-US&page=1', [
          'headers' => [
            'Authorization' => 'Bearer ' . env('TMDB_API_KEY'),
            'accept' => 'application/json',
          ],
        ]);

        dd($response->getBody()->getContents());
        return json_decode($response->getBody()->getContents());
    }
}