<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Series') }}
        </h2>
    </x-slot>

    @isset($mensagemSucesso)
        <x-slot name="mensagemSucesso">
            {{ $mensagemSucesso }}
        </x-slot>
    @endisset

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @auth
                <a href="{{ route('series.create') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 mb-5">{{ __('Add') }}</a>
            @endauth

            <ul class="divide-y divide-gray-200 rounded-md border border-gray-300 mt-3">
                @foreach ($series as $seriesElement)
                    <li class="flex items-center justify-between px-4 py-2">
                        @auth <a href="{{ route('seasons.index', $seriesElement->id) }}" class="text-blue-600 hover:underline"> @endauth
                            {{ $seriesElement->name }}
                        @auth </a> @endauth

                        @auth
                            <span class="flex space-x-2">
                                <a href="{{ route('series.edit', $seriesElement->id) }}" class="px-2 py-1 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">E</a>

                                <form action="{{ route('series.destroy', $seriesElement->id) }}" method="POST" class="ms-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-2 py-1 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">X</button>
                                </form>
                            </span>
                        @endauth
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
