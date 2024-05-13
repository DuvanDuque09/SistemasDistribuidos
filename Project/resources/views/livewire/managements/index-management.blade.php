{{--  <div class="h-screen">  --}}
<div class="grid md:grid-cols-2 grid-cols-1 h-screen w-full p-4 md:overflow-hidden overflow-y-auto md:pb-4 pb-36">
    {{--  <div class="w-full h-full">  --}}
    <div class="flex flex-col md:h-[98%] w-[99%] p-4 gap-4 md:relative">
        <div class="grid grid-cols-2 md:absolute top-4 md:w-[97%] md:h-[27%] gap-4">
            <div class="bg-white w-full h-full py-6 px-4 rounded-lg shadow">
                <h2 class="text-3xl font-extrabold text-gray-900">Cliente</h2>
                <div class="mt-4">
                    <x-label for="identification" value="{{ __('Número de Identificación') }}" />
                    <div class="flex gap-2">
                        <x-input id="identification" class="block mt-1 w-full" type="text" wire:model="identification"
                            wire:keydown.enter="searchCustomer" name="identification" autofocus />
                        <button wire:click="searchCustomer()"
                            class="mt-1 px-2 transition-colors rounded-lg shadow-md text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 focus:ring-offset-white">
                            <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                            </svg>
                        </button>
                        {{--  <button wire:click="deleteCustomer()"
                            class="mt-1 px-2 transition-colors rounded-lg shadow-md text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 focus:ring-offset-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>  --}}
                    </div>
                    <x-input-error for="identification" />
                </div>
            </div>
            @if (!empty($customer))
                <div class="bg-white w-full h-full py-6 px-4 rounded-lg grid grid-cols-2 shadow">
                    {{--  <div class="w-full">  --}}
                    <div>
                        <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">{{ $customer['person'] }}</h2>
                        <div class="mt-4">
                            <x-label for="identification" value="{{ __('Número de Identificación') }}" />
                            <div class="flex gap-2">
                                @if (!empty($customer['identification']))
                                    {{ $customer['code'] }}
                                    {{ number_format($customer['identification'], 0, '.', '.') }}
                                @endif
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
            @endif
        </div>
        @if (!empty($customer))
            <div class="bg-white md:w-[97%] md:h-[68%] pb-6 px-4 rounded-lg shadow md:absolute bottom-0 overflow-y-auto"
                x-data="{ tab: 'Datos' }">
                <div class="bg-white sticky top-0 z-10 left-0 right-0 md:h-[72px] h-20 w-full">
                    <div class="pt-4">
                        <div class="overflow-hidden rounded-xl border border-gray-100 bg-gray-50 py-1">
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
                    </div>
                </div>
                <div class="flex flex-col h-full mt-6 gap-4" x-show="tab === 'Datos'">
                    <div class="flex justify-between items-center">
                        <h6 class="text-gray-700 text-2xl font-extrabold">Datos Personales</h6>
                        <svg xmlns="http://www.w3.org/2000/svg" wire:click="$set('isEditable', true)"
                            class="h-7 w-7 cursor-pointer text-[#8692A9] hover:text-[#6e788a]" viewBox="0 0 18 15"
                            fill="none">
                            <path
                                d="M6.3 7.5C8.28844 7.5 9.9 5.82129 9.9 3.75C9.9 1.67871 8.28844 0 6.3 0C4.31156 0 2.7 1.67871 2.7 3.75C2.7 5.82129 4.31156 7.5 6.3 7.5ZM8.82 8.4375H8.35031C7.72594 8.73633 7.03125 8.90625 6.3 8.90625C5.56875 8.90625 4.87688 8.73633 4.24969 8.4375H3.78C1.69313 8.4375 0 10.2012 0 12.375V13.5937C0 14.3701 0.604688 15 1.35 15H9.08156C9.01406 14.8008 8.98594 14.5898 9.00844 14.376L9.19969 12.5918L9.23344 12.2666L9.45563 12.0352L11.6297 9.77051C10.9406 8.95898 9.94219 8.4375 8.82 8.4375ZM10.0941 12.6943L9.90281 14.4814C9.87188 14.7803 10.1138 15.0322 10.3978 14.9971L12.1106 14.7979L15.9891 10.7578L13.9725 8.65723L10.0941 12.6943ZM17.8031 7.87793L16.7372 6.76758C16.4756 6.49512 16.0481 6.49512 15.7866 6.76758L14.7234 7.875L14.6081 7.99512L16.6275 10.0957L17.8031 8.87109C18.0647 8.5957 18.0647 8.15332 17.8031 7.87793Z"
                                fill="CurrentColor" />
                        </svg>
                    </div>
                    <div class="grid md:grid-cols-4 grid-cols-1 gap-3 pb-8">
                        <div class="md:col-span-2 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Nombre Completo</dt>
                            <x-input :disabled="!$isEditable" class="block mt-1 w-full" wire:model="customer.person" />
                            <x-input-error for="customer.person" />
                        </div>
                        <div class="md:col-span-1 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Tipo de Identificación</dt>
                            <select wire:model="customer.identification_type"
                                @if (!$isEditable) disabled @endif
                                class="{{ !$isEditable ? 'cursor-not-allowed bg-gray-50 border-none' : 'border-gray-300 focus:border-red-500 focus:ring-red-500' }} mt-1 w-full rounded-md shadow-sm">
                                <option value="">Seleccione</option>
                                @foreach ($identificationTypes as $value)
                                    <option value="{{ $value->id }}">{{ $value->identification_type }}</option>
                                @endforeach
                            </select>
                            <x-input-error for="customer.identification_type" />
                        </div>
                        <div class="md:col-span-1 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">N° de Identificación</dt>
                            <x-input :disabled="!$isEditable" class="block mt-1 w-full" wire:model="customer.identification" />
                            <x-input-error for="customer.identification" />
                        </div>
                        <div class="md:col-span-1 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Género</dt>
                            <select wire:model="customer.gender" @if (!$isEditable) disabled @endif
                                class="{{ !$isEditable ? 'cursor-not-allowed bg-gray-50 border-none' : 'border-gray-300 focus:border-red-500 focus:ring-red-500' }} mt-1 w-full rounded-md shadow-sm">
                                <option value="">Seleccione</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                            </select>
                            <x-input-error for="customer.gender" />
                        </div>
                        <div class="md:col-span-1 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Fecha de Nacimiento</dt>
                            <x-input :disabled="!$isEditable" class="block mt-1 w-full" wire:model="customer.birthdate"
                                type="date" />
                            <x-input-error for="customer.birthdate" />
                        </div>
                        <div class="md:col-span-1 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
                            <x-input :disabled="!$isEditable" class="block mt-1 w-full" wire:model="customer.phone" />
                            <x-input-error for="customer.phone" />
                        </div>
                        <div class="md:col-span-1 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Ocupación</dt>
                            <x-input :disabled="!$isEditable" class="block mt-1 w-full" wire:model="customer.ocupation" />
                            <x-input-error for="customer.ocupation" />
                        </div>
                        <div class="md:col-span-2 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Dirección</dt>
                            <x-input :disabled="!$isEditable" class="block mt-1 w-full" wire:model="customer.address" />
                            <x-input-error for="customer.address" />
                        </div>
                        <div class="md:col-span-2 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Correo Electrónico</dt>
                            <x-input :disabled="!$isEditable" class="block mt-1 w-full" wire:model="customer.email" />
                            <x-input-error for="customer.email" />
                        </div>
                        <div class="md:col-span-2 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">País</dt>
                            <select wire:model="customer.country_id" @if (!$isEditable) disabled @endif
                                class="{{ !$isEditable ? 'cursor-not-allowed bg-gray-50 border-none' : 'border-gray-300 focus:border-red-500 focus:ring-red-500' }} mt-1 w-full rounded-md shadow-sm">
                                <option value="">Seleccione</option>
                                @foreach ($countries as $value)
                                    <option value="{{ $value->id }}">{{ $value->country }}</option>
                                @endforeach
                            </select>
                            <x-input-error for="customer.country_id" />
                        </div>
                        <div class="md:col-span-2 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Tipo de Persona</dt>
                            <select wire:model="customer.type_person" @if (!$isEditable) disabled @endif
                                class="{{ !$isEditable ? 'cursor-not-allowed bg-gray-50 border-none' : 'border-gray-300 focus:border-red-500 focus:ring-red-500' }} mt-1 w-full rounded-md shadow-sm">
                                <option value="">Seleccione</option>
                                @foreach ($typesPersons as $value)
                                    <option value="{{ $value->id }}">{{ $value->type_person }}</option>
                                @endforeach
                            </select>
                            <x-input-error for="customer.type_person" />
                        </div>
                        <div class="md:col-span-2 md:mt-0 mt-1">
                            <dt class="text-sm font-medium text-gray-500">Estado</dt>
                            <select wire:model="customer.state" @if (!$isEditable) disabled @endif
                                class="{{ !$isEditable ? 'cursor-not-allowed bg-gray-50 border-none' : 'border-gray-300 focus:border-red-500 focus:ring-red-500' }} mt-1 w-full rounded-md shadow-sm">
                                <option value="">Seleccione</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                            <x-input-error for="customer.state" />
                        </div>
                        @if ($isEditable)
                            <div class="md:col-span-4 flex items-center justify-end gap-2 md:mt-0 mt-1">
                                <x-secondary-button
                                    wire:click="$set('isEditable', false)">Cancelar</x-jet-secondary-button>
                                    <x-danger-button wire:click="editCustomer" wire:loading.attr="disabled"
                                        wire:target="editCustomer"
                                        class="disabled:opacity-25">Guardar</x-jet-danger-button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col h-full mt-6 gap-4" x-show="tab === 'Productos'">
                    <div class="flex justify-between items-center">
                        <h6 class="pl-2 text-gray-700 text-2xl font-extrabold">Productos</h6>
                        @livewire('products.create-product', ['customer_id' => $customer['id']])
                    </div>
                    {{--  Cuentas e Inversión  --}}
                    @if (count($cuentasInversion) > 0)
                        <div class="flex flex-col rounded-lg bg-gray-50/70 text-gray-500" x-data="{ openD: false }">
                            <div class="flex cursor-pointer items-center justify-between py-2 px-5"
                                @click="openD = !openD"
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
                                <svg viewBox="0 0 24 24"
                                    class="w-6 h-6 group-hover:text-gray-200 text-gray-500 rotate-180"
                                    :class="{ 'rotate-180': openD }">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>
                            <div x-show="openD" x-transition>
                                <div class="flex flex-col py-4 gap-4">
                                    @foreach ($cuentasInversion as $item)
                                        <div class="grid grid-cols-2 gap-3 bg-gray-100 rounded-lg group">
                                            <div class="flex items-center justify-center flex-shrink-0">
                                                <img class="w-auto h-32 rounded-md object-cover"
                                                    src="{{ Storage::url($item['path']) }}"
                                                    alt="{{ $item['product'] }}" />
                                            </div>
                                            <div class="relative">
                                                <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">
                                                    {{ $item['product'] }}</h2>
                                                <div class="mt-4 flex flex-col">
                                                    <span
                                                        class="font-bold text-lg">{{ $item['product_number'] }}</span>
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
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    {{--  Tarjetas de Crédito  --}}
                    @if (count($tarjetasCredito) > 0)
                        <div class="flex flex-col rounded-lg bg-gray-50/70 text-gray-500" x-data="{ openC: false }">
                            <div class="flex cursor-pointer items-center justify-between py-2 px-5"
                                @click="openC = !openC"
                                :class="{ 'bg-gray-50 rounded-lg': !openC, 'bg-gray-100 rounded-t-lg': openC }">
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
                                <svg viewBox="0 0 24 24"
                                    class="w-6 h-6 group-hover:text-gray-200 text-gray-500 rotate-180"
                                    :class="{ 'rotate-180': openC }">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>
                            <div x-show="openC" x-transition>
                                <div class="flex flex-col py-4 gap-4">
                                    @foreach ($tarjetasCredito as $item)
                                        <div class="grid grid-cols-2 gap-3 bg-gray-100 rounded-lg group">
                                            <div class="flex items-center justify-center flex-shrink-0">
                                                <img class="w-auto h-32 rounded-md object-cover"
                                                    src="{{ Storage::url($item['path']) }}"
                                                    alt="{{ $item['product'] }}" />
                                            </div>
                                            <div class="relative">
                                                <h2 class="text-2xl font-extrabold text-gray-900 line-clamp-1">
                                                    {{ $item['product'] }}</h2>
                                                <div class="mt-4 flex flex-col">
                                                    <span
                                                        class="font-bold text-lg">{{ $item['product_number'] }}</span>
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
                                    @endforeach
                                    {{--  <div class="grid grid-cols-2 gap-3 bg-gray-50 rounded-lg group">
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
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="flex flex-col h-full mt-6 gap-4" x-show="tab === 'Consultas'">
                    <div class="flex justify-between items-center">
                        <h6 class="pl-2 text-gray-700 text-2xl font-extrabold">Consultas</h6>
                        <button
                            class="px-4 py-2 inline-flex items-center text-white bg-gradient-to-tl from-gray-400 to-slate-600 hover:from-gray-700 hover:to-slate-600 active:opacity-85 rounded-lg"
                            wire:click="createManagement()">
                            <svg viewBox="0 0 24 24" class="w-7 h-7" fill="CurrentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11 17C11 17.5523 11.4477 18 12 18C12.5523 18 13 17.5523 13 17V13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H13V7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7V11H7C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11V17Z">
                                </path>
                            </svg>
                            <span class="uppercase text-xs font-bold">Nueva Consulta</span>
                        </button>
                    </div>
                    <div class="rounded-lg w-full sm:overflow-x-auto">
                        <div class="h-full overflow-x-scroll md:overflow-hidden rounded-lg shadow-xs border">
                            <table role="table" class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="border-b border-gray-200 w-1/5 py-4 text-center cursor-pointer">
                                            <p class="text-xs tracking-wide text-gray-600">TIPO DE CONSULTA</p>
                                        </th>
                                        <th class="border-b border-gray-200 w-[22%] py-4 text-center cursor-pointer">
                                            <p class="text-xs tracking-wide text-gray-600">PRODUCTO</p>
                                        </th>
                                        <th class="border-b border-gray-200 w-1/5 py-4 text-center cursor-pointer">
                                            <p class="text-xs tracking-wide text-gray-600">FECHA</p>
                                        </th>
                                        <th class="border-b border-gray-200 w-1/5 py-4 text-center cursor-pointer">
                                            <p class="text-xs tracking-wide text-gray-600">USUARIO</p>
                                        </th>
                                        <th class="border-b border-gray-200 w-1/5 py-4 text-center cursor-pointer">
                                            <p class="text-xs tracking-wide text-gray-600">ACCIONES</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($managements as $item)
                                        <tr>
                                            <td class="pt-[14px] pb-[18px] sm:text-[14px] text-center">
                                                <p class="text-sm font-bold text-gray-500">
                                                    {{ $item->type_management }}</p>
                                            </td>
                                            <td class="pt-[14px] pb-[18px] pl-[18px] sm:text-[14px] text-center">
                                                <div class="flex items-center justify-center gap-2">
                                                    <div class="rounded-full text-xl text-gray-500">
                                                        @if ($item->type_product == 'Cuentas e Inversión')
                                                            <svg fill="CurrentColor" class="w-5 h-5"
                                                                viewBox="0 0 1024 1024"
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
                                                        @else
                                                            <svg fill="CurrentColor" class="w-5 h-5"
                                                                viewBox="0 0 60 60"
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
                                                        @endif
                                                    </div>
                                                    <div class="flex flex-col text-left">
                                                        <p class="text-sm font-bold text-gray-500 leading-[12px]">
                                                            {{ $item->type_product }}</p>
                                                        <p class="mt-1 text-sm text-gray-500 leading-[11px]">
                                                            {{ $item->product }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pt-[14px] pb-[18px] sm:text-[14px] text-center">
                                                <p class="text-sm font-bold text-gray-500">
                                                    {{ \Carbon\Carbon::parse($item->date)->setTimezone('America/Bogota')->format('d-m-Y') }}
                                                </p>
                                            </td>
                                            <td class="pt-[14px] pb-[18px] sm:text-[14px] text-center">
                                                <div class="flex items-center justify-center">
                                                    <div class="flex-shrink-0 mr-1">
                                                        <img class="h-8 w-8 rounded-full object-cover"
                                                            src="{{ Storage::url($item->photo) }}" alt="">
                                                    </div>
                                                    <div>
                                                        <div
                                                            class="leading-none text-xs font-medium text-gray-900 text-left line-clamp-2 whitespace-normal">
                                                            {{ $item->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pt-[14px] pb-[18px] sm:text-[14px] text-center">
                                                <div class="flex justify-center items-center gap-1">
                                                    <a
                                                        class="cursor-pointer inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        <svg viewBox="0 0 24 24" class="h-5 w-5 text-gray-400"
                                                            stroke="currentColor" stroke-width="0.3"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M10.9436 1.25H13.0564C14.8942 1.24998 16.3498 1.24997 17.489 1.40314C18.6614 1.56076 19.6104 1.89288 20.3588 2.64124C20.6516 2.93414 20.6516 3.40901 20.3588 3.7019C20.0659 3.9948 19.591 3.9948 19.2981 3.7019C18.8749 3.27869 18.2952 3.02502 17.2892 2.88976C16.2615 2.75159 14.9068 2.75 13 2.75H11C9.09318 2.75 7.73851 2.75159 6.71085 2.88976C5.70476 3.02502 5.12511 3.27869 4.7019 3.7019C4.27869 4.12511 4.02502 4.70476 3.88976 5.71085C3.75159 6.73851 3.75 8.09318 3.75 10V14C3.75 15.9068 3.75159 17.2615 3.88976 18.2892C4.02502 19.2952 4.27869 19.8749 4.7019 20.2981C5.12511 20.7213 5.70476 20.975 6.71085 21.1102C7.73851 21.2484 9.09318 21.25 11 21.25H13C14.9068 21.25 16.2615 21.2484 17.2892 21.1102C18.2952 20.975 18.8749 20.7213 19.2981 20.2981C19.994 19.6022 20.2048 18.5208 20.2414 15.9892C20.2474 15.575 20.588 15.2441 21.0022 15.2501C21.4163 15.2561 21.7472 15.5967 21.7412 16.0108C21.7061 18.4383 21.549 20.1685 20.3588 21.3588C19.6104 22.1071 18.6614 22.4392 17.489 22.5969C16.3498 22.75 14.8942 22.75 13.0564 22.75H10.9436C9.10583 22.75 7.65019 22.75 6.51098 22.5969C5.33856 22.4392 4.38961 22.1071 3.64124 21.3588C2.89288 20.6104 2.56076 19.6614 2.40314 18.489C2.24997 17.3498 2.24998 15.8942 2.25 14.0564V9.94358C2.24998 8.10582 2.24997 6.65019 2.40314 5.51098C2.56076 4.33856 2.89288 3.38961 3.64124 2.64124C4.38961 1.89288 5.33856 1.56076 6.51098 1.40314C7.65019 1.24997 9.10582 1.24998 10.9436 1.25ZM18.1131 7.04556C19.1739 5.98481 20.8937 5.98481 21.9544 7.04556C23.0152 8.1063 23.0152 9.82611 21.9544 10.8869L17.1991 15.6422C16.9404 15.901 16.7654 16.076 16.5693 16.2289C16.3387 16.4088 16.0892 16.563 15.8252 16.6889C15.6007 16.7958 15.3659 16.8741 15.0187 16.9897L12.9351 17.6843C12.4751 17.8376 11.9679 17.7179 11.625 17.375C11.2821 17.0321 11.1624 16.5249 11.3157 16.0649L11.9963 14.0232C12.001 14.0091 12.0056 13.9951 12.0102 13.9813C12.1259 13.6342 12.2042 13.3993 12.3111 13.1748C12.437 12.9108 12.5912 12.6613 12.7711 12.4307C12.924 12.2346 13.099 12.0596 13.3578 11.8009C13.3681 11.7906 13.3785 11.7802 13.3891 11.7696L18.1131 7.04556ZM20.8938 8.10622C20.4188 7.63126 19.6488 7.63126 19.1738 8.10622L18.992 8.288C19.0019 8.32149 19.0132 8.3571 19.0262 8.39452C19.1202 8.66565 19.2988 9.02427 19.6372 9.36276C19.9757 9.70125 20.3343 9.87975 20.6055 9.97382C20.6429 9.9868 20.6785 9.99812 20.712 10.008L20.8938 9.8262C21.3687 9.35124 21.3687 8.58118 20.8938 8.10622ZM19.5664 11.1536C19.2485 10.9866 18.9053 10.7521 18.5766 10.4234C18.2479 10.0947 18.0134 9.75146 17.8464 9.43357L14.4497 12.8303C14.1487 13.1314 14.043 13.2388 13.9538 13.3532C13.841 13.4979 13.7442 13.6545 13.6652 13.8202C13.6028 13.9511 13.5539 14.0936 13.4193 14.4976L13.019 15.6985L13.3015 15.981L14.5024 15.5807C14.9064 15.4461 15.0489 15.3972 15.1798 15.3348C15.3455 15.2558 15.5021 15.159 15.6468 15.0462C15.7612 14.957 15.8686 14.8513 16.1697 14.5503L19.5664 11.1536ZM7.25 9C7.25 8.58579 7.58579 8.25 8 8.25H14.5C14.9142 8.25 15.25 8.58579 15.25 9C15.25 9.41421 14.9142 9.75 14.5 9.75H8C7.58579 9.75 7.25 9.41421 7.25 9ZM7.25 13C7.25 12.5858 7.58579 12.25 8 12.25H10.5C10.9142 12.25 11.25 12.5858 11.25 13C11.25 13.4142 10.9142 13.75 10.5 13.75H8C7.58579 13.75 7.25 13.4142 7.25 13ZM7.25 17C7.25 16.5858 7.58579 16.25 8 16.25H9.5C9.91421 16.25 10.25 16.5858 10.25 17C10.25 17.4142 9.91421 17.75 9.5 17.75H8C7.58579 17.75 7.25 17.4142 7.25 17Z"
                                                                fill="CurrentColor"></path>
                                                        </svg>
                                                    </a>
                                                    <a
                                                        class="cursor-pointer inline-flex items-center px-3 py-2 border border-red-300 shadow-sm text-sm leading-4 font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">

                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5 w-5 text-red-400" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @if ($openManagement)
        <div class="flex flex-col w-full md:h-[98%] p-4 gap-4 md:relative">
            <div class="bg-white md:h-[97%] md:w-[97%] py-6 px-4 rounded-lg shadow md:absolute overflow-y-auto">
                <h2 class="text-3xl font-extrabold text-gray-900">Nueva Gestión</h2>
                <div class="py-6 px-2">
                    <dl class="grid md:grid-cols-2 grid-cols-1 gap-x-4 gap-y-4">
                        <div class="col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Tipo de Consulta</dt>
                            <select wire:model="management.type_management_id"
                                class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                                <option value="">Seleccione</option>
                                @foreach ($typesManagements as $value)
                                    <option value="{{ $value->id }}">{{ $value->type_management }}</option>
                                @endforeach
                            </select>
                            <x-input-error for="management.type_management_id" />
                        </div>
                        <div class="col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
                            <x-input id="phone" wire:model="management.phone"
                                class="block mt-1 w-full bg-gray-50 border-none" type="number" name="phone" />
                            <x-input-error for="management.phone" />
                        </div>
                        <div class="col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Consulta</dt>
                            <textarea rows="10" wire:model="management.management"
                                class="mt-1 block w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm"></textarea>
                            <x-input-error for="management.management" />
                        </div>
                        <div class="col-span-2">
                            <h4 class="text-lg leading-6 font-medium text-gray-900">Productos</h4>
                            <fieldset>
                                <legend class="text-gray-400 text-base">Seleccione el producto gestionado.</legend>
                                <div x-data="{ selected: null }">
                                    @if (count($cuentasInversion) > 0)
                                        <div class="mt-4">
                                            <span class="ml-12 text-lg font-semibold">Cuentas e Inversión</span>
                                            @foreach ($cuentasInversion as $item)
                                                <div :class="{ 'bg-red-300/10': selected == {{ $item['id'] }} }"
                                                    class="flex items-center py-3.5 px-4 gap-4 border-b border-[#e5e7eb] rounded-lg">
                                                    <label for="ci-{{ $item['id'] }}"
                                                        class="flex-1 flex items-center gap-4">
                                                        <div>
                                                            <input id="ci-{{ $item['id'] }}" name="product"
                                                                type="radio" x-model="selected"
                                                                wire:model="management.product"
                                                                value="{{ $item['id'] }}"
                                                                class="checked:bg-red-500 checked:hover:bg-red-600 checked:active:bg-red-500 checked:focus:bg-red-500 focus:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500">
                                                        </div>
                                                        <div class="flex-1 flex gap-4">
                                                            <div
                                                                class="flex items-center justify-center flex-shrink-0">
                                                                <img class="w-auto h-12 rounded-md object-cover"
                                                                    src="{{ Storage::url($item['path']) }}"
                                                                    alt="{{ $item['product'] }}" />
                                                            </div>
                                                            <div class="flex flex-col">
                                                                <span
                                                                    class="font-medium">{{ $item['product'] }}</span>
                                                                <p class="text-gray-600 text-sm">
                                                                    {{ $item['product_number'] }}</p>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if (count($tarjetasCredito) > 0)
                                        <div class="mt-4">
                                            <span class="ml-12 text-lg font-semibold">Tarjetas de Crédito</span>
                                            @foreach ($tarjetasCredito as $item)
                                                <div :class="{ 'bg-red-300/10': selected == {{ $item['id'] }} }"
                                                    class="flex items-center py-3.5 px-4 gap-4 border-b border-[#e5e7eb] rounded-lg">
                                                    <label for="tc-{{ $item['id'] }}"
                                                        class="flex-1 flex items-center gap-4">
                                                        <div>
                                                            <input id="tc-{{ $item['id'] }}" name="product"
                                                                type="radio" x-model="selected"
                                                                wire:model="management.product"
                                                                value="{{ $item['id'] }}"
                                                                class="checked:bg-red-500 checked:hover:bg-red-600 checked:active:bg-red-500 checked:focus:bg-red-500 focus:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500">
                                                        </div>
                                                        <div class="flex-1 flex gap-4">
                                                            <div
                                                                class="flex items-center justify-center flex-shrink-0">
                                                                <img class="w-auto h-12 rounded-md object-cover"
                                                                    src="{{ Storage::url($item['path']) }}"
                                                                    alt="{{ $item['product'] }}" />
                                                            </div>
                                                            <div class="flex flex-col">
                                                                <span
                                                                    class="font-medium">{{ $item['product'] }}</span>
                                                                <p class="text-gray-600 text-sm">
                                                                    {{ $item['product_number'] }}</p>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <x-input-error for="management.product" />
                            </fieldset>
                        </div>
                    </dl>
                    <div class="mt-4 mb-4 text-right">
                        {{--  @if (!$flat)  --}}
                        <x-danger-button wire:click="saveManagement" wire:loading.attr="disabled"
                            wire:target="saveManagement" class="disabled:opacity-25">Guardar</x-jet-danger-button>
                            {{--  @else  --}}
                            {{--  <x-danger-button wire:click="edit" wire:loading.attr="disabled" wire:target="edit"
                                class="disabled:opacity-25">Modificar</x-jet-danger-button>  --}}
                            {{--  @endif  --}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    @livewire('customers.create-customer')
</div>
