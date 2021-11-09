<div>
    {{-- <form method="POST"> --}}
        <div class="form-control">
            <label class="label">
                <span class="label-text">Alternative Name</span>
            </label>
            <input type="text" wire:model="altname" placeholder="alternative name" class="input input-success input-bordered">
            @error('altname')
            <label class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
            </label>
            @enderror
        </div>
        <div class="divider before:bg-gray-200 after:bg-gray-200 mt-5">Criteria</div>
        <div class="grid grid-cols-2 gap-4">
            @forelse ($criteria_data as $key => $criteria)
            <div class="form-control">
            <label class="label">
                <span class="label-text">{{ $criteria['name'] }}</span>
            </label>
            <input type="number" wire:model="criterias.{{ $key }}.value" placeholder="max value is {{ $criteria['max_value'] }}" id="value[{{ $key }}]['value']" class="input input-info input-bordered">
            @error('criterias.'.$key.'.value')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
                @enderror
            </div>
            @empty
            <div class="col-span-2">No Criteria yet. please add criteria !!!</div>
            @endforelse
        </div>
        <div class="modal-action">
            <label for="my-modal-2" wire:click="$emit('closeModal')" class="btn btn-sm">Close</label>
            <button for="my-modal-2" role="button" type="submit" wire:click.prevent="saveAlternative()" class="btn btn-primary btn-sm">Save</button>
        </div>
    {{-- </form> --}}
</div>
