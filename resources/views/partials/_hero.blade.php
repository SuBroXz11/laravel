<section class="relative h-72 bg-laravel flex flex-col justify-center items-center text-center space-y-4 mb-4 overflow-hidden">
    <div
        class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center animate-fade-in"
        style="background-image: url('images/laravel-logo.png')"
    ></div>

    <div class="z-10 animate-slide-down">
        <h1 class="text-6xl font-bold uppercase text-white drop-shadow-md">
            Lara<span class="text-black">Gigs</span>
        </h1>
        <p class="text-2xl text-gray-200 font-bold my-4 drop-shadow-md">
            Find or post Laravel jobs & projects
        </p>
        @auth 
        @else  
        <div>
            <a
                href="/register"
                class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black transition-colors duration-300"
            >
                Sign Up to List a Gig
            </a>
        </div>
        @endauth
    </div>
</section>
<style>
    @keyframes fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    @keyframes slide-down {
        from {
            transform: translateY(-50%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    
    .animate-fade-in {
        animation: fade-in 2s ease-out;
    }
    
    .animate-slide-down {
        animation: slide-down 1s ease-out;
    }
    </style>
    