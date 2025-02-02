<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>

    <h2 class="font-bold text-lg">
        {{-- $job-variable from web.php --}}
        {{-- {{ $job['title'] }} --}}
        {{ $job->title }}
    </h2>

    <p>
        {{-- {{ $job['salary'] }} per year. --}}
        {{ $job->salary }} per year.
    </p>

    <p class="mt-6">
        <x-button href="/jobs/{{ $job->id }}/edit">
            Edit Job
        </x-button>
    </p>
</x-layout>
