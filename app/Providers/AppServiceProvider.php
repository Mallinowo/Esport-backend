<?php

namespace App\Providers;

use Laravel\Socialite\Facades\Socialite;
use SocialiteProviders\Discord\Provider as DiscordProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        
    }

    public function boot(): void
    {
      
    }
}
