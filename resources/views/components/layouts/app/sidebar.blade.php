<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <!-- Logo Section -->
            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
                <span class="hidden text-sm font-semibold text-neutral-700 dark:text-neutral-200 lg:block">
                    Game Collection
                </span>
            </a>

            <!-- Main Navigation -->
            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Collection')" class="grid">
                    <flux:navlist.item icon="squares-2x2" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="server" :href="route('platforms.index')" :current="request()->routeIs('platforms.*')" wire:navigate>
                        {{ __('Platforms') }}
                    </flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group :heading="__('Settings')" class="grid">
                    <flux:navlist.item icon="user-circle" :href="route('settings.profile')" :current="request()->routeIs('settings.profile')" wire:navigate>
                        {{ __('Profile') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="key" :href="route('settings.password')" :current="request()->routeIs('settings.password')" wire:navigate>
                        {{ __('Password') }}
                    </flux:navlist.item>
                    <flux:navlist.item icon="paint-brush" :href="route('settings.appearance')" :current="request()->routeIs('settings.appearance')" wire:navigate>
                        {{ __('Appearance') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <!-- Quick Stats Section -->
            @if(auth()->check())
                @php
                    try {
                        $totalGames = \App\Models\Game::count();
                        $totalPlatforms = \App\Models\Platform::count();
                    } catch (\Exception $e) {
                        $totalGames = 0;
                        $totalPlatforms = 0;
                    }
                @endphp
                <div class="hidden rounded-lg border border-neutral-200 bg-gradient-to-br from-blue-50 to-purple-50 p-4 dark:border-neutral-700 dark:from-blue-900/20 dark:to-purple-900/20 lg:block">
                    <div class="flex items-center gap-2">
                        <div class="rounded-lg bg-blue-100 p-2 dark:bg-blue-900/40">
                            <svg class="h-5 w-5 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-xs font-medium text-neutral-700 dark:text-neutral-300">Your Collection</p>
                            <div class="mt-1 flex gap-3 text-xs text-neutral-600 dark:text-neutral-400">
                                <span class="font-semibold text-blue-600 dark:text-blue-400">{{ $totalGames }}</span>
                                <span>games</span>
                                <span class="mx-1">•</span>
                                <span class="font-semibold text-purple-600 dark:text-purple-400">{{ $totalPlatforms }}</span>
                                <span>platforms</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <flux:spacer />

            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('dashboard')" icon="squares-2x2" wire:navigate>{{ __('Dashboard') }}</flux:menu.item>
                        <flux:menu.item :href="route('platforms.index')" icon="server" wire:navigate>{{ __('Platforms') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="user-circle" wire:navigate>{{ __('Profile Settings') }}</flux:menu.item>
                        <flux:menu.item :href="route('settings.password')" icon="key" wire:navigate>{{ __('Change Password') }}</flux:menu.item>
                        <flux:menu.item :href="route('settings.appearance')" icon="paint-brush" wire:navigate>{{ __('Appearance') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('dashboard')" icon="squares-2x2" wire:navigate>{{ __('Dashboard') }}</flux:menu.item>
                        <flux:menu.item :href="route('platforms.index')" icon="server" wire:navigate>{{ __('Platforms') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="user-circle" wire:navigate>{{ __('Profile Settings') }}</flux:menu.item>
                        <flux:menu.item :href="route('settings.password')" icon="key" wire:navigate>{{ __('Change Password') }}</flux:menu.item>
                        <flux:menu.item :href="route('settings.appearance')" icon="paint-brush" wire:navigate>{{ __('Appearance') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
