<div class="flex h-full w-full flex-1 flex-col gap-6 p-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Newsletter</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Manage subscribers and send newsletters</p>
        </div>
        <div class="flex items-center gap-3">
            <!-- Toggle Buttons -->
            <button wire:click='openList'
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl {{ $list ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white shadow-lg shadow-cyan-500/30' : 'bg-gray-100 dark:bg-zinc-700 text-gray-700 dark:text-gray-300' }} font-medium transition-all duration-300 hover:shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                Subscribers
            </button>
            <button wire:click='openMailer'
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl {{ $mailer ? 'bg-gradient-to-r from-emerald-500 to-teal-600 text-white shadow-lg shadow-emerald-500/30' : 'bg-gray-100 dark:bg-zinc-700 text-gray-700 dark:text-gray-300' }} font-medium transition-all duration-300 hover:shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
                Send Newsletter
            </button>
        </div>
    </div>

    <!-- Subscribers List -->
    @if ($list)
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
                    class="w-full pl-11 pr-4 py-3 rounded-xl bg-gray-50 dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                    placeholder="Search subscribers...">
            </div>

            <!-- Per Page -->
            <div class="flex items-center gap-3">
                <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Show</label>
                <select wire:model.live='perPage'
                    class="px-4 py-2 rounded-xl bg-gray-50 dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="75">75</option>
                    <option value="100">100</option>
                </select>
                <span class="text-sm text-gray-600 dark:text-gray-300">entries</span>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 dark:bg-zinc-700/50">
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                            S/N</th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                            Email</th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                            Date Joined</th>
                        <th
                            class="px-6 py-4 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-zinc-700">
                    @if (count($subscribers) != 0)
                    @foreach ($subscribers as $user)
                    <tr wire:key='{{$user->id}}' class="hover:bg-gray-50 dark:hover:bg-zinc-700/30 transition-colors">
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gradient-to-br from-rose-500 to-pink-600 text-white text-sm font-semibold">
                                {{$count++}}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center text-white font-semibold">
                                    {{ strtoupper(substr($user->email, 0, 1)) }}
                                </div>
                                <a href="mailto:{{$user->email}}"
                                    class="text-sm font-medium text-gray-900 dark:text-white hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">{{$user->email}}</a>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="text-sm text-gray-500 dark:text-gray-400">{{$user->created_at->diffForHumans()}}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center">
                                <button
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 hover:bg-red-200 dark:hover:bg-red-900/50 transition-colors text-sm font-medium"
                                    onclick="deletion(event)">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    Delete
                                    <button wire:click='deleteSubscriber({{$user->id}})' id="deleteBtn"
                                        class="hidden"></button>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="px-6 py-20">
                            <div class="flex flex-col items-center justify-center text-center">
                                <div
                                    class="w-20 h-20 rounded-full bg-gray-100 dark:bg-zinc-700 flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">No Subscribers Yet
                                </h3>
                                <p class="text-gray-500 dark:text-gray-400">Subscribers will appear here once they sign
                                    up.</p>
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 dark:border-zinc-700">
            {{$subscribers->links()}}
        </div>
    </div>
    @endif

    <!-- Newsletter Composer -->
    @if ($mailer)
    <div
        class="relative overflow-hidden rounded-2xl bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 shadow-sm">
        <div class="p-6 border-b border-gray-200 dark:border-zinc-700">
            <div class="flex items-center gap-4">
                <div
                    class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Compose Newsletter</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Send a newsletter to all your subscribers</p>
                </div>
            </div>
        </div>

        <form wire:submit.prevent="sendNewsletter" class="p-6 space-y-6">
            <!-- Subject -->
            <div>
                <label for="subject"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subject</label>
                <input wire:model.defer="subject" type="text" id="subject"
                    class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all"
                    placeholder="Enter newsletter subject">
                @error('subject') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Image
                    (Optional)</label>
                <div class="relative">
                    <input wire:model="image" type="file" id="image"
                        class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 text-gray-900 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-100 file:text-emerald-700 hover:file:bg-emerald-200 cursor-pointer focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                </div>
                @if ($image)
                <div class="mt-3">
                    <img src="{{ $image->temporaryUrl() }}" class="h-32 rounded-xl object-cover shadow-lg"
                        alt="Preview">
                </div>
                @endif
                @error('image') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Message -->
            <div>
                <label for="message"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Message</label>
                <textarea wire:model.defer="body" id="message" rows="8"
                    class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all resize-none"
                    placeholder="Write your newsletter message here..."></textarea>
                @error('body') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Submit -->
            <div class="flex items-center gap-4">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-semibold shadow-lg shadow-emerald-500/30 hover:shadow-emerald-500/50 transition-all duration-300 hover:-translate-y-0.5">
                    <span wire:loading.remove wire:target='sendNewsletter'>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </span>
                    <span wire:loading wire:target='sendNewsletter'>
                        <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </span>
                    <span wire:loading.remove wire:target='sendNewsletter'>Send Newsletter</span>
                    <span wire:loading wire:target='sendNewsletter'>Sending...</span>
                </button>
            </div>
        </form>
    </div>
    @endif
</div>