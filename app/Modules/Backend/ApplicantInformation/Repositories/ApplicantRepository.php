<?php

namespace App\Modules\Backend\ApplicantInformation\Repositories;

use App\Modules\Framework\Repository;
use Illuminate\Http\Request;

interface ApplicantRepository extends  Repository
{

    public function getPaginatedList(Request $request, array $columns = array('*'));
}
