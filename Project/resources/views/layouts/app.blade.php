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

    <!--Charts Js-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Styles -->
    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        <div class="flex h-screen bg-gray-50 relative">
            <svg class="absolute z-1 h-[50%] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-10"
                viewBox="0 0 403.7 447.3" fill="#EC121F">
                <path class="st0"
                    d="M328.4,83.4H201.8C130.4,83.3,70.3,137,62.4,208.1l0,0C25,140.2,49.7,54.9,117.6,17.4    C138.2,6.1,161.4,0.1,185,0h218.7L328.4,83.4z" />
                <path class="st0"
                    d="M75.2,363.9h126.6c71.4,0,131.4-53.7,139.4-124.6l0,0c37.6,67.6,13.2,152.8-54.4,190.4    c-20.9,11.6-44.5,17.7-68.4,17.6H0L75.2,363.9z" />
                <circle class="st0" cx="201.8" cy="223.6" r="112.7" />
            </svg>
            <!-- Sidebar -->
            @livewire('menu.navigation')

            <!-- Page Content -->
            {{ $slot }}
        </div>
    </div>

    @stack('modals')

    @livewireScripts

    <script>
        Livewire.on('load', function() {
            location.reload();
        })

        Livewire.on('success', function(message) {
            Swal.fire({
                title: message,
                icon: "success"
            });
        })

        Livewire.on('info', function(message) {
            Swal.fire({
                icon: 'info',
                text: message,
            })
        })

        Livewire.on('error', function(message) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: message,
            })
        })

        window.addEventListener('user-delete-confirmation', event => {
            Swal.fire({
                title: 'Estas Seguro?',
                text: event.detail.text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#CA3A32',
                cancelButtonColor: '#A9ABAE',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteConfirmed')
                }
            })
        });

        window.addEventListener('user-activate-confirmation', event => {
            Swal.fire({
                title: 'Estas Seguro?',
                text: event.detail.text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#CA3A32',
                cancelButtonColor: '#A9ABAE',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('activateConfirmed')
                }
            })
        });

        window.addEventListener('customer-create-confirmation', event => {
            Swal.fire({
                title: 'Cliente no encontrado.',
                text: event.detail.text,
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#CA3A32',
                cancelButtonColor: '#A9ABAE',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('redirectCreateCustomer')
                }
            })
        });

        window.addEventListener('delete', event => {
            Swal.fire(
                'Actualizado!',
                'Se ha Eliminado Correctamente.',
                'success'
            )
        });

        window.addEventListener('activate', event => {
            Swal.fire(
                'Activado!',
                'Se ha Activado Correctamente.',
                'success'
            )
        });
    </script>
</body>

</html>
