<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
        <script src="https://kit.fontawesome.com/65e3d9e08a.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@perawallet/connect@latest/dist/index.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles

    </head>

    <body class="antialiased">

        <div class="relative min-h-screen">

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-20 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-md text-white underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-md text-white underline">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-md text-white underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            {{ $slot }}

            <div class="relative inline-block text-left">
                <div class="fixed top-0 right-0 mt-4 mr-4">
                    <button onclick="toggleDropdown(event)" class="toggle-dropdown inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div id="dropdown-menu" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white hidden">
                        {{-- @include('livewire.marketplace.include_file.menu_home') --}}
                    </div>

                </div>
            </div>


            @livewireScripts

        </div>
        <script src="/js/marquee3k.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Marquee3k.init();
            });
        </script>
        {{-- <script>
            // Utilizza il tuo file AlgoClient.js qui
            var client = new AlgoClient();
        </script> --}}

    </body>
</html>



<script>
    function toggleDropdown(event) {
      const dropdownMenu = document.getElementById('dropdown-menu');

      if (event.target.closest('.toggle-dropdown') || dropdownMenu.classList.contains('hidden')) {
        dropdownMenu.classList.toggle('hidden');
      }
    }

    document.addEventListener('click', function (event) {
      const dropdownMenu = document.getElementById('dropdown-menu');

      if (!event.target.closest('.toggle-dropdown') && !dropdownMenu.classList.contains('hidden')) {
        dropdownMenu.classList.add('hidden');
      }
    });
</script>
