<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Series') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <x-series.form :action="route('series.store')" button="Adicionar" :name="old('name')" /> --}}

            <form action="{{ route('series.store') }}" method="POST">
                @csrf

                <div class="flex flex-wrap gap-4 mb-3">
                    <div class="w-full md:w-2/3">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Name:') }}</label>
                        <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" name="name" value="{{ old('name') }}" autofocus>
                    </div>

                    <div class="w-full md:w-1/6">
                        <label for="season-qty" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Season Number:') }}</label>
                        <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="season-qty" name="seasonQty" value="{{ old('seasonQty') }}">
                    </div>

                    <div class="w-full md:w-1/6">
                        <label for="episode-per-season" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Episode per Season:') }}</label>
                        <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="episode-per-season" name="episodePerSeason" value="{{ old('episodePerSeason') }}">
                    </div>
                </div>

                <button type="submit" class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">{{ __('Add') }}</button>
            </form>
        </div>
    </div>
</x-app-layout>
