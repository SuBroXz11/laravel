{{-- @php
    $test = 'testing'
@endphp

{{ $test }} --}} {{-- with this we can see this in the browser easy --}}

{{-- @if (count($listings) == 0)
    <p>No listings found</p>
@endif --}}
<h1>
    {{ $heading }}
    {{--<?php echo $heading ?> both are same --}}
</h1>

@unless (count($listings) == 0)
@else
<p>No listings found</p>
@endunless


@foreach($listings as $listing)
<a href="listings/{{ $listing['id'] }}">
<h1>
    {{ $listing['title'] }}
</h1>
</a>
<p>
    {{ $listing['description'] }}

</p>
@endforeach
   