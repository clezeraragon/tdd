<?php


namespace App\Http\Controllers\Pathology;


use App\Http\Controllers\Controller;
use App\Http\Requests\Pathology\PathologyCreateRequest;
use App\Http\Requests\Pathology\PathologyUpdateRequest;
use App\Services\ServicePathology;

class PathologyController extends Controller
{

    private ServicePathology $servicePathology;

    public function __construct(ServicePathology $servicePathology)
    {
        $this->servicePathology = $servicePathology;
    }

    public function store(PathologyCreateRequest $pathologyCreateRequest)
    {
        return $this->servicePathology->store($pathologyCreateRequest);
    }

    public function update(PathologyUpdateRequest $pathologyUpdateRequest,$pathology)
    {
        return $this->servicePathology->update($pathologyUpdateRequest,$pathology);
    }

    public function destroy($pathology)
    {
        return $this->servicePathology->destroy($pathology);
    }
}
