@props(['employer', 'width' => 90])
{{-- todo HIER WEITER --}}
{{-- @dump($employer->logo) --}}
@if ($employer->logo && file_exists(public_path($employer->logo)))
    <img src="{{ asset($employer->logo) }}" alt="{{ $employer->name }} Logo" class="rounded-xl" width="{{ $width }}">
@else
    <img src="http://picsum.photos/seed/{{ $employer->id }}/{{ $width }}" alt="{{ $employer->name }} Logo" class="rounded-xl" width="{{ $width }}">
@endif
