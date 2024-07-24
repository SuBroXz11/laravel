<x-layout>

@include('partials._search')

<a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
<div class="mx-4">
    <x-card class="py-10">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
            <img
                class="w-48 mr-6 mb-6"
                src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                alt=""
            />
            <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
            <ul class="flex">
                <li
                    class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                >
                    <a href="#">Laravel</a>
                </li>
                <li
                    class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                >
                    <a href="#">API</a>
                </li>
                <li
                    class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                >
                    <a href="#">Backend</a>
                </li>
                <li
                    class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                >
                    <a href="#">Vue</a>
                </li>
            </ul>
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Job Description
                </h3>
                <div class="text-lg space-y-6">
                    <p>{{ $listing->description}}</p>

                    <a
                        href="{{ $listing->email }}"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                        Contact Employer</a
                    >

                    <a
                        href=" mailto:{{ $listing->website }}"
                        target="_blank"
                        class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-globe"></i> Visit
                        Website</a
                    >
                </div>
            </div>
        </div>
    </x-card>
    <x-card class="flex justify-center items-center mt-4 space-x-6">
        {{-- EDIT REQUEST --}}
        <a href="/listings/{{ $listing->id }}/edit" class="flex items-center space-x-2">
            <i class="fa-solid fa-pencil"></i>
            <span>Edit</span>
        </a>
        {{-- DELETE REQUEST --}}
        <form method="POST" action="/listings/{{ $listing->id }}" class="flex items-center space-x-2">
            @csrf
            @method('DELETE')
            <button class="text-red-500 flex items-center space-x-2">
                <i class="fa-solid fa-trash"></i>
                <span>Delete</span>
            </button>
        </form>
    </x-card>
    
    
</div>
</x-layout> 