<div>
    <div class="grid h-14 card place-items-center">
        <x-jet-section-title>
            <x-slot name="title">{{ __('Create The Criteria') }}</x-slot>
            <x-slot name="description">{{ __('The criteria(s) is going to be the object parameter') }}</x-slot>
        </x-jet-section-title>
    </div>
    <div class="divider before:bg-gray-200 after:bg-gray-200"></div>
        <div class="px-4 py-5 mt-5 rounded my-5 bg-white sm:p-6 shadow">
            <form>
                <!-- Name -->
                <div class="grid gap-4 grid-cols-5">
                    <div>
                        <x-label for="name" :value="__('Name')" />
                    </div>
                    <div>
                        <x-label for="type" :value="__('Weight')" />
                    </div>
                    <div>
                        <x-label for="type" :value="__('Max Value')" />
                    </div>
                    <div>
                        <x-label for="type" :value="__('Type')" />
                    </div>
                    <div>
                        <button wire:click="add" type="button" class="flex items-center rounded-md bg-blue-100 text-blue-600 hover:bg-blue-200 hover:text-blue-800 text-sm font-medium mt-1 px-4 py-2">
                            <svg class="group-hover:text-blue-600 text-blue-500 mr-2" width="12" height="20" fill="currentColor">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z"/>
                            </svg>
                            New
                        </button>
                    </div>
                </div>
                @foreach ($inputs as $key => $value)
                <div class="grid gap-4 grid-cols-5">
                    <div>
                        <x-input wire:model="inputs.{{ $key }}.name" id="name[{{ $key }}][name]" class="block mt-1 w-full" type="text" name="name" required autofocus />
                    </div>
                    <div>
                        <x-input wire:model="inputs.{{ $key }}.weight" id="weight[{{ $key }}][weight]" class="block mt-1 w-full" type="number" name="weight" required />
                    </div>
                    <div>
                        <x-input wire:model="inputs.{{ $key }}.max_value" id="max_value[{{ $key }}][max_value]" class="block mt-1 w-full" type="number" name="max_value" required />
                    </div>
                    <div>
                        <select wire:model="inputs.{{ $key }}.type" id="type[{{ $key }}]['type']" class="select select-bordered select-accent mt-1 block w-full">
                            <option disabled="disabled">Choose Exsiting Project</option>
                            <option value="0">Benefit</option>
                            <option value="1">Cost</option>
                        </select>
                        {{-- <x-input wire:model="inputs.{{ $key }}.c_code" id="c_code[{{ $key }}][c_code]" class="block mt-1 w-full" type="text" name="c_code" disabled /> --}}
                    </div>
                    <div>
                        <button wire:click="remove({{ $key }})" type="button" class="flex items-center rounded-md bg-red-100 text-red-600 hover:bg-red-200 hover:text-red-800 text-sm font-medium mt-2 px-4 py-2">
                            <p class="mr-5"><strong> - </strong></p>
                            Del
                        </button>
                    </div>
                </div>
                @endforeach
                <div class="flex items-center justify-end px-4 py-3">
                    <button type="submit" wire:click.prevent="addCriteria()" class="btn btn-accent btn-active" role="button" aria-pressed="true">begin</button>
                </div>
            </form>
        </div>
</div>
