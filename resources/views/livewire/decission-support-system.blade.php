<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Decission Support System') }}
        </h2>
    </x-slot>
    <div class="flex flex-col w-full">
        @if ($project != null)
            <div class="grid grid-cols-3 h-12 mt-4 card place-items-center">
                <div class="col-span-3 px-5">
                    <button type="button" wire:click="$emit('openTab', 'criteria')" class="btn {{ $tab === 'criteria' ? 'btn-active' : 'btn-outline' }} btn-accent mx-5" {{ is_null($project) ? 'disabled' : '' }}>Criteria</button>
                    <button type="button" wire:click="$emit('openTab', 'alternative')" class="btn {{ $tab === 'alternative' ? 'btn-active' : 'btn-outline' }} btn-accent mx-5" {{ is_null($project) ? 'disabled' : '' }}>Alternative</button>
                    <button type="button" wire:click="$emit('openTab', 'calculation')" class="btn {{ $tab === 'calculation' ? 'btn-active' : 'btn-outline' }} btn-accent mx-5" {{ is_null($project) ? 'disabled' : '' }}>Calculation</button>
                    <button type="button" wire:click="$emit('openTab', 'rangkings')" class="btn {{ $tab === 'rangkings' ? 'btn-active' : 'btn-outline' }} btn-accent mx-5" {{ is_null($project) ? 'disabled' : '' }}>Rangking</button>
                </div>
            </div>
            <div class="divider before:bg-gray-200 after:bg-gray-200"></div>
            @if ($tab === 'criteria')
            <livewire:criteria :project="$project" />
            @elseif ($tab === 'alternative')
            <livewire:alternative :project="$project" />
            @elseif ($tab === 'calculation')
            <livewire:dss-project :project="$project" />
            @elseif ($tab === 'rangkings')
            <livewire:rangkings :project="$project" />
            @endif

        @elseif($project == null)
        <livewire:projects/>

        @endif
    </div>
</div>
