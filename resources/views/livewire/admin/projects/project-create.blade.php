<div class="flex h-full w-full flex-1 flex-col gap-6 p-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Create Project</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Add a new project to your portfolio</p>
        </div>
        <a href="{{ route('admin.projects.index') }}"
            class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Back to Projects
        </a>
    </div>

    <form wire:submit="save" class="space-y-6">
        <!-- Basic Info Card -->
        <div class="glass rounded-2xl p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Basic Information</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" wire:model.live="title"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                        placeholder="Enter project title">
                    @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Slug
                    </label>
                    <div class="flex gap-2">
                        <input type="text" id="slug" wire:model="slug"
                            class="flex-1 px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                            placeholder="project-slug">
                        <button type="button" wire:click="generateSlug"
                            class="px-3 py-2 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors text-sm">
                            Generate
                        </button>
                    </div>
                    @error('slug')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Category <span class="text-red-500">*</span>
                    </label>
                    <select id="category" wire:model="category"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white">
                        @foreach ($categories as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Technologies -->
                <div>
                    <label for="technologies" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Technologies
                    </label>
                    <input type="text" id="technologies" wire:model="technologies"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                        placeholder="Laravel, Vue.js, Tailwind CSS (comma separated)">
                    @error('technologies')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Short Description -->
                <div class="md:col-span-2">
                    <label for="short_description"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Short Description
                    </label>
                    <textarea id="short_description" wire:model="short_description" rows="2"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                        placeholder="Brief description for cards and previews"></textarea>
                    @error('short_description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Full Description -->
                <div class="md:col-span-2">
                    <label for="full_description"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Full Description
                    </label>
                    <textarea id="full_description" wire:model="full_description" rows="5"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                        placeholder="Detailed project description (supports HTML)"></textarea>
                    @error('full_description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Links Card -->
        <div class="glass rounded-2xl p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Links & URLs</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Live URL -->
                <div>
                    <label for="live_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Live URL
                    </label>
                    <input type="url" id="live_url" wire:model="live_url"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                        placeholder="https://example.com">
                    @error('live_url')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- GitHub URL -->
                <div>
                    <label for="github_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        GitHub URL
                    </label>
                    <input type="url" id="github_url" wire:model="github_url"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                        placeholder="https://github.com/username/repo">
                    @error('github_url')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Video URL -->
                <div>
                    <label for="video_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Video URL
                    </label>
                    <input type="url" id="video_url" wire:model="video_url"
                        class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white"
                        placeholder="https://youtube.com/watch?v=...">
                    @error('video_url')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Images Card -->
        <div class="glass rounded-2xl p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Images</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Featured Image -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Featured Image
                    </label>
                    <div class="border-2 border-dashed border-gray-300 dark:border-slate-600 rounded-lg p-4">
                        @if ($featured_image)
                        <div class="relative">
                            <img src="{{ $featured_image->temporaryUrl() }}"
                                class="w-full h-48 object-cover rounded-lg">
                            <button type="button" wire:click="removeFeaturedImage"
                                class="absolute top-2 right-2 p-1 bg-red-500 text-white rounded-full hover:bg-red-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        @else
                        <label class="flex flex-col items-center justify-center h-48 cursor-pointer">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="mt-2 text-sm text-gray-500 dark:text-gray-400">Click to upload featured
                                image</span>
                            <input type="file" wire:model="featured_image" class="hidden" accept="image/*">
                        </label>
                        @endif
                    </div>
                    @error('featured_image')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gallery Images -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Gallery Images
                    </label>
                    <div class="border-2 border-dashed border-gray-300 dark:border-slate-600 rounded-lg p-4">
                        <label class="flex flex-col items-center justify-center h-32 cursor-pointer">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span class="mt-2 text-sm text-gray-500 dark:text-gray-400">Add gallery images</span>
                            <input type="file" wire:model="gallery_images" class="hidden" accept="image/*" multiple>
                        </label>
                    </div>
                    @if (count($gallery_images) > 0)
                    <div class="grid grid-cols-4 gap-2 mt-4">
                        @foreach ($gallery_images as $index => $image)
                        <div class="relative">
                            <img src="{{ $image->temporaryUrl() }}" class="w-full h-20 object-cover rounded-lg">
                            <button type="button" wire:click="removeGalleryImage({{ $index }})"
                                class="absolute -top-1 -right-1 p-1 bg-red-500 text-white rounded-full hover:bg-red-600 text-xs">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @error('gallery_images.*')
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
                        Card Color Theme
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

                <!-- Status Toggle -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Status
                    </label>
                    <div class="flex items-center gap-4 mt-3">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" wire:model="is_active"
                                class="w-4 h-4 text-cyan-600 border-gray-300 rounded focus:ring-cyan-500">
                            <span class="text-sm text-gray-700 dark:text-gray-300">Active</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Display Locations -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    Display On
                </label>
                <div class="flex flex-wrap gap-4">
                    <label
                        class="flex items-center gap-2 cursor-pointer px-4 py-2 rounded-lg border border-gray-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800">
                        <input type="checkbox" wire:model="show_on_homepage"
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Homepage</span>
                    </label>
                    <label
                        class="flex items-center gap-2 cursor-pointer px-4 py-2 rounded-lg border border-gray-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800">
                        <input type="checkbox" wire:model="show_on_portfolio"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Portfolio</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Guide Content Card -->
        <div class="glass rounded-2xl p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Guide / Documentation</h2>
            <textarea id="guide_content" wire:model="guide_content" rows="8"
                class="w-full px-4 py-2 bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-gray-900 dark:text-white font-mono text-sm"
                placeholder="Add project documentation, setup guides, or tutorials (Markdown supported)"></textarea>
            @error('guide_content')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Buttons -->
        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.projects.index') }}"
                class="px-6 py-2 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-slate-600 transition-colors">
                Cancel
            </a>
            <button type="submit"
                class="px-6 py-2 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-lg hover:from-cyan-600 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-cyan-500/25">
                <span wire:loading.remove wire:target="save">Create Project</span>
                <span wire:loading wire:target="save">Saving...</span>
            </button>
        </div>
    </form>
</div>