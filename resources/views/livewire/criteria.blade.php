<div>
    <div class="grid h-14 card place-items-center">
        <x-jet-section-title>
            <x-slot name="title">{{ __('Create The Criteria') }}</x-slot>
            <x-slot name="description">{{ __('The criteria(s) is going to be the object parameter') }}</x-slot>
        </x-jet-section-title>
    </div>
    {{-- <div class="divider before:bg-gray-200 after:bg-gray-200"></div> --}}
    <div class="px-4 py-5 mt-5 rounded my-5 bg-white sm:p-6 shadow">
        <div class="overflow-x-auto">
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
                    </div>
                </div>
                <div class="grid gap-4 grid-cols-5">
                    <div>
                        <x-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-input wire:model="weight" id="weight" class="block mt-1 w-full" type="number" name="weight" required />
                        @error('weight') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-input wire:model="max_value" id="max_value" class="block mt-1 w-full" type="number" name="max_value" required />
                        @error('max_value') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <select wire:model="type" id="type" class="select select-bordered select-accent mt-1 block w-full">
                            <option>Select One Type</option>
                            <option value="0" {{ $type == false ? 'selected' : '' }}>Benefit</option>
                            <option value="1" {{ $type == true ? 'selected' : '' }}>Cost</option>
                        </select>
                        @error('type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <button type="submit" wire:click.prevent="addCriteria()" class="flex justify-end btn btn-primary btn-active mt-1" role="button" aria-pressed="true">save</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="divider before:bg-gray-200 after:bg-gray-200"></div>
        <div class="grid grid-cols-4 sm:grid-cols-2">
            <div class="col-start-1 col-end-2">
                <x-jet-input wire:model.debounce.500ms="search" class="input input-secondary input-bordered" type="type" name="search" placeholder="search criteria by name" />
            </div>
            <div class="col-span-3 col-start-3 col-end-4 sm:flex flex justify-end">
                <button type="button" wire:click="$emit('openTab', 'alternative')" class="btn btn-accent btn-active" role="button" aria-pressed="true">next step</button>
            </div>
        </div>
        <div class="overflow-x-auto mt-5">
            <table class="table w-full table-auto">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Weight</th>
                        <th>Max Value</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
              </thead>
              <tbody>
                  @forelse ($criterias  as $criteria)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $criteria->name }}</td>
                    <td>{{ $criteria->weight }}</td>
                    <td>{{ $criteria->max_value }}</td>
                    <td>{{ $criteria->is_cost == true ? 'Cost' : 'Benefit' }}</td>
                    <td class=""><a role="button" wire:click="editCriteria({{ $criteria->id }})" class="btn btn-xs btn-outline">edit</a></td>
                  </tr>
                  @empty
                    Not Data Yet !!!
                  @endforelse
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
