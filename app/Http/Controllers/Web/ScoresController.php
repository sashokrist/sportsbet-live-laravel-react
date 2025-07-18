<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ScoresController extends Controller
{
    protected array $leagues = [
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

    public function index()
    {
        return view('scores.index', ['leagues' => $this->leagues]);
    }

    public function show(Request $request)
    {
        $league = $request->query('league');

        if (!in_array($league, $this->leagues)) {
            return redirect()->route('scores.index')->withErrors(['Invalid league selected.']);
        }

        $cacheKey = 'odds_scores_' . $league;

        $scores = Cache::remember($cacheKey, now()->addMinutes(60), function () use ($league) {
            $response = Http::withOptions([
                'verify' => 'C:/xampp/php/extras/ssl/cacert.pem', // optional
            ])->get("https://api.the-odds-api.com/v4/sports/{$league}/scores", [
                'apiKey'     => env('ODDS_API_KEY'),
                'daysFrom'   => 3,
                'dateFormat' => 'iso',
            ]);

            return $response->successful() ? $response->json() : [];
        });

        return view('scores.show', [
            'league' => $league,
            'scores' => $scores,
        ]);
    }
}
