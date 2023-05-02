<?php

namespace App\Providers;

use App\Modules\Backend\SiteSetting\Repositories\EloquentSiteSettingRepository;
use App\Modules\Backend\SiteSetting\Repositories\SiteSettingRepository;
use App\Modules\Backend\Website\News\EloquentNewsRepository;
use App\Modules\Backend\Website\News\NewsRepository;
use App\Modules\Backend\Website\Post\Repositories\EloquentPostRepository;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        $this->app->bind(
            SiteSettingRepository::class,
            EloquentSiteSettingRepository::class
        );


        $this->app->bind(
            NewsRepository::class,
            EloquentNewsRepository::class
        );

        $this->app->bind(
            PostRepository::class,
            EloquentPostRepository::class
        );
    }
}
