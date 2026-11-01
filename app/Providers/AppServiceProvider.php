<?php

namespace App\Providers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Event;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Discord\DiscordExtendSocialite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        
    }

    public function boot(): void
    {
     Event::listen(
            SocialiteWasCalled::class,
            DiscordExtendSocialite::class . '@handle'
        );
    }
}
