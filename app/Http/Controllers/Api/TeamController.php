<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\TeamInvitation;
use Illuminate\Support\Str;

class TeamController extends Controller
{
  public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:teams,name',
            'tag' => 'required|string|max:10|unique:teams,tag',
            'logo_url' => 'nullable|string|url',
        ]);

        $user = $request->user();

        
        $team = Team::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'tag' => strtoupper($validated['tag']),
            'logo_url' => $validated['logo_url'] ?? null,
            'user_id' => $user->id,
        ]);

        
        $team->members()->attach($user->id, ['role' => 'captain']);

        return response()->json([
            'message' => 'The team has been successfully created!',
            'team' => $team->load('captain', 'members'),
        ], 201);
    }
    public function invite(Request $request, Team $team)
    {
        
        if ($team->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Only the captain can send invitations.'], 403);
        }

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $targetUserId = $validated['user_id'];

        if ($targetUserId === $request->user()->id) {
            return response()->json(['message' => 'You cannot invite yourself.'], 422);
        }

        if ($team->members()->where('user_id', $targetUserId)->exists()) {
            return response()->json(['message' => 'The user is already a member of this team.'], 422);
        }

        $invitation = TeamInvitation::create([
            'team_id' => $team->id,
            'user_id' => $targetUserId,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'The invitation has been sent successfully!',
            'invitation' => $invitation,
        ], 201);
    }
}
