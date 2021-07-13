<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alternative') }}
        </h2>
    </x-slot>
    <div class="max-h-screen w-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="min-w-screen sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form>
                <!-- Name -->
                <div class="grid gap-4 grid-cols-3">
                    <div>
                        <x-label for="name" :value="__('Name')" />
                    </div>
                    <div>
                        <x-label for="type" :value="__('Code')" />
                    </div>
                    <div class="flex w-full justify-end">
                        <button wire:click="add" type="button" class="flex items-center rounded-md bg-blue-100 text-blue-600 hover:bg-blue-200 hover:text-blue-800 text-sm font-medium mt-1 px-4 py-2">
                            <svg class="group-hover:text-blue-600 text-blue-500 mr-2" width="12" height="20" fill="currentColor">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z"/>
                            </svg>
                            New
                          </button>
                    </div>
                </div>
                @foreach ($inputs as $key => $value)
                <div class="grid gap-4 grid-cols-3">
                    <div>
                        <x-input wire:model="inputs.{{ $key }}.name" id="name[{{ $key }}][name]" class="block mt-1 w-full" type="text" name="name" autofocus />
                    </div>
                    <div>
                        <x-input wire:model="inputs.{{ $key }}.a_code" id="a_code[{{ $key }}][a_code]" class="block mt-1 w-full" type="text" name="a_code" disabled />
                    </div>
                    <div class="flex w-full justify-end">
                        <button wire:click="remove({{ $key }})" type="button" class="flex items-center rounded-md bg-red-100 text-red-600 hover:bg-red-200 hover:text-red-800 text-sm font-medium mt-2 px-4 py-2">
                            <svg class="group-hover:text-red-600 text-red-500 mr-2" width="12" height="20" fill="currentColor">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z"/>
                            </svg>
                            Del
                        </button>
                    </div>
                </div>
                @endforeach
                <div class="flex items-center justify-center mt-5 py-2">
                    <x-button wire:click.prevent="addAlternative()" class="items-center mt-5">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
