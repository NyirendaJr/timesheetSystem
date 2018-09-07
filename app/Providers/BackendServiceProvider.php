<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('App\Repositories\Document\DocumentInterface', 'App\Repositories\Document\DocumentRepository');
      $this->app->bind('App\Repositories\User\UserInterface', 'App\Repositories\User\UserRepository');
      $this->app->bind('App\Repositories\Sent\SentInterface', 'App\Repositories\Sent\SentRepository');
    }
}
