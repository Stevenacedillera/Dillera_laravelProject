<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Platform;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display the games dashboard
     */
    public function index(Request $request)
    {
        $totalGames = Game::count();
        $totalPlatforms = Platform::count();
        $platforms = Platform::latest()->get();
        
        // Get unique genres for filter
        $genres = Game::whereNotNull('genre')
            ->distinct()
            ->pluck('genre')
            ->filter()
            ->sort()
            ->values();
        
        // Calculate average release year
        $avgReleaseYear = Game::whereNotNull('release_year')->avg('release_year');
        $avgReleaseYear = $avgReleaseYear ? round($avgReleaseYear) : null;
        
        // Get most common genre
        $mostCommonGenre = Game::whereNotNull('genre')
            ->selectRaw('genre, count(*) as count')
            ->groupBy('genre')
            ->orderBy('count', 'desc')
            ->first();
        
        // Build query with filters
        $query = Game::with('platform');
        
        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('genre', 'like', "%{$search}%")
                  ->orWhere('developer', 'like', "%{$search}%")
                  ->orWhereHas('platform', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }
        
        // Genre filter
        if ($request->filled('genre')) {
            $query->where('genre', $request->genre);
        }
        
        // Platform filter
        if ($request->filled('platform_id')) {
            $query->where('platform_id', $request->platform_id);
        }
        
        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);
        
        $games = $query->get();

        return view('dashboard', compact(
            'totalGames',
            'totalPlatforms',
            'games',
            'platforms',
            'genres',
            'avgReleaseYear',
            'mostCommonGenre'
        ));
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

