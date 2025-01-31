<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TMDBController extends Controller
{
    public function searchMovies(Request $request)
    {
        $query = $request->query('query');
        $page = $request->query('page', 1);
        $apiKey = env('TMDB_API_KEY');

        $response = Http::get('https://api.themoviedb.org/3/search/movie', [
            'query' => $query,
            'page' => $page,
            'api_key' => $apiKey,
            'language' => 'en-US',
        ]);

        return response()->json($response->json(), $response->status());
    }

    public function searchSeries(Request $request)
    {
        $query = $request->query('query');
        $page = $request->query('page', 1);
        $apiKey = env('TMDB_API_KEY');

        $response = Http::get('https://api.themoviedb.org/3/search/tv', [
            'query' => $query,
            'page' => $page,
            'api_key' => $apiKey,
            'language' => 'en-US',
        ]);

        return response()->json($response->json(), $response->status());
    }

    public function getContentDetails(Request $request)
    {
        $id = $request->query('id');
        $type = $request->query('type');
        $apiKey = env('TMDB_API_KEY');

        $endpoint = $type === 'movie' ? 'movie' : 'tv';

        $response = Http::get("https://api.themoviedb.org/3/{$endpoint}/{$id}", [
            'api_key' => $apiKey,
            'language' => 'en-US',
        ]);

        $status = $response->status();
        $response = $response->json();
        $response['content_id'] = $id;

        if ($endpoint == 'movie') {
            $trailerResponse = Http::get("https://api.themoviedb.org/3/{$endpoint}/{$id}/videos", [
                'api_key' => $apiKey,
                'language' => 'en-US',
            ])->json();
            if (array_key_exists('results', $trailerResponse)) {
                if (count($trailerResponse['results'])) {
                    $trailer = collect($trailerResponse['results'])->first();
                    $response['trailer_url'] = $trailer['key'];
                }
            }
        }

        return response()->json($response, $status);
    }
}
