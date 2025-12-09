<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {

    }

    public function index()
    {
        return Series::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'seasonQty' => ['required', 'integer'],
            'episodePerSeason' => ['required', 'integer'],
            'coverPath' => ['string']
        ]);

        return response()->json($this->seriesRepository->add($request), 201);
    }

    public function uploadCover(Request $request)
    {
        $coverBinary = $request->getContent();

        if (!$coverBinary) {
            return response()->json(['message' => 'Arquivo não enviado.']);
        }

        // Obter MIME
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->buffer($coverBinary);

        $ext = match ($mime) {
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            default => 'Erro'
        };

        if ($ext == 'Erro') {
            return response()->json(['message' => 'Arquivo inválido.']);
        }

        $filePath = 'series_cover/cover-' . time() . '.' . $ext;


        Storage::disk('public')->put($filePath, $coverBinary);

        return response()->json(['cover-path' => $filePath]);
    }

    public function show(int $series)
    {
        return Series::whereId($series)
            ->with('seasons.episodes')
            ->first();
    }

    public function update(int $series, Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3']
        ]);

        Series::where('id', $series)->update($request->all());

        return response()->json(['message' => 'Série atualizada com sucesso']);
    }

    public function destroy(int $series)
    {
        Series::destroy($series);

        return response()->noContent();
    }
}
