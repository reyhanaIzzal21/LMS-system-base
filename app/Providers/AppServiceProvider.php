<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Interfaces\CourseInterface;
use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Repositories\CourseRepository;
use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Interfaces\ModuleInterface;
use App\Contracts\Repositories\ModuleRepository;
use App\Contracts\Interfaces\SubModuleInterface;
use App\Contracts\Repositories\SubModuleRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(CourseInterface::class, CourseRepository::class);
        $this->app->bind(ModuleInterface::class, ModuleRepository::class);
        $this->app->bind(SubModuleInterface::class, SubModuleRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
