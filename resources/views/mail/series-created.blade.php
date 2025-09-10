@component('mail::message')

# {{ __('series.series_created', ['seriesName' => $seriesName]) }}

{{ __('series.series_created_message', ['seriesName' => $seriesName, 'seasonNumber' => $seasonNumber, 'episodePerSeason' => $episodePerSeason]) }}

{{ __('Access here:') }}

@component('mail::button', ['url' => route('seasons.index', $seriesId)])
    {{ __('Show Series') }}
@endcomponent

@endcomponent
