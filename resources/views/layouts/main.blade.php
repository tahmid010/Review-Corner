<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Review Corner</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('/css/main.css') }}">
        <link href="https://unpkg.com/tailwindcss@^1.9/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <livewire:styles />
        
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.x/dist/alpine.min.js" defer></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    </head>
    <body class="font-sans bg-gray-900 text-white antialiased">
        <nav class="border-b border-gray-800">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
                <ul class="flex flex-col md:flex-row items-center">
                    <li class="">
                        <a href="{{ route('home.index') }}">
                            <img class="-mt-2" src="{{asset('\img\application_logo2.png')}}" style="width: 240px;">
                        </a>
                    </li>
                    <li class="md:ml-16 mt-3 md:mt-0">
                        <a href="{{ route('home.index') }}" class="hover:text-gray-300">Home</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ route('tv.index') }}" class="hover:text-gray-300">TV Shows</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ route('actors.index') }}" class="hover:text-gray-300">Actors</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ route('games.index') }}" class="hover:text-gray-300">Games</a>
                    </li>
                    <li>
                        <div @click.away="open = false" class="relative z-50" x-data="{ open: false }">
                            <button @click="open = !open" class="flex flex-row items-center w-full px-4 mt-2 text-left bg-transparent rounded-lg md:w-auto md:mt-0 md:ml-4 hover:text-gray-300 ">
                              <span>More</span>
                              <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                                <div class="px-2 py-2 bg-gray-700 rounded-md shadow">
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-100 hover:bg-gray-900 focus:outline-none focus:shadow-outline break-words" href="{{ route('member.index') }}">Membership</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-100 hover:bg-gray-900 focus:outline-none focus:shadow-outline" href="{{ route('home.temp') }}">Contact</a>
                                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-100 hover:bg-gray-900 focus:outline-none focus:shadow-outline" href="{{ route('home.temp') }}">About Us</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="flex flex-col md:flex-row items-center">
                    <livewire:search-dropdown>
                    @if (Route::has('login'))
                        <div class="hidden top-0 right-0 py-4 sm:block md:ml-4 mt-3 md:mt-0">
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-sm hover:text-gray-300 underline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm hover:text-gray-300 underline">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm hover:text-gray-300 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>
        @yield('content') 
        <footer class="border border-t border-gray-800">
            <div class="container mx-auto text-sm px-4 py-6">
                Powered by <a href="https://www.themoviedb.org/documentation/api" class="underline hover:text-gray-300">TMDb API</a>
            </div>
        </footer>
        <livewire:scripts />
    </body>
</html>
