<?php

namespace App\Providers;

use App\Repositories\Eloquent\{
    UserRepository,
    CourseRepository,
    LessonRepository,
    AdminRepository,
    ModuleRepository
};
use App\Repositories\{
    UserRepositoryInterface,
    CourseRepositoryInterface,
    LessonRepositoryInterface,
    AdminRepositoryInterface,
    ModuleRepositoryInterface
};
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
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class,
        );

        $this->app->singleton(
            AdminRepositoryInterface::class,
            AdminRepository::class,
        );

        $this->app->singleton(
            CourseRepositoryInterface::class,
            CourseRepository::class,
        );

        $this->app->singleton(
            ModuleRepositoryInterface::class,
            ModuleRepository::class,
        );


        $this->app->singleton(
            LessonRepositoryInterface::class,
            LessonRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
