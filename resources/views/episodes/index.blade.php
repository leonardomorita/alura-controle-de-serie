<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Episodes') }}
        </h2>
    </x-slot>

    @isset($mensagemSucesso)
        <x-slot name="mensagemSucesso">
            {{ $mensagemSucesso }}
        </x-slot>
    @endisset

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST">
                @csrf

                <ul class="divide-y divide-gray-200 rounded-md border border-gray-300 mt-3">
                    @foreach ($episodes as $episode)
                        <li class="flex items-center justify-between px-4 py-2">
                            Episódio {{ $episode->episode_number }}

                            <input
                                type="checkbox"
                                name="episodes[]"
                                value="{{ $episode->id }}"
                                @if ($episode->watched) checked @endif
                            />
                        </li>
                    @endforeach
                </ul>

                <button class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 mt-2">Salvar</button>
            </form>
        </div>
    </div>
</x-app-layout>
