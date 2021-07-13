<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="antialiased sans-serif bg-gray-200">
        <div>
            <div class="max-w-3xl mx-auto px-4 py-5">
                {{-- complete message --}}
                @if($complete == true)
                    <x-complete-message />
                @endif

                <div>
                    <!-- Top Navigation -->
                    <x-status-bar />
                    <!-- /Top Navigation -->

                    <!-- Step Content -->
                    <div class="py-5">
                        @if ($step === 1)
                            <x-step1 />
                        @elseif($step === 2)
                            <x-step2 />
                        @elseif($step === 3)
                            <x-step3 />
                            @else
                            none
                        @endif
                    </div>
                    <!-- / Step Content -->
                </div>
            </div>

            <!-- Bottom Navigation -->
            <div class="flex bottom-0 left-0 right-0 py-5  shadow-md">
                <div class="max-w-3xl mx-auto px-4">
                    <div class="flex justify-between">
                        <div class="px-5">
                            <x-previous-button />
                        </div>
                        <div class="px-5">
                            <x-button type="button" wire:click.prevent="next">{{ __('Next') }}</x-button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
        </div>
    </div>
</div>
