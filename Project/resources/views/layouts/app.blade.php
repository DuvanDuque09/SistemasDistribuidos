<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <script>
        const setup = () => {
            return {
                loading: true,
            }
        }
    </script>

</head>

<body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');">
        <div x-ref="loading"
            class="fixed inset-0 z-[200] flex items-center justify-center text-white bg-black bg-opacity-50"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)">
            Cargando.....
        </div>

        <div class="flex h-screen bg-gray-50">
            <!-- Sidebar -->
            @livewire('menu.navigation')

            <!-- Page Content -->
            {{ $slot }}
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
