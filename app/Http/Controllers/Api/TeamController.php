<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
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
    // Если не совпало — отбиваем запрос с ошибкой доступа (HTTP 403)
    return response()->json(['message' => 'access denied'], 403);
}
}
}
