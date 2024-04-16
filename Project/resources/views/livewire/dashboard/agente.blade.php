{{--  <div class="h-screen">  --}}
<div class="grid md:grid-cols-2 grid-cols-1 h-screen w-full overflow-y-auto">
    <div class="flex flex-col p-4 w-full h-full">
        <div class="grid grid-cols-2 w-full p-4 gap-4">
            <div class="bg-white w-full py-6 px-4 rounded-lg shadow">
                <h2 class="text-3xl font-extrabold text-gray-900">Cliente</h2>
                <div class="mt-4">
                    <x-label for="identificacion" value="{{ __('Número de Identificación') }}" />
                    <div class="flex gap-2">
                        <x-input id="identificacion" class="block mt-1 w-full" type="number" name="identificacion"
                            autofocus />
                        <button
                            class="mt-1 px-2 transition-colors rounded-lg shadow-md text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 focus:ring-offset-white">
                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="bg-white w-full py-6 px-4 rounded-lg grid grid-cols-2 shadow">
                {{--  <div class="w-full">  --}}
                <div>
                    <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">Duvan Smith</h2>
                    <div class="mt-4">
                        <x-label for="identification" value="{{ __('Número de Identificación') }}" />
                        <div class="flex gap-2">
                            CC 1.004.148.273
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center flex-shrink-0">
                    <img class="w-32 h-32 rounded-md object-cover" src="{{ Storage::url('profile/Carlos.png') }}"
                        alt="Carlos" />
                </div>
                {{--  <div class="flex-shrink-0 py-4">
                        <a href="#">
                            <img class="w-10 h-auto rounded-md" src="{{ Storage::url('recursos/Logo.png') }}" alt="Scotia" />
                        </a>
                    </div>  --}}
            </div>
        </div>
        <div class="px-4 pb-4 w-full h-full">
            <div class="bg-white w-full h-full py-6 px-4 rounded-lg shadow" x-data="{ tab: 'Consultas' }">
                <div class="overflow-hidden rounded-xl border border-gray-100 bg-gray-50 p-1">
                    <ul class="flex items-center gap-2 text-sm font-medium">
                        <li class="flex-1">
                            <div :class="{
                                'bg-white  shadow text-gray-700': tab ==
                                    'Datos',
                                'text-gray-500': tab !=
                                    'Datos'
                            }"
                                @click.prevent="tab = 'Datos'"
                                class="flex items-center justify-center gap-2 rounded-lg px-3 py-2 hover:bg-white hover:text-gray-700 hover:shadow cursor-pointer">
                                Datos Personales</div>
                        </li>
                        <li class="flex-1">
                            <div :class="{
                                'bg-white  shadow text-gray-700': tab ==
                                    'Productos',
                                'text-gray-500': tab !=
                                    'Productos'
                            }"
                                @click.prevent="tab = 'Productos'"
                                class="flex items-center justify-center gap-2 rounded-lg px-3 py-2 hover:bg-white hover:text-gray-700 hover:shadow cursor-pointer">
                                Productos</div>
                        </li>
                        <li class="flex-1">
                            <div :class="{
                                'bg-white  shadow text-gray-700': tab ==
                                    'Consultas',
                                'text-gray-500': tab !=
                                    'Consultas'
                            }"
                                @click.prevent="tab = 'Consultas'"
                                class="flex items-center justify-center gap-2 rounded-lg px-3 py-2 hover:bg-white hover:text-gray-700 hover:shadow cursor-pointer">
                                Consultas</div>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col h-full mt-4" x-show="tab === 'Datos'">
                    <div class="grid grid-cols-4 gap-3">
                        <div class="col-span-2 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Nombre Completo</dt>
                            <x-input class="block mt-1 w-full" disabled wire:model="name" />
                        </div>
                        <div class="col-span-1 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Tipo de Identificación</dt>
                            <x-input class="block mt-1 w-full" disabled wire:model="type" />
                        </div>
                        <div class="col-span-1 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">N° de Identificación</dt>
                            <x-input class="block mt-1 w-full" disabled wire:model="identification" />
                        </div>
                        <div class="col-span-1 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Género</dt>
                            <x-input class="block mt-1 w-full" disabled wire:model="gender" />
                        </div>
                        <div class="col-span-1 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Fecha de Nacimiento</dt>
                            <x-input class="block mt-1 w-full" disabled wire:model="birthday" />
                        </div>
                        <div class="col-span-1 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
                            <x-input class="block mt-1 w-full" disabled wire:model="phone" />
                        </div>
                        <div class="col-span-1 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Ocupación</dt>
                            <x-input class="block mt-1 w-full" disabled wire:model="ocupation" />
                        </div>
                        <div class="col-span-2 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Dirección</dt>
                            <x-input class="block mt-1 w-full" disabled wire:model="address" />
                        </div>
                        <div class="col-span-2 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Correo Electrónico</dt>
                            <x-input class="block mt-1 w-full" disabled wire:model="email" />
                        </div>
                    </div>
                </div>
                <div class="flex flex-col h-full mt-6 gap-4" x-show="tab === 'Productos'">
                    <div class="flex justify-between items-center">
                        <h6 class="pl-2 text-gray-700 text-2xl font-extrabold">Productos</h6>
                        <button
                            class="px-4 py-2 inline-flex items-center text-white bg-gradient-to-tl from-gray-400 to-slate-600 hover:from-gray-700 hover:to-slate-600 active:opacity-85 rounded-lg"
                            wire:click="$set('open', true)">
                            <svg viewBox="0 0 24 24" class="w-7 h-7" fill="CurrentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11 17C11 17.5523 11.4477 18 12 18C12.5523 18 13 17.5523 13 17V13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H13V7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7V11H7C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11V17Z">
                                </path>
                            </svg>
                            <span class="uppercase text-xs font-bold">Agregar Producto</span>
                        </button>
                    </div>
                    <div class="flex flex-col rounded-lg bg-gray-50 text-gray-500" x-data="{ openD: false }">
                        <div class="flex cursor-pointer items-center justify-between py-2 px-5"
                            :class="{ 'bg-gray-50 rounded-lg': !openD, 'bg-gray-200 rounded-t-lg': openD }">
                            <div class="flex items-center gap-2">
                                <svg fill="CurrentColor" class="w-10 h-10" viewBox="0 0 1024 1024"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M385.707 436.152c0-35.468-75.779-71.68-172.37-71.68-96.6 0-172.38 36.211-172.38 71.68s75.78 71.68 172.38 71.68c96.591 0 172.37-36.212 172.37-71.68zm40.96 0c0 66.334-96.901 112.64-213.33 112.64-116.438 0-213.34-46.305-213.34-112.64s96.903-112.64 213.34-112.64c116.429 0 213.33 46.306 213.33 112.64zm-40.96 371.371c0 35.468-75.779 71.68-172.37 71.68-96.6 0-172.38-36.211-172.38-71.68H-.003c0 66.335 96.903 112.64 213.34 112.64 116.429 0 213.33-46.306 213.33-112.64h-40.96zm0-124.928c0 35.468-75.779 71.68-172.37 71.68-96.6 0-172.38-36.211-172.38-71.68H-.003c0 66.335 96.903 112.64 213.34 112.64 116.429 0 213.33-46.306 213.33-112.64h-40.96zm0-122.88c0 35.468-75.779 71.68-172.37 71.68-96.6 0-172.38-36.211-172.38-71.68H-.003c0 66.335 96.903 112.64 213.34 112.64 116.429 0 213.33-46.306 213.33-112.64h-40.96z">
                                    </path>
                                    <path
                                        d="M0 436.152v374.784c0 11.311 9.169 20.48 20.48 20.48s20.48-9.169 20.48-20.48V436.152c0-11.311-9.169-20.48-20.48-20.48S0 424.841 0 436.152zm385.707 0V806.84c0 11.311 9.169 20.48 20.48 20.48s20.48-9.169 20.48-20.48V436.152c0-11.311-9.169-20.48-20.48-20.48s-20.48 9.169-20.48 20.48zm566.335 443.051c16.962 0 30.72-13.758 30.72-30.72V184.317c0-16.962-13.758-30.72-30.72-30.72H546.405c-16.962 0-30.72 13.758-30.72 30.72v664.166c0 16.962 13.758 30.72 30.72 30.72h405.637zm0 40.96H546.405c-39.583 0-71.68-32.097-71.68-71.68V184.317c0-39.583 32.097-71.68 71.68-71.68h405.637c39.583 0 71.68 32.097 71.68 71.68v664.166c0 39.583-32.097 71.68-71.68 71.68z">
                                    </path>
                                    <path
                                        d="M892.446 293.421H606.002v60.652h286.444v-60.652zm10.24 101.612H595.762c-16.963 0-30.72-13.757-30.72-30.72v-81.132c0-16.963 13.757-30.72 30.72-30.72h306.924c16.963 0 30.72 13.757 30.72 30.72v81.132c0 16.963-13.757 30.72-30.72 30.72zM653.265 503.018c0 18.708-15.165 33.864-33.874 33.864-18.698 0-33.864-15.155-33.864-33.864s15.165-33.864 33.864-33.864c18.708 0 33.874 15.155 33.874 33.864zm129.831 0c0 18.708-15.165 33.864-33.864 33.864-18.708 0-33.874-15.155-33.874-33.864s15.165-33.864 33.874-33.864c18.698 0 33.864 15.155 33.864 33.864zm129.83-2.822c0 18.708-15.165 33.864-33.874 33.864-18.698 0-33.864-15.155-33.864-33.864s15.165-33.874 33.864-33.874c18.708 0 33.874 15.165 33.874 33.874zM653.265 624.382c0 18.708-15.165 33.864-33.874 33.864-18.698 0-33.864-15.155-33.864-33.864s15.165-33.874 33.864-33.874c18.708 0 33.874 15.165 33.874 33.874zm129.831 0c0 18.708-15.165 33.864-33.864 33.864-18.708 0-33.874-15.155-33.874-33.864s15.165-33.874 33.874-33.874c18.698 0 33.864 15.165 33.864 33.874zm129.83 0c0 18.708-15.165 33.864-33.874 33.864-18.698 0-33.864-15.155-33.864-33.864s15.165-33.874 33.864-33.874c18.708 0 33.874 15.165 33.874 33.874zM653.265 748.568c0 18.708-15.165 33.864-33.874 33.864-18.698 0-33.864-15.155-33.864-33.864s15.165-33.874 33.864-33.874c18.708 0 33.874 15.165 33.874 33.874zm129.831 0c0 18.708-15.165 33.864-33.864 33.864-18.708 0-33.874-15.155-33.874-33.864s15.165-33.874 33.874-33.874c18.698 0 33.864 15.165 33.864 33.874zm129.83 0c0 18.708-15.165 33.864-33.874 33.864-18.698 0-33.864-15.155-33.864-33.864s15.165-33.874 33.864-33.874c18.708 0 33.874 15.165 33.874 33.874z">
                                    </path>
                                </svg>
                                <span class="font-medium">Cuentas e Inversión</span>
                            </div>
                            <svg viewBox="0 0 24 24" @click="openD = !openD"
                                class="w-6 h-6 group-hover:text-gray-200 text-gray-500 rotate-180"
                                :class="{ 'rotate-180': openD }">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <div x-show="openD" x-transition>
                            <div class="flex flex-col py-4 gap-4">
                                <div class="grid grid-cols-2 gap-3 bg-gray-50 rounded-lg group">
                                    <div class="flex items-center justify-center flex-shrink-0">
                                        <img class="w-auto h-32 rounded-md object-cover"
                                            src="{{ Storage::url('recursos/Debito.png') }}" alt="Debito" />
                                    </div>
                                    <div class="relative">
                                        <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">Débito
                                            Mastercard
                                        </h2>
                                        <div class="mt-4 flex flex-col">
                                            <span>455-000428-20</span>
                                            <div class="flex flex-col items-end pr-10">
                                                <span>Saldo disponible</span>
                                                <span>$ 1.000</span>
                                            </div>
                                        </div>
                                        <div
                                            class="absolute cursor-pointer h-full flex items-center bg-gray-200 hover:bg-gray-300 top-0 right-0 rounded-r-lg text-gray-500">
                                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="CurrentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.29289 4.29289C8.68342 3.90237 9.31658 3.90237 9.70711 4.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L9.70711 19.7071C9.31658 20.0976 8.68342 20.0976 8.29289 19.7071C7.90237 19.3166 7.90237 18.6834 8.29289 18.2929L14.5858 12L8.29289 5.70711C7.90237 5.31658 7.90237 4.68342 8.29289 4.29289Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 bg-gray-50 rounded-lg group">
                                    <div class="flex items-center justify-center flex-shrink-0">
                                        <img class="w-auto h-32 rounded-md object-cover"
                                            src="{{ Storage::url('recursos/Debito.png') }}" alt="Debito" />
                                    </div>
                                    <div class="relative">
                                        <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">Cuenta
                                            Nómina
                                        </h2>
                                        <div class="mt-4 flex flex-col">
                                            <span>455-000428-20</span>
                                            <div class="flex flex-col items-end pr-10">
                                                <span>Saldo disponible</span>
                                                <span>$ 1.000</span>
                                            </div>
                                        </div>
                                        <div
                                            class="absolute cursor-pointer h-full flex items-center bg-gray-200 hover:bg-gray-300 top-0 right-0 rounded-r-lg text-gray-500">
                                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="CurrentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.29289 4.29289C8.68342 3.90237 9.31658 3.90237 9.70711 4.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L9.70711 19.7071C9.31658 20.0976 8.68342 20.0976 8.29289 19.7071C7.90237 19.3166 7.90237 18.6834 8.29289 18.2929L14.5858 12L8.29289 5.70711C7.90237 5.31658 7.90237 4.68342 8.29289 4.29289Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                {{--  </div>  --}}
                                {{--  <div>  --}}
                                {{--  <div class="grid grid-cols-2 gap-3 bg-gray-50 rounded-lg group">
                                    <div class="flex items-center justify-center flex-shrink-0">
                                        <img class="w-auto h-32 rounded-md object-cover"
                                            src="{{ Storage::url('recursos/Debito.png') }}" alt="Debito" />
                                    </div>
                                    <div class="relative">
                                        <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">Cuenta
                                            de
                                            Ahorros
                                        </h2>
                                        <div class="mt-4 flex flex-col">
                                            <span>455-000428-20</span>
                                            <div class="flex flex-col items-end pr-10">
                                                <span>Saldo disponible</span>
                                                <span>$ 1.000</span>
                                            </div>
                                        </div>
                                        <div
                                            class="absolute cursor-pointer h-full flex items-center bg-gray-200 hover:bg-gray-300 top-0 right-0 rounded-r-lg text-gray-500">
                                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="CurrentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.29289 4.29289C8.68342 3.90237 9.31658 3.90237 9.70711 4.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L9.70711 19.7071C9.31658 20.0976 8.68342 20.0976 8.29289 19.7071C7.90237 19.3166 7.90237 18.6834 8.29289 18.2929L14.5858 12L8.29289 5.70711C7.90237 5.31658 7.90237 4.68342 8.29289 4.29289Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>  --}}
                                {{--  </div>  --}}
                            </div>
                        </div>

                        {{--  <div class="grid grid-cols-2 gap-3 bg-gray-50 rounded-lg group">
                                <div class="flex items-center justify-center flex-shrink-0">
                                    <img class="w-auto h-32 rounded-md object-cover"
                                        src="{{ Storage::url('recursos/Debito.png') }}" alt="Debito" />
                                </div>
                                <div class="relative">
                                    <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">Cuenta de Ahorros
                                    </h2>
                                    <div class="mt-4 flex flex-col">
                                        <span>455-000428-20</span>
                                        <div class="flex flex-col items-end pr-10">
                                            <span>Saldo disponible</span>
                                            <span>$ 1.000</span>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute cursor-pointer h-full flex items-center bg-gray-200 hover:bg-gray-300 top-0 right-0 rounded-r-lg text-gray-500">
                                        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="CurrentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.29289 4.29289C8.68342 3.90237 9.31658 3.90237 9.70711 4.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L9.70711 19.7071C9.31658 20.0976 8.68342 20.0976 8.29289 19.7071C7.90237 19.3166 7.90237 18.6834 8.29289 18.2929L14.5858 12L8.29289 5.70711C7.90237 5.31658 7.90237 4.68342 8.29289 4.29289Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="flex items-center justify-center flex-shrink-0">
                                    <img class="w-auto h-32 rounded-md object-cover"
                                        src="{{ Storage::url('recursos/Credito1.webp') }}" alt="Credito1" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="flex items-center justify-center flex-shrink-0">
                                    <img class="w-auto h-32 rounded-md object-cover"
                                        src="{{ Storage::url('recursos/Credito2.webp') }}" alt="Credito2" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="flex items-center justify-center flex-shrink-0">
                                    <img class="w-auto h-32 rounded-md object-cover"
                                        src="{{ Storage::url('recursos/Credito3.webp') }}" alt="Credito3" />
                                </div>
                            </div>  --}}
                    </div>
                    <div class="flex flex-col rounded-lg bg-gray-50 text-gray-500" x-data="{ openC: false }">
                        <div class="flex cursor-pointer items-center justify-between py-2 px-5"
                            :class="{ 'bg-gray-50 rounded-lg': !openC, 'bg-gray-200 rounded-t-lg': openC }">
                            <div class="flex items-center gap-2">
                                <svg fill="CurrentColor" class="w-10 h-10" viewBox="0 0 60 60"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M55.783,8H4.217C1.892,8,0,9.892,0,12.217v35.566C0,50.108,1.892,52,4.217,52h51.566C58.108,52,60,50.108,60,47.783V12.217 C60,9.892,58.108,8,55.783,8z M58,47.783C58,49.005,57.006,50,55.783,50H4.217C2.994,50,2,49.005,2,47.783V12.217 C2,10.995,2.994,10,4.217,10h51.566C57.006,10,58,10.995,58,12.217V47.783z">
                                    </path>
                                    <path
                                        d="M16,37H7c-0.553,0-1,0.448-1,1s0.447,1,1,1h9c0.553,0,1-0.448,1-1S16.553,37,16,37z">
                                    </path>
                                    <path
                                        d="M29,37h-9c-0.553,0-1,0.448-1,1s0.447,1,1,1h9c0.553,0,1-0.448,1-1S29.553,37,29,37z">
                                    </path>
                                    <path
                                        d="M8,42H7c-0.553,0-1,0.448-1,1s0.447,1,1,1h1c0.553,0,1-0.448,1-1S8.553,42,8,42z">
                                    </path>
                                    <path
                                        d="M14,42h-2c-0.553,0-1,0.448-1,1s0.447,1,1,1h2c0.553,0,1-0.448,1-1S14.553,42,14,42z">
                                    </path>
                                    <path
                                        d="M19,42h-1c-0.553,0-1,0.448-1,1s0.447,1,1,1h1c0.553,0,1-0.448,1-1S19.553,42,19,42z">
                                    </path>
                                    <path
                                        d="M25,42h-2c-0.553,0-1,0.448-1,1s0.447,1,1,1h2c0.553,0,1-0.448,1-1S25.553,42,25,42z">
                                    </path>
                                    <path
                                        d="M28.29,42.29C28.109,42.48,28,42.74,28,43c0,0.26,0.109,0.52,0.29,0.71C28.479,43.89,28.74,44,29,44s0.52-0.11,0.71-0.29 C29.89,43.52,30,43.26,30,43c0-0.26-0.11-0.52-0.29-0.71C29.33,41.92,28.649,41.92,28.29,42.29z">
                                    </path>
                                    <path
                                        d="M48,33c-1.276,0-2.469,0.349-3.5,0.947C43.469,33.349,42.276,33,41,33c-3.859,0-7,3.14-7,7s3.141,7,7,7 c1.276,0,2.469-0.349,3.5-0.947C45.531,46.651,46.724,47,48,47c3.859,0,7-3.14,7-7S51.859,33,48,33z M46,40 c0,1.394-0.576,2.654-1.5,3.562C43.576,42.654,43,41.394,43,40s0.576-2.654,1.5-3.562C45.424,37.346,46,38.606,46,40z M36,40 c0-2.757,2.243-5,5-5c0.631,0,1.23,0.13,1.787,0.345C41.68,36.583,41,38.212,41,40s0.68,3.417,1.787,4.655 C42.23,44.87,41.631,45,41,45C38.243,45,36,42.757,36,40z M48,45c-0.631,0-1.23-0.13-1.787-0.345C47.32,43.417,48,41.788,48,40 s-0.68-3.417-1.787-4.655C46.77,35.13,47.369,35,48,35c2.757,0,5,2.243,5,5S50.757,45,48,45z">
                                    </path>
                                    <path
                                        d="M8.255,30h6h1.49h6C22.988,30,24,28.988,24,27.745v-8v-1.49C24,17.012,22.988,16,21.745,16h-7.49h-6 C7.012,16,6,17.012,6,18.255v9.49C6,28.988,7.012,30,8.255,30z M12,24H8v-2h4V24z M8,27.745V26h4v1.745 c0,0.087,0.016,0.17,0.026,0.255H8.255C8.114,28,8,27.886,8,27.745z M22,24h-4v-1.745C18,22.114,18.114,22,18.255,22h3.49 c0.087,0,0.17-0.016,0.255-0.026V24z M21.745,28h-3.771C17.984,27.915,18,27.832,18,27.745V26h4v1.745 C22,27.886,21.886,28,21.745,28z M21.745,18C21.886,18,22,18.114,22,18.255v1.49C22,19.886,21.886,20,21.745,20h-3.49 C17.012,20,16,21.012,16,22.255v5.49C16,27.886,15.886,28,15.745,28h-1.49C14.114,28,14,27.886,14,27.745v-9.49 C14,18.114,14.114,18,14.255,18H21.745z M8.255,18h3.771C12.016,18.085,12,18.168,12,18.255V20H8v-1.745 C8,18.114,8.114,18,8.255,18z">
                                    </path>
                                </svg>
                                <span class="font-medium">Tarjetas de Crédito</span>
                            </div>
                            <svg viewBox="0 0 24 24" @click="openC = !openC"
                                class="w-6 h-6 group-hover:text-gray-200 text-gray-500 rotate-180"
                                :class="{ 'rotate-180': openC }">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <div x-show="openC" x-transition>
                            <div class="flex flex-col py-4 gap-4">
                                <div class="grid grid-cols-2 gap-3 bg-gray-50 rounded-lg group">
                                    <div class="flex items-center justify-center flex-shrink-0">
                                        <img class="w-auto h-32 rounded-md object-cover"
                                            src="{{ Storage::url('recursos/Credito1.webp') }}" alt="Credito1" />
                                    </div>
                                    <div class="relative">
                                        <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">Tarjeta de
                                            Crédito (One Light)
                                        </h2>
                                        <div class="mt-4 flex flex-col">
                                            <span>455-000428-20</span>
                                            <div class="flex flex-col items-end pr-10">
                                                <span>Saldo disponible</span>
                                                <span>$ 1.000</span>
                                            </div>
                                        </div>
                                        <div
                                            class="absolute cursor-pointer h-full flex items-center bg-gray-200 hover:bg-gray-300 top-0 right-0 rounded-r-lg text-gray-500">
                                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="CurrentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.29289 4.29289C8.68342 3.90237 9.31658 3.90237 9.70711 4.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L9.70711 19.7071C9.31658 20.0976 8.68342 20.0976 8.29289 19.7071C7.90237 19.3166 7.90237 18.6834 8.29289 18.2929L14.5858 12L8.29289 5.70711C7.90237 5.31658 7.90237 4.68342 8.29289 4.29289Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 bg-gray-50 rounded-lg group">
                                    <div class="flex items-center justify-center flex-shrink-0">
                                        <img class="w-auto h-32 rounded-md object-cover"
                                            src="{{ Storage::url('recursos/Credito2.webp') }}" alt="Credito2" />
                                    </div>
                                    <div class="relative">
                                        <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">Tarjeta de
                                            Crédito (One Rewards Gold)
                                        </h2>
                                        <div class="mt-4 flex flex-col">
                                            <span>455-000428-20</span>
                                            <div class="flex flex-col items-end pr-10">
                                                <span>Saldo disponible</span>
                                                <span>$ 1.000</span>
                                            </div>
                                        </div>
                                        <div
                                            class="absolute cursor-pointer h-full flex items-center bg-gray-200 hover:bg-gray-300 top-0 right-0 rounded-r-lg text-gray-500">
                                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="CurrentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.29289 4.29289C8.68342 3.90237 9.31658 3.90237 9.70711 4.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L9.70711 19.7071C9.31658 20.0976 8.68342 20.0976 8.29289 19.7071C7.90237 19.3166 7.90237 18.6834 8.29289 18.2929L14.5858 12L8.29289 5.70711C7.90237 5.31658 7.90237 4.68342 8.29289 4.29289Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 bg-gray-50 rounded-lg group">
                                    <div class="flex items-center justify-center flex-shrink-0">
                                        <img class="w-auto h-32 rounded-md object-cover"
                                            src="{{ Storage::url('recursos/Credito3.webp') }}" alt="Credito3" />
                                    </div>
                                    <div class="relative">
                                        <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">Tarjeta de
                                            Crédito (One Rewards Black)
                                        </h2>
                                        <div class="mt-4 flex flex-col">
                                            <span>455-000428-20</span>
                                            <div class="flex flex-col items-end pr-10">
                                                <span>Saldo disponible</span>
                                                <span>$ 1.000</span>
                                            </div>
                                        </div>
                                        <div
                                            class="absolute cursor-pointer h-full flex items-center bg-gray-200 hover:bg-gray-300 top-0 right-0 rounded-r-lg text-gray-500">
                                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="CurrentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.29289 4.29289C8.68342 3.90237 9.31658 3.90237 9.70711 4.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L9.70711 19.7071C9.31658 20.0976 8.68342 20.0976 8.29289 19.7071C7.90237 19.3166 7.90237 18.6834 8.29289 18.2929L14.5858 12L8.29289 5.70711C7.90237 5.31658 7.90237 4.68342 8.29289 4.29289Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col rounded-lg bg-gray-50 text-gray-500" x-data="{ openH: false }">
                        <div class="flex cursor-pointer items-center justify-between py-2 px-5"
                            :class="{ 'bg-gray-50 rounded-lg': !openH, 'bg-gray-200 rounded-t-lg': openH }">
                            <div class="flex items-center gap-2">
                                <svg fill="CurrentColor" class="w-10 h-10" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 496 496">
                                    <path
                                        d="M496,232v-20.088L258.592,40h-21.184L184,78.672V48h16V0H40v48h16v123.36L0,211.912V232h40v264h416v-32h40V256h-40v-24 H496z M56,16h128v16H56V16z M168,48v42.256l-96,69.52V48H168z M440,480H56V232h384v24H96v208h344V480z M208,360 c0-48.52,39.48-88,88-88s88,39.48,88,88c0,48.52-39.48,88-88,88C247.48,448,208,408.52,208,360z M240.832,448H112V272h128.832 C211.56,290.424,192,322.936,192,360C192,397.064,211.56,429.576,240.832,448z M480,272v176H351.168 C380.44,429.576,400,397.064,400,360c0-37.064-19.56-69.576-48.832-88H480z M448,216h-8H56h-8H21.64L242.592,56h10.816 L474.36,216H448z">
                                    </path>
                                    <path
                                        d="M248,80c-35.288,0-64,28.712-64,64c0,35.288,28.712,64,64,64c35.288,0,64-28.712,64-64C312,108.712,283.288,80,248,80z M248,192c-26.472,0-48-21.528-48-48s21.528-48,48-48s48,21.528,48,48S274.472,192,248,192z">
                                    </path>
                                    <path
                                        d="M304,432v-16c17.648,0,32-14.352,32-32s-14.352-32-32-32h-16c-8.824,0-16-7.176-16-16c0-8.824,7.176-16,16-16h16 c8.824,0,16,7.176,16,16v8h16v-8c0-17.648-14.352-32-32-32v-16h-16v16c-17.648,0-32,14.352-32,32s14.352,32,32,32h16 c8.824,0,16,7.176,16,16c0,8.824-7.176,16-16,16h-16c-8.824,0-16-7.176-16-16v-8h-16v8c0,17.648,14.352,32,32,32v16H304z">
                                    </path>
                                    <rect x="416" y="352" width="16" height="16"></rect>
                                    <rect x="160" y="352" width="16" height="16"></rect>
                                </svg>
                                <span class="font-medium">Hipotecario | Leasing</span>
                            </div>
                            <svg viewBox="0 0 24 24" @click="openH = !openH"
                                class="w-6 h-6 group-hover:text-gray-200 text-gray-500 rotate-180"
                                :class="{ 'rotate-180': openH }">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <div x-show="openH" x-transition>
                            {{--  <div class="flex flex-col py-4 gap-4">
                                <div class="grid grid-cols-2 gap-3 bg-gray-50 rounded-lg group">
                                    <div class="flex items-center justify-center flex-shrink-0">
                                        <img class="w-auto h-32 rounded-md object-cover"
                                            src="{{ Storage::url('recursos/Credito1.webp') }}" alt="Credito1" />
                                    </div>
                                    <div class="relative">
                                        <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">Tarjeta de
                                            Crédito (One Light)
                                        </h2>
                                        <div class="mt-4 flex flex-col">
                                            <span>455-000428-20</span>
                                            <div class="flex flex-col items-end pr-10">
                                                <span>Saldo disponible</span>
                                                <span>$ 1.000</span>
                                            </div>
                                        </div>
                                        <div
                                            class="absolute cursor-pointer h-full flex items-center bg-gray-200 hover:bg-gray-300 top-0 right-0 rounded-r-lg text-gray-500">
                                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="CurrentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.29289 4.29289C8.68342 3.90237 9.31658 3.90237 9.70711 4.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L9.70711 19.7071C9.31658 20.0976 8.68342 20.0976 8.29289 19.7071C7.90237 19.3166 7.90237 18.6834 8.29289 18.2929L14.5858 12L8.29289 5.70711C7.90237 5.31658 7.90237 4.68342 8.29289 4.29289Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 bg-gray-50 rounded-lg group">
                                    <div class="flex items-center justify-center flex-shrink-0">
                                        <img class="w-auto h-32 rounded-md object-cover"
                                            src="{{ Storage::url('recursos/Credito2.webp') }}" alt="Credito2" />
                                    </div>
                                    <div class="relative">
                                        <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">Tarjeta de
                                            Crédito (One Rewards Gold)
                                        </h2>
                                        <div class="mt-4 flex flex-col">
                                            <span>455-000428-20</span>
                                            <div class="flex flex-col items-end pr-10">
                                                <span>Saldo disponible</span>
                                                <span>$ 1.000</span>
                                            </div>
                                        </div>
                                        <div
                                            class="absolute cursor-pointer h-full flex items-center bg-gray-200 hover:bg-gray-300 top-0 right-0 rounded-r-lg text-gray-500">
                                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="CurrentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.29289 4.29289C8.68342 3.90237 9.31658 3.90237 9.70711 4.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L9.70711 19.7071C9.31658 20.0976 8.68342 20.0976 8.29289 19.7071C7.90237 19.3166 7.90237 18.6834 8.29289 18.2929L14.5858 12L8.29289 5.70711C7.90237 5.31658 7.90237 4.68342 8.29289 4.29289Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3 bg-gray-50 rounded-lg group">
                                    <div class="flex items-center justify-center flex-shrink-0">
                                        <img class="w-auto h-32 rounded-md object-cover"
                                            src="{{ Storage::url('recursos/Credito3.webp') }}" alt="Credito3" />
                                    </div>
                                    <div class="relative">
                                        <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">Tarjeta de
                                            Crédito (One Rewards Black)
                                        </h2>
                                        <div class="mt-4 flex flex-col">
                                            <span>455-000428-20</span>
                                            <div class="flex flex-col items-end pr-10">
                                                <span>Saldo disponible</span>
                                                <span>$ 1.000</span>
                                            </div>
                                        </div>
                                        <div
                                            class="absolute cursor-pointer h-full flex items-center bg-gray-200 hover:bg-gray-300 top-0 right-0 rounded-r-lg text-gray-500">
                                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="CurrentColor"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.29289 4.29289C8.68342 3.90237 9.31658 3.90237 9.70711 4.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L9.70711 19.7071C9.31658 20.0976 8.68342 20.0976 8.29289 19.7071C7.90237 19.3166 7.90237 18.6834 8.29289 18.2929L14.5858 12L8.29289 5.70711C7.90237 5.31658 7.90237 4.68342 8.29289 4.29289Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>  --}}
                        </div>
                    </div>
                    <div class="flex flex-col rounded-lg bg-gray-50 text-gray-500" x-data="{ openP: false }">
                        <div class="flex cursor-pointer items-center justify-between py-2 px-5"
                            :class="{ 'bg-gray-50 rounded-lg': !openP, 'bg-gray-200 rounded-t-lg': openP }">
                            <div class="flex items-center gap-2">
                                <svg fill="CurrentColor" class="w-10 h-10" viewBox="0 0 512 512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path class="st0"
                                        d="M46.3,444.7h419.3c3.9,0,7-3.1,7-7V213c0-3.9-3.1-7-7-7h-29L399.3,78.8c-1.2-4.1-3.9-7.5-7.7-9.5 c-3.8-2-8.1-2.5-12.2-1.3l-304,89.2c-8.5,2.5-13.3,11.4-10.9,19.9l8.5,28.9H46.3c-3.9,0-7,3.1-7,7v224.7 C39.3,441.5,42.5,444.7,46.3,444.7z M78.1,173.1c-0.3-1.1,0.3-2.2,1.4-2.5l304-89.2c0.7-0.2,1.2,0,1.5,0.2c0.3,0.2,0.8,0.5,1,1.2 L422.1,206H87.7L78.1,173.1z M53.3,220h29.1h349h27.2v210.7H53.3V220z">
                                    </path>
                                    <path class="st0"
                                        d="M431.7,282h-8c-10.3,0-19.5-5.7-24.1-14.9c-1.9-3.8-2.9-7.8-2.9-12.1v-8c0-3.9-3.1-7-7-7H122.3 c-3.9,0-7,3.1-7,7v8c0,9.9-5.4,19-14.1,23.7c-3.9,2.1-8.4,3.3-12.9,3.3h-8c-3.9,0-7,3.1-7,7v72.7c0,3.9,3.1,7,7,7h8 c14.9,0,27,12.1,27,27v8c0,3.9,3.1,7,7,7h267.3c3.9,0,7-3.1,7-7v-8c0-14.9,12.1-27,27-27h8c3.9,0,7-3.1,7-7V289 C438.7,285.1,435.5,282,431.7,282z M424.7,354.7h-1c-22.6,0-41,18.4-41,41v1H129.3v-1c0-22.6-18.4-41-41-41h-1V296h1 c6.8,0,13.6-1.7,19.6-5c13.2-7.2,21.4-21,21.4-36v-1h253.3v1c0,6.3,1.5,12.7,4.3,18.3c7,14,21.1,22.7,36.7,22.7h1V354.7z">
                                    </path>
                                    <path class="st0"
                                        d="M156.1,299.1c-14.5,0-26.3,11.8-26.3,26.3c0,9.9,5.4,18.8,14.2,23.3c3.7,1.9,7.9,3,12.1,3 c9.2,0,17.8-4.9,22.5-12.8c0.1-0.1,0.1-0.2,0.2-0.3c2.3-4,3.5-8.5,3.5-13.1C182.3,310.9,170.6,299.1,156.1,299.1z M166.8,331.2 c-0.1,0.1-0.1,0.2-0.2,0.3c-2.2,3.8-6.2,6.1-10.6,6.1c-2,0-3.9-0.5-5.6-1.4c-4.1-2.1-6.6-6.3-6.6-10.9c0-6.8,5.5-12.3,12.3-12.3 s12.3,5.5,12.3,12.3C168.3,327.4,167.8,329.4,166.8,331.2z">
                                    </path>
                                    <path class="st0"
                                        d="M357.5,299.1c-14.5,0-26.3,11.8-26.3,26.3s11.8,26.3,26.3,26.3s26.3-11.8,26.3-26.3S372,299.1,357.5,299.1z M357.5,337.6c-6.8,0-12.3-5.5-12.3-12.3s5.5-12.3,12.3-12.3s12.3,5.5,12.3,12.3S364.3,337.6,357.5,337.6z">
                                    </path>
                                    <path class="st0"
                                        d="M261.7,317.1v-22.2c3.9,0.9,7.9,2.7,11.9,5.1c1.2,0.7,2.3,1,3.5,1c3.6,0,6.5-2.8,6.5-6.4 c0-2.8-1.6-4.5-3.5-5.6c-5.3-3.4-11.1-5.6-18-6.4v-2.5c0-2.8-2.2-5-5-5c-2.8,0-5.1,2.2-5.1,5v2.4c-14.5,1.2-24.3,9.7-24.3,22.1 c0,5.3,1.3,9.5,4,12.9c3.9,5,10.8,8.3,20.8,10.9v22.8c-6.4-1.2-11.7-3.8-17.2-7.8c-1-0.8-2.4-1.3-3.8-1.3c-3.6,0-6.4,2.8-6.4,6.4 c0,2.4,1.2,4.3,3.1,5.6c7.1,5,15.1,8.1,23.8,9v7.2c0,2.8,2.3,5,5.1,5c2.8,0,5-2.2,5-5v-7c14.7-1.4,24.7-9.8,24.7-22.6 C286.8,328.6,279.3,321.5,261.7,317.1z M252.5,314.7c-1.8-0.6-3.3-1.2-4.6-1.8c0,0,0,0,0,0c-5.1-2.4-6.5-5.1-6.5-9 c0-5.1,3.7-9,11.1-9.7V314.7z M261.7,351.9v-21.1c8.9,2.8,11.5,5.9,11.5,11C273.1,347.3,269.1,351,261.7,351.9z">
                                    </path>
                                </svg>
                                <span class="font-medium">Préstamos</span>
                            </div>
                            <svg viewBox="0 0 24 24" @click="openP = !openP"
                                class="w-6 h-6 group-hover:text-gray-200 text-gray-500 rotate-180"
                                :class="{ 'rotate-180': openP }">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <div x-show="openP" x-transition>
                        </div>
                    </div>
                    <div class="flex flex-col rounded-lg bg-gray-50 text-gray-500" x-data="{ openS: false }">
                        <div class="flex cursor-pointer items-center justify-between py-2 px-5"
                            :class="{ 'bg-gray-50 rounded-lg': !openS, 'bg-gray-200 rounded-t-lg': openS }">
                            <div class="flex items-center gap-2">
                                {{--  <svg fill="CurrentColor" class="w-10 h-10" viewBox="0 0 512 512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path class="st0"
                                        d="M46.3,444.7h419.3c3.9,0,7-3.1,7-7V213c0-3.9-3.1-7-7-7h-29L399.3,78.8c-1.2-4.1-3.9-7.5-7.7-9.5 c-3.8-2-8.1-2.5-12.2-1.3l-304,89.2c-8.5,2.5-13.3,11.4-10.9,19.9l8.5,28.9H46.3c-3.9,0-7,3.1-7,7v224.7 C39.3,441.5,42.5,444.7,46.3,444.7z M78.1,173.1c-0.3-1.1,0.3-2.2,1.4-2.5l304-89.2c0.7-0.2,1.2,0,1.5,0.2c0.3,0.2,0.8,0.5,1,1.2 L422.1,206H87.7L78.1,173.1z M53.3,220h29.1h349h27.2v210.7H53.3V220z">
                                    </path>
                                    <path class="st0"
                                        d="M431.7,282h-8c-10.3,0-19.5-5.7-24.1-14.9c-1.9-3.8-2.9-7.8-2.9-12.1v-8c0-3.9-3.1-7-7-7H122.3 c-3.9,0-7,3.1-7,7v8c0,9.9-5.4,19-14.1,23.7c-3.9,2.1-8.4,3.3-12.9,3.3h-8c-3.9,0-7,3.1-7,7v72.7c0,3.9,3.1,7,7,7h8 c14.9,0,27,12.1,27,27v8c0,3.9,3.1,7,7,7h267.3c3.9,0,7-3.1,7-7v-8c0-14.9,12.1-27,27-27h8c3.9,0,7-3.1,7-7V289 C438.7,285.1,435.5,282,431.7,282z M424.7,354.7h-1c-22.6,0-41,18.4-41,41v1H129.3v-1c0-22.6-18.4-41-41-41h-1V296h1 c6.8,0,13.6-1.7,19.6-5c13.2-7.2,21.4-21,21.4-36v-1h253.3v1c0,6.3,1.5,12.7,4.3,18.3c7,14,21.1,22.7,36.7,22.7h1V354.7z">
                                    </path>
                                    <path class="st0"
                                        d="M156.1,299.1c-14.5,0-26.3,11.8-26.3,26.3c0,9.9,5.4,18.8,14.2,23.3c3.7,1.9,7.9,3,12.1,3 c9.2,0,17.8-4.9,22.5-12.8c0.1-0.1,0.1-0.2,0.2-0.3c2.3-4,3.5-8.5,3.5-13.1C182.3,310.9,170.6,299.1,156.1,299.1z M166.8,331.2 c-0.1,0.1-0.1,0.2-0.2,0.3c-2.2,3.8-6.2,6.1-10.6,6.1c-2,0-3.9-0.5-5.6-1.4c-4.1-2.1-6.6-6.3-6.6-10.9c0-6.8,5.5-12.3,12.3-12.3 s12.3,5.5,12.3,12.3C168.3,327.4,167.8,329.4,166.8,331.2z">
                                    </path>
                                    <path class="st0"
                                        d="M357.5,299.1c-14.5,0-26.3,11.8-26.3,26.3s11.8,26.3,26.3,26.3s26.3-11.8,26.3-26.3S372,299.1,357.5,299.1z M357.5,337.6c-6.8,0-12.3-5.5-12.3-12.3s5.5-12.3,12.3-12.3s12.3,5.5,12.3,12.3S364.3,337.6,357.5,337.6z">
                                    </path>
                                    <path class="st0"
                                        d="M261.7,317.1v-22.2c3.9,0.9,7.9,2.7,11.9,5.1c1.2,0.7,2.3,1,3.5,1c3.6,0,6.5-2.8,6.5-6.4 c0-2.8-1.6-4.5-3.5-5.6c-5.3-3.4-11.1-5.6-18-6.4v-2.5c0-2.8-2.2-5-5-5c-2.8,0-5.1,2.2-5.1,5v2.4c-14.5,1.2-24.3,9.7-24.3,22.1 c0,5.3,1.3,9.5,4,12.9c3.9,5,10.8,8.3,20.8,10.9v22.8c-6.4-1.2-11.7-3.8-17.2-7.8c-1-0.8-2.4-1.3-3.8-1.3c-3.6,0-6.4,2.8-6.4,6.4 c0,2.4,1.2,4.3,3.1,5.6c7.1,5,15.1,8.1,23.8,9v7.2c0,2.8,2.3,5,5.1,5c2.8,0,5-2.2,5-5v-7c14.7-1.4,24.7-9.8,24.7-22.6 C286.8,328.6,279.3,321.5,261.7,317.1z M252.5,314.7c-1.8-0.6-3.3-1.2-4.6-1.8c0,0,0,0,0,0c-5.1-2.4-6.5-5.1-6.5-9 c0-5.1,3.7-9,11.1-9.7V314.7z M261.7,351.9v-21.1c8.9,2.8,11.5,5.9,11.5,11C273.1,347.3,269.1,351,261.7,351.9z">
                                    </path>
                                </svg>  --}}
                                <svg viewBox="0 0 24 24" fill="none" class="w-10 h-10"
                                    xmlns="http://www.w3.org/2000/svg">
                                    {{--  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">  --}}
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.55 8.514C17.6719 15.345 13.6909 18.251 11.4338 18.936C11.2843 18.9815 11.1251 18.9815 10.9756 18.936C8.7555 18.262 4.88865 15.442 4.875 8.854C4.88825 8.28396 5.20123 7.76591 5.69302 7.5C9.12892 5.514 10.7815 5 11.2018 5C11.622 5 13.4053 5.548 17.0693 7.7C17.3578 7.86595 17.5402 8.17493 17.55 8.514Z"
                                        stroke="CurrentColor" stroke-width="1" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M11.2125 14.107C10.7983 14.107 10.4625 14.4428 10.4625 14.857C10.4625 15.2712 10.7983 15.607 11.2125 15.607V14.107ZM10.1156 11.2L10.6619 10.6861C10.6361 10.6587 10.6083 10.6333 10.5787 10.61L10.1156 11.2ZM9.75 10.4L10.4994 10.4299C10.4998 10.42 10.5 10.41 10.5 10.4L9.75 10.4ZM11.2125 9.893C11.6267 9.893 11.9625 9.55721 11.9625 9.143C11.9625 8.72879 11.6267 8.393 11.2125 8.393V9.893ZM11.2125 15.607C11.6267 15.607 11.9625 15.2712 11.9625 14.857C11.9625 14.4428 11.6267 14.107 11.2125 14.107V15.607ZM10.5 12.95C10.5 12.5358 10.1642 12.2 9.75002 12.2C9.33581 12.2 9.00002 12.5358 9.00002 12.95H10.5ZM11.9625 14.857C11.9625 14.4428 11.6267 14.107 11.2125 14.107C10.7983 14.107 10.4625 14.4428 10.4625 14.857H11.9625ZM10.4625 16C10.4625 16.4142 10.7983 16.75 11.2125 16.75C11.6267 16.75 11.9625 16.4142 11.9625 16H10.4625ZM11.2125 8.393C10.7983 8.393 10.4625 8.72879 10.4625 9.143C10.4625 9.55721 10.7983 9.893 11.2125 9.893V8.393ZM11.925 10.889C11.925 11.3032 12.2608 11.639 12.675 11.639C13.0892 11.639 13.425 11.3032 13.425 10.889H11.925ZM10.4625 9.143C10.4625 9.55721 10.7983 9.893 11.2125 9.893C11.6267 9.893 11.9625 9.55721 11.9625 9.143H10.4625ZM11.9625 8C11.9625 7.58579 11.6267 7.25 11.2125 7.25C10.7983 7.25 10.4625 7.58579 10.4625 8H11.9625ZM11.2125 15.607C11.5582 15.607 12.0717 15.5214 12.5251 15.237C13.0183 14.9276 13.425 14.3844 13.425 13.585H11.925C11.925 13.7132 11.8958 13.7858 11.8701 13.8291C11.8423 13.876 11.798 13.9224 11.728 13.9663C11.572 14.0641 11.3543 14.107 11.2125 14.107V15.607ZM13.425 13.585C13.425 13.0977 13.2853 12.6875 13.0175 12.349C12.7695 12.0356 12.4464 11.8302 12.1755 11.6772C11.5816 11.3417 11.1076 11.1599 10.6619 10.6861L9.56935 11.7139C10.2205 12.4061 11.0262 12.7508 11.4377 12.9833C11.6696 13.1143 11.7807 13.2033 11.8412 13.2798C11.8819 13.3312 11.925 13.4063 11.925 13.585H13.425ZM10.5787 10.61C10.53 10.5718 10.4964 10.5057 10.4994 10.4299L9.0006 10.3701C8.97872 10.918 9.21793 11.4488 9.65257 11.79L10.5787 10.61ZM10.5 10.4C10.5 10.2022 10.5396 10.1073 10.5619 10.0682C10.5823 10.0322 10.6087 10.0063 10.6543 9.98168C10.7782 9.91488 10.9729 9.893 11.2125 9.893V8.393C10.9646 8.393 10.428 8.39962 9.94255 8.66132C9.68345 8.80099 9.43566 9.01425 9.25804 9.32654C9.08225 9.6356 9 9.99782 9 10.4H10.5ZM11.2125 14.107C11.1369 14.107 10.9618 14.0697 10.8118 13.9289C10.6824 13.8075 10.5 13.5418 10.5 12.95H9.00002C9.00002 13.8842 9.3051 14.572 9.78516 15.0226C10.2445 15.4538 10.8006 15.607 11.2125 15.607V14.107ZM10.4625 14.857V16H11.9625V14.857H10.4625ZM11.2125 9.893C11.3642 9.893 11.5352 9.93033 11.6557 10.0275C11.7449 10.0995 11.925 10.2975 11.925 10.889H13.425C13.425 9.95454 13.1176 9.27955 12.5974 8.85997C12.1085 8.46567 11.5483 8.393 11.2125 8.393V9.893ZM11.9625 9.143V8H10.4625V9.143H11.9625Z"
                                        fill="CurrentColor"></path>
                                    {{--  </g>  --}}
                                </svg>
                                <span class="font-medium">Seguros</span>
                            </div>
                            <svg viewBox="0 0 24 24" @click="openS = !openS"
                                class="w-6 h-6 group-hover:text-gray-200 text-gray-500 rotate-180"
                                :class="{ 'rotate-180': openS }">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <div x-show="openS" x-transition>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col h-full mt-6 gap-4" x-show="tab === 'Consultas'">
                    <div class="flex justify-between items-center">
                        <h6 class="pl-2 text-gray-700 text-2xl font-extrabold">Consultas</h6>
                        <button
                            class="px-4 py-2 inline-flex items-center text-white bg-gradient-to-tl from-gray-400 to-slate-600 hover:from-gray-700 hover:to-slate-600 active:opacity-85 rounded-lg"
                            wire:click="$set('open', true)">
                            <svg viewBox="0 0 24 24" class="w-7 h-7" fill="CurrentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11 17C11 17.5523 11.4477 18 12 18C12.5523 18 13 17.5523 13 17V13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H13V7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7V11H7C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11V17Z">
                                </path>
                            </svg>
                            <span class="uppercase text-xs font-bold">Nueva Consulta</span>
                        </button>
                    </div>
                    <div class="flex flex-col rounded-lg bg-gray-50 w-full h-full p-4 sm:overflow-x-auto">
                        <div class="h-full overflow-x-scroll xl:overflow-hidden">
                            <table role="table" class="w-full">
                                <thead>
                                    <tr role="row">
                                        <th class="border-b border-gray-200 pr-28 pb-[10px] text-start"
                                            style="cursor: pointer;">
                                            <p class="text-xs tracking-wide text-gray-600">NAME</p>
                                        </th>
                                        <th class="border-b border-gray-200 pr-28 pb-[10px] text-start"
                                            style="cursor: pointer;">
                                            <p class="text-xs tracking-wide text-gray-600">STATUS</p>
                                        </th>
                                        <th class="border-b border-gray-200 pr-28 pb-[10px] text-start"
                                            style="cursor: pointer;">
                                            <p class="text-xs tracking-wide text-gray-600">DATE</p>
                                        </th>
                                        <th class="border-b border-gray-200 pr-28 pb-[10px] text-start"
                                            style="cursor: pointer;">
                                            <p class="text-xs tracking-wide text-gray-600">PROGRESS</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody role="rowgroup">
                                    <tr role="row">
                                        <td class="pt-[14px] pb-[18px] sm:text-[14px]" role="cell">
                                            <p class="text-sm font-bold text-gray-500">Marketplace</p>
                                        </td>
                                        <td class="pt-[14px] pb-[18px] sm:text-[14px]" role="cell">
                                            <div class="flex items-center gap-2">
                                                <div class="rounded-full text-xl"><svg stroke="currentColor"
                                                        fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                                        class="text-green-500" height="1em" width="1em"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                                        <path
                                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z">
                                                        </path>
                                                    </svg></div>
                                                <p class="text-sm font-bold text-gray-500">Approved</p>
                                            </div>
                                        </td>
                                        <td class="pt-[14px] pb-[18px] sm:text-[14px]" role="cell">
                                            <p class="text-sm font-bold text-gray-500">24.Jan.2021</p>
                                        </td>
                                        <td class="pt-[14px] pb-[18px] sm:text-[14px]" role="cell">
                                            <div class="h-2 w-[68px] rounded-full bg-gray-200 dark:bg-navy-700">
                                                <div class="flex h-full items-center justify-center rounded-full bg-brand-500 dark:bg-brand-400"
                                                    style="width: 30%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>

        </div>
    </div>

    <x-dialog-modal wire:model='open' maxWidth="2xl" class="relative">
        <x-slot name="title">
            Agregar Nuevo Producto
        </x-slot>
        <x-slot name="content">

        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-dialog-modal>

    {{--  <div class="bg-red-500">
        Hola
    </div>  --}}
</div>
