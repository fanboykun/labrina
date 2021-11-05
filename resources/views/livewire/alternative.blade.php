<div>
    <div class="grid h-14 card place-items-center">
        <x-jet-section-title>
            <x-slot name="title">{{ __('Create The Alternative') }}</x-slot>
            <x-slot name="description">{{ __('The alternative(s) is going to be the subject parameter') }}</x-slot>
        </x-jet-section-title>
    </div>
    <div class="divider before:bg-gray-200 after:bg-gray-200"></div>
    <div class="px-4 py-5 mt-5 rounded my-5 bg-white sm:p-6 shadow overflow-x-auto">
        <form>
            <!-- Name -->
            <div class="grid gap-2 grid-cols-{{ $cols == 2 ? '3' : $cols }}">
                <div>
                    <x-label for="name" :value="__('Name')" />
                </div>
                {{-- <div>
                    <x-label for="type" :value="__('Code')" />
                </div> --}}
                @forelse ($criterias as $criteria)
                <div>
                    <x-label for="{{ $criteria['id'] }}" :value="$criteria['name']" />
                </div>
                {{-- <div>
                    <x-label for="type" :value="$criteria->pluck('name')"></x-label>
                </div> --}}
                @empty
                <div>
                    <x-label for="type" :value="__('Criteria')"></x-label>
                </div>
                @endforelse
                <div>
                    {{-- <x-label for="type" :value="__('Criterias')"></x-label> --}}
                    <button wire:click="add" type="button" class="flex items-center rounded-md bg-blue-100 text-blue-600 hover:bg-blue-200 hover:text-blue-800 text-sm font-medium mt-1 px-4 py-2">
                        <svg class="group-hover:text-blue-600 text-blue-500 mr-2" width="12" height="20" fill="currentColor">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z"/>
                        </svg>
                        New
                    </button>
                </div>
            </div>
            @foreach ($inputs as $key => $value)
            <div wire:loading.attr="disabled" wire:target="addAlternative" class="grid gap-4 grid-cols-{{ $cols }}">
                <div>
                    <x-input wire:model="inputs.{{ $key }}.name" id="name[{{ $key }}][name]" class="block mt-1 w-full" type="text" name="name" autofocus />
                </div>
                {{-- <div>
                    <x-input wire:model="inputs.{{ $key }}.a_code" id="a_code[{{ $key }}][a_code]" class="block mt-1 w-full" type="text" name="a_code" disabled />
                </div> --}}
                @foreach ($value['criterias'] as $k => $v)
                <div class="hidden">
                    <x-input value="{{ $v['id'] }}" wire:model="inputs.{{ $key }}.criterias.{{ $k }}.criteria_id" id="criteria_id[{{ $key }}][criteria_id]" type="hidden" name="criteria_id" placeholder="id" disabled />
                </div>
                <div>
                    <x-input wire:model="inputs.{{ $key }}.criterias.{{ $k }}.value" id="value[{{ $key }}][value]" class="block mt-1 w-full" type="number" name="value" placeholder="max value = {{ $v['max_value'] }}" required />
                </div>
                @endforeach
                <div class="flex w-full justify-end">
                    <button wire:click="remove({{ $key }})" type="button" class="flex items-center rounded-md bg-red-100 text-red-600 hover:bg-red-200 hover:text-red-800 text-sm font-medium mt-2 px-4 py-2">
                        <p class="mr-5"><strong> - </strong></p>
                        Del
                    </button>
                </div>
            </div>
            @endforeach
            <x-slot name="actions">
                <x-button wire:click.prevent="addAlternative()" class="items-center mt-5">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </form>
    </div>
</div>
