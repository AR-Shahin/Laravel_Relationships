<x-guest-layout>

    <div class="py-10">
    <h1 class="text-center text-purple-800 text-3xl font-bold">Many to Many</h1>
    <hr>

    @foreach ($users as $user)
        <h1>{{ $user->name }}</h1>
        -- Skills :
        @foreach ($user->skills as  $skill)
            {{ $skill->my_pivot->rate }}
            {{ $skill->name }} |
        @endforeach
        <hr class="border">
    @endforeach

    </div>
    {{-- {{ $globalCity }} --}}
</x-guest-layout>
