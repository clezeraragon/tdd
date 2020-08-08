<?php


namespace App\Http\Controllers\Infection;


use App\Http\Controllers\Controller;
use App\Http\Requests\Infection\InfectionCreateRequest;
use App\Http\Requests\Infection\InfectionUpdateRequest;
use App\Services\ServiceInfection;

class InfectionController extends Controller
{
    private ServiceInfection $serviceInfection;

    public function __construct(ServiceInfection $serviceInfection)
    {
        $this->serviceInfection = $serviceInfection;
    }

    public function store(InfectionCreateRequest $infectionCreateRequest)
    {
      return  $this->serviceInfection->store($infectionCreateRequest);
    }

    public function update(InfectionUpdateRequest $infectionUpdateRequest)
    {
        return $this->serviceInfection->update($infectionUpdateRequest);
    }
}
