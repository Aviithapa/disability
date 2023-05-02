<?php

namespace App\Modules\Backend\Website\News;

use App\Models\Website\News;
use App\Modules\Framework\RepositoryImplementation;


class EloquentNewsRepository extends RepositoryImplementation implements NewsRepository
{
    protected $entity_name = "news";

    /**
     * Gets model for operation.
     *
     * @return mixed
     */
    public function getModel()
    {
        return new News();
    }
}
