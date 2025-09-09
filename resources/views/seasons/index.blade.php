<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {!! $series->name !!} {{ __('Seasons') }}
        </h2>
    </x-slot>

    @isset($mensagemSucesso)
        <x-slot name="mensagemSucesso">
            {{ $mensagemSucesso }}
        </x-slot>
    @endisset

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul class="divide-y divide-gray-200 rounded-md border border-gray-300 mt-3">
                @foreach ($seasons as $season)
                    <li class="flex items-center justify-between px-4 py-2">
                        <a href="{{ route('episodes.index', $season->id) }}" class="text-blue-600 hover:underline">Temporada {{ $season->season_number }}</a>

                        <div class="inline-flex items-center rounded-full bg-gray-700 px-2 py-0.5 text-xs font-medium text-white">
                            {{-- {{ $season->episodes()->watched()->count() }} / {{ $season->episodes->count() }} --}}
                            {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
