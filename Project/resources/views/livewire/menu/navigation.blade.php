<div x-data="{ isSidebarOpen: false }" class="flex flex-shrink-0 transition-all">
    <div x-show="isSidebarOpen" @click="isSidebarOpen = false" class="fixed inset-0 z-10 bg-black bg-opacity-50 lg:hidden">
    </div>
    <div x-show="isSidebarOpen" class="fixed inset-y-0 z-50 w-16 bg-white"></div>

    <!-- Mobile bottom bar -->
    <nav aria-label="Options"
        class="fixed inset-x-0 bottom-0 flex flex-row-reverse items-center justify-between px-4 py-2 bg-white border-t border-indigo-100 sm:hidden shadow-t">
        <!-- Menu button -->
        {{--  <button
                class="group relative p-2 transition-colors rounded-lg shadow-md hover:bg-red-800 hover:text-white focus:outline-none focus:ring focus:ring-red-600 focus:ring-offset-white focus:ring-offset-2 {{ Request::routeIs('dashboard') ? 'bg-red-600 text-white' : 'text-red-600 hover:text-white hover:bg-red-600' }}">
                <svg viewBox="0 0 15 15" class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2.8 1L2.74967 0.99997C2.52122 0.999752 2.32429 0.999564 2.14983 1.04145C1.60136 1.17312 1.17312 1.60136 1.04145 2.14983C0.999564 2.32429 0.999752 2.52122 0.99997 2.74967L1 2.8V5.2L0.99997 5.25033C0.999752 5.47878 0.999564 5.67572 1.04145 5.85017C1.17312 6.39864 1.60136 6.82688 2.14983 6.95856C2.32429 7.00044 2.52122 7.00025 2.74967 7.00003L2.8 7H5.2L5.25033 7.00003C5.47878 7.00025 5.67572 7.00044 5.85017 6.95856C6.39864 6.82688 6.82688 6.39864 6.95856 5.85017C7.00044 5.67572 7.00025 5.47878 7.00003 5.25033L7 5.2V2.8L7.00003 2.74967C7.00025 2.52122 7.00044 2.32429 6.95856 2.14983C6.82688 1.60136 6.39864 1.17312 5.85017 1.04145C5.67572 0.999564 5.47878 0.999752 5.25033 0.99997L5.2 1H2.8ZM2.38328 2.01382C2.42632 2.00348 2.49222 2 2.8 2H5.2C5.50779 2 5.57369 2.00348 5.61672 2.01382C5.79955 2.05771 5.94229 2.20045 5.98619 2.38328C5.99652 2.42632 6 2.49222 6 2.8V5.2C6 5.50779 5.99652 5.57369 5.98619 5.61672C5.94229 5.79955 5.79955 5.94229 5.61672 5.98619C5.57369 5.99652 5.50779 6 5.2 6H2.8C2.49222 6 2.42632 5.99652 2.38328 5.98619C2.20045 5.94229 2.05771 5.79955 2.01382 5.61672C2.00348 5.57369 2 5.50779 2 5.2V2.8C2 2.49222 2.00348 2.42632 2.01382 2.38328C2.05771 2.20045 2.20045 2.05771 2.38328 2.01382ZM9.8 1L9.74967 0.99997C9.52122 0.999752 9.32429 0.999564 9.14983 1.04145C8.60136 1.17312 8.17312 1.60136 8.04145 2.14983C7.99956 2.32429 7.99975 2.52122 7.99997 2.74967L8 2.8V5.2L7.99997 5.25033C7.99975 5.47878 7.99956 5.67572 8.04145 5.85017C8.17312 6.39864 8.60136 6.82688 9.14983 6.95856C9.32429 7.00044 9.52122 7.00025 9.74967 7.00003L9.8 7H12.2L12.2503 7.00003C12.4788 7.00025 12.6757 7.00044 12.8502 6.95856C13.3986 6.82688 13.8269 6.39864 13.9586 5.85017C14.0004 5.67572 14.0003 5.47878 14 5.25033L14 5.2V2.8L14 2.74967C14.0003 2.52122 14.0004 2.32429 13.9586 2.14983C13.8269 1.60136 13.3986 1.17312 12.8502 1.04145C12.6757 0.999564 12.4788 0.999752 12.2503 0.99997L12.2 1H9.8ZM9.38328 2.01382C9.42632 2.00348 9.49222 2 9.8 2H12.2C12.5078 2 12.5737 2.00348 12.6167 2.01382C12.7995 2.05771 12.9423 2.20045 12.9862 2.38328C12.9965 2.42632 13 2.49222 13 2.8V5.2C13 5.50779 12.9965 5.57369 12.9862 5.61672C12.9423 5.79955 12.7995 5.94229 12.6167 5.98619C12.5737 5.99652 12.5078 6 12.2 6H9.8C9.49222 6 9.42632 5.99652 9.38328 5.98619C9.20045 5.94229 9.05771 5.79955 9.01382 5.61672C9.00348 5.57369 9 5.50779 9 5.2V2.8C9 2.49222 9.00348 2.42632 9.01382 2.38328C9.05771 2.20045 9.20045 2.05771 9.38328 2.01382ZM2.74967 7.99997L2.8 8H5.2L5.25033 7.99997C5.47878 7.99975 5.67572 7.99956 5.85017 8.04145C6.39864 8.17312 6.82688 8.60136 6.95856 9.14983C7.00044 9.32429 7.00025 9.52122 7.00003 9.74967L7 9.8V12.2L7.00003 12.2503C7.00025 12.4788 7.00044 12.6757 6.95856 12.8502C6.82688 13.3986 6.39864 13.8269 5.85017 13.9586C5.67572 14.0004 5.47878 14.0003 5.25033 14L5.2 14H2.8L2.74967 14C2.52122 14.0003 2.32429 14.0004 2.14983 13.9586C1.60136 13.8269 1.17312 13.3986 1.04145 12.8502C0.999564 12.6757 0.999752 12.4788 0.99997 12.2503L1 12.2V9.8L0.99997 9.74967C0.999752 9.52122 0.999564 9.32429 1.04145 9.14983C1.17312 8.60136 1.60136 8.17312 2.14983 8.04145C2.32429 7.99956 2.52122 7.99975 2.74967 7.99997ZM2.8 9C2.49222 9 2.42632 9.00348 2.38328 9.01382C2.20045 9.05771 2.05771 9.20045 2.01382 9.38328C2.00348 9.42632 2 9.49222 2 9.8V12.2C2 12.5078 2.00348 12.5737 2.01382 12.6167C2.05771 12.7995 2.20045 12.9423 2.38328 12.9862C2.42632 12.9965 2.49222 13 2.8 13H5.2C5.50779 13 5.57369 12.9965 5.61672 12.9862C5.79955 12.9423 5.94229 12.7995 5.98619 12.6167C5.99652 12.5737 6 12.5078 6 12.2V9.8C6 9.49222 5.99652 9.42632 5.98619 9.38328C5.94229 9.20045 5.79955 9.05771 5.61672 9.01382C5.57369 9.00348 5.50779 9 5.2 9H2.8ZM9.8 8L9.74967 7.99997C9.52122 7.99975 9.32429 7.99956 9.14983 8.04145C8.60136 8.17312 8.17312 8.60136 8.04145 9.14983C7.99956 9.32429 7.99975 9.52122 7.99997 9.74967L8 9.8V12.2L7.99997 12.2503C7.99975 12.4788 7.99956 12.6757 8.04145 12.8502C8.17312 13.3986 8.60136 13.8269 9.14983 13.9586C9.32429 14.0004 9.52122 14.0003 9.74967 14L9.8 14H12.2L12.2503 14C12.4788 14.0003 12.6757 14.0004 12.8502 13.9586C13.3986 13.8269 13.8269 13.3986 13.9586 12.8502C14.0004 12.6757 14.0003 12.4788 14 12.2503L14 12.2V9.8L14 9.74967C14.0003 9.52122 14.0004 9.32429 13.9586 9.14983C13.8269 8.60136 13.3986 8.17312 12.8502 8.04145C12.6757 7.99956 12.4788 7.99975 12.2503 7.99997L12.2 8H9.8ZM9.38328 9.01382C9.42632 9.00348 9.49222 9 9.8 9H12.2C12.5078 9 12.5737 9.00348 12.6167 9.01382C12.7995 9.05771 12.9423 9.20045 12.9862 9.38328C12.9965 9.42632 13 9.49222 13 9.8V12.2C13 12.5078 12.9965 12.5737 12.9862 12.6167C12.9423 12.7995 12.7995 12.9423 12.6167 12.9862C12.5737 12.9965 12.5078 13 12.2 13H9.8C9.49222 13 9.42632 12.9965 9.38328 12.9862C9.20045 12.9423 9.05771 12.7995 9.01382 12.6167C9.00348 12.5737 9 12.5078 9 12.2V9.8C9 9.49222 9.00348 9.42632 9.01382 9.38328C9.05771 9.20045 9.20045 9.05771 9.38328 9.01382Z"
                        fill="currentColor"></path>
                </svg>
                <div class="absolute inset-y-0 left-12 hidden items-center group-hover:flex">
                    <div
                        class="relative whitespace-nowrap rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 drop-shadow-lg">
                        <div class="absolute inset-0 -left-1 flex items-center">
                            <div class="h-2 w-2 rotate-45 bg-white"></div>
                        </div>
                        <span>Home</span>
                    </div>
                </div>
            </button>  --}}
        <button
            @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
            class="p-2 transition-colors rounded-lg shadow-md hover:bg-red-800 hover:text-white focus:outline-none focus:ring focus:ring-red-600 focus:ring-offset-white focus:ring-offset-2">
            <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
        </button>

        <!-- Logo -->
        <a>
            <img class="h-10 rounded-md" src="{{ Storage::url('recursos/Logo.png') }}" alt="Scotia" />
        </a>

        <!-- User avatar button -->
        <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
            <button @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
                class="transition-opacity rounded-lg opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-red-600 focus:ring-offset-white focus:ring-offset-2">
                <img class="w-10 h-10 rounded-lg shadow-md" src="{{ Storage::url(Auth::user()->profile_photo_path) }}"
                    alt="{{ Auth::user()->name }}" />
            </button>
            <div x-show="isOpen" @click.away="isOpen = false" @keydown.escape="isOpen = false" x-ref="userMenu"
                tabindex="-1"
                class="absolute w-32 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-0 bottom-14 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-label="user menu">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    role="menuitem">Perfil</a>

                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    role="menuitem">Ajustes</a>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <a href="{{ route('logout') }}" @click.prevent="$root.submit();"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1"
                        id="user-menu-item-2">Cerrar sesión</a>
                </form>
            </div>
        </div>
    </nav>

    <nav aria-label="Options"
        class="z-20 flex-col items-center flex-shrink-0 hidden w-20 py-4 bg-white border-r-2 border-indigo-100 shadow-md sm:flex">
        <!-- Logo -->
        <div class="flex-shrink-0 py-4">
            <a href="#">
                <img class="w-10 h-auto rounded-md" src="{{ Storage::url('recursos/Logo.png') }}" alt="Scotia" />
            </a>
        </div>

        <div class="flex flex-col items-center flex-1 p-2 space-y-4">
            <!-- Search button -->
            <div class="py-8">
                <button
                    class="group relative p-2 transition-colors rounded-lg shadow-md hover:bg-red-800 hover:text-white focus:outline-none focus:ring focus:ring-red-600 focus:ring-offset-white focus:ring-offset-2">
                    <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                    <div class="absolute inset-y-0 left-12 hidden items-center group-hover:flex">
                        <div
                            class="relative whitespace-nowrap rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 drop-shadow-lg">
                            <div class="absolute inset-0 -left-1 flex items-center">
                                <div class="h-2 w-2 rotate-45 bg-white"></div>
                            </div>
                            <span>Buscar</span>
                        </div>
                    </div>
                </button>
            </div>
            <!-- Home button -->
            @can('dashboard.admin')
                <a href="{{ route('dashboard.admin') }}"
                    class="group relative p-2 transition-colors rounded-lg shadow-md hover:bg-red-800 hover:text-white focus:outline-none focus:ring focus:ring-red-600 focus:ring-offset-white focus:ring-offset-2 {{ Request::routeIs('dashboard.admin') ? 'bg-red-600 text-white' : 'text-red-600 hover:text-white hover:bg-red-600' }}">
                    <svg viewBox="0 0 15 15" class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.8 1L2.74967 0.99997C2.52122 0.999752 2.32429 0.999564 2.14983 1.04145C1.60136 1.17312 1.17312 1.60136 1.04145 2.14983C0.999564 2.32429 0.999752 2.52122 0.99997 2.74967L1 2.8V5.2L0.99997 5.25033C0.999752 5.47878 0.999564 5.67572 1.04145 5.85017C1.17312 6.39864 1.60136 6.82688 2.14983 6.95856C2.32429 7.00044 2.52122 7.00025 2.74967 7.00003L2.8 7H5.2L5.25033 7.00003C5.47878 7.00025 5.67572 7.00044 5.85017 6.95856C6.39864 6.82688 6.82688 6.39864 6.95856 5.85017C7.00044 5.67572 7.00025 5.47878 7.00003 5.25033L7 5.2V2.8L7.00003 2.74967C7.00025 2.52122 7.00044 2.32429 6.95856 2.14983C6.82688 1.60136 6.39864 1.17312 5.85017 1.04145C5.67572 0.999564 5.47878 0.999752 5.25033 0.99997L5.2 1H2.8ZM2.38328 2.01382C2.42632 2.00348 2.49222 2 2.8 2H5.2C5.50779 2 5.57369 2.00348 5.61672 2.01382C5.79955 2.05771 5.94229 2.20045 5.98619 2.38328C5.99652 2.42632 6 2.49222 6 2.8V5.2C6 5.50779 5.99652 5.57369 5.98619 5.61672C5.94229 5.79955 5.79955 5.94229 5.61672 5.98619C5.57369 5.99652 5.50779 6 5.2 6H2.8C2.49222 6 2.42632 5.99652 2.38328 5.98619C2.20045 5.94229 2.05771 5.79955 2.01382 5.61672C2.00348 5.57369 2 5.50779 2 5.2V2.8C2 2.49222 2.00348 2.42632 2.01382 2.38328C2.05771 2.20045 2.20045 2.05771 2.38328 2.01382ZM9.8 1L9.74967 0.99997C9.52122 0.999752 9.32429 0.999564 9.14983 1.04145C8.60136 1.17312 8.17312 1.60136 8.04145 2.14983C7.99956 2.32429 7.99975 2.52122 7.99997 2.74967L8 2.8V5.2L7.99997 5.25033C7.99975 5.47878 7.99956 5.67572 8.04145 5.85017C8.17312 6.39864 8.60136 6.82688 9.14983 6.95856C9.32429 7.00044 9.52122 7.00025 9.74967 7.00003L9.8 7H12.2L12.2503 7.00003C12.4788 7.00025 12.6757 7.00044 12.8502 6.95856C13.3986 6.82688 13.8269 6.39864 13.9586 5.85017C14.0004 5.67572 14.0003 5.47878 14 5.25033L14 5.2V2.8L14 2.74967C14.0003 2.52122 14.0004 2.32429 13.9586 2.14983C13.8269 1.60136 13.3986 1.17312 12.8502 1.04145C12.6757 0.999564 12.4788 0.999752 12.2503 0.99997L12.2 1H9.8ZM9.38328 2.01382C9.42632 2.00348 9.49222 2 9.8 2H12.2C12.5078 2 12.5737 2.00348 12.6167 2.01382C12.7995 2.05771 12.9423 2.20045 12.9862 2.38328C12.9965 2.42632 13 2.49222 13 2.8V5.2C13 5.50779 12.9965 5.57369 12.9862 5.61672C12.9423 5.79955 12.7995 5.94229 12.6167 5.98619C12.5737 5.99652 12.5078 6 12.2 6H9.8C9.49222 6 9.42632 5.99652 9.38328 5.98619C9.20045 5.94229 9.05771 5.79955 9.01382 5.61672C9.00348 5.57369 9 5.50779 9 5.2V2.8C9 2.49222 9.00348 2.42632 9.01382 2.38328C9.05771 2.20045 9.20045 2.05771 9.38328 2.01382ZM2.74967 7.99997L2.8 8H5.2L5.25033 7.99997C5.47878 7.99975 5.67572 7.99956 5.85017 8.04145C6.39864 8.17312 6.82688 8.60136 6.95856 9.14983C7.00044 9.32429 7.00025 9.52122 7.00003 9.74967L7 9.8V12.2L7.00003 12.2503C7.00025 12.4788 7.00044 12.6757 6.95856 12.8502C6.82688 13.3986 6.39864 13.8269 5.85017 13.9586C5.67572 14.0004 5.47878 14.0003 5.25033 14L5.2 14H2.8L2.74967 14C2.52122 14.0003 2.32429 14.0004 2.14983 13.9586C1.60136 13.8269 1.17312 13.3986 1.04145 12.8502C0.999564 12.6757 0.999752 12.4788 0.99997 12.2503L1 12.2V9.8L0.99997 9.74967C0.999752 9.52122 0.999564 9.32429 1.04145 9.14983C1.17312 8.60136 1.60136 8.17312 2.14983 8.04145C2.32429 7.99956 2.52122 7.99975 2.74967 7.99997ZM2.8 9C2.49222 9 2.42632 9.00348 2.38328 9.01382C2.20045 9.05771 2.05771 9.20045 2.01382 9.38328C2.00348 9.42632 2 9.49222 2 9.8V12.2C2 12.5078 2.00348 12.5737 2.01382 12.6167C2.05771 12.7995 2.20045 12.9423 2.38328 12.9862C2.42632 12.9965 2.49222 13 2.8 13H5.2C5.50779 13 5.57369 12.9965 5.61672 12.9862C5.79955 12.9423 5.94229 12.7995 5.98619 12.6167C5.99652 12.5737 6 12.5078 6 12.2V9.8C6 9.49222 5.99652 9.42632 5.98619 9.38328C5.94229 9.20045 5.79955 9.05771 5.61672 9.01382C5.57369 9.00348 5.50779 9 5.2 9H2.8ZM9.8 8L9.74967 7.99997C9.52122 7.99975 9.32429 7.99956 9.14983 8.04145C8.60136 8.17312 8.17312 8.60136 8.04145 9.14983C7.99956 9.32429 7.99975 9.52122 7.99997 9.74967L8 9.8V12.2L7.99997 12.2503C7.99975 12.4788 7.99956 12.6757 8.04145 12.8502C8.17312 13.3986 8.60136 13.8269 9.14983 13.9586C9.32429 14.0004 9.52122 14.0003 9.74967 14L9.8 14H12.2L12.2503 14C12.4788 14.0003 12.6757 14.0004 12.8502 13.9586C13.3986 13.8269 13.8269 13.3986 13.9586 12.8502C14.0004 12.6757 14.0003 12.4788 14 12.2503L14 12.2V9.8L14 9.74967C14.0003 9.52122 14.0004 9.32429 13.9586 9.14983C13.8269 8.60136 13.3986 8.17312 12.8502 8.04145C12.6757 7.99956 12.4788 7.99975 12.2503 7.99997L12.2 8H9.8ZM9.38328 9.01382C9.42632 9.00348 9.49222 9 9.8 9H12.2C12.5078 9 12.5737 9.00348 12.6167 9.01382C12.7995 9.05771 12.9423 9.20045 12.9862 9.38328C12.9965 9.42632 13 9.49222 13 9.8V12.2C13 12.5078 12.9965 12.5737 12.9862 12.6167C12.9423 12.7995 12.7995 12.9423 12.6167 12.9862C12.5737 12.9965 12.5078 13 12.2 13H9.8C9.49222 13 9.42632 12.9965 9.38328 12.9862C9.20045 12.9423 9.05771 12.7995 9.01382 12.6167C9.00348 12.5737 9 12.5078 9 12.2V9.8C9 9.49222 9.00348 9.42632 9.01382 9.38328C9.05771 9.20045 9.20045 9.05771 9.38328 9.01382Z"
                            fill="currentColor"></path>
                    </svg>
                    <div class="absolute inset-y-0 left-12 hidden items-center group-hover:flex">
                        <div
                            class="relative whitespace-nowrap rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 drop-shadow-lg">
                            <div class="absolute inset-0 -left-1 flex items-center">
                                <div class="h-2 w-2 rotate-45 bg-white"></div>
                            </div>
                            <span>Home</span>
                        </div>
                    </div>
                </a>
            @endcan
            @can('dashboard.agente')
                <button
                    class="group relative p-2 transition-colors rounded-lg shadow-md hover:bg-red-800 hover:text-white focus:outline-none focus:ring focus:ring-red-600 focus:ring-offset-white focus:ring-offset-2 {{ Request::routeIs('dashboard.agente') ? 'bg-red-600 text-white' : 'text-red-600 hover:text-white hover:bg-red-600' }}">
                    <svg viewBox="0 0 15 15" class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.8 1L2.74967 0.99997C2.52122 0.999752 2.32429 0.999564 2.14983 1.04145C1.60136 1.17312 1.17312 1.60136 1.04145 2.14983C0.999564 2.32429 0.999752 2.52122 0.99997 2.74967L1 2.8V5.2L0.99997 5.25033C0.999752 5.47878 0.999564 5.67572 1.04145 5.85017C1.17312 6.39864 1.60136 6.82688 2.14983 6.95856C2.32429 7.00044 2.52122 7.00025 2.74967 7.00003L2.8 7H5.2L5.25033 7.00003C5.47878 7.00025 5.67572 7.00044 5.85017 6.95856C6.39864 6.82688 6.82688 6.39864 6.95856 5.85017C7.00044 5.67572 7.00025 5.47878 7.00003 5.25033L7 5.2V2.8L7.00003 2.74967C7.00025 2.52122 7.00044 2.32429 6.95856 2.14983C6.82688 1.60136 6.39864 1.17312 5.85017 1.04145C5.67572 0.999564 5.47878 0.999752 5.25033 0.99997L5.2 1H2.8ZM2.38328 2.01382C2.42632 2.00348 2.49222 2 2.8 2H5.2C5.50779 2 5.57369 2.00348 5.61672 2.01382C5.79955 2.05771 5.94229 2.20045 5.98619 2.38328C5.99652 2.42632 6 2.49222 6 2.8V5.2C6 5.50779 5.99652 5.57369 5.98619 5.61672C5.94229 5.79955 5.79955 5.94229 5.61672 5.98619C5.57369 5.99652 5.50779 6 5.2 6H2.8C2.49222 6 2.42632 5.99652 2.38328 5.98619C2.20045 5.94229 2.05771 5.79955 2.01382 5.61672C2.00348 5.57369 2 5.50779 2 5.2V2.8C2 2.49222 2.00348 2.42632 2.01382 2.38328C2.05771 2.20045 2.20045 2.05771 2.38328 2.01382ZM9.8 1L9.74967 0.99997C9.52122 0.999752 9.32429 0.999564 9.14983 1.04145C8.60136 1.17312 8.17312 1.60136 8.04145 2.14983C7.99956 2.32429 7.99975 2.52122 7.99997 2.74967L8 2.8V5.2L7.99997 5.25033C7.99975 5.47878 7.99956 5.67572 8.04145 5.85017C8.17312 6.39864 8.60136 6.82688 9.14983 6.95856C9.32429 7.00044 9.52122 7.00025 9.74967 7.00003L9.8 7H12.2L12.2503 7.00003C12.4788 7.00025 12.6757 7.00044 12.8502 6.95856C13.3986 6.82688 13.8269 6.39864 13.9586 5.85017C14.0004 5.67572 14.0003 5.47878 14 5.25033L14 5.2V2.8L14 2.74967C14.0003 2.52122 14.0004 2.32429 13.9586 2.14983C13.8269 1.60136 13.3986 1.17312 12.8502 1.04145C12.6757 0.999564 12.4788 0.999752 12.2503 0.99997L12.2 1H9.8ZM9.38328 2.01382C9.42632 2.00348 9.49222 2 9.8 2H12.2C12.5078 2 12.5737 2.00348 12.6167 2.01382C12.7995 2.05771 12.9423 2.20045 12.9862 2.38328C12.9965 2.42632 13 2.49222 13 2.8V5.2C13 5.50779 12.9965 5.57369 12.9862 5.61672C12.9423 5.79955 12.7995 5.94229 12.6167 5.98619C12.5737 5.99652 12.5078 6 12.2 6H9.8C9.49222 6 9.42632 5.99652 9.38328 5.98619C9.20045 5.94229 9.05771 5.79955 9.01382 5.61672C9.00348 5.57369 9 5.50779 9 5.2V2.8C9 2.49222 9.00348 2.42632 9.01382 2.38328C9.05771 2.20045 9.20045 2.05771 9.38328 2.01382ZM2.74967 7.99997L2.8 8H5.2L5.25033 7.99997C5.47878 7.99975 5.67572 7.99956 5.85017 8.04145C6.39864 8.17312 6.82688 8.60136 6.95856 9.14983C7.00044 9.32429 7.00025 9.52122 7.00003 9.74967L7 9.8V12.2L7.00003 12.2503C7.00025 12.4788 7.00044 12.6757 6.95856 12.8502C6.82688 13.3986 6.39864 13.8269 5.85017 13.9586C5.67572 14.0004 5.47878 14.0003 5.25033 14L5.2 14H2.8L2.74967 14C2.52122 14.0003 2.32429 14.0004 2.14983 13.9586C1.60136 13.8269 1.17312 13.3986 1.04145 12.8502C0.999564 12.6757 0.999752 12.4788 0.99997 12.2503L1 12.2V9.8L0.99997 9.74967C0.999752 9.52122 0.999564 9.32429 1.04145 9.14983C1.17312 8.60136 1.60136 8.17312 2.14983 8.04145C2.32429 7.99956 2.52122 7.99975 2.74967 7.99997ZM2.8 9C2.49222 9 2.42632 9.00348 2.38328 9.01382C2.20045 9.05771 2.05771 9.20045 2.01382 9.38328C2.00348 9.42632 2 9.49222 2 9.8V12.2C2 12.5078 2.00348 12.5737 2.01382 12.6167C2.05771 12.7995 2.20045 12.9423 2.38328 12.9862C2.42632 12.9965 2.49222 13 2.8 13H5.2C5.50779 13 5.57369 12.9965 5.61672 12.9862C5.79955 12.9423 5.94229 12.7995 5.98619 12.6167C5.99652 12.5737 6 12.5078 6 12.2V9.8C6 9.49222 5.99652 9.42632 5.98619 9.38328C5.94229 9.20045 5.79955 9.05771 5.61672 9.01382C5.57369 9.00348 5.50779 9 5.2 9H2.8ZM9.8 8L9.74967 7.99997C9.52122 7.99975 9.32429 7.99956 9.14983 8.04145C8.60136 8.17312 8.17312 8.60136 8.04145 9.14983C7.99956 9.32429 7.99975 9.52122 7.99997 9.74967L8 9.8V12.2L7.99997 12.2503C7.99975 12.4788 7.99956 12.6757 8.04145 12.8502C8.17312 13.3986 8.60136 13.8269 9.14983 13.9586C9.32429 14.0004 9.52122 14.0003 9.74967 14L9.8 14H12.2L12.2503 14C12.4788 14.0003 12.6757 14.0004 12.8502 13.9586C13.3986 13.8269 13.8269 13.3986 13.9586 12.8502C14.0004 12.6757 14.0003 12.4788 14 12.2503L14 12.2V9.8L14 9.74967C14.0003 9.52122 14.0004 9.32429 13.9586 9.14983C13.8269 8.60136 13.3986 8.17312 12.8502 8.04145C12.6757 7.99956 12.4788 7.99975 12.2503 7.99997L12.2 8H9.8ZM9.38328 9.01382C9.42632 9.00348 9.49222 9 9.8 9H12.2C12.5078 9 12.5737 9.00348 12.6167 9.01382C12.7995 9.05771 12.9423 9.20045 12.9862 9.38328C12.9965 9.42632 13 9.49222 13 9.8V12.2C13 12.5078 12.9965 12.5737 12.9862 12.6167C12.9423 12.7995 12.7995 12.9423 12.6167 12.9862C12.5737 12.9965 12.5078 13 12.2 13H9.8C9.49222 13 9.42632 12.9965 9.38328 12.9862C9.20045 12.9423 9.05771 12.7995 9.01382 12.6167C9.00348 12.5737 9 12.5078 9 12.2V9.8C9 9.49222 9.00348 9.42632 9.01382 9.38328C9.05771 9.20045 9.20045 9.05771 9.38328 9.01382Z"
                            fill="currentColor"></path>
                    </svg>
                    <div class="absolute inset-y-0 left-12 hidden items-center group-hover:flex">
                        <div
                            class="relative whitespace-nowrap rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 drop-shadow-lg">
                            <div class="absolute inset-0 -left-1 flex items-center">
                                <div class="h-2 w-2 rotate-45 bg-white"></div>
                            </div>
                            <span>Home</span>
                        </div>
                    </div>
                </button>
            @endcan
            <!-- Users button -->
            @can('users')
                <a href="{{ route('users.index') }}"
                    class="group relative p-2 transition-colors rounded-lg shadow-md hover:bg-red-800 hover:text-white focus:outline-none focus:ring focus:ring-red-600 focus:ring-offset-white focus:ring-offset-2 {{ Request::routeIs('users.index') ? 'bg-red-600 text-white' : 'text-red-600 hover:text-white hover:bg-red-600' }}">
                    <svg viewBox="1.5 1 22 22" class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.9238 7.281C14.9227 8.5394 13.9018 9.55874 12.6435 9.558C11.3851 9.55726 10.3654 8.53673 10.3658 7.27833C10.3662 6.01994 11.3864 5 12.6448 5C13.2495 5.00027 13.8293 5.24073 14.2567 5.6685C14.6841 6.09627 14.924 6.67631 14.9238 7.281Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14.9968 12.919H10.2968C8.65471 12.9706 7.35028 14.3166 7.35028 15.9595C7.35028 17.6024 8.65471 18.9484 10.2968 19H14.9968C16.6388 18.9484 17.9432 17.6024 17.9432 15.9595C17.9432 14.3166 16.6388 12.9706 14.9968 12.919V12.919Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M20.6878 9.02403C20.6872 9.98653 19.9066 10.7664 18.9441 10.766C17.9816 10.7657 17.2016 9.9852 17.2018 9.0227C17.202 8.06019 17.9823 7.28003 18.9448 7.28003C19.4072 7.28003 19.8507 7.4638 20.1776 7.7909C20.5045 8.11799 20.688 8.56158 20.6878 9.02403V9.02403Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4.3338 9.02401C4.3338 9.98664 5.11417 10.767 6.0768 10.767C7.03943 10.767 7.8198 9.98664 7.8198 9.02401C7.8198 8.06137 7.03943 7.28101 6.0768 7.28101C5.11417 7.28101 4.3338 8.06137 4.3338 9.02401V9.02401Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path
                            d="M19.4368 12.839C19.0226 12.839 18.6868 13.1748 18.6868 13.589C18.6868 14.0032 19.0226 14.339 19.4368 14.339V12.839ZM20.7438 13.589L20.7593 12.8392C20.7541 12.839 20.749 12.839 20.7438 12.839V13.589ZM20.7438 18.24V18.99C20.749 18.99 20.7541 18.9899 20.7593 18.9898L20.7438 18.24ZM19.4368 17.49C19.0226 17.49 18.6868 17.8258 18.6868 18.24C18.6868 18.6542 19.0226 18.99 19.4368 18.99V17.49ZM5.58477 14.339C5.99899 14.339 6.33477 14.0032 6.33477 13.589C6.33477 13.1748 5.99899 12.839 5.58477 12.839V14.339ZM4.27777 13.589V12.839C4.27259 12.839 4.26741 12.839 4.26222 12.8392L4.27777 13.589ZM4.27777 18.24L4.26222 18.9898C4.26741 18.9899 4.27259 18.99 4.27777 18.99V18.24ZM5.58477 18.99C5.99899 18.99 6.33477 18.6542 6.33477 18.24C6.33477 17.8258 5.99899 17.49 5.58477 17.49V18.99ZM19.4368 14.339H20.7438V12.839H19.4368V14.339ZM20.7282 14.3388C21.5857 14.3566 22.2715 15.0568 22.2715 15.9145H23.7715C23.7715 14.2405 22.4329 12.8739 20.7593 12.8392L20.7282 14.3388ZM22.2715 15.9145C22.2715 16.7722 21.5857 17.4724 20.7282 17.4902L20.7593 18.9898C22.4329 18.9551 23.7715 17.5885 23.7715 15.9145H22.2715ZM20.7438 17.49H19.4368V18.99H20.7438V17.49ZM5.58477 12.839H4.27777V14.339H5.58477V12.839ZM4.26222 12.8392C2.58861 12.8739 1.25 14.2405 1.25 15.9145H2.75C2.75 15.0568 3.43584 14.3566 4.29332 14.3388L4.26222 12.8392ZM1.25 15.9145C1.25 17.5885 2.58861 18.9551 4.26222 18.9898L4.29332 17.4902C3.43584 17.4724 2.75 16.7722 2.75 15.9145H1.25ZM4.27777 18.99H5.58477V17.49H4.27777V18.99Z"
                            fill="currentColor"></path>
                    </svg>
                    <div class="absolute inset-y-0 left-12 hidden items-center group-hover:flex">
                        <div
                            class="relative whitespace-nowrap rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 drop-shadow-lg">
                            <div class="absolute inset-0 -left-1 flex items-center">
                                <div class="h-2 w-2 rotate-45 bg-white"></div>
                            </div>
                            <span>Usuarios</span>
                        </div>
                    </div>
                </a>
            @endcan
            <!-- Statistics button -->
            <button
                class="group relative p-2 transition-colors rounded-lg shadow-md hover:bg-red-800 hover:text-white focus:outline-none focus:ring focus:ring-red-600 focus:ring-offset-white focus:ring-offset-2 {{ Request::routeIs('dashboard') ? 'bg-red-600 text-white' : 'text-red-600 hover:text-white hover:bg-red-600' }}">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 592.988 592.988">
                    <path
                        d="M122.388,285.984H70.373c-32.058,0-58.14,26.083-58.14,58.139v190.225c0,32.059,26.082,58.139,58.14,58.139h52.016 c32.059,0,58.14-26.08,58.14-58.139V344.123C180.528,312.066,154.447,285.984,122.388,285.984z M137.688,534.348 c0,8.449-6.85,15.299-15.3,15.299H70.373c-8.45,0-15.3-6.85-15.3-15.299V344.123c0-8.449,6.85-15.299,15.3-15.299h52.016 c8.45,0,15.3,6.85,15.3,15.299V534.348z">
                    </path>
                    <path
                        d="M122.388,592.986H70.373c-32.334,0-58.64-26.306-58.64-58.639V344.123c0-32.334,26.306-58.639,58.64-58.639h52.016 c32.334,0,58.64,26.305,58.64,58.639v190.225C181.028,566.681,154.723,592.986,122.388,592.986z M70.373,286.484 c-31.783,0-57.64,25.857-57.64,57.639v190.225c0,31.782,25.857,57.639,57.64,57.639h52.016c31.783,0,57.64-25.856,57.64-57.639 V344.123c0-31.782-25.857-57.639-57.64-57.639H70.373z M122.388,550.146H70.373c-8.712,0-15.8-7.087-15.8-15.799V344.123 c0-8.712,7.088-15.799,15.8-15.799h52.016c8.712,0,15.8,7.087,15.8,15.799v190.225 C138.188,543.06,131.101,550.146,122.388,550.146z M70.373,329.324c-8.161,0-14.8,6.639-14.8,14.799v190.225 c0,8.16,6.639,14.799,14.8,14.799h52.016c8.161,0,14.8-6.639,14.8-14.799V344.123c0-8.16-6.639-14.799-14.8-14.799H70.373z">
                    </path>
                    <path
                        d="M322.502,592.486c32.059,0,58.141-26.08,58.141-58.139V58.64c0-32.059-26.082-58.14-58.141-58.14h-52.016 c-32.059,0-58.14,26.082-58.14,58.14v475.708c0,32.059,26.082,58.139,58.14,58.139H322.502z M255.186,534.348V58.64 c0-8.45,6.85-15.3,15.3-15.3h52.016c8.449,0,15.301,6.85,15.301,15.3v475.708c0,8.449-6.852,15.299-15.301,15.299h-52.016 C262.036,549.646,255.186,542.797,255.186,534.348z">
                    </path>
                    <path
                        d="M322.502,592.986h-52.016c-32.334,0-58.64-26.306-58.64-58.639V58.64c0-32.334,26.306-58.64,58.64-58.64h52.016 c32.335,0,58.641,26.306,58.641,58.64v475.708C381.143,566.681,354.837,592.986,322.502,592.986z M270.486,1 c-31.783,0-57.64,25.857-57.64,57.64v475.708c0,31.782,25.857,57.639,57.64,57.639h52.016c31.783,0,57.641-25.856,57.641-57.639 V58.64c0-31.783-25.857-57.64-57.641-57.64H270.486z M322.502,550.146h-52.016c-8.712,0-15.8-7.087-15.8-15.799V58.64 c0-8.712,7.088-15.8,15.8-15.8h52.016c8.713,0,15.801,7.088,15.801,15.8v475.708C338.303,543.06,331.215,550.146,322.502,550.146 z M270.486,43.84c-8.161,0-14.8,6.639-14.8,14.8v475.708c0,8.16,6.64,14.799,14.8,14.799h52.016 c8.161,0,14.801-6.639,14.801-14.799V58.64c0-8.161-6.64-14.8-14.801-14.8H270.486z">
                    </path>
                    <path
                        d="M522.615,592.486c32.059,0,58.141-26.08,58.141-58.139V207.961c0-32.059-26.082-58.14-58.141-58.14H470.6 c-32.057,0-58.139,26.082-58.139,58.14v326.386c0,32.059,26.082,58.141,58.139,58.141L522.615,592.486L522.615,592.486z M455.301,534.348V207.961c0-8.45,6.85-15.3,15.299-15.3h52.016c8.451,0,15.301,6.85,15.301,15.3v326.386 c0,8.449-6.85,15.301-15.301,15.301H470.6C462.15,549.646,455.301,542.797,455.301,534.348z">
                    </path>
                    <path
                        d="M470.6,592.988c-32.333,0-58.639-26.306-58.639-58.641V207.961c0-32.334,26.306-58.64,58.639-58.64h52.016 c32.335,0,58.641,26.306,58.641,58.64v326.386c0,32.333-26.306,58.639-58.641,58.639L470.6,592.988z M470.6,150.321 c-31.782,0-57.639,25.857-57.639,57.64v326.386c0,31.783,25.856,57.641,57.639,57.641l52.016-0.002 c31.783,0,57.641-25.856,57.641-57.639V207.961c0-31.783-25.857-57.64-57.641-57.64H470.6z M522.615,550.148H470.6 c-8.712-0.002-15.799-7.09-15.799-15.801V207.961c0-8.712,7.087-15.8,15.799-15.8h52.016c8.713,0,15.801,7.088,15.801,15.8 v326.386C538.416,543.061,531.328,550.148,522.615,550.148z M470.6,193.161c-8.16,0-14.799,6.639-14.799,14.8v326.386 c0,8.159,6.639,14.799,14.799,14.801h52.016c8.161,0,14.801-6.64,14.801-14.801V207.961c0-8.161-6.64-14.8-14.801-14.8H470.6z">
                    </path>
                </svg>
                <div class="absolute inset-y-0 left-12 hidden items-center group-hover:flex">
                    <div
                        class="relative whitespace-nowrap rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 drop-shadow-lg">
                        <div class="absolute inset-0 -left-1 flex items-center">
                            <div class="h-2 w-2 rotate-45 bg-white"></div>
                        </div>
                        <span>Estadisticas</span>
                    </div>
                </div>
            </button>
            <!-- Report button -->
            <button
                class="group relative p-2 transition-colors rounded-lg shadow-md hover:bg-red-800 hover:text-white focus:outline-none focus:ring focus:ring-red-600 focus:ring-offset-white focus:ring-offset-2 {{ Request::routeIs('dashboard') ? 'bg-red-600 text-white' : 'text-red-600 hover:text-white hover:bg-red-600' }}">
                <svg fill="currentColor" viewBox="1 1 60 60" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M48.5,58.5h-33a2,2,0,0,1-2-2V28a2,2,0,0,1,4,0V54.5h29V21.55l-9.4-12H17.5v4.3a2,2,0,0,1-4,0V7.5a2,2,0,0,1,2-2H38.07a2,2,0,0,1,1.58.77L50.08,19.63a2,2,0,0,1,.42,1.23V56.5A2,2,0,0,1,48.5,58.5Z">
                    </path>
                    <path d="M25.46,51.43a2,2,0,0,1-2-2V42.86a2,2,0,0,1,4,0v6.57A2,2,0,0,1,25.46,51.43Z"></path>
                    <path d="M32,51.43a2,2,0,0,1-2-2V37.86a2,2,0,0,1,4,0V49.43A2,2,0,0,1,32,51.43Z"></path>
                    <path d="M38.54,51.43a2,2,0,0,1-2-2V32.86a2,2,0,0,1,4,0V49.43A2,2,0,0,1,38.54,51.43Z"></path>
                </svg>
                <div class="absolute inset-y-0 left-12 hidden items-center group-hover:flex">
                    <div
                        class="relative whitespace-nowrap rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 drop-shadow-lg">
                        <div class="absolute inset-0 -left-1 flex items-center">
                            <div class="h-2 w-2 rotate-45 bg-white"></div>
                        </div>
                        <span>Reportes</span>
                    </div>
                </div>
            </button>
            <!-- Bash button -->
            <button
                class="group relative p-2 transition-colors rounded-lg shadow-md hover:bg-red-800 hover:text-white focus:outline-none focus:ring focus:ring-red-600 focus:ring-offset-white focus:ring-offset-2 {{ Request::routeIs('dashboard') ? 'bg-red-600 text-white' : 'text-red-600 hover:text-white hover:bg-red-600' }}">
                <svg fill="currentColor" class="w-6 h-6" viewBox="1 1 30 30" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M 6 3 L 6 29 L 26 29 L 26 9.5996094 L 25.699219 9.3007812 L 19.699219 3.3007812 L 19.400391 3 L 6 3 z M 8 5 L 18 5 L 18 11 L 24 11 L 24 27 L 8 27 L 8 5 z M 20 6.4003906 L 22.599609 9 L 20 9 L 20 6.4003906 z M 16 13 L 12 17 L 15 17 L 15 22 L 17 22 L 17 17 L 20 17 L 16 13 z M 12 23 L 12 25 L 20 25 L 20 23 L 12 23 z">
                    </path>
                </svg>
                <div class="absolute inset-y-0 left-12 hidden items-center group-hover:flex">
                    <div
                        class="relative whitespace-nowrap rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 drop-shadow-lg">
                        <div class="absolute inset-0 -left-1 flex items-center">
                            <div class="h-2 w-2 rotate-45 bg-white"></div>
                        </div>
                        <span>Bash</span>
                    </div>
                </div>
            </button>
        </div>

        <!-- User avatar -->
        <div class="relative flex items-center flex-shrink-0 p-2" x-data="{ isOpen: false }">
            <button @click="isOpen = !isOpen; $nextTick(() => {isOpen ? $refs.userMenu.focus() : null})"
                class="transition-opacity rounded-full opacity-80 hover:opacity-100 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-white focus:ring-offset-2">
                <img class="w-10 h-10 rounded-full object-cover shadow-md"
                    src="{{ Storage::url(Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" />
                <span class="sr-only">User menu</span>
            </button>
            <div x-show="isOpen" @click.away="isOpen = false" @keydown.escape="isOpen = false" x-ref="userMenu"
                tabindex="-1"
                class="absolute w-48 py-1 mt-2 origin-bottom-left bg-white rounded-md shadow-lg left-10 bottom-14 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-label="user menu">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    role="menuitem">Perfil</a>

                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    role="menuitem">Ajustes</a>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <a @click.prevent="$root.submit();"
                        class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"
                        tabindex="-1" id="user-menu-item-2">Cerrar sesión</a>
                </form>
            </div>
        </div>
    </nav>

    <div x-transition:enter="transform transition-transform duration-300" x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transform transition-transform duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-show="isSidebarOpen"
        class="fixed inset-y-0 left-0 z-10 flex-shrink-0 w-64 bg-white border-r-2 border-indigo-100 shadow-lg sm:left-16 sm:w-72 lg:static lg:w-64">
        <nav aria-label="Main" class="flex flex-col h-full">
            <!-- Logo -->
            <div class="flex items-center justify-center flex-shrink-0 py-10">
                <a href="#">
                    <img class="h-9 rounded-md" src="{{ Storage::url('recursos/ScotiaLogo.png') }}"
                        alt="ScotiaLogo" />

                    {{-- <span class="font-bold text-indigo-600 text-6xl" fill="currentColor">
                        L-V
                    </span> --}}
                </a>
            </div>

            <!-- Links -->
            <div class="flex-1 px-4 space-y-2 overflow-hidden hover:overflow-auto">
                @can('admin.dashboard')
                    <a
                        class="flex items-center w-full space-x-2 rounded-lg group transition-colors {{ Request::routeIs('admin.dashboard') ? 'bg-indigo-600 text-white' : 'text-indigo-600 hover:text-white hover:bg-indigo-600' }}">
                        <span aria-hidden="true"
                            class="p-2 rounded-lg transition-colors {{ Request::routeIs('admin.dashboard') ? 'bg-indigo-700 text-white' : 'group-hover:bg-indigo-700 group-hover:text-white' }}">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </span>
                        <span>Inicio</span>
                    </a>
                @endcan

                @can('lawyer.dashboard')
                    <a
                        class="flex items-center w-full space-x-2 rounded-lg group transition-colors {{ Request::routeIs('lawyer.dashboard') ? 'bg-indigo-600 text-white' : 'text-indigo-600 hover:text-white hover:bg-indigo-600' }}">
                        <span aria-hidden="true"
                            class="p-2 rounded-lg transition-colors {{ Request::routeIs('lawyer.dashboard') ? 'bg-indigo-700 text-white' : 'group-hover:bg-indigo-700 group-hover:text-white' }}">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </span>
                        <span>Inicio</span>
                    </a>
                @endcan

                @can('independent.dashboard')
                    <a
                        class="flex items-center w-full space-x-2 rounded-lg group transition-colors {{ Request::routeIs('independent.dashboard') ? 'bg-indigo-600 text-white' : 'text-indigo-600 hover:text-white hover:bg-indigo-600' }}">
                        <span aria-hidden="true"
                            class="p-2 rounded-lg transition-colors {{ Request::routeIs('independent.dashboard') ? 'bg-indigo-700 text-white' : 'group-hover:bg-indigo-700 group-hover:text-white' }}">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </span>
                        <span>Inicio</span>
                    </a>
                @endcan

                @can('customers')
                    <a
                        class="flex items-center w-full space-x-2 rounded-lg group transition-colors {{ Request::routeIs('customers') ? 'bg-indigo-600 text-white' : 'text-indigo-600 hover:text-white hover:bg-indigo-600' }}">
                        <span aria-hidden="true"
                            class="p-2 rounded-lg transition-colors {{ Request::routeIs('customers') ? 'bg-indigo-700 text-white' : 'group-hover:bg-indigo-700 group-hover:text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </span>
                        <span>Clientes</span>
                    </a>
                @endcan

                {{-- @can('obligations')
                    <a href="{{ route('obligations') }}"
                        class="flex items-center space-x-2 text-indigo-600 transition-colors rounded-lg group hover:bg-indigo-600 hover:text-white">
                        <span
                            aria-hidden="true"class="p-2 transition-colors rounded-lg group-hover:bg-indigo-700 group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                        </span>
                        <span>Procesos</span>
                    </a>
                @endcan --}}

                @can('admin.lawyer')
                    <a
                        class="flex items-center w-full space-x-2 transition-colors rounded-lg group {{ Request::routeIs('admin.lawyer') ? 'bg-indigo-600 text-white' : 'text-indigo-600 hover:text-white hover:bg-indigo-600' }}">
                        <span aria-hidden="true"
                            class="p-2 transition-colors rounded-lg {{ Request::routeIs('admin.lawyer') ? 'bg-indigo-700 text-white' : 'group-hover:bg-indigo-700 group-hover:text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span>Usuarios</span>
                    </a>
                @endcan

                @can('distribution')
                    <a
                        class="flex items-center w-full space-x-2 transition-colors rounded-lg group {{ Request::routeIs('distribution', 'management.show', 'distribution.show', 'distribution.create') ? 'bg-indigo-600 text-white' : 'text-indigo-600 hover:text-white hover:bg-indigo-600' }}">
                        <span aria-hidden="true"
                            class="p-2 transition-colors rounded-lg {{ Request::routeIs('distribution') ? 'bg-indigo-700 text-white' : 'group-hover:bg-indigo-700 group-hover:text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                <path
                                    d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                            </svg>
                        </span>
                        <span>Reparto</span>
                    </a>
                @endcan

                {{--  @can('processes')  --}}
                <a
                    class="flex items-center w-full space-x-2 transition-colors rounded-lg group {{ Request::routeIs('processes.index') ? 'bg-indigo-600 text-white' : 'text-indigo-600 hover:text-white hover:bg-indigo-600' }}">
                    <span aria-hidden="true"
                        class="p-2 transition-colors rounded-lg {{ Request::routeIs('processes.index') ? 'bg-indigo-700 text-white' : 'group-hover:bg-indigo-700 group-hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                    </span>
                    <span>Procesos</span>
                </a>
                {{--  @endcan  --}}

                @can('admin.dashboard')
                    <a
                        class="flex items-center w-full space-x-2 transition-colors rounded-lg group {{ Request::routeIs('history.index') ? 'bg-indigo-600 text-white' : 'text-indigo-600 hover:text-white hover:bg-indigo-600' }}">
                        <span aria-hidden="true"
                            class="p-2 transition-colors rounded-lg {{ Request::routeIs('history.index') ? 'bg-indigo-700 text-white' : 'group-hover:bg-indigo-700 group-hover:text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                        </span>
                        <span>Historico de Procesos</span>
                    </a>
                @endcan

                <a
                    class="flex items-center w-full space-x-2 transition-colors rounded-lg group {{ Request::routeIs('reports') ? 'bg-indigo-600 text-white' : 'text-indigo-600 hover:text-white hover:bg-indigo-600' }}">
                    <span aria-hidden="true"
                        class="p-2 transition-colors rounded-lg {{ Request::routeIs('reports') ? 'bg-indigo-700 text-white' : 'group-hover:bg-indigo-700 group-hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span>Reportes</span>
                </a>
            </div>
        </nav>

        <section x-show="currentSidebarTab == 'tasksTab'" class="px-4 py-6">
            <a
                class="flex items-center w-full space-x-2 transition-colors rounded-lg group {{ Request::routeIs('tasks') ? 'bg-indigo-600 text-white' : 'text-white bg-gray-400 hover:text-white hover:bg-indigo-600' }}">
                <span aria-hidden="true"
                    class="p-2 transition-colors rounded-lg {{ Request::routeIs('tasks') ? 'bg-indigo-700 text-white' : 'bg-gray-500 group-hover:bg-indigo-700 group-hover:text-white' }}">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                        stroke="currentColor" stroke-width="0.5">
                        <path
                            d="M13.25 8.5C12.8358 8.5 12.5 8.83579 12.5 9.25C12.5 9.66421 12.8358 10 13.25 10H16.75C17.1642 10 17.5 9.66421 17.5 9.25C17.5 8.83579 17.1642 8.5 16.75 8.5H13.25Z">
                        </path>
                        <path
                            d="M12.5001 14.75C12.5001 14.3358 12.8358 14 13.2501 14H16.7499C17.1642 14 17.4999 14.3358 17.4999 14.75C17.4999 15.1642 17.1642 15.5 16.7499 15.5H13.2501C12.8358 15.5 12.5001 15.1642 12.5001 14.75Z">
                        </path>
                        <path
                            d="M10.7803 7.71967C11.0732 8.01256 11.0732 8.48744 10.7803 8.78033L8.78033 10.7803C8.48744 11.0732 8.01256 11.0732 7.71967 10.7803L6.71967 9.78033C6.42678 9.48744 6.42678 9.01256 6.71967 8.71967C7.01256 8.42678 7.48744 8.42678 7.78033 8.71967L8.25 9.18934L9.71967 7.71967C10.0126 7.42678 10.4874 7.42678 10.7803 7.71967Z">
                        </path>
                        <path
                            d="M10.7803 14.2803C11.0732 13.9874 11.0732 13.5126 10.7803 13.2197C10.4874 12.9268 10.0126 12.9268 9.71967 13.2197L8.25 14.6893L7.78033 14.2197C7.48744 13.9268 7.01256 13.9268 6.71967 14.2197C6.42678 14.5126 6.42678 14.9874 6.71967 15.2803L7.71967 16.2803C8.01256 16.5732 8.48744 16.5732 8.78033 16.2803L10.7803 14.2803Z">
                        </path>
                        <path
                            d="M5.25 3C4.00736 3 3 4.00736 3 5.25V18.75C3 19.9926 4.00736 21 5.25 21H18.75C19.9926 21 21 19.9926 21 18.75V5.25C21 4.00736 19.9926 3 18.75 3H5.25ZM4.5 5.25C4.5 4.83579 4.83579 4.5 5.25 4.5H18.75C19.1642 4.5 19.5 4.83579 19.5 5.25V18.75C19.5 19.1642 19.1642 19.5 18.75 19.5H5.25C4.83579 19.5 4.5 19.1642 4.5 18.75V5.25Z">
                        </path>
                    </svg>
                </span>
                <span>Tareas</span>
            </a>

        </section>

        <section x-show="currentSidebarTab == 'notificationsTab'" class="px-4 py-6">
            <h2 class="text-xl">Notificaciones</h2>
        </section>
    </div>
</div>
