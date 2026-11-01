<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $user = $this->resource;

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => method_exists($user, 'getRoleNames')
                ? $user->getRoleNames()->values()->all()
                : array_values((array) ($user->role ?? 'user')),
            'avatar_url' => $user->avatar_path ? Storage::url($user->avatar_path) : null,
            'has_discord' => ! empty($user->discord_id),
            'captain_of_team_ids' => method_exists($user, 'captainedTeams')
                ? $user->captainedTeams()->pluck('id')->all()
                : [],
        ];
    }
}