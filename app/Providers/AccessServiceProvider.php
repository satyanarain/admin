<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AccessServiceProvider extends ServiceProvider
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
            \App\Repositories\Permission\PermissionRepositoryContract::class,
            \App\Repositories\Permission\PermissionRepository::class
        );
         $this->app->bind(
            \App\Repositories\Donation\DonationRepositoryContract::class,
            \App\Repositories\Donation\DonationRepository::class
        );
         $this->app->bind(
            \App\Repositories\Notification\NotificationRepositoryContract::class,
            \App\Repositories\Notification\NotificationRepository::class
        );
        
       
        $this->app->bind(
            \App\Repositories\Role\RoleRepositoryContract::class,
            \App\Repositories\Role\RoleRepository::class
        );
        
        $this->app->bind(
            \App\Repositories\User\UserRepositoryContract::class,
            \App\Repositories\User\UserRepository::class
        );
        
        $this->app->bind(
            \App\Repositories\Setting\SettingRepositoryContract::class,
            \App\Repositories\Setting\SettingRepository::class
        );
            /*
        $this->app->bind(
            \App\Repositories\Torget\TorgetRepositoryContract::class,
            \App\Repositories\Torget\TorgetRepository::class
        );
        $this->app->bind(
            \App\Repositories\Trip\TripRepositoryContract::class,
            \App\Repositories\Trip\TripRepository::class
        );
        $this->app->bind(
            \App\Repositories\Fare\FareRepositoryContract::class,
            \App\Repositories\Fare\FareRepository::class
        );
        $this->app->bind(
            \App\Repositories\ConcessionFareSlab\ConcessionFareSlabRepositoryContract::class,
            \App\Repositories\ConcessionFareSlab\ConcessionFareSlabRepository::class
        );
        $this->app->bind(
            \App\Repositories\Concession\ConcessionRepositoryContract::class,
            \App\Repositories\Concession\ConcessionRepository::class
        );
        */
    }
}
