<!DOCTYPE html>
<html class="h-full bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
</head>

<body>
    <div class="bg-white flex justify-center items-center h-screen">
        <div class="relative w-1/3 h-screen hidden lg:block bg-gradient-to-b from-[#FC321F] to-[#662E2B]">
            <div class="absolute top-12 inset-0 flex justify-center">
                <img src="{{ Storage::url('recursos/Logo.png') }}" alt="Scotia"
                    class="object-cover w-36 h-36 rounded-md">
            </div>
            <img src="{{ Storage::url('recursos/Manos.png') }}" alt="Manos" class="object-cover w-full h-full">
        </div>

        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-2/3">
            <div class="mx-auto w-full max-w-sm lg:w-96 p-8">
                <div class="flex flex-col items-center">
                    <img class="h-12" src="{{ Storage::url('recursos/ScotiaLogo.png') }}" alt="Lianvigila">
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Inicio de Sesión</h2>
                </div>

                <div class="mt-8">

                    <div class="mt-6">
                        <x-validation-errors class="mb-4" />
                        <form method="POST" class="space-y-6" action="{{ route('login') }}">
                            @csrf
                            <div>
                                <x-label for="email" value="{{ __('Correo Electrónico') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus place="username" />
                            </div>

                            <div class="mt-4">
                                <x-label for="password" value="{{ __('Contraseña') }}" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="current-password" />
                            </div>

                            <div class="flex items-center justify-between">
                                <label for="remember_me" class="flex items-center">
                                    <x-checkbox id="remember_me" name="remember" />
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                                </label>

                                <div class="text-sm">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                            href="{{ route('password.request') }}">
                                            {{ __('Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#FC321F] hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Iniciar
                                    Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
