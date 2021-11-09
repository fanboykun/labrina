<div>
    <div class="grid h-14 card place-items-center">
        <x-jet-section-title>
            <x-slot name="title">{{ __('Create The Alternative') }}</x-slot>
            <x-slot name="description">{{ __('The alternative(s) is going to be the subject parameter') }}</x-slot>
        </x-jet-section-title>
    </div>
    <div class="px-4 py-5 mt-5 rounded my-5 bg-white sm:p-6 shadow">
        <div class="grid grid-cols-4 sm:grid-cols-2">
            <div class="col-start-1 col-end-2">
                <x-jet-input wire:model.debounce.500ms="search" class="input input-secondary input-bordered" type="type" name="search" placeholder="search alternative by name" />
            </div>
            <div class="col-span-3 col-start-3 col-end-4 sm:flex flex justify-end">
                <button type="button" wire:click="$emit('openModal', 'create-alternative', {{ json_encode(["project" => $project->id, "criteria_data" => $criteria_data]) }})"  class="btn btn-primary btn-active mr-4" role="button" aria-pressed="true">Create New</button>
                <button type="button" wire:click="$emit('openTab', 'calculation')" class="btn btn-accent btn-active" role="button" aria-pressed="true">next step</button>
            </div>
        </div>
        <div class="divider before:bg-gray-200 after:bg-gray-200"></div>
        <div class="overflow-x-auto mt-5">
            <table class="table w-full table-">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        @forelse ($criteria_data as $criteria_name )
                        <th>{{ $criteria_name->name }}</th>
                        @empty
                        No Data
                        @endforelse
                        <th>Action</th>
                    </tr>
              </thead>
              <tbody>
                @forelse ($alternatives as $alternative)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $alternative->name }}</td>
                    @forelse ($alternative->criterias as $alternative_criteria)
                    <td>{{ $alternative_criteria->pivot->value }}</td>
                    @empty

                    @endforelse
                    <td><button type="button" wire:click="$emit('openModal', 'create-alternative', {{ json_encode(["alternative" => $alternative,"project" => $project->id]) }})" class="btn btn-xs btn-outline">edit</button></td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No Data</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>


