<x-layouts.app :title="__('Games Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Success Message -->
        @if (session('success'))
            <div class="rounded-lg bg-green-100 p-4 text-sm text-green-700 dark:bg-green-900/30 dark:text-green-400" role="alert">
                <div class="flex items-center gap-2">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Enhanced Stats Cards -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-4">
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-gradient-to-br from-blue-50 to-blue-100 p-6 dark:from-blue-900/20 dark:to-blue-800/10 dark:border-blue-800/50">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-blue-700 dark:text-blue-300">Total Games</p>
                        <h3 class="mt-2 text-3xl font-bold text-blue-900 dark:text-blue-100">{{ $totalGames ?? 0 }}</h3>
                        <p class="mt-1 text-xs text-blue-600 dark:text-blue-400">in collection</p>
                    </div>
                    <div class="rounded-full bg-blue-200 p-3 dark:bg-blue-900/40">
                        <svg class="h-8 w-8 text-blue-700 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-gradient-to-br from-green-50 to-green-100 p-6 dark:from-green-900/20 dark:to-green-800/10 dark:border-green-800/50">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-green-700 dark:text-green-300">Platforms</p>
                        <h3 class="mt-2 text-3xl font-bold text-green-900 dark:text-green-100">{{ $totalPlatforms ?? 0 }}</h3>
                        <p class="mt-1 text-xs text-green-600 dark:text-green-400">available</p>
                    </div>
                    <div class="rounded-full bg-green-200 p-3 dark:bg-green-900/40">
                        <svg class="h-8 w-8 text-green-700 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-gradient-to-br from-purple-50 to-purple-100 p-6 dark:from-purple-900/20 dark:to-purple-800/10 dark:border-purple-800/50">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-purple-700 dark:text-purple-300">Avg. Release Year</p>
                        <h3 class="mt-2 text-3xl font-bold text-purple-900 dark:text-purple-100">{{ $avgReleaseYear ?? 'N/A' }}</h3>
                        <p class="mt-1 text-xs text-purple-600 dark:text-purple-400">across collection</p>
                    </div>
                    <div class="rounded-full bg-purple-200 p-3 dark:bg-purple-900/40">
                        <svg class="h-8 w-8 text-purple-700 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-gradient-to-br from-orange-50 to-orange-100 p-6 dark:from-orange-900/20 dark:to-orange-800/10 dark:border-orange-800/50">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-orange-700 dark:text-orange-300">Top Genre</p>
                        <h3 class="mt-2 text-lg font-bold text-orange-900 dark:text-orange-100 line-clamp-1">
                            {{ $mostCommonGenre->genre ?? 'N/A' }}
                        </h3>
                        @if($mostCommonGenre)
                            <p class="mt-1 text-xs text-orange-600 dark:text-orange-400">{{ $mostCommonGenre->count }} games</p>
                        @endif
                    </div>
                    <div class="rounded-full bg-orange-200 p-3 dark:bg-orange-900/40">
                        <svg class="h-8 w-8 text-orange-700 dark:text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex flex-col gap-4 lg:flex-row">
            <!-- Filters and Search Panel -->
            <div class="w-full lg:w-80">
                <div class="rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-800">
                    <h3 class="mb-4 text-sm font-semibold text-neutral-900 dark:text-neutral-100">Search & Filters</h3>
                    <form method="GET" action="{{ route('dashboard') }}" class="space-y-4">
                        <!-- Search -->
                        <div>
                            <label class="mb-2 block text-xs font-medium text-neutral-700 dark:text-neutral-300">Search</label>
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search games..." class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 pl-10 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-100">
                                <svg class="absolute left-3 top-2.5 h-5 w-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Genre Filter -->
                        @if($genres->count() > 0)
                        <div>
                            <label class="mb-2 block text-xs font-medium text-neutral-700 dark:text-neutral-300">Genre</label>
                            <select name="genre" class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-100">
                                <option value="">All Genres</option>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>{{ $genre }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <!-- Platform Filter -->
                        <div>
                            <label class="mb-2 block text-xs font-medium text-neutral-700 dark:text-neutral-300">Platform</label>
                            <select name="platform_id" class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-100">
                                <option value="">All Platforms</option>
                                @foreach($platforms ?? [] as $platform)
                                    <option value="{{ $platform->id }}" {{ request('platform_id') == $platform->id ? 'selected' : '' }}>
                                        {{ $platform->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sort -->
                        <div>
                            <label class="mb-2 block text-xs font-medium text-neutral-700 dark:text-neutral-300">Sort By</label>
                            <div class="grid grid-cols-2 gap-2">
                                <select name="sort_by" class="rounded-lg border border-neutral-300 bg-white px-3 py-2 text-xs focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-100">
                                    <option value="created_at" {{ request('sort_by', 'created_at') == 'created_at' ? 'selected' : '' }}>Date</option>
                                    <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>Title</option>
                                    <option value="release_year" {{ request('sort_by') == 'release_year' ? 'selected' : '' }}>Year</option>
                                    <option value="genre" {{ request('sort_by') == 'genre' ? 'selected' : '' }}>Genre</option>
                                </select>
                                <select name="sort_order" class="rounded-lg border border-neutral-300 bg-white px-3 py-2 text-xs focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-100">
                                    <option value="desc" {{ request('sort_order', 'desc') == 'desc' ? 'selected' : '' }}>Desc</option>
                                    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Asc</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <button type="submit" class="flex-1 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-700">Apply</button>
                            <a href="{{ route('dashboard') }}" class="rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-50 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-100">Reset</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Games Content Area -->
            <div class="flex-1">
                <div class="relative h-full overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
                    <div class="flex h-full flex-col">
                        <!-- Header with Add Game Button -->
                        <div class="flex items-center justify-between border-b border-neutral-200 p-4 dark:border-neutral-700">
                            <div>
                                <h2 class="text-lg font-semibold text-neutral-900 dark:text-neutral-100">Games Collection</h2>
                                <p class="text-xs text-neutral-600 dark:text-neutral-400">
                                    {{ $games->count() }} {{ Str::plural('game', $games->count()) }} found
                                </p>
                            </div>
                            <button onclick="toggleForm()" class="flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-700">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span id="formToggleText">Add Game</span>
                            </button>
                        </div>

                        <!-- Collapsible Add Game Form -->
                        <div id="addGameForm" class="hidden border-b border-neutral-200 bg-neutral-50 p-6 dark:border-neutral-700 dark:bg-neutral-900/50">
                            <h3 class="mb-4 text-lg font-semibold text-neutral-900 dark:text-neutral-100">Add New Game</h3>
                            <form action="{{ route('games.store') }}" method="POST" class="grid gap-4 md:grid-cols-2">
                                @csrf
                                <div>
                                    <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Title <span class="text-red-500">*</span></label>
                                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Enter game title" required class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100">
                                    @error('title')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Genre</label>
                                    <input type="text" name="genre" value="{{ old('genre') }}" placeholder="e.g., Action, RPG, Puzzle" class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100">
                                    @error('genre')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Release Year</label>
                                    <input type="number" name="release_year" value="{{ old('release_year') }}" placeholder="e.g., 2023" min="1950" max="{{ date('Y') + 10 }}" class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100">
                                    @error('release_year')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Developer</label>
                                    <input type="text" name="developer" value="{{ old('developer') }}" placeholder="Enter developer name" class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100">
                                    @error('developer')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Platform</label>
                                    <select name="platform_id" class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100">
                                        <option value="">Select Platform (Optional)</option>
                                        @foreach($platforms ?? [] as $platform)
                                            <option value="{{ $platform->id }}" {{ old('platform_id') == $platform->id ? 'selected' : '' }}>
                                                {{ $platform->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('platform_id')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Description</label>
                                    <textarea name="description" rows="3" placeholder="Enter game description" class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-100">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <button type="submit" class="rounded-lg bg-blue-600 px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-700">Add Game</button>
                                </div>
                            </form>
                        </div>

                        <!-- Games List Table -->
                        <div class="flex-1 overflow-auto p-4">
                            @if($games->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="w-full min-w-full">
                                    <thead>
                                        <tr class="border-b border-neutral-200 bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-900/50">
                                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-neutral-700 dark:text-neutral-300">#</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-neutral-700 dark:text-neutral-300">Title</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-neutral-700 dark:text-neutral-300">Genre</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-neutral-700 dark:text-neutral-300">Year</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-neutral-700 dark:text-neutral-300">Developer</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-neutral-700 dark:text-neutral-300">Platform</th>
                                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-neutral-700 dark:text-neutral-300">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                                        @foreach($games as $game)
                                        <tr class="transition-colors hover:bg-neutral-50 dark:hover:bg-neutral-800/50">
                                            <td class="px-4 py-4 text-sm text-neutral-600 dark:text-neutral-400">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-4">
                                                <div class="text-sm font-semibold text-neutral-900 dark:text-neutral-100">{{ $game->title }}</div>
                                                @if($game->description)
                                                    <div class="mt-1 text-xs text-neutral-500 dark:text-neutral-500 line-clamp-1">{{ Str::limit($game->description, 50) }}</div>
                                                @endif
                                            </td>
                                            <td class="px-4 py-4">
                                                @if($game->genre)
                                                    <span class="inline-flex rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                                                        {{ $game->genre }}
                                                    </span>
                                                @else
                                                    <span class="text-xs text-neutral-400">N/A</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-4 text-sm text-neutral-600 dark:text-neutral-400">
                                                @if($game->release_year)
                                                    <span class="inline-flex items-center gap-1">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                        {{ $game->release_year }}
                                                    </span>
                                                @else
                                                    <span class="text-xs text-neutral-400">N/A</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-4 text-sm text-neutral-600 dark:text-neutral-400">{{ $game->developer ?? 'N/A' }}</td>
                                            <td class="px-4 py-4">
                                                @if($game->platform)
                                                    <span class="inline-flex items-center rounded-md bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-300">
                                                        {{ $game->platform->name }}
                                                    </span>
                                                @else
                                                    <span class="text-xs text-neutral-400">N/A</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-4">
                                                <div class="flex items-center gap-2">
                                                    <button onclick="openEditModal({{ $game->id }}, '{{ addslashes($game->title) }}', '{{ addslashes($game->genre ?? '') }}', '{{ $game->release_year ?? '' }}', '{{ addslashes($game->developer ?? '') }}', '{{ $game->platform_id ?? '' }}', '{{ addslashes($game->description ?? '') }}')" class="rounded-lg bg-blue-50 px-3 py-1.5 text-xs font-medium text-blue-700 transition-colors hover:bg-blue-100 dark:bg-blue-900/30 dark:text-blue-300 dark:hover:bg-blue-900/50">
                                                        Edit
                                                    </button>
                                                    <form method="POST" action="{{ route('games.destroy', $game->id) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this game?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="rounded-lg bg-red-50 px-3 py-1.5 text-xs font-medium text-red-700 transition-colors hover:bg-red-100 dark:bg-red-900/30 dark:text-red-300 dark:hover:bg-red-900/50">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="flex flex-col items-center justify-center py-12 text-center">
                                <svg class="h-16 w-16 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <p class="mt-4 text-sm font-medium text-neutral-900 dark:text-neutral-100">No games found</p>
                                <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">
                                    @if(request()->hasAny(['search', 'genre', 'platform_id']))
                                        Try adjusting your filters
                                    @else
                                        Add your first game to get started!
                                    @endif
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Game Modal -->
    <div id="editModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
        <div class="relative w-full max-w-2xl rounded-xl bg-white p-6 shadow-2xl dark:bg-neutral-800">
            <button onclick="closeEditModal()" class="absolute right-4 top-4 rounded-lg p-1 text-neutral-400 transition-colors hover:bg-neutral-100 hover:text-neutral-600 dark:hover:bg-neutral-700 dark:hover:text-neutral-300">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="mb-6 text-xl font-semibold text-neutral-900 dark:text-neutral-100">Edit Game</h2>

            <form id="editForm" method="POST" class="grid gap-4 md:grid-cols-2">
                @csrf
                @method('PUT')

                <div>
                    <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Title <span class="text-red-500">*</span></label>
                    <input type="text" id="edit_title" name="title" required class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-100">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Genre</label>
                    <input type="text" id="edit_genre" name="genre" class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-100">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Release Year</label>
                    <input type="number" id="edit_release_year" name="release_year" min="1950" max="{{ date('Y') + 10 }}" class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-100">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Developer</label>
                    <input type="text" id="edit_developer" name="developer" class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-100">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Platform</label>
                    <select id="edit_platform_id" name="platform_id" class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-100">
                        <option value="">Select Platform (Optional)</option>
                        @foreach($platforms ?? [] as $platform)
                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-medium text-neutral-700 dark:text-neutral-300">Description</label>
                    <textarea id="edit_description" name="description" rows="3" class="w-full rounded-lg border border-neutral-300 bg-white px-4 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-100"></textarea>
                </div>

                <div class="md:col-span-2 flex gap-3">
                    <button type="submit" class="rounded-lg bg-blue-600 px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-700">Update Game</button>
                    <button type="button" onclick="closeEditModal()" class="rounded-lg border border-neutral-300 bg-white px-6 py-2 text-sm font-medium text-neutral-700 transition-colors hover:bg-neutral-50 dark:border-neutral-600 dark:bg-neutral-900 dark:text-neutral-100 dark:hover:bg-neutral-700">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleForm() {
            const form = document.getElementById('addGameForm');
            const button = document.getElementById('formToggleText');
            form.classList.toggle('hidden');
            button.textContent = form.classList.contains('hidden') ? 'Add Game' : 'Hide Form';
        }

        function openEditModal(id, title, genre, releaseYear, developer, platformId, description) {
            document.getElementById('editForm').action = '{{ url("games") }}/' + id;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_genre').value = genre || '';
            document.getElementById('edit_release_year').value = releaseYear || '';
            document.getElementById('edit_developer').value = developer || '';
            document.getElementById('edit_platform_id').value = platformId || '';
            document.getElementById('edit_description').value = description || '';
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }

        // Close modal on outside click or ESC key
        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeEditModal();
            }
        });
    </script>
</x-layouts.app>
