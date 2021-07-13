<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Porjects') }}
        </h2>
    </x-slot>
    <div class="max-h-screen w-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="min-w-screen sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form wire:submit.prevent="addProject()">
                <!-- Name -->
                <div class="grid gap-4 grid-cols-2">
                    <div>
                        <x-label for="name" :value="__('Name')" />
                    </div>
                    <div>
                        <x-label for="name" :value="__('Type')" />
                    </div>
                </div>
                <div class="grid gap-4 grid-cols-2">
                    <div>
                    <x-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                    </div>

                    <div>
                    <x-input wire:model="type" id="type" class="block mt-1 w-full" type="text" name="type" required />
                    </div>
                </div>
                <div class="flex items-center justify-center mt-5 py-2">
                    <x-button class="items-center mt-5">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>

<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>
    <x-jet-form-section submit="updateSetting" class="mt-5 p-4">
        <x-slot name="title">
            {{ __('Create New Project') }}
        </x-slot>

        <x-slot name="description">
            {{ __('This project is going to desiccion support system') }}
        </x-slot>

        <form wire:submit.prevent="addProject()">
            <!-- Name -->
            <div class="grid gap-4 grid-cols-2">
                <div>
                    <x-label for="name" :value="__('Name')" />
                </div>
                <div>
                    <x-label for="name" :value="__('Type')" />
                </div>
            </div>
            <div class="grid gap-4 grid-cols-2">
                <div>
                <x-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                </div>

                <div>
                <x-input wire:model="type" id="type" class="block mt-1 w-full" type="text" name="type" required />
                </div>
            </div>
            <div class="flex items-center justify-center mt-5 py-2">
                <x-button class="items-center mt-5">
                    {{ __('Save') }}
                </x-button>
            </div>
        </form>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="created">
                {{ __('Created.') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

</div>

