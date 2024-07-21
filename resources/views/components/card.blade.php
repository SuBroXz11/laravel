<div {{ $attributes->merge(['class'=>'bg-gray-50 border border-gray-200 rounded p-6']) }}> {{--  With this we can use the class as reuable in the component --}}
    {{ $slot }} {{--  this is needed to merge this wrapper --}}
</div>