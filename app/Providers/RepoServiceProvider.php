<?php

namespace App\Providers;

use App\Repository\TeacherRepository;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);

        
        
    }

            

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}