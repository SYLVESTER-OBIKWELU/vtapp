<!-- Contact Section -->
<section id="contact" class="relative py-24 lg:py-32 bg-slate-800 overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-slate-800 to-transparent"></div>
    <div class="absolute -top-40 right-20 w-80 h-80 bg-cyan-500/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-40 left-20 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl"></div>

    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16" data-scroll-reveal>
            <div
                class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-500/10 rounded-full border border-cyan-500/20 mb-6">
                <span class="text-sm font-medium text-cyan-400">Contact</span>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
                Let's Build Something <span
                    class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Great
                    Together</span>
            </h2>
            <p class="text-lg text-gray-400">
                Tell us about your project, and we'll bring it to life. Reach out via the form or email us directly.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Contact Info -->
            <div class="space-y-6" data-scroll-reveal="left">
                <!-- Location -->
                <div class="card-modern group flex items-start gap-4" data-tilt>
                    <div
                        class="flex-shrink-0 w-14 h-14 rounded-xl bg-gradient-to-r from-cyan-400/20 to-blue-500/20 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-geo-alt text-2xl text-cyan-400"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">Our Location</h3>
                        <p class="text-gray-400">Awka, Anambra State</p>
                        <p class="text-gray-500 text-sm">Nigeria, AWK 420102</p>
                    </div>
                </div>

                <!-- Phone -->
                <div class="card-modern group flex items-start gap-4" data-tilt>
                    <div
                        class="flex-shrink-0 w-14 h-14 rounded-xl bg-gradient-to-r from-purple-400/20 to-pink-500/20 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-telephone text-2xl text-purple-400"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">Call Us</h3>
                        <a href="tel:+2347018508896"
                            class="text-gray-400 hover:text-cyan-400 transition-colors duration-300">
                            +234 7018508896
                        </a>
                    </div>
                </div>

                <!-- Email -->
                <div class="card-modern group flex items-start gap-4" data-tilt>
                    <div
                        class="flex-shrink-0 w-14 h-14 rounded-xl bg-gradient-to-r from-teal-400/20 to-cyan-500/20 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-envelope text-2xl text-teal-400"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">Email Us</h3>
                        <a href="mailto:hello@vtapp.com.ng"
                            class="text-gray-400 hover:text-cyan-400 transition-colors duration-300">
                            hello@vtapp.com.ng
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2" data-scroll-reveal="right">
                <div class="card-modern">
                    <form wire:submit.prevent="sendMessage" class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Your Name</label>
                                <input type="text" wire:model="name" class="form-input-modern" placeholder="John Doe" />
                                @error('name')
                                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Your Email</label>
                                <input type="email" wire:model="email" class="form-input-modern"
                                    placeholder="john@example.com" />
                                @error('email')
                                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Subject -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Subject</label>
                            <input type="text" wire:model="subject" class="form-input-modern"
                                placeholder="Project inquiry" />
                            @error('subject')
                            <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Message -->
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Message</label>
                            <textarea wire:model="body" rows="6" class="form-input-modern resize-none"
                                placeholder="Tell us about your project..."></textarea>
                            @error('body')
                            <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center">
                            <button type="submit" class="btn-modern group w-full md:w-auto" data-magnetic data-ripple
                                wire:loading.class="opacity-75 cursor-not-allowed">
                                <span class="relative z-10 flex items-center justify-center gap-2">
                                    <span wire:loading.remove>Send Message</span>
                                    <span wire:loading>Sending...</span>
                                    <i class="bi bi-send transform group-hover:translate-x-1 transition-transform duration-300"
                                        wire:loading.remove></i>
                                    <i class="bi bi-arrow-repeat animate-spin" wire:loading></i>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Contact Section -->