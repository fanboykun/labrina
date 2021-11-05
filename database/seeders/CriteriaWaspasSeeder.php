<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class CriteriaWaspasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $raw_data = [
            ['name' => 'Kedisiplinan','c_code' => 'C1', 'weight' => 0.25, 'is_cost' => 0],
            ['name' => 'Masa Kerja', 'c_code' => 'C2', 'weight' => 0.15, 'is_cost' => 0],
            ['name' => 'Kompetensi Keahlian', 'c_code' => 'C3', 'weight' => 0.25, 'is_cost' => 0],
            ['name' => 'Kompetensi Kepribadian', 'c_code' => 'C4', 'weight' => 0.20, 'is_cost' => 0],
            ['name' => 'Kompetensi Sosial', 'c_code' => 'C5', 'weight' => 0.15, 'is_cost' => 0]
        ];
        $data = collect($raw_data);
        $waspas = Project::where('name', 'Waspas')->first();

        foreach ($data as $item) {
            $waspas->criterias()->create($item);
        }
    }
}
