<x-guest-layout>

    <div class="p-10">
    <h1 class="text-center text-purple-800 text-3xl font-bold">One to Many Polymorphic</h1>
    <hr>

    {{-- <h1>{{ $post->title }}</h1>
    @foreach ($post->reviews as $review)
    <p>Review <b>({{ $loop->index + 1 }})</b> : {{ $review->body }}</p>
    <p>Status : {{ $review->is_active }}</p>
    <hr class="border">
    @endforeach --}}

    @foreach ($reviews as $review)
        <h2><b>({{ $review->reviewable->getTable() }})</b>{{ $review->reviewable->title }}</h2>
        <hr class="border my-2">
    @endforeach

    </div>
</x-guest-layout>
