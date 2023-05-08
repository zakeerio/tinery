<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
    * @var $repositories
    */
    protected $repositories = [
        \App\Interfaces\AdminInterface::class=>\App\Repositories\AdminRepository::class,
        \App\Interfaces\PermissionInterface::class=>\App\Repositories\PermissionRepository::class,
        \App\Interfaces\RoleInterface::class=>\App\Repositories\RoleRepository::class,
        \App\Interfaces\ProductInterface::class=>\App\Repositories\ProductRepository::class,
        \App\Interfaces\CategoryInterface::class=>\App\Repositories\CategoryRepository::class,

    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        \Log::info("Req=Providers/RepositoryServiceProvider@register Called");

        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
