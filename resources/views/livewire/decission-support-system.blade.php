<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Decission Support System') }}
        </h2>
    </x-slot>
    <div class="flex flex-col w-full">
        @if ($project != null)
            <div class="flex px-8 overflow-x-auto">
                <ul class="w-full steps">
                    <li data-content="{{ $project->has('criterias') ? '✓' : '✕' }}"
                        type="button" wire:click="$emit('openTab', 'criteria')"
                        class="step @if ($project->has('criterias')) step-primary @endif"
                        style="cursor: pointer">
                        Criteria
                    </li>
                    <li data-content="{{ $project->has('alternatives') ? '✓' : '✕' }}"
                        type="button" wire:click="$emit('openTab', 'alternative')"
                        class="step @if ($project->has('alternatives')) step-primary @endif"
                        style="cursor: pointer">
                        Alternative
                    </li>
                    <li data-content="{{ $project->has('rangkings') ? '✓' : '✕' }}"
                        type="button" wire:click="$emit('openTab', 'calculation')"
                        class="step @if ($project->has('rangkings')) step-primary @endif"
                        style="cursor: pointer">
                        Calculation
                    </li>
                    <li data-content="{{ $project->has('rangkings') ? '✓' : '✕' }}"
                        type="button" wire:click="$emit('openTab', 'rangkings')"
                        class="step @if ($project->has('rangkings')) step-primary @endif"
                        style="cursor: pointer">
                        Rangkings
                    </li>

                  </ul>
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
