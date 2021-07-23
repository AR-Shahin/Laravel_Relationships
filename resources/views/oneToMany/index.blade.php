<x-guest-layout>

    <div class="p-10">
    <h1 class="text-center text-purple-800 text-3xl font-bold">One to Many</h1>
    <hr>

    @foreach ($posts as $post)
        <div class="py-3">
            <h4><b>[{{ $post->id }}]</b> : {{ $post->title }}</h4>
            <h5><b>User : </b> {{ $post->user->name }}</h5>
            @foreach ($post->comments as $comment)
                <p><b>{{ $loop->index + 1 }}</b> : {{ $comment->title  }}</p>
            @endforeach
        </div>
        <hr>
    @endforeach
    </div>
</x-guest-layout>
