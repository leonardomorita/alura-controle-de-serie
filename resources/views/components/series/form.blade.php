<form action="{{ $action }}" method="POST">
    @csrf

    @isset($update)
        @method('PUT')
    @endisset

    <div class="mb-3">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Name:') }}</label>
        <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" name="name" @isset($name)value="{{ $name }}"@endisset>
    </div>

    <button type="submit" class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">{{ $button }}</button>
</form>
