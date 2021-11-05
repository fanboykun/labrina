<div>
    <div class="grid h-14 card place-items-center">
        <x-jet-section-title>
            <x-slot name="title">{{ __('Create New Project Or Continue With Existing Project') }}</x-slot>
            <x-slot name="description">{{ __('This project is going to desiccion support system') }}</x-slot>
        </x-jet-section-title>
    </div>
    <div class="divider before:bg-gray-200 after:bg-gray-200"></div>
    <div class="grid md:grid md:grid-cols-6 md:gap-4">
        <div class="col-start-2 col-span-4 mt-5 md:mt-0">
            <form wire:submit.prevent="addProject()">
                <div class="bg-white sm:p-2 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="p-5">
                        @if (!$create_new)
                        <div class="col-span-6 sm:col-span-4">
                            <select wire:model="selected_project" class="select select-bordered select-accent mt-1 block w-full">
                                <option selected="selected">Choose Exsiting Project</option>
                                @foreach ($project_list as $pl)
                                    <option value="{{ $pl->id }}">{{ $pl->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="col-span-2">
                            <label class="cursor-pointer label mt-5">
                                <span class="label-text">Want To Create New  Instead?</span>
                                <input type="checkbox" wire:model="create_new" checked="checked" class="checkbox checkbox-accent">
                            </label>
                        </div>
                        @if ($create_new)
                        <div class="col-span-6 sm:col-span-4 mt-2">
                            <x-jet-label for="name" value="{{ __('Project Name') }}" />
                            <input type="text" wire:model="name" placeholder="name" class="mt-1 block w-full input input-info input-bordered">
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-5">
                            <x-jet-label for="type" value="{{ __('Project Type') }}" />
                            <input type="text" wire:model="type" placeholder="type" class="mt-1 block w-full input input-info input-bordered">
                            <x-jet-input-error for="type" class="mt-2" />
                        </div>
                        @endif
                        <div class="flex items-center justify-end px-4 py-3">
                            <button class="btn btn-accent btn-active" role="button" aria-pressed="true">begin</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
