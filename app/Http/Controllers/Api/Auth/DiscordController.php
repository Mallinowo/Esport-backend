<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Str;
use Exception;

class DiscordController extends Controller
{
    /**
     * Redirecting the user to the Discord login page
     */
    public function redirectToDiscord(): RedirectResponse
    {
       /** @var \Laravel\Socialite\Two\AbstractProvider $driver */
        $driver = Socialite::driver('discord');
        
        return $driver->stateless()
            ->redirectUrl(config('services.discord.redirect'))
            ->redirect();
    }

    /**
     * Callback from Discord after login confirmation
     */
    public function handleDiscordCallback(): JsonResponse
    {
        try {
            /** @var \Laravel\Socialite\Two\AbstractProvider $driver */
            $driver = Socialite::driver('discord');

            $discordUser = $driver->stateless()
                ->redirectUrl(config('services.discord.redirect'))
                ->user();

    
            $user = User::updateOrCreate(
                ['discord_id' => $discordUser->getId()],
                [
                    'name' => $discordUser->getName() ?? $discordUser->getNickname(),
                    'email' => $discordUser->getEmail(),
                    'avatar' => $discordUser->getAvatar(),
                    'password' => bcrypt(Str::random(24)),
                ]
            );

        
            $token = $user->createToken('discord-auth-token')->plainTextToken;

            return response()->json([
                'message' => 'Successfully authenticated via Discord',
                'user' => $user,
                'token' => $token,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to authenticate via Discord',
                'details' => $e->getMessage(),
            ], 400);
        }
    }
}