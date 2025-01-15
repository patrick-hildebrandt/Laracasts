<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>

    <h2 class="font-bold text-lg">
        {{-- $job-variable from web.php --}}
        {{ $job['title'] }}
    </h2>
    <p>
        {{ $job['salary'] }} per year.
    </p>
</x-layout>