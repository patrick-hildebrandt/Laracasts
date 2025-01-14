<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    {{-- $jobs-variable from web.php --}}
    <ul>
        @foreach ($jobs as $job)
            <a href="/job/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                <li><strong>{{ $job['title'] }}</strong>: Pays {{ $job['salary'] }} per year.</li>
            </a>
        @endforeach
    </ul>
</x-layout>