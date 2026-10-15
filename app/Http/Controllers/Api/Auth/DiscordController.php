<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class DiscordController extends Controller
{
    /**
     * Redirecting the user to the Discord login page
     */
    public function redirectToDiscord()
    {
        return Socialite::driver('discord')->stateless()->redirect();
    }

    /**
     * Callback from Discord after login confirmation
     */
    public function handleDiscordCallback()
    {
        try {
            $discordUser = Socialite::driver('discord')->stateless()->user();

        
            $user = User::updateOrCreate([
                'email' => $discordUser->getEmail(),
            ], [
                'name' => $discordUser->getName() ?? $discordUser->getNickname(),
                'password' => bcrypt(Str::random(24)),
            ]);

        
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