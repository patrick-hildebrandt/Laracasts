@props(['name'])

@php
    // todo log
    if ($errors->has($name)) {
        file_put_contents(storage_path('logs/laravel.log'), '');
        Log::error($name);
        Log::error($errors);

        // dump($name);
        // dump($errors);
    }
@endphp

@error($name)
    <p class="text-xs text-red-500 font-semibold mt-1">
        {{ $message }}
    </p>
@enderror
