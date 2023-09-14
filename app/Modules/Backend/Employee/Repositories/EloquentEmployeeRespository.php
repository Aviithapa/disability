<?php


namespace App\Modules\Backend\Employee\Repositories;

use App\Models\Employee;
use App\Modules\Framework\RepositoryImplementation;

class EloquentEmployeeRepository extends RepositoryImplementation implements EmployeeRepository
{
    public function getModel()
    {
        return new Employee();
    }
}
