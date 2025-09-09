<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Series') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-series.form :action="route('series.update', $series->id)" button="{{ __('Save') }}" :name="$series->name" :update="true" />
        </div>
    </div>
</x-app-layout>
