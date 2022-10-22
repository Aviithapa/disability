<?php

namespace App\Providers;

use App\Modules\Backend\ApplicantInformation\Repositories\ApplicantRepository as RepositoriesApplicantRepository;
use App\Modules\Backend\ApplicantInformation\Repositories\EloquentApplicantRepository;
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

       
    }
}
