<?php


namespace App\Modules\Backend\DisabilityType\Repositories;

use App\Models\DisabilityType;
use App\Modules\Framework\RepositoryImplementation;

class EloquentDisabilityTypeRepository extends RepositoryImplementation implements DisabilityTypeRepository
{
    public function getModel()
    {
        return new DisabilityType();
    }
}
