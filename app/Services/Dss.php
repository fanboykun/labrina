<?php

namespace App\Services;

use App\Models\Project;
use App\Services\MooraService;
use App\Services\WaspasService;

class Dss
{
    public function operate(Project $project, array $data)
    {
        if ($project->type === 'Moora') {
            $result = $this->mooraOperator($data);
            return $result;
        }elseif($project->type === 'Waspas'){
            $result = $this->waspasOperator($data);
            return $result;
        }
    }

    public function mooraOperator(array $data)
    {
        $mooraService = new MooraService();
        $moora_result = $mooraService->execute($data);
        return $moora_result;
    }

    public function waspasOperator(array $data)
    {
        $waspasService = new WaspasService();
        $waspas_result = $waspasService->execute($data);
        return $waspas_result;
    }

}
