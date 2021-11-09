<div>
    <div class="card shadow-2xl lg:card-side border-accent bordered p-5 mx-5">
        <div class="card-body">
          <h2 class="card-title">{{ $project->type }} Calculation</h2>
          <p>This should be the sort explanation of the method calculation</p>
          <div class="card-actions">
            <button type="button" wire:click="beginCalculate" class="btn btn-accent">Calculate and See The Result</button>
            <button class="btn btn-ghost">More info</button>
          </div>
        </div>
      </div>
    {{-- <button type="button" wire:click="beginCalculate" class="btn btn-outline btn-accent mx-5" {{ !$project->has('rangkings') ? '' : '' }}>Calculate</button> --}}
</div>
