<div class="flex h-full w-full flex-1 flex-col gap-6 p-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Review</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Update testimonial details</p>
        </div>
        <a href="{{ route('admin.reviews.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Back to Reviews
        </a>
    </div>

    <!-- Flash Messages -->
    @if (session()->has('success'))
    <div
        class="bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-400 px-4 py-3 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <form wire:submit="save" class="space-y-6">
        <!-- Reviewer Info Card -->
        <div class="glass rounded-2xl p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Reviewer Information</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Reviewer Name -->
                <div>
                    <label for="reviewer_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Reviewer Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="reviewer_name" wire:model="reviewer_name"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                        placeholder="John Doe">
                    @error('reviewer_name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Reviewer Title -->
                <div>
                    <label for="reviewer_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Title / Position
                    </label>
                    <input type="text" id="reviewer_title" wire:model="reviewer_title"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                        placeholder="CEO, Founder, etc.">
                </div>

                <!-- Company Name -->
                <div>
                    <label for="company_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Company Name
                    </label>
                    <input type="text" id="company_name" wire:model="company_name"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                        placeholder="Company Inc.">
                </div>

                <!-- Company Tagline -->
                <div>
                    <label for="company_tagline"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Company Tagline
                    </label>
                    <input type="text" id="company_tagline" wire:model="company_tagline"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                        placeholder="Your Gateway to Success">
                </div>

                <!-- Company Website -->
                <div class="md:col-span-2">
                    <label for="company_website"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Company Website
                    </label>
                    <input type="url" id="company_website" wire:model="company_website"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                        placeholder="https://example.com">
                    @error('company_website')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Reviewer Image -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Reviewer Photo
                    </label>
                    <div class="flex items-start gap-6">
                        <div class="w-24 h-24 flex-shrink-0">
                            @if ($reviewer_image)
                            <div class="relative">
                                <img src="{{ $reviewer_image->temporaryUrl() }}"
                                    class="w-full h-full object-cover rounded-full border-4 border-slate-200 dark:border-slate-700">
                                <button type="button" wire:click="removeNewImage"
                                    class="absolute -top-1 -right-1 p-1 bg-red-500 text-white rounded-full hover:bg-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            @elseif ($review->reviewer_image)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $review->reviewer_image) }}"
                                    class="w-full h-full object-cover rounded-full border-4 border-slate-200 dark:border-slate-700">
                                <button type="button" wire:click="removeExistingImage"
                                    class="absolute -top-1 -right-1 p-1 bg-red-500 text-white rounded-full hover:bg-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <label class="block mt-2 text-center cursor-pointer">
                                <span class="text-xs text-cyan-500 hover:text-cyan-400">Replace</span>
                                <input type="file" wire:model="reviewer_image" class="hidden" accept="image/*">
                            </label>
                            @else
                            <label
                                class="flex items-center justify-center w-full h-full rounded-full border-2 border-dashed border-gray-300 dark:border-slate-600 cursor-pointer hover:border-cyan-500 transition-colors">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4"></path>
                                </svg>
                                <input type="file" wire:model="reviewer_image" class="hidden" accept="image/*">
                            </label>
                            @endif
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            <p>Upload a profile photo for the reviewer.</p>
                            <p class="mt-1">Recommended: Square image, at least 200x200px</p>
                        </div>
                    </div>
                    @error('reviewer_image')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Review Content Card -->
        <div class="glass rounded-2xl p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Review Content</h2>

            <div class="space-y-6">
                <!-- Rating -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Rating <span class="text-red-500">*</span>
                    </label>
                    <div class="flex items-center gap-2">
                        @for ($i = 1; $i <= 5; $i++) <button type="button" wire:click="$set('rating', {{ $i }})"
                            class="focus:outline-none transition-transform hover:scale-110">
                            <svg class="w-8 h-8 {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            </button>
                            @endfor
                            <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">({{ $rating }} stars)</span>
                    </div>
                </div>

                <!-- Review Text -->
                <div>
                    <label for="review_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Review Text <span class="text-red-500">*</span>
                    </label>
                    <textarea id="review_text" wire:model="review_text" rows="5"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                        placeholder="Write the testimonial content here..."></textarea>
                    @error('review_text')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Display Settings Card -->
        <div class="glass rounded-2xl p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Display Settings</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Gradient Color -->
                <div>
                    <label for="gradient_color" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Color Theme
                    </label>
                    <select id="gradient_color" wire:model="gradient_color"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                        @foreach ($gradientOptions as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    <div class="mt-2 h-4 rounded bg-gradient-to-r {{ $gradient_color }}"></div>
                </div>

                <!-- Display Order -->
                <div>
                    <label for="display_order" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Display Order
                    </label>
                    <input type="number" id="display_order" wire:model="display_order" min="0"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                </div>

                <!-- Status Toggles -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Status
                    </label>
                    <div class="flex flex-col gap-3 mt-1">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" wire:model="is_active"
                                class="w-4 h-4 text-cyan-600 border-gray-300 rounded focus:ring-cyan-500">
                            <span class="text-sm text-gray-700 dark:text-gray-300">Active (Visible on site)</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" wire:model="is_featured"
                                class="w-4 h-4 text-yellow-600 border-gray-300 rounded focus:ring-yellow-500">
                            <span class="text-sm text-gray-700 dark:text-gray-300">Featured (Highlighted)</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.reviews.index') }}"
                class="px-6 py-2 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors">
                Cancel
            </a>
            <button type="submit"
                class="px-6 py-2 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-lg hover:from-cyan-600 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-cyan-500/25">
                <span wire:loading.remove wire:target="save">Update Review</span>
                <span wire:loading wire:target="save">Saving...</span>
            </button>
        </div>
    </form>
</div>