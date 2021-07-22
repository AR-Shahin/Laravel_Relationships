<x-guest-layout>

    <div class="py-10">
    <h1 class="text-center text-purple-800 text-3xl font-bold">One to One</h1>
    <hr>

    @foreach ($users->load('profile') as $user)
        <div class="py-3">
            <h4>{{ $user->name }}</h4>
            {{-- <p>Country : {{ $user->profile->country ?? 'nul' }}</p> --}}
            {{-- <p>Country : {{ optional($user->profile)->country }}</p> --}}
            <p>Country : {{ optional($user->profile)->country }}</p>
        </div>
        <hr>
    @endforeach
    </div>
</x-guest-layout>
