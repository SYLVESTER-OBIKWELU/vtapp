<div class="flex h-full w-full flex-1 flex-col gap-6 p-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Reviews & Testimonials</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Manage customer reviews and testimonials</p>
        </div>
        <a href="{{ route('admin.reviews.create') }}"
            class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-lg hover:from-cyan-600 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-cyan-500/25">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Review
        </a>
    </div>

    <!-- Flash Messages -->
    @if (session()->has('success'))
    <div class="bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-400 px-4 py-3 rounded-lg relative"
        role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    <!-- Filters -->
    <div class="glass rounded-2xl p-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Search -->
            <div class="relative">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search reviews..."
                    class="w-full pl-10 pr-4 py-2 bg-white/10 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white placeholder-gray-500">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <!-- Status Filter -->
            <select wire:model.live="status"
                class="w-full px-4 py-2 bg-white/10 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                <option value="">All Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="featured">Featured</option>
            </select>

            <!-- Per Page -->
            <select wire:model.live="perPage"
                class="w-full px-4 py-2 bg-white/10 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                <option value="10">10 per page</option>
                <option value="25">25 per page</option>
                <option value="50">50 per page</option>
            </select>
        </div>
    </div>

    <!-- Reviews Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($reviews as $review)
        <div class="glass rounded-2xl p-6 relative group">
            <!-- Status Badges -->
            <div class="absolute top-4 right-4 flex gap-2">
                @if ($review->is_featured)
                <span
                    class="px-2 py-1 text-xs bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 rounded-full">
                    Featured
                </span>
                @endif
                <span
                    class="px-2 py-1 text-xs rounded-full {{ $review->is_active ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400' : 'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400' }}">
                    {{ $review->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>

            <!-- Reviewer Info -->
            <div class="flex items-center gap-4 mb-4">
                <div class="relative w-16 h-16 flex-shrink-0">
                    <div
                        class="absolute inset-0 bg-gradient-to-r {{ $review->gradient_color }} rounded-full animate-pulse opacity-50">
                    </div>
                    @if ($review->reviewer_image)
                    <img src="{{ asset('storage/' . $review->reviewer_image) }}"
                        class="relative w-full h-full object-cover rounded-full border-2 border-white dark:border-slate-700"
                        alt="{{ $review->reviewer_name }}">
                    @else
                    <div
                        class="relative w-full h-full rounded-full bg-gradient-to-r {{ $review->gradient_color }} flex items-center justify-center text-white text-xl font-bold">
                        {{ strtoupper(substr($review->reviewer_name, 0, 1)) }}
                    </div>
                    @endif
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-white">{{ $review->reviewer_name }}</h3>
                    @if ($review->reviewer_title)
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $review->reviewer_title }}</p>
                    @endif
                    @if ($review->company_name)
                    <p class="text-sm text-cyan-500">{{ $review->company_name }}</p>
                    @endif
                </div>
            </div>

            <!-- Rating -->
            <div class="flex gap-1 mb-3">
                @for ($i = 1; $i <= 5; $i++) <svg
                    class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                    </svg>
                    @endfor
            </div>

            <!-- Review Text -->
            <p class="text-gray-600 dark:text-gray-300 text-sm line-clamp-3 mb-4">
                "{{ $review->review_text }}"
            </p>

            @if ($review->company_tagline)
            <p class="text-xs text-gray-500 dark:text-gray-400 italic">— {{ $review->company_tagline }}</p>
            @endif

            <!-- Actions -->
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-200 dark:border-slate-700">
                <div class="flex gap-2">
                    <button wire:click="toggleActive({{ $review->id }})"
                        class="p-2 text-gray-500 hover:text-green-600 dark:hover:text-green-400 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors"
                        title="{{ $review->is_active ? 'Deactivate' : 'Activate' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="{{ $review->is_active ? 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z' : 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' }}">
                            </path>
                        </svg>
                    </button>
                    <button wire:click="toggleFeatured({{ $review->id }})"
                        class="p-2 text-gray-500 hover:text-yellow-600 dark:hover:text-yellow-400 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors"
                        title="{{ $review->is_featured ? 'Unfeature' : 'Feature' }}">
                        <svg class="w-4 h-4 {{ $review->is_featured ? 'fill-yellow-400' : '' }}" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="flex gap-2">
                    <button wire:click="editReview({{ $review->id }})"
                        class="p-2 text-gray-500 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors"
                        title="Edit">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                    </button>
                    <button wire:click="confirmDelete({{ $review->id }})" title="Edit">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        </a>
                        <button wire:click="confirmDelete({{ $review->id }})"
                            class="p-2 text-gray-500 hover:text-red-600 dark:hover:text-red-400 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors"
                            title="Delete">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </button>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full">
            <div class="glass rounded-2xl p-12 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-300 dark:text-gray-600 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                    </path>
                </svg>
                <p class="text-gray-500 dark:text-gray-400 mb-4">No reviews found</p>
                <a href="{{ route('admin.reviews.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Your First Review
                </a>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if ($reviews->hasPages())
    <div class="flex justify-center">
        {{ $reviews->links() }}
    </div>
    @endif

    <!-- Delete Modal -->
    @if ($showDeleteModal)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"
                wire:click="$set('showDeleteModal', false)"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="inline-block align-bottom bg-white dark:bg-slate-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white dark:bg-slate-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900/30 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">
                                Delete Review
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Are you sure you want to delete this review? This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-slate-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" wire:click="deleteReview"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Delete
                    </button>
                    <button type="button" wire:click="$set('showDeleteModal', false)"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-slate-600 shadow-sm px-4 py-2 bg-white dark:bg-slate-800 text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Edit Review Modal -->
    @if ($showEditModal && $editingReview)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"
                wire:click="closeEditModal"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="inline-block align-bottom bg-white dark:bg-slate-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                <form wire:submit="updateReview">
                    <div class="bg-white dark:bg-slate-800 px-6 pt-6 pb-4">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                Edit Review
                            </h3>
                            <button type="button" wire:click="closeEditModal"
                                class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-h-[70vh] overflow-y-auto pr-2">
                            <!-- Reviewer Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Reviewer Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" wire:model="reviewer_name"
                                    class="w-full px-4 py-2 bg-white dark:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                                @error('reviewer_name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Reviewer Title -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Reviewer Title
                                </label>
                                <input type="text" wire:model="reviewer_title"
                                    class="w-full px-4 py-2 bg-white dark:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                            </div>

                            <!-- Company Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Company Name
                                </label>
                                <input type="text" wire:model="company_name"
                                    class="w-full px-4 py-2 bg-white dark:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                            </div>

                            <!-- Company Tagline -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Company Tagline
                                </label>
                                <input type="text" wire:model="company_tagline"
                                    class="w-full px-4 py-2 bg-white dark:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                            </div>

                            <!-- Company Website -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Company Website
                                </label>
                                <input type="url" wire:model="company_website"
                                    class="w-full px-4 py-2 bg-white dark:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                                @error('company_website') <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Review Text -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Review Text <span class="text-red-500">*</span>
                                </label>
                                <textarea wire:model="review_text" rows="4"
                                    class="w-full px-4 py-2 bg-white dark:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"></textarea>
                                @error('review_text') <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Rating -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Rating (1-5 stars) <span class="text-red-500">*</span>
                                </label>
                                <select wire:model="rating"
                                    class="w-full px-4 py-2 bg-white dark:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                                    <option value="1">⭐ 1 Star</option>
                                    <option value="2">⭐⭐ 2 Stars</option>
                                    <option value="3">⭐⭐⭐ 3 Stars</option>
                                    <option value="4">⭐⭐⭐⭐ 4 Stars</option>
                                    <option value="5">⭐⭐⭐⭐⭐ 5 Stars</option>
                                </select>
                            </div>

                            <!-- Gradient Color -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Gradient Color <span class="text-red-500">*</span>
                                </label>
                                <select wire:model="gradient_color"
                                    class="w-full px-4 py-2 bg-white dark:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                                    <option value="from-cyan-400 to-blue-500">Cyan to Blue</option>
                                    <option value="from-purple-400 to-pink-500">Purple to Pink</option>
                                    <option value="from-orange-400 to-red-500">Orange to Red</option>
                                    <option value="from-teal-400 to-cyan-500">Teal to Cyan</option>
                                    <option value="from-green-400 to-emerald-500">Green to Emerald</option>
                                    <option value="from-yellow-400 to-orange-500">Yellow to Orange</option>
                                </select>
                            </div>

                            <!-- Reviewer Image -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Reviewer Image
                                </label>
                                <input type="file" wire:model="reviewer_image" accept="image/*"
                                    class="w-full px-4 py-2 bg-white dark:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                                @if ($reviewer_image)
                                <p class="text-sm text-gray-500 mt-1">New image selected</p>
                                @elseif($editingReview->reviewer_image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $editingReview->reviewer_image) }}" alt="Current"
                                        class="h-20 w-20 rounded-full object-cover">
                                </div>
                                @endif
                                @error('reviewer_image') <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Display Order -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Display Order
                                </label>
                                <input type="number" wire:model="display_order" min="0"
                                    class="w-full px-4 py-2 bg-white dark:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                            </div>

                            <!-- Checkboxes -->
                            <div class="md:col-span-2 space-y-3">
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" wire:model="is_active"
                                        class="w-4 h-4 text-cyan-600 bg-white dark:bg-slate-700 border-gray-300 dark:border-slate-600 rounded focus:ring-cyan-500">
                                    <span class="text-sm text-gray-700 dark:text-gray-300">Active</span>
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" wire:model="is_featured"
                                        class="w-4 h-4 text-cyan-600 bg-white dark:bg-slate-700 border-gray-300 dark:border-slate-600 rounded focus:ring-cyan-500">
                                    <span class="text-sm text-gray-700 dark:text-gray-300">Featured Review</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 dark:bg-slate-700 px-6 py-4 flex justify-end gap-3">
                        <button type="button" wire:click="closeEditModal"
                            class="px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-slate-600">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-lg hover:from-cyan-600 hover:to-blue-700">
                            Update Review
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>