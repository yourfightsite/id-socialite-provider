<?php

namespace YourFightSite\Socialite;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Contracts\Factory;

class SocialiteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $config = $this->app['config']['services.yourfightsite'];

        $manager = $this->app->make(Factory::class);

        $manager->extend('yourfightsite', function ($app) use ($manager) {
            $config = $app['config']['services.yourfightsite'];

            return $manager->buildProvider(Provider::class, $config);
        });
    }
}
