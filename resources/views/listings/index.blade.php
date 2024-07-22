{{-- @php
    $test = 'testing'
@endphp

{{ $test }} --}} {{-- with this we can see this in the browser easy --}}

{{-- @if (count($listings) == 0)
    <p>No listings found</p>
@endif --}}

<x-layout>

{{-- <h1> --}}
    {{-- {{ $heading }} --}}
    {{-- <?php echo $heading ?> both are same --}}
{{-- </h1> --}}

@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

@unless (count($listings) == 0)

@foreach($listings as $listing)
<x-listing-card :listing="$listing"/>
@endforeach

@else
<p>No listings found</p>
@endunless


</div>
<div class="mt-6 p-4">
    {{ $listings->links()}}
</div>
</x-layout>
