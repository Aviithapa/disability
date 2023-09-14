<?php


namespace App\Modules\Backend\Logs;

use App\Models\logs;
use App\Modules\Framework\RepositoryImplementation;

class EloquentLogsRepository extends RepositoryImplementation implements LogsRepository
{
    public function getModel()
    {
        return new logs();
    }

    public function getAll()
    {
        return $this->getModel()->get();
    }
}
