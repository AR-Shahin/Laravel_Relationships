@props(['type', 'message' => 'default'])
<div {{ $attributes->merge(['class' => "bg-{$type}"]) }}>
    {{-- @php
          dd($attributes )
    @endphp --}}
{{-- {{ $type }} --}}

    {{ $message }}
</div>
