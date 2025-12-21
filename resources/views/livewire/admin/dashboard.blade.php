<div class="flex h-full w-full flex-1 flex-col gap-6 p-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Welcome back! Here's what's happening.</p>
        </div>
        <div class="flex items-center gap-2">
            <span
                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-sm font-medium">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                Live Updates
            </span>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" wire:poll.5s>
        <!-- Today's Visits -->
        <div
            class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-800 p-6 shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 transition-all duration-300 hover:-translate-y-1">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full bg-white/10 blur-2xl"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-white/70 uppercase tracking-wider">Today</span>
                </div>
                <div class="text-4xl font-bold text-white mb-1">
                    {{ $visitors->where('created_at', '>=', \Carbon\Carbon::today())->count() }}
                </div>
                <p class="text-white/80 text-sm">Visits Today</p>
            </div>
        </div>

        <!-- This Week -->
        <div
            class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-600 to-purple-700 p-6 shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 transition-all duration-300 hover:-translate-y-1">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full bg-white/10 blur-2xl"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-white/70 uppercase tracking-wider">Weekly</span>
                </div>
                <div class="text-4xl font-bold text-white mb-1">
                    {{ $visitors->where('created_at', '>=', \Carbon\Carbon::now()->startOfWeek())->count() }}
                </div>
                <p class="text-white/80 text-sm">Visits This Week</p>
            </div>
        </div>

        <!-- Portfolio Views -->
        <div
            class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-purple-600 to-violet-700 p-6 shadow-lg shadow-purple-500/25 hover:shadow-purple-500/40 transition-all duration-300 hover:-translate-y-1">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full bg-white/10 blur-2xl"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-white/70 uppercase tracking-wider">Portfolio</span>
                </div>
                <div class="text-4xl font-bold text-white mb-1">
                    {{ $portfolio->count() }}
                </div>
                <p class="text-white/80 text-sm">Portfolio Views</p>
            </div>
        </div>

        <!-- This Month -->
        <div
            class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-700 to-indigo-900 p-6 shadow-lg shadow-blue-600/25 hover:shadow-blue-600/40 transition-all duration-300 hover:-translate-y-1">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full bg-white/10 blur-2xl"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-white/70 uppercase tracking-wider">Monthly</span>
                </div>
                <div class="text-4xl font-bold text-white mb-1">
                    {{ $visitors->whereBetween('created_at', [
                    \Carbon\Carbon::now()->startOfMonth(),
                    \Carbon\Carbon::now()->endOfMonth()
                    ])->count() }}
                </div>
                <p class="text-white/80 text-sm">Visits This Month</p>
            </div>
        </div>

        <!-- Last Month -->
        <div
            class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-700 to-blue-900 p-6 shadow-lg shadow-indigo-600/25 hover:shadow-indigo-600/40 transition-all duration-300 hover:-translate-y-1">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full bg-white/10 blur-2xl"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-white/70 uppercase tracking-wider">Last Month</span>
                </div>
                <div class="text-4xl font-bold text-white mb-1">
                    {{ $visitors->whereBetween('created_at', [
                    \Carbon\Carbon::now()->subMonthNoOverflow()->startOfMonth(),
                    \Carbon\Carbon::now()->subMonthNoOverflow()->endOfMonth()
                    ])->count() }}
                </div>
                <p class="text-white/80 text-sm">Visits Last Month</p>
            </div>
        </div>

        <!-- All Time -->
        <div
            class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-violet-600 to-purple-800 p-6 shadow-lg shadow-violet-500/25 hover:shadow-violet-500/40 transition-all duration-300 hover:-translate-y-1">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 rounded-full bg-white/10 blur-2xl"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-white/70 uppercase tracking-wider">All Time</span>
                </div>
                <div class="text-4xl font-bold text-white mb-1">
                    {{ $visitors->count() }}
                </div>
                <p class="text-white/80 text-sm">Total Visits</p>
            </div>
        </div>
    </div>

    <!-- Secondary Stats Row -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <!-- Subscribers -->
        <div
            class="relative overflow-hidden rounded-2xl bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 p-6 hover:shadow-lg transition-all duration-300">
            <div class="flex items-center gap-4">
                <div
                    class="w-14 h-14 rounded-2xl bg-gradient-to-br from-rose-500 to-pink-600 flex items-center justify-center shadow-lg shadow-rose-500/30">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Subscribers</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $subscribers->count() }}</p>
                </div>
            </div>
            <div
                class="absolute -bottom-2 -right-2 w-20 h-20 rounded-full bg-gradient-to-br from-rose-500/10 to-pink-600/10 blur-xl">
            </div>
        </div>

        <!-- Messages -->
        <div
            class="relative overflow-hidden rounded-2xl bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 p-6 hover:shadow-lg transition-all duration-300">
            <div class="flex items-center gap-4">
                <div
                    class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-600 flex items-center justify-center shadow-lg shadow-blue-500/30">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Messages</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ Auth::user()->messages->count() }}
                    </p>
                </div>
            </div>
            <div
                class="absolute -bottom-2 -right-2 w-20 h-20 rounded-full bg-gradient-to-br from-blue-500/10 to-cyan-600/10 blur-xl">
            </div>
        </div>

        <!-- Responses -->
        <div
            class="relative overflow-hidden rounded-2xl bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 p-6 hover:shadow-lg transition-all duration-300">
            <div class="flex items-center gap-4">
                <div
                    class="w-14 h-14 rounded-2xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center shadow-lg shadow-green-500/30">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Responses</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $responses->count() }}</p>
                </div>
            </div>
            <div
                class="absolute -bottom-2 -right-2 w-20 h-20 rounded-full bg-gradient-to-br from-green-500/10 to-emerald-600/10 blur-xl">
            </div>
        </div>
    </div>

    <!-- Activity Section -->
    <div
        class="relative flex-1 overflow-hidden rounded-2xl bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Quick Actions</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('visitors') }}"
                class="group flex flex-col items-center gap-3 p-4 rounded-xl bg-gray-50 dark:bg-zinc-700/50 hover:bg-gradient-to-br hover:from-blue-600 hover:to-indigo-700 transition-all duration-300">
                <div
                    class="w-12 h-12 rounded-xl bg-cyan-100 dark:bg-cyan-900/30 group-hover:bg-white/20 flex items-center justify-center transition-colors">
                    <svg class="w-6 h-6 text-cyan-600 dark:text-cyan-400 group-hover:text-white" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                </div>
                <span
                    class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-white">Visitors</span>
            </a>
            <a href="{{ route('messages') }}"
                class="group flex flex-col items-center gap-3 p-4 rounded-xl bg-gray-50 dark:bg-zinc-700/50 hover:bg-gradient-to-br hover:from-indigo-600 hover:to-purple-700 transition-all duration-300">
                <div
                    class="w-12 h-12 rounded-xl bg-purple-100 dark:bg-purple-900/30 group-hover:bg-white/20 flex items-center justify-center transition-colors">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400 group-hover:text-white" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <span
                    class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-white">Messages</span>
            </a>
            <a href="{{ route('newsletter') }}"
                class="group flex flex-col items-center gap-3 p-4 rounded-xl bg-gray-50 dark:bg-zinc-700/50 hover:bg-gradient-to-br hover:from-amber-500 hover:to-orange-600 transition-all duration-300">
                <div
                    class="w-12 h-12 rounded-xl bg-amber-100 dark:bg-amber-900/30 group-hover:bg-white/20 flex items-center justify-center transition-colors">
                    <svg class="w-6 h-6 text-amber-600 dark:text-amber-400 group-hover:text-white" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                </div>
                <span
                    class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-white">Newsletter</span>
            </a>
            <a href="{{ route('view_portfolio') }}"
                class="group flex flex-col items-center gap-3 p-4 rounded-xl bg-gray-50 dark:bg-zinc-700/50 hover:bg-gradient-to-br hover:from-emerald-500 hover:to-teal-600 transition-all duration-300">
                <div
                    class="w-12 h-12 rounded-xl bg-emerald-100 dark:bg-emerald-900/30 group-hover:bg-white/20 flex items-center justify-center transition-colors">
                    <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400 group-hover:text-white" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <span
                    class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-white">Portfolio</span>
            </a>
        </div>
    </div>
</div>