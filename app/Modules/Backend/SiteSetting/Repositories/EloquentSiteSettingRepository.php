<?php


namespace App\Modules\Backend\SiteSetting\Repositories;

use App\Models\Website\SiteSetting;
use App\Modules\Framework\RepositoryImplementation;

class EloquentSiteSettingRepository extends RepositoryImplementation implements SiteSettingRepository
{

    public function getModel()
    {
        return new SiteSetting();
    }
}
