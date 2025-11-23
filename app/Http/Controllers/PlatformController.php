<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    /**
     * Display a listing of platforms
     */
    public function index()
    {
        $platforms = Platform::withCount('games')->latest()->get();

        return view('platforms', compact('platforms'));
    }

    /**
     * Store a newly created platform
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:platforms,name',
            'manufacturer' => 'nullable|string|max:255',
            'release_year' => 'nullable|integer|min:1950|max:' . (date('Y') + 10),
            'description' => 'nullable|string|max:1000',
        ]);

        Platform::create($validated);

        return redirect()->route('platforms.index')->with('success', 'Platform created successfully!');
    }

    /**
     * Update the specified platform
     */
    public function update(Request $request, Platform $platform)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:platforms,name,' . $platform->id,
            'manufacturer' => 'nullable|string|max:255',
            'release_year' => 'nullable|integer|min:1950|max:' . (date('Y') + 10),
            'description' => 'nullable|string|max:1000',
        ]);

        $platform->update($validated);

        return redirect()->route('platforms.index')->with('success', 'Platform updated successfully!');
    }

    /**
     * Remove the specified platform
     */
    public function destroy(Platform $platform)
    {
        $platform->delete();

        return redirect()->route('platforms.index')->with('success', 'Platform deleted successfully!');
    }
}

