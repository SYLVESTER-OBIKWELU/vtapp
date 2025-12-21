<div class="flex h-full w-full flex-1 flex-col gap-6 p-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Responses</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">View your sent replies</p>
        </div>
        @if ($responses->count() > 0)
        <div class="flex items-center gap-3">
            <x-message :mail="$mail">{!! nl2br(e($body)) !!}</x-message>
        </div>
        @endif
    </div>

    <!-- Main Content Card -->
    <div
        class="relative overflow-hidden rounded-2xl bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 shadow-sm">
        <!-- Top Bar -->
        <div
            class="flex flex-col sm:flex-row items-center justify-between gap-4 p-6 border-b border-gray-200 dark:border-zinc-700">
            <!-- Search -->
            <div class="relative w-full sm:w-80">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input wire:model.live.debounce.300ms='search' type="text"
                    class="w-full pl-11 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                    placeholder="Search responses...">
            </div>

            @if ($responses->count() > 0)
            <!-- Per Page -->
            <div class="flex items-center gap-3">
                <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Show</label>
                <select wire:model.live='perPage'
                    class="px-4 py-2 rounded-xl bg-gray-50 dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="75">75</option>
                    <option value="100">100</option>
                </select>
                <span class="text-sm text-gray-600 dark:text-gray-300">entries</span>
            </div>
            @endif
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    @if ($responses->count() > 0)
                    <tr class="bg-gray-50 dark:bg-zinc-700/50">
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                            S/N</th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                            IP Address</th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                            Email</th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                            Subject</th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                            Status</th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                            Date</th>
                        <th
                            class="px-6 py-4 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                    @endif
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-zinc-700">
                    @if (count($responses) != 0)
                    @foreach ($responses as $response)
                    <tr wire:key='{{$response->id}}'
                        class="hover:bg-gray-50 dark:hover:bg-zinc-700/30 transition-colors">
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-600 to-purple-700 text-white text-sm font-semibold">
                                {{$count++}}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="text-sm text-gray-600 dark:text-gray-300 font-mono bg-gray-100 dark:bg-zinc-700 px-2 py-1 rounded">{{$response->message->ip}}</span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="mailto:{{$response->email}}"
                                class="text-sm text-blue-600 dark:text-blue-400 hover:underline">{{$response->email}}</a>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="text-sm text-gray-600 dark:text-gray-300">{{Str::limit($response->message->subject,
                                30)}}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($response->message->status === 'new')
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>
                                New
                            </span>
                            @else
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                Replied
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="text-sm text-gray-500 dark:text-gray-400">{{$response->created_at->diffForHumans()}}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <button wire:click='openMail({{$response->message->id}})'
                                    class="p-2 rounded-lg bg-cyan-100 dark:bg-cyan-900/30 text-cyan-600 dark:text-cyan-400 hover:bg-cyan-200 dark:hover:bg-cyan-900/50 transition-colors"
                                    title="View Original Message">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </button>
                                <button wire:click='openResponse({{$response->id}})'
                                    class="p-2 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 hover:bg-green-200 dark:hover:bg-green-900/50 transition-colors"
                                    title="View Response">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7" class="px-6 py-20">
                            <div class="flex flex-col items-center justify-center text-center">
                                <div
                                    class="w-20 h-20 rounded-full bg-gray-100 dark:bg-zinc-700 flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">No Responses Yet
                                </h3>
                                <p class="text-gray-500 dark:text-gray-400">Your sent replies will appear here.</p>
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($responses->count() > 0)
        <div class="px-6 py-4 border-t border-gray-200 dark:border-zinc-700">
            {{$responses->links()}}
        </div>
        @endif
    </div>
</div>