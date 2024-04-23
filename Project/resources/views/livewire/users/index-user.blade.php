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
                        wire:click="$set('open', true)">
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
                                            class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $u)
                                        <tr>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div class="shrink-0">
                                                        <img src="{{ Storage::url($u->photo) }}"
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
                                                <p class="mb-0 text-xs leading-tight text-slate-400">Organization</p>
                                            </td>
                                            <td
                                                class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="bg-gradient-to-tl {{ $state === 'Activo' ? 'from-green-600 to-lime-400' : 'from-slate-600 to-slate-300' }}  px-2.5 text-xs rounded-md py-1.5 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $state }}</span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $u->created_at }}</span>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <a href="javascript:;"
                                                    class="text-xs font-semibold leading-tight text-slate-400"> Edit
                                                </a>
                                            </td>
                                        </tr>
                                        {{--  <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div>
                                                    <img src="../assets/img/team-3.jpg"
                                                        class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl"
                                                        alt="user2">
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">Alexa Liras</h6>
                                                    <p class="mb-0 text-xs leading-tight text-slate-400">
                                                        alexa@creative-tim.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">Programator</p>
                                            <p class="mb-0 text-xs leading-tight text-slate-400">Developer</p>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span
                                                class="bg-gradient-to-tl from-slate-600 to-slate-300 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Offline</span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span
                                                class="text-xs font-semibold leading-tight text-slate-400">11/01/19</span>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <a href="javascript:;"
                                                class="text-xs font-semibold leading-tight text-slate-400"> Edit </a>
                                        </td>
                                    </tr>  --}}
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

    <x-dialog-modal wire:model='open'>
        <x-slot name="title">
            <span class="text-xl">Nuevo Usuario</span>
        </x-slot>
        <x-slot name="content">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                <div class="col-span-1 col-start-1 col-end-2 row-start-1 row-end-2">
                    <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                    <x-input id="name" class="block mt-1 w-full bg-gray-50 border-none" type="text"
                        name="name" />
                    <x-input-error for="name" />
                </div>
                <div
                    class="md:col-span-1 md:col-start-2 md:col-end-3 md:row-start-1 md:row-end-3 row-start-3 row-end-4 flex flex-col">
                    <dt class="text-sm font-medium text-gray-500">Foto</dt>
                    <div class="mt-1 h-full flex items-center gap-4">
                        <span
                            class="flex items-center h-full w-32 flex-shrink-0 rounded-full overflow-hidden bg-gray-100">
                            @if ($file)
                                <img class="object-cover h-full w-full" src="{{ $file->temporaryUrl() }}"
                                    alt="">
                            @else
                                @if ($photo == null)
                                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                @else
                                    <img class="object-contain" src="{{ Storage::url($photo) }}" alt="">
                                @endif
                            @endif
                        </span>
                        <div class="flex-1 items-center">
                            <label
                                class="flex w-full justify-center px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-md shadow-md cursor-pointer">
                                <span class="uppercase text-xs font-bold">Seleccionar</span>
                                <input type='file' wire:model="file" class="hidden" />
                            </label>
                            <x-input-error for="photo" />
                        </div>
                    </div>
                    <x-input-error for="file" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Correo Electrónico</dt>
                    <x-input id="email" class="block mt-1 w-full bg-gray-50 border-none" type="email"
                        name="email" />
                    <x-input-error for="email" />
                </div>
            </dl>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">Cancelar</x-jet-secondary-button>
                <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                    class="disabled:opacity-25">Guardar</x-jet-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
