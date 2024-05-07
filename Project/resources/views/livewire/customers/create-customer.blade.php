<x-dialog-modal wire:model='open' maxWidth="2xl" class="relative">
    <x-slot name="title">
        Nuevo Cliente
    </x-slot>
    <x-slot name="content">
        <div class="md:col-span-2" x-data="{ tab: 'Datos' }">
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
                </ul>
            </div>
            <div class="flex flex-col h-full mt-6 gap-4" x-show="tab === 'Datos'">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                    <div class="col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Tipo de Identificación</dt>
                        <select wire:model="customer.identification_type"
                            class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                            <option value="">Seleccione</option>
                            @foreach ($identificationTypes as $value)
                                <option value="{{ $value->id }}">{{ $value->identification_type }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="customer.identification_type" />
                    </div>
                    <div class="col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Número de Identificación</dt>
                        <x-input id="identification" class="block mt-1 w-full bg-gray-50 border-none" type="number"
                            wire:model="customer.identification" x-on:change="$wire.searchIdentification()"
                            name="identification" />
                        <x-input-error for="customer.identification" />
                    </div>
                    <div class="col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                        <x-input id="person" wire:model="customer.person"
                            class="block mt-1 w-full bg-gray-50 border-none" type="text" name="person" />
                        <x-input-error for="customer.person" />
                    </div>
                    <div class="col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Género</dt>
                        <select wire:model="customer.gender"
                            class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                            <option value="">Seleccione</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <x-input-error for="customer.gender" />
                    </div>
                    <div class="col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Dirección</dt>
                        <x-input id="address" wire:model="customer.address"
                            class="block mt-1 w-full bg-gray-50 border-none" type="text" name="address" />
                        <x-input-error for="customer.address" />
                    </div>
                    <div class="col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Pais</dt>
                        <select wire:model="customer.country_id"
                            class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                            <option value="">Seleccione</option>
                            @foreach ($countries as $value)
                                <option value="{{ $value->id }}">{{ $value->country }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="customer.country_id" />
                    </div>
                    <div class="col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
                        <x-input id="phone" wire:model="customer.phone"
                            class="block mt-1 w-full bg-gray-50 border-none" type="number" name="phone" />
                        <x-input-error for="customer.phone" />
                    </div>
                    <div class="col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Correo Electrónico</dt>
                        <x-input id="email" wire:model="customer.email"
                            class="block mt-1 w-full bg-gray-50 border-none" type="email" name="email" />
                        <x-input-error for="customer.email" />
                    </div>
                    <div class="col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Ocupación</dt>
                        <x-input id="ocupation" wire:model="customer.ocupation"
                            class="block mt-1 w-full bg-gray-50 border-none" type="text" name="ocupation" />
                        <x-input-error for="customer.ocupation" />
                    </div>
                    <div class="col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Fecha de Nacimiento</dt>
                        <x-input id="birthdate" wire:model="customer.birthdate"
                            class="block mt-1 w-full bg-gray-50 border-none" type="date" name="birthdate" />
                        <x-input-error for="customer.birthdate" />
                    </div>
                    <div class="col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Tipo de Persona</dt>
                        <select wire:model="customer.type_person"
                            class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                            <option value="">Seleccione</option>
                            @foreach ($typesPersons as $value)
                                <option value="{{ $value->id }}">{{ $value->type_person }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="customer.type_person" />
                    </div>
                </dl>
            </div>
            <div class="flex flex-col h-full mt-6 gap-4" x-show="tab === 'Productos'">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                    <div class="col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Tipo de Producto</dt>
                        <select wire:model.live="customer.type_product"
                            class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                            <option value="">Seleccione</option>
                            @foreach ($typesProducts as $value)
                                <option value="{{ $value->id }}">{{ $value->type_product }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="customer.type_product" />
                    </div>
                    <div class="col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Producto</dt>
                        <select wire:model="customer.product"
                            class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                            <option value="">Seleccione</option>
                            @foreach ($products as $value)
                                <option value="{{ $value->id }}">{{ $value->product }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="customer.product" />
                    </div>
                </dl>
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-secondary-button wire:click="$set('open', false)">Cancelar</x-jet-secondary-button>
            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                class="disabled:opacity-25">Guardar</x-jet-danger-button>
    </x-slot>
</x-dialog-modal>
