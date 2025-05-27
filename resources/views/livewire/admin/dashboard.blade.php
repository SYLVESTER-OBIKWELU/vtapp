<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    
    <div class="grid auto-rows-min gap-4 md:grid-cols-3" wire:poll.5s>
        
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="flex flex-col items-center justify-center h-full w-full">
                <div class="text-4xl font-bold text-gray-800 dark:text-gray-100">
                    {{ $visitors->where('created_at', '>=', \Carbon\Carbon::today())->count() }}
                </div>
                <div class="text-lg text-gray-500 dark:text-gray-400">
                    Visits for today
                </div>
            </div>
        </div>
        
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="flex flex-col items-center justify-center h-full w-full">
                    <div class="text-4xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $visitors->where('created_at', '>=', \Carbon\Carbon::now()->startOfWeek())->count() }}
                    </div>
                    <div class="text-lg text-gray-500 dark:text-gray-400">
                        Visits this week
                    </div>
                </div>
            </div>
        </div>

        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="flex flex-col items-center justify-center h-full w-full">
                    <div class="text-4xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $portfolio->count() }}
                    </div>
                    <div class="text-lg text-gray-500 dark:text-gray-400">
                        Portfolion Views
                    </div>
                </div>
            </div>
        </div>

                <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="flex flex-col items-center justify-center h-full w-full">
                    <div class="text-4xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $visitors->whereBetween('created_at', [
                            \Carbon\Carbon::now()->startOfMonth(),
                            \Carbon\Carbon::now()->endOfMonth()
                        ])->count() }}
                    </div>
                    <div class="text-lg text-gray-500 dark:text-gray-400">
                        Visits this month
                    </div>
                </div>
            </div>
        </div>
                
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="flex flex-col items-center justify-center h-full w-full">
                    <div class="text-4xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $visitors->whereBetween('created_at', [
                            \Carbon\Carbon::now()->subMonthNoOverflow()->startOfMonth(),
                            \Carbon\Carbon::now()->subMonthNoOverflow()->endOfMonth()
                        ])->count() }}
                    </div>
                    <div class="text-lg text-gray-500 dark:text-gray-400">
                        Visits last Month
                    </div>
                </div>
            </div>
        </div>
        
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="flex flex-col items-center justify-center h-full w-full">
                    <div class="text-4xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $visitors->count() }}
                    </div>
                    <div class="text-lg text-gray-500 dark:text-gray-400">
                        All time visits
                    </div>
                </div>
            </div>
        </div>
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="flex flex-col items-center justify-center h-full w-full">
                    <div class="text-4xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $subscribers->count() }}
                    </div>
                    <div class="text-lg text-gray-500 dark:text-gray-400">
                        Subscribers
                    </div>
                </div>
            </div>
        </div>
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="flex flex-col items-center justify-center h-full w-full">
                    <div class="text-4xl font-bold text-gray-800 dark:text-gray-100">
                        {{ Auth::user()->messages->count() }}
                    </div>
                    <div class="text-lg text-gray-500 dark:text-gray-400">
                        Contact Messages
                    </div>
                </div>
            </div>
        </div>
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="flex flex-col items-center justify-center h-full w-full">
                    <div class="text-4xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $responses->count() }}
                    </div>
                    <div class="text-lg text-gray-500 dark:text-gray-400">
                        Responses
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
        <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
    </div>

    
</div>
