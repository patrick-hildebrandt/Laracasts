<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    {{-- $jobs-variable from web.php --}}
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/job/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">
                    {{ $job->employer->name }}
                </div>
                <div>
                    <strong>{{ $job['title'] }}</strong> : Pays {{ $job['salary'] }} per year.
                </div>
            </a>
        @endforeach

        <div>
            {{-- http://127.0.0.1:8000/jobs?page=2 --}}
            {{-- php artisan vendor:publish --}}
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
