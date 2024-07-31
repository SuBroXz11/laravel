<!DOCTYPE html>
<html lang="en" data-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <style>
            @keyframes slide-up {
                from {
                    transform: translateY(100%);
                }
                to {
                    transform: translateY(0);
                }
            }
            
            .animate-slide-up {
                animation: slide-up 1s ease-out;
            }
            </style>
        <title>Jobster | Find Jobs & Projects</title>
    </head>
    <body class="mb-48">
        <div class="navbar bg-base-100 shadow-lg">
            <div class="flex-1">
                <a href="/">
                    <img class="w-24" src="{{ asset('images/logo.png') }}" alt="Logo" class="logo" />
                </a>
            </div>
            <div class="flex-none">
                @auth
                    <span class="font-bold uppercase text-xl mr-4">
                        Welcome, {{ auth()->user()->name }}
                    </span>
                    <ul class="menu menu-horizontal px-1">
                        <li class="relative">
                            <details class="group">
                                <summary class="flex items-center cursor-pointer">
                                    <i class="fa-solid fa-gear text-xl mr-1"></i> 
                                    <span class="text-xl">Settings</span>
                                </summary>
                                <ul class="bg-base-100 rounded-t-none p-2 absolute right-0 mt-1 z-10 shadow-lg group-open:mt-0 group-open:transition-all group-open:duration-200">
                                    <li>
                                        <a href="/listings/manage" class="flex items-center hover:text-laravel p-2">
                                            <i class="fa-solid fa-list-check mr-2"></i> 
                                            Manage Listings
                                        </a>
                                    </li>
                                    <li>
                                        <form action="/logout" class="inline hover:text-laravel p-2" method="POST">
                                            @csrf
                                            <button type="submit" class="flex items-center">
                                                <i class="fa-solid fa-door-closed mr-2"></i> Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </details>
                        </li>
                    @else
                        <li class="mr-4 list-none">
                            <a href="/register" class="hover:text-laravel text-xl flex items-center">
                                <i class="fa-solid fa-user-plus mr-2"></i> Register
                            </a>
                        </li>
                        <li class="list-none">
                            <a href="/login" class="hover:text-laravel text-xl flex items-center">
                                <i class="fa-solid fa-arrow-right-to-bracket mr-2"></i> Login
                            </a>
                        </li>
                    @endauth
                    </ul>
            </div>
        </div>
        
          
    {{-- View Output --}}
    <main>
    {{-- @yield('content') --}}
    {{ $slot }}
</main>
<footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center animate-slide-up">
    <p class="ml-2">&copy; 2024, All Rights Reserved</p>
    <a href="/listings/create" class="absolute top-1/2 right-10 bg-black text-white py-2 px-5 transform -translate-y-1/2 hover:bg-laravel transition-all duration-300">
        Post Job
    </a>
</footer>
        <x-flash-message/>
    </body>
</html>