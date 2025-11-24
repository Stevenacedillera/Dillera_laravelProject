<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Game Collection - Manage Your Gaming Library</title>
        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 dark:from-neutral-950 dark:via-neutral-900 dark:to-neutral-950 min-h-screen antialiased">
        <header class="w-full max-w-7xl mx-auto px-6 lg:px-8 py-6">
            @if (Route::has('login'))
                <nav class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <x-app-logo-icon class="h-8 w-8 fill-current text-blue-600 dark:text-blue-400" />
                        <span class="text-xl font-bold text-neutral-900 dark:text-neutral-100">Game Collection</span>
                    </div>
                    <div class="flex items-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-block px-5 py-2 text-neutral-700 dark:text-neutral-300 hover:text-blue-600 dark:hover:text-blue-400 text-sm font-medium transition-colors">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-block px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
                                    Get Started
                                </a>
                            @endif
                        @endauth
                    </div>
                </nav>
            @endif
        </header>

        <main class="max-w-7xl mx-auto px-6 lg:px-8 py-12 lg:py-20">
            <!-- Hero Section -->
            <div class="text-center mb-16 lg:mb-24">
                <h1 class="text-5xl lg:text-7xl font-bold text-neutral-900 dark:text-neutral-100 mb-6 leading-tight">
                    Manage Your
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Game Collection</span>
                </h1>
                <p class="text-xl lg:text-2xl text-neutral-600 dark:text-neutral-400 mb-8 max-w-3xl mx-auto">
                    Organize, track, and showcase your gaming library. Add games, manage platforms, and build your ultimate collection all in one place.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-block px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white rounded-lg text-lg font-semibold transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                            Go to Dashboard
                        </a>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-block px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white rounded-lg text-lg font-semibold transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                                Start Free
                            </a>
                        @endif
                        <a href="{{ route('login') }}" class="inline-block px-8 py-4 bg-white dark:bg-neutral-800 border-2 border-neutral-300 dark:border-neutral-700 hover:border-blue-500 dark:hover:border-blue-500 text-neutral-900 dark:text-neutral-100 rounded-lg text-lg font-semibold transition-all">
                            Sign In
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-3 gap-8 lg:gap-12 mb-16 lg:mb-24">
                <!-- Feature 1 -->
                <div class="bg-white dark:bg-neutral-800 rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-neutral-900 dark:text-neutral-100 mb-3">Track Your Games</h3>
                    <p class="text-neutral-600 dark:text-neutral-400">
                        Add and organize all your games with details like genre, release year, developer, and platform information.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white dark:bg-neutral-800 rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-neutral-900 dark:text-neutral-100 mb-3">Manage Platforms</h3>
                    <p class="text-neutral-600 dark:text-neutral-400">
                        Organize games by platform. Track multiple gaming systems and see which games belong to which platform.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white dark:bg-neutral-800 rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-pink-600 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-neutral-900 dark:text-neutral-100 mb-3">View Statistics</h3>
                    <p class="text-neutral-600 dark:text-neutral-400">
                        Get insights into your collection with stats on total games, platforms, genres, and more.
                    </p>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-12 lg:p-16 text-center text-white shadow-2xl">
                <h2 class="text-3xl lg:text-4xl font-bold mb-4">Ready to Build Your Collection?</h2>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Join thousands of gamers organizing their libraries. Start tracking your games today!
                </p>
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-block px-8 py-4 bg-white text-blue-600 rounded-lg text-lg font-semibold hover:bg-blue-50 transition-colors shadow-lg">
                        View Your Dashboard
                    </a>
                @else
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-block px-8 py-4 bg-white text-blue-600 rounded-lg text-lg font-semibold hover:bg-blue-50 transition-colors shadow-lg">
                            Create Your Account
                        </a>
                    @endif
                @endauth
            </div>
        </main>

        <!-- Footer -->
        <footer class="max-w-7xl mx-auto px-6 lg:px-8 py-8 border-t border-neutral-200 dark:border-neutral-800 mt-16">
            <div class="text-center text-neutral-600 dark:text-neutral-400 text-sm">
                <p>&copy; {{ date('Y') }} Game Collection. Built with Laravel & Livewire.</p>
            </div>
        </footer>
    </body>
</html>
