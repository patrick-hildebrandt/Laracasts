@props(['employer', 'width' => 90])

@if ($employer->logo && file_exists(public_path('storage/' . $employer->logo)))
    <img src="{{ asset('storage/' . $employer->logo) }}" alt="{{ $employer->name }} Logo" class="rounded-xl" width="{{ $width }}">
@else
    <img src="http://picsum.photos/seed/{{ $employer->id }}/{{ $width }}" alt="{{ $employer->name }} Logo" class="rounded-xl" width="{{ $width }}">
@endif
