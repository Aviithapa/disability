<?php

namespace App\Providers;

use App\Modules\Backend\ApplicantInformation\Repositories\ApplicantRepository as RepositoriesApplicantRepository;
use App\Modules\Backend\ApplicantInformation\Repositories\EloquentApplicantRepository;
use App\Modules\Backend\DisabilityType\Repositories\DisabilityTypeRepository;
use App\Modules\Backend\DisabilityType\Repositories\EloquentDisabilityTypeRepository;
use App\Modules\Backend\Employee\Repositories\EloquentEmployeeRepository;
use App\Modules\Backend\Employee\Repositories\EmployeeRepository;
use App\Modules\Backend\Logs\EloquentLogsRepository;
use App\Modules\Backend\Logs\LogsRepository;
use Illuminate\Support\ServiceProvider;

class DependencyInjectionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            RepositoriesApplicantRepository::class,
            EloquentApplicantRepository::class
        );

        $this->app->bind(
            LogsRepository::class,
            EloquentLogsRepository::class
        );

        $this->app->bind(
            DisabilityTypeRepository::class,
            EloquentDisabilityTypeRepository::class
        );

        $this->app->bind(
            EmployeeRepository::class,
            EloquentEmployeeRepository::class
        );
    }
}
