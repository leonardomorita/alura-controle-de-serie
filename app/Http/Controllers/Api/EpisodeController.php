<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Series;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index(int $series)
    {
        $series = Series::find($series);

        if (!$series) {
            return response()->json(['message' => 'Série não encontrada'], 404);
        }

        return $series->episodes;
    }

    public function watched(int $episode, Request $request)
    {
        $request->validate([
            'watched' => ['required', 'boolean']
        ]);

        $episode = Episode::find($episode);

        if (!$episode) {
            return response()->json(['message' => 'Episódio não encontrado'], 404);
        }

        $episode->watched = $request->watched;
        $episode->save();
        return $episode;
    }
}
