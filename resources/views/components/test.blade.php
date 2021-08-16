{{-- @props(['type', 'message' => 'default', 'abs']) --}}
<div {{ $attributes->merge(['class' => "bg-{$type}"]) }}>
    {{-- @php
          dd($attributes )
    @endphp --}}
{{ $type }}

    {{ $abs }}
</div>
