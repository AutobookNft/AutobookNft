<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="https://kit.fontawesome.com/65e3d9e08a.js" crossorigin="anonymous"></script>

        {{-- <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
        <link href="{{ asset('css/animation.css') }}" rel="stylesheet"> --}}

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{--
        <link href="public/build/assets/app.3bbb159c.css" rel="stylesheet"> --}}

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">


        {{-- <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
        <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script> --}}

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link href="/build/assets/app.9ca2ded0.css" rel="stylesheet">
    <!-- Styles -->
    @livewireStyles

        {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
        <script src="https://www.jsdelivr.com/package/npm/pdfjs-dist"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script src="https://cdn.tiny.cloud/1/kldqqsdlxikw31jj12blewcr8bioovluf0clhe63u4vn2ru1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    </head>

    <body class="font-sans antialiased bg-black">

        <x-jet-banner />

        <div class="bg-black">

            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

        </div>

        @livewireScripts

        @stack('modals')

        @cookieConsent

    </body>

</html>
