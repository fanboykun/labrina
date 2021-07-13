<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Decission Support System') }}{{ $project_id }}
        </h2>
    </x-slot>
    <div>
        <div class="flex border shadow-2x1 justify-center bg-none">
            <div class="grid gap-4 grid-cols-3 py-5 px-5 m-auto">
                <div class="flex justify-between item-center">
                    <a wire:click="tabs({{ 1 }})" href="#" class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-500 bg-gray-700 hover:bg-gray-700">
                            <span class="flex items-center justify-center text-lg text-gray-500">
                                <svg fill="none"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     stroke-width="2"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     class="h-6 w-6">
                                    <path d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                </svg>
                            </span>
                            <span class="ml-3">Project </span>
                            <span class="px-2 ml-auto text-lg text-green-400">
                              <svg fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                class="h-6 w-6">
                                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                              </svg>
                            </span>
                    </a>
                </div>
                <div class="flex justify-between item-center">
                    <a wire:click="tabs({{ 2 }})" href="#" class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-500 hover:bg-gray-700">
                     <span class="flex items-center justify-center text-lg text-gray-500">
                         <svg fill="none"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                              class="h-6 w-6">
                             <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                         </svg>
                     </span>
                     <span class="ml-3">Criteria</span>
                     <span class="px-2 ml-auto">
                        <span class="px-2 ml-auto text-lg text-green-400">
                            <svg fill="none"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                              class="h-6 w-6">
                              <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                          </span>
                     </span>
                 </a>
                </div>
                <div class="flex justify-between item-center">
                    <a wire:click="tabs({{ 3 }})" href="#" class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-500 hover:bg-gray-700">
                     <span class="flex items-center justify-center text-lg text-gray-500">
                         <svg fill="none"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                              class="h-6 w-6">
                             <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                         </svg>
                     </span>
                     <span class="ml-3 hover:text-green-400">Alternative</span>
                     <span class="px-2 ml-auto text-lg text-green-400">
                        <svg fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          class="h-6 w-6">
                          <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                      </span>
                 </a>
                </div>
            </div>
        </div>
    <div>
        @if ($tab === 1)
        <div>

            <livewire:projects :project="$project_id"/>
        </div>
        @elseif ($tab === 2)
        <div>
            <livewire:criteria :project="$project_id" />
        </div>
        @elseif ($tab === 3)
        <div>
            <livewire:alternative :project="$project_id" />
        </div>
        @elseif ($tab === 4)
        <div>
            <livewire:calculations :project="$project_id" />
        </div>
        @endif
    </div>
    </div>
</div>
