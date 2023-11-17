<?php
// app/Filters/ApplicantFilter.php

namespace App\Filters;

class ApplicantDetailsFilter
{
    public function applyFilters($query, $filters)
    {


        if (isset($filters['full_name'])) {
            $query->where('full_name', 'like', '%' . $filters['full_name'] . '%');
        }

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }
    }
}
