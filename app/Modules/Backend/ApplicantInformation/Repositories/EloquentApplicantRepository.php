<?php


namespace App\Modules\Backend\ApplicantInformation\Repositories;

use App\Models\ApplicantDetails;
use App\Modules\Backend\ApplicantInformation\Repositories\ApplicantRepository as RepositoriesApplicantRepository;
use App\Modules\Framework\RepositoryImplementation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentApplicantRepository extends RepositoryImplementation implements RepositoriesApplicantRepository
{


    public function getModel()
    {
        return new ApplicantDetails();
    }

    /**
     * @param Request $request
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getPaginatedList(Request $request, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));

        $query = $this->getModel()->newQuery();
        $filteredQuery = (new ApplicantFilter($request))->apply($query);

        return $filteredQuery->latest()->paginate($limit, $columns);
    }
}
