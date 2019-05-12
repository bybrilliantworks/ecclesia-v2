<?php

namespace App\Providers;

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
         // Repositories
         $this->app->bind(
            'App\Repositories\Group\GroupRepositoryInterface',
            'App\Repositories\Group\GroupRepository'
        );

        $this->app->bind(
            'App\Repositories\User\UserRepositoryInterface',
            'App\Repositories\User\UserRepository'
        );

        $this->app->bind(
            'App\Repositories\Member\MemberRepositoryInterface',
            'App\Repositories\Member\MemberRepository'
        );

        $this->app->bind(
            'App\Repositories\Event\EventRepositoryInterface',
            'App\Repositories\Event\EventRepository'
        );

        // Services
        $this->app->bind(
            'App\Services\User\UserServiceInterface',
            'App\Services\User\UserService'
        );

        $this->app->bind(
            'App\Services\Member\MemberServiceInterface',
            'App\Services\Member\MemberService'
        );

        $this->app->bind(
            'App\Services\Event\EventServiceInterface',
            'App\Services\Event\EventService'
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
