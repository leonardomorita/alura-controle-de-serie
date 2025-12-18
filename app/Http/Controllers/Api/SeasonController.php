<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function __construct()
    {
        // JSON Web Token (JWT) Authentication Middleware
        // $this->middleware('auth:api');
    }

    public function index(int $series)
    {
        $series = Series::find($series);

        if (!$series) {
            return response()->json(['message' => 'Série não encontrada'], 404);
        }

        return $series->seasons;
    }
}
