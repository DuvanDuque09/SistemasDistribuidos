<div>
    <button
        class="px-4 py-2 inline-flex items-center text-white bg-gradient-to-tl from-gray-400 to-slate-600 hover:from-gray-700 hover:to-slate-600 active:opacity-85 rounded-lg"
        wire:click="$set('open', true)">
        <svg viewBox="0 0 24 24" class="w-7 h-7" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M11 17C11 17.5523 11.4477 18 12 18C12.5523 18 13 17.5523 13 17V13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H13V7C13 6.44771 12.5523 6 12 6C11.4477 6 11 6.44771 11 7V11H7C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11V17Z">
            </path>
        </svg>
        <span class="uppercase text-xs font-bold">Agregar Producto</span>
    </button>

    <x-dialog-modal wire:model='open' maxWidth="md" class="relative" x-on:keydown.escape.window="show=true">
        <x-slot name="title">
            Agregar Producto
        </x-slot>
        <x-slot name="content">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Tipo de Producto</dt>
                    <select wire:model.live="type_product"
                        class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                        <option value="">Seleccione</option>
                        @foreach ($typesProducts as $value)
                            <option value="{{ $value->id }}">{{ $value->type_product }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="type_product" />
                </div>
                <div class="col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Producto</dt>
                    <select wire:model.live="product"
                        class="mt-1 w-full bg-gray-50 rounded-md border-none focus:border-red-500 focus:ring-red-500 shadow-sm">
                        <option value="">Seleccione</option>
                        @foreach ($products as $value)
                            <option value="{{ $value->id }}">{{ $value->product }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="product" />
                </div>
                @if (!empty($product))
                    <div class="col-span-2">
                        <img class="w-full h-auto rounded-md object-cover" src="{{ Storage::url($path) }}"
                            alt="{{ $product }}" />
                    </div>
                @endif
            </dl>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">Cancelar</x-jet-secondary-button>
                <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                    class="disabled:opacity-25">Agregar</x-jet-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
