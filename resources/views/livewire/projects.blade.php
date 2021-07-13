<div>
    <x-jet-form-section submit="addProject()" class="mt-5 p-4">
        <x-slot name="title">
            {{ __('Create New Project') }}
        </x-slot>

        <x-slot name="description">
            {{ __('This project is going to desiccion support system') }}
            <br>
            {{ $name }}
        </x-slot>

        <x-slot name="form">
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Project Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model="name" autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="type" value="{{ __('Project Type') }}" />
                <x-jet-input id="type" type="text" class="mt-1 block w-full" wire:model="type"/>
                <x-jet-input-error for="type" class="mt-2" />
            </div>
        </x-slot>

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
