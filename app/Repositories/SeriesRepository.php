<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Http\Request;

interface SeriesRepository
{
    public function add(SeriesFormRequest|Request $request): Series;
}
