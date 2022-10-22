<?php


namespace App\Modules\Backend\ApplicantInformation\Repositories;

use App\Models\ApplicantDetails;
use App\Modules\Backend\ApplicantInformation\Repositories\ApplicantRepository as RepositoriesApplicantRepository;
use App\Modules\Framework\RepositoryImplementation;

class EloquentApplicantRepository extends RepositoryImplementation implements RepositoriesApplicantRepository
{
    public function getModel()
    {
        return new ApplicantDetails();
    }
}
