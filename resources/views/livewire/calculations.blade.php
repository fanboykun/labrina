<x-jet-button wire:click="calculate">{{ __('Calculate') }}</x-jet-button>
<div>
    @foreach ($alternativeses as $key => $alternative)
    <div>{{ $loop->iteration }}
        {{ $alternative->name }}
        @foreach ($alternative->criterias as $k => $criteria)
        <ul>
                <ul>
                    <li>Criteria Code : {{ $criteria->c_code }}</li>
                    <li>Normalisations = {{ $value = $criteria->pivot->value}} / {{ $max_value = $criteria->max_value }} = {{ $normalisation = $value / $max_value }}</li>
                    <li>Calculations = 0,5 * ({{ $normalisation }} * {{ $criteria->weight / 100 }}) + 0,5 * ({{ $normalisation }} ^ {{ $criteria->weight / 100 }}) </li>
                        <ul>
                            <li>{{ $calculation1 = 0.5 * (($normalisation * ($criteria->weight / 100))) }} + {{ $calculation2 = 0.5 * (pow($normalisation, ($criteria->weight / 100))) }}</li>
                        </ul>
                        <li></li>
                    <li>Result = {{ $result =+ ( $calculation1 + $calculation2) }}</li>
                </ul>

        </ul>
        @endforeach
        {{-- <ul>Qi =  {{ $qi[] =+ $result }}</ul> --}}

    </div>
    @endforeach

</div>
