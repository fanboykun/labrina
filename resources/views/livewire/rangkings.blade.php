<div>
    <div class="grid h-14 card place-items-center">
        <x-jet-section-title>
            <x-slot name="title">{{ __('The Result') }}</x-slot>
            <x-slot name="description">{{ __('This is the result after caluculated with the selected method, the rangking is based from sorted value') }}</x-slot>
        </x-jet-section-title>
    </div>
    <div class="px-4 py-5 mt-5 rounded my-5 bg-white sm:p-6 shadow">
            <div class="grid grid-cols-4 sm:grid-cols-2">
                <div class="col-start-1 col-end-2">
                    <x-jet-input wire:model.debounce.500ms="search" class="input input-secondary input-bordered" type="type" name="search" placeholder="search criteria by name" />
                </div>
                <div class="col-span-3 col-start-3 col-end-4 sm:flex flex justify-end">
                    <button type="button" class="btn btn-accent btn-active" role="button" aria-pressed="true">print the result</button>
                </div>
            </div>
        <div class="divider before:bg-gray-200 after:bg-gray-200"></div>
        <div class="overflow-x-auto mt-5">
            <table class="table w-full">
            <thead>
                <tr>
                <th>Rank</th>
                <th>Project Name</th>
                <th>Alternative Name</th>
                <th>Result Value</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rangkings  as $rangking)
                <tr>
                    <th>{{ $rangking->rank }}</th>
                    <td>{{ $project->name }}</td>
                    <td>{{ $rangking->alternative->name }}</td>
                    <td>{{ $rangking->result }}</td>
                </tr>
                @empty
                    Not Calculated Yet
                @endforelse
            </tbody>
            </table>
        </div>
    </div>
</div>
