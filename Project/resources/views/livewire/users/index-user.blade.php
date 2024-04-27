<div class="h-screen w-full p-4 overflow-y-auto md:pb-4 pb-36">
    <div class="w-full px-6 mx-auto">
        <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover h-40 rounded-2xl">
            <img class="bg-cover object-cover" {{--  src="https://demos.creative-tim.com/soft-ui-dashboard-tailwind/assets/img/curved-images/curved0.jpg"  --}}
                src="https://img.freepik.com/vector-premium/fondo-banner-abstracto-rojo-moderno_181182-21616.jpg?w=1800"
                alt="">
            <span
                class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-red-700 to-pink-800 opacity-60"></span>
        </div>
        <div
            class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
            <div class="flex items-center flex-wrap -mx-3">
                <div class="flex-none w-auto max-w-full px-3">
                    <div
                        class="text-base ease-soft-in-out h-16 w-16 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                        <img src="{{ Storage::url('recursos/Users.png') }}" alt="profile_image"
                            class="w-full shadow-soft-sm rounded-xl">
                    </div>
                </div>
                <div class="flex flex-1">
                    <h2 class="text-3xl font-bold">Usuarios</h2>
                </div>
                <div class="pr-4">
                    <button
                        class="px-4 py-2 inline-flex items-center text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 focus:ring-offset-white active:opacity-85 rounded-lg"
                        wire:click="$set('openC', true)">
                        <svg viewBox="0 0 24 24" class="w-7 h-7" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11 17C11 17.5523 11.4477 18 12 18C12.5523 18 13 17.5523 13 17V13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H13V7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7V11H7C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11V17Z">
                            </path>
                        </svg>
                        <span class="uppercase text-xs font-bold">Nuevo Usuario</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="flex mt-12">
            <div class="flex-none w-full max-w-full">
                <div
                    class="md:relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto ps">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Usuario</th>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Rol</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Estado</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Fecha de Creación</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u)
                                        <tr>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div class="shrink-0">
                                                        <img src="{{ $u->profile_photo_path ? Storage::url($u->profile_photo_path) : $u->profile_photo_url }}"
                                                            class="inline-flex items-center justify-center mr-4 text-sm text-white h-9 w-9 rounded-xl">
                                                    </div>
                                                    <div class="flex flex-col justify-center">
                                                        <h6 class="mb-0 text-sm leading-normal">{{ $u->name }}</h6>
                                                        <p class="mb-0 text-xs leading-tight text-slate-400">
                                                            {{ $u->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">{{ $u->rol }}
                                                </p>
                                                <p class="mb-0 text-xs leading-tight text-slate-400">Scotiabank</p>
                                            </td>
                                            <td
                                                class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="bg-gradient-to-tl {{ $u->state === 'Activo' ? 'from-green-600 to-lime-400' : 'from-slate-600 to-slate-300' }}  px-2.5 text-xs rounded-md py-1.5 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $u->state }}</span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $u->created_at }}</span>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex justify-center items-center gap-1">
                                                    @if ($u->state == 'Activo')
                                                        <a wire:click="showEdit({{ $u->id }})"
                                                            class="cursor-pointer inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-5 w-5 text-slate-400" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                            </svg>
                                                        </a>
                                                    @endif
                                                    <a wire:click="desactivate({{ $u->id }})"
                                                        class="cursor-pointer inline-flex items-center px-3 py-2 border {{ $u->state == 'Activo' ? 'border-red-300 text-red-700 hover:bg-red-50 focus:ring-red-500' : 'border-green-300 text-green-700 hover:bg-green-50 focus:ring-green-500' }}  shadow-sm text-sm leading-4 font-medium rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                        @if ($u->state == 'Activo')
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-5 w-5 text-red-400" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-5 w-5 text-green-400" viewBox="0 0 19 17"
                                                                version="1.1">
                                                                <g id="Icons" stroke="none" stroke-width="1"
                                                                    fill="none" fill-rule="evenodd">
                                                                    <g id="Rounded"
                                                                        transform="translate(-239.000000, -1486.000000)">
                                                                        <g id="Content"
                                                                            transform="translate(100.000000, 1428.000000)">
                                                                            <g id="-Round-/-Content-/-how_to_reg"
                                                                                transform="translate(136.000000, 54.000000)">
                                                                                <g>
                                                                                    <polygon id="Path"
                                                                                        points="0 0 24 0 24 24 0 24" />
                                                                                    <path
                                                                                        d="M12,20 L3,20 L3,18 C3,15.34 8.33,14 11,14 C11.32,14 11.61,14.02 12,14.06 L11.16,14.88 C9.97,16.04 9.96,17.96 11.14,19.14 L12,20 Z M11,12 C8.79,12 7,10.21 7,8 C7,5.79 8.79,4 11,4 C13.21,4 15,5.79 15,8 C15,10.21 13.21,12 11,12 Z M16.18,19.78 C15.79,20.17 15.15,20.17 14.76,19.78 L12.69,17.69 C12.31,17.3 12.31,16.68 12.69,16.3 L12.7,16.29 C13.09,15.9 13.72,15.9 14.1,16.29 L15.47,17.66 L19.9,13.2 C20.29,12.81 20.92,12.81 21.31,13.2 L21.32,13.21 C21.7,13.6 21.7,14.22 21.32,14.6 L16.18,19.78 Z"
                                                                                        id="🔹Icon-Color"
                                                                                        fill="currentColor" />
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        @endif
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="px-6 py-2">
                                {{-- {{ $users->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-dialog-modal wire:model='openC'>
        <x-slot name="title">
            <span class="text-xl">Nuevo Usuario</span>
        </x-slot>
        <x-slot name="content">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Tipo de Identificación</dt>
                    <select wire:model="user.identification_type"
                        class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                        <option value="">Seleccione</option>
                        @foreach ($identificationTypes as $value)
                            <option value="{{ $value->id }}">{{ $value->identification_type }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="user.identification_type" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Número de Identificación</dt>
                    <x-input id="identification" class="block mt-1 w-full bg-gray-50 border-none" type="number"
                        wire:model="user.identification" x-on:change="$wire.searchIdentification()"
                        name="identification" />
                    <x-input-error for="user.identification" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                    <x-input id="person" wire:model="user.person" class="block mt-1 w-full bg-gray-50 border-none"
                        type="text" name="person" />
                    <x-input-error for="user.person" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Género</dt>
                    <select wire:model="user.gender"
                        class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                        <option value="">Seleccione</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <x-input-error for="user.gender" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Dirección</dt>
                    <x-input id="address" wire:model="user.address"
                        class="block mt-1 w-full bg-gray-50 border-none" type="text" name="address" />
                    <x-input-error for="user.address" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Pais</dt>
                    <select wire:model="user.country_id"
                        class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                        <option value="">Seleccione</option>
                        @foreach ($countries as $value)
                            <option value="{{ $value->id }}">{{ $value->country }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="user.country_id" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
                    <x-input id="phone" wire:model="user.phone" class="block mt-1 w-full bg-gray-50 border-none"
                        type="number" name="phone" />
                    <x-input-error for="user.phone" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Correo Electrónico</dt>
                    <x-input id="email" wire:model="user.email" class="block mt-1 w-full bg-gray-50 border-none"
                        type="email" name="email" />
                    <x-input-error for="user.email" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Ocupación</dt>
                    <x-input id="ocupation" wire:model="user.ocupation"
                        class="block mt-1 w-full bg-gray-50 border-none" type="text" name="ocupation" />
                    <x-input-error for="user.ocupation" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Fecha de Nacimiento</dt>
                    <x-input id="birthdate" wire:model="user.birthdate"
                        class="block mt-1 w-full bg-gray-50 border-none" type="date" name="birthdate" />
                    <x-input-error for="user.birthdate" />
                </div>
                <div class="col-span-1 flex flex-col">
                    <dt class="text-sm font-medium text-gray-500">Foto</dt>
                    <div class="mt-1 h-full flex items-center gap-4">
                        <span
                            class="flex items-center h-full w-20 flex-shrink-0 rounded-full overflow-hidden bg-gray-100">
                            @if (isset($user['photo']) && !empty($user['photo']))
                                <img class="object-cover h-full w-full" src="{{ $user['photo']->temporaryUrl() }}"
                                    alt="profile">
                            @else
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            @endif
                        </span>
                        <div class="flex-1 items-center">
                            <label
                                class="flex w-full justify-center px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-md shadow-md cursor-pointer">
                                <span class="uppercase text-xs font-bold">Seleccionar</span>
                                <input type='file' accept="image/jpeg, image/png, image/gif, image/bmp, image/webp"
                                    wire:model="user.photo" class="hidden" />
                            </label>
                        </div>
                    </div>
                </div>
            </dl>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('openC', false)">Cancelar</x-jet-secondary-button>
                <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                    class="disabled:opacity-25">Guardar</x-jet-danger-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model='openE'>
        <x-slot name="title">
            <span class="text-xl">Editar Usuario</span>
        </x-slot>
        <x-slot name="content">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Tipo de Identificación</dt>
                    <select wire:model="userE.identification_type"
                        class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                        <option value="">Seleccione</option>
                        @foreach ($identificationTypes as $value)
                            <option value="{{ $value->id }}">{{ $value->identification_type }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="userE.identification_type" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Número de Identificación</dt>
                    <x-input id="identification" class="block mt-1 w-full bg-gray-50 border-none" type="number"
                        wire:model="userE.identification" x-on:change="$wire.searchIdentificationE()"
                        name="identification" />
                    <x-input-error for="userE.identification" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                    <x-input id="person" wire:model="userE.person"
                        class="block mt-1 w-full bg-gray-50 border-none" type="text" name="person" />
                    <x-input-error for="userE.person" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Género</dt>
                    <select wire:model="userE.gender"
                        class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                        <option value="">Seleccione</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <x-input-error for="userE.gender" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Dirección</dt>
                    <x-input id="address" wire:model="userE.address"
                        class="block mt-1 w-full bg-gray-50 border-none" type="text" name="address" />
                    <x-input-error for="userE.address" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Pais</dt>
                    <select wire:model="userE.country_id"
                        class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                        <option value="">Seleccione</option>
                        @foreach ($countries as $value)
                            <option value="{{ $value->id }}">{{ $value->country }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="userE.country_id" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
                    <x-input id="phone" wire:model="userE.phone" class="block mt-1 w-full bg-gray-50 border-none"
                        type="number" name="phone" />
                    <x-input-error for="userE.phone" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Correo Electrónico</dt>
                    <x-input id="email" wire:model="userE.email" class="block mt-1 w-full bg-gray-50 border-none"
                        type="email" name="email" />
                    <x-input-error for="userE.email" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Ocupación</dt>
                    <x-input id="ocupation" wire:model="userE.ocupation"
                        class="block mt-1 w-full bg-gray-50 border-none" type="text" name="ocupation" />
                    <x-input-error for="userE.ocupation" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Fecha de Nacimiento</dt>
                    <x-input id="birthdate" wire:model="userE.birthdate"
                        class="block mt-1 w-full bg-gray-50 border-none" type="date" name="birthdate" />
                    <x-input-error for="userE.birthdate" />
                </div>
                <div class="col-span-1 flex flex-col">
                    <dt class="text-sm font-medium text-gray-500">Foto</dt>
                    <div class="mt-1 h-full flex items-center gap-4">
                        <span
                            class="flex items-center h-full w-20 flex-shrink-0 rounded-full overflow-hidden bg-gray-100 relative">
                            @if (isset($userE['photo']) && !empty($userE['photo']))
                                <img class="object-cover h-full w-full" src="{{ Storage::url($userE['photo']) }}"
                                    alt="profile">
                                <button wire:click="delete"
                                    class="absolute justify-center items-center top-[-6px] right-[-6px] hover:bg-gray-300 bg-gray-200 rounded-full w-5 h-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            @else
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            @endif
                        </span>
                        @if (empty($userE['photo']))
                            <div class="flex-1 items-center">
                                <label
                                    class="flex w-full justify-center px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-md shadow-md cursor-pointer">
                                    <span class="uppercase text-xs font-bold">Seleccionar</span>
                                    <input type='file'
                                        accept="image/jpeg, image/png, image/gif, image/bmp, image/webp"
                                        wire:model="userE.photo" class="hidden" />
                                </label>
                            </div>
                        @endif
                    </div>
                </div>
            </dl>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('openE', false)">Cancelar</x-jet-secondary-button>
                <x-danger-button wire:click="edit" wire:loading.attr="disabled" wire:target="edit"
                    class="disabled:opacity-25">Editar</x-jet-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
