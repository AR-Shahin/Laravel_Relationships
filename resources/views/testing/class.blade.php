<x-guest-layout>

    <div class="py-12">
        <!-- Old way -->
        {{-- <h1
        class="text-center text-4xl font-normal @if ($isActive)
        bg-pink-900 text-green-200
        @else
        bg-red-500 text-white
        @endif"
        >Conditional Class</h1> --}}

        <!-- New way -->
        <h1
        @class([
            'text-center text-4xl font-normal',
            'bg-pink-900 text-green-200' => $isActive,
            'bg-red-500 text-white' => !$isActive
        ])
        >Conditional Class</h1>
    </div>
</x-guest-layout>
