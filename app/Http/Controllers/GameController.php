<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Platform;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of games
     */
    public function index()
    {
        $games = Game::with('platform')->latest()->get();
        $platforms = Platform::orderBy('name')->get();
        $totalGames = Game::count();
        $totalPlatforms = Platform::count();

        return view('dashboard', compact('games', 'platforms', 'totalGames', 'totalPlatforms'));
    }

    /**
     * Store a newly created game
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'release_year' => 'nullable|integer|min:1950|max:' . (date('Y') + 10),
            'developer' => 'nullable|string|max:255',
            'platform_id' => 'nullable|exists:platforms,id',
            'description' => 'nullable|string|max:1000',
        ]);

        Game::create($validated);

        return redirect()->route('dashboard')->with('success', 'Game created successfully!');
    }

    /**
     * Update the specified game
     */
    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'release_year' => 'nullable|integer|min:1950|max:' . (date('Y') + 10),
            'developer' => 'nullable|string|max:255',
            'platform_id' => 'nullable|exists:platforms,id',
            'description' => 'nullable|string|max:1000',
        ]);

        $game->update($validated);

        return redirect()->route('dashboard')->with('success', 'Game updated successfully!');
    }

    /**
     * Remove the specified game
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('dashboard')->with('success', 'Game deleted successfully!');
    }
}

