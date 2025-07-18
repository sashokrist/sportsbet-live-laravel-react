<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SportsController extends Controller
{
//     public function index(): JsonResponse
// {
//     //Cache for 60 minutes to avoid rate limits
//     $data = Cache::remember('odds_soccer_scores', now()->addMinutes(60), function () {
//         return Http::withOptions([
//             'verify' => 'C:/xampp/php/extras/ssl/cacert.pem', // Remove if not needed
//         ])->get('https://api.the-odds-api.com/v4/sports/soccer_uefa_champs_league_qualification/scores', [
//             'apiKey'     => env('ODDS_API_KEY'),
//             'daysFrom'   => 3,
//             'dateFormat' => 'iso',
//         ])->json();
//     });
//     // $data = Http::withOptions([
//     //     'verify' => 'C:/xampp/php/extras/ssl/cacert.pem', // or remove this if certs now work
//     // ])->get('https://api.the-odds-api.com/v4/sports/', [
//     //     'apiKey' => env('ODDS_API_KEY'),
//     // ])->json();


//     return response()->json($data);
// }
public function scores(Request $request): JsonResponse
{
    // List of allowed league keys
    $allowedLeagues = [
        'soccer_austria_bundesliga',
        'soccer_denmark_superliga',
        'soccer_england_league1',
        'soccer_epl',
        'soccer_fifa_world_cup_qualifiers_europe',
        'soccer_fifa_world_cup_winner',
        'soccer_france_ligue_one',
        'soccer_germany_bundesliga',
        'soccer_italy_serie_a',
        'soccer_netherlands_eredivisie',
        'soccer_spain_la_liga',
        'soccer_uefa_champs_league_qualification',
        'soccer_usa_mls',
    ];

    // Get league from query, default to 'soccer_uefa_champs_league_qualification'
    $league = $request->query('league', 'soccer_uefa_champs_league_qualification');

    // Validate input
    if (!in_array($league, $allowedLeagues)) {
        return response()->json(['error' => 'Invalid league'], 400);
    }

    // Unique cache key per league
    $cacheKey = 'odds_scores_' . $league;

    // Fetch and cache the API response
    $data = Cache::remember($cacheKey, now()->addMinutes(60), function () use ($league) {
        $response = Http::withOptions([
            'verify' => 'C:/xampp/php/extras/ssl/cacert.pem', // optional for local dev
        ])->get("https://api.the-odds-api.com/v4/sports/{$league}/scores", [
            'apiKey'     => env('ODDS_API_KEY'),
            'daysFrom'   => 3,
            'dateFormat' => 'iso',
        ]);

        return $response->successful()
            ? $response->json()
            : ['error' => 'Failed to load data'];
    });

    return response()->json($data);
}

public function leagues(): JsonResponse
{
    return response()->json([
        'leagues' => [
            'soccer_austria_bundesliga',
            'soccer_denmark_superliga',
            'soccer_england_league1',
            'soccer_epl',
            'soccer_fifa_world_cup_qualifiers_europe',
            'soccer_fifa_world_cup_winner',
            'soccer_france_ligue_one',
            'soccer_germany_bundesliga',
            'soccer_italy_serie_a',
            'soccer_netherlands_eredivisie',
            'soccer_spain_la_liga',
            'soccer_uefa_champs_league_qualification',
            'soccer_usa_mls',
        ]
    ]);
}

}

