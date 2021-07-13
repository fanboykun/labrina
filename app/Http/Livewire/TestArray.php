<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class TestArray extends Component
{
    public function render()
    {
        // $array = ['products' => ['desk' => ['price' => 100]]];
        // $price = Arr::get($array, 'products.desk.price');
        // echo($price);
        //     echo("<br>");
        // $array = ['product' => ['name' => 'Desk', 'price' => 100]];
        // $contains = Arr::has($array, 'product.name');
        // echo($contains);
        //     echo("<br>");

        // $array = [100, 200, 300, 110];

        // $last = Arr::last($array, function ($value, $key) {
        //     return $value >= 150;
        // });
        // echo($last);
        // echo("<br>");
        // $array = ['name' => 'Desk', 'price' => 100];

        // $name = Arr::pull($array, 'name');
        // echo($name);

        $A1 = [5,2,5,3,3];
        $A2 = [1,1,4,1,3];
        $A3 = [4,1,4,1,1];
        $A4 = [2,1,5,1,3];
        $A5 = [4,1,4,1,3];

        $matrix = Arr::crossJoin([$A1],[$A2],[$A3],[$A4],[$A5]);
            $data = collect($matrix);
            echo($data);
        return view('livewire.test-array');
    }
}
