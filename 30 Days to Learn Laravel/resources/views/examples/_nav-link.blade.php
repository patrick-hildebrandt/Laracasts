@props(['active' => false, 'type' => 'a']) {{-- props werden nicht wie $attributes als HTML-Attribute behandelt --}}

@if ($type === 'a') {{-- <?php if ($type === 'a') : ?> : = { ... } bis zum nächsten PHP-Tag --}}
    <a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
    rounded-md px-3 py-2 text-sm font-medium"
        aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
        {{ $slot }}
    </a>
@else {{-- <?php else : ?> --}}
    <button
        class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
        rounded-md px-3 py-2 text-sm font-medium"
        aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
        {{ $slot }}
    </button>
@endif {{-- <?php endif ?> --}}
