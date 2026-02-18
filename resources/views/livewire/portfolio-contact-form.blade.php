<!-- Portfolio Contact Section -->
<div>
<section id="contact" class="relative py-24 xl:ml-72 overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-800 via-slate-900 to-slate-800"></div>

    <!-- Animated Background -->
    <div class="absolute inset-0">
        <div
            class="absolute top-0 left-1/4 w-96 h-96 bg-gradient-to-br from-cyan-500/10 to-blue-500/10 rounded-full blur-3xl animate-pulse">
        </div>
        <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-gradient-to-tr from-purple-500/10 to-pink-500/10 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 1s;"></div>
    </div>

    <div class="container relative mx-auto px-6 lg:px-12">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span
                class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-cyan-500/20 to-blue-500/20 text-cyan-400 text-sm font-semibold tracking-wider uppercase mb-4">
                Get In Touch
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Let's <span
                    class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Connect</span>
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Have a question or want to work together? I'd love to hear from
                you!</p>
            <div class="w-24 h-1 bg-gradient-to-r from-cyan-500 to-blue-500 mx-auto rounded-full mt-4"></div>
        </div>

        <div class="grid lg:grid-cols-5 gap-12">
            <!-- Contact Info Column -->
            <div class="lg:col-span-2 space-y-6" wire:ignore>
                <div class="glass rounded-2xl p-8 h-full">
                    <h3 class="text-2xl font-bold text-white mb-6">Contact Information</h3>
                    <p class="text-gray-400 mb-8">Feel free to reach out. I'm always open to discussing new projects,
                        creative ideas or opportunities to be part of your vision.</p>

                    <!-- Contact Cards -->
                    <div class="space-y-6">
                        <div class="flex items-start gap-4 group">
                            <div
                                class="w-14 h-14 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <i class="bi bi-envelope text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Email</h4>
                                <a href="mailto:theopensly@gmail.com"
                                    class="text-gray-400 hover:text-cyan-400 transition-colors">theopensly@gmail.com</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 group">
                            <div
                                class="w-14 h-14 rounded-xl bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <i class="bi bi-phone text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Phone</h4>
                                <a href="tel:+2347018508896"
                                    class="text-gray-400 hover:text-purple-400 transition-colors">+234 7018508896</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 group">
                            <div
                                class="w-14 h-14 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-500 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <i class="bi bi-geo-alt text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Location</h4>
                                <p class="text-gray-400">Awka, Anambra State, Nigeria</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="mt-10">
                        <h4 class="text-white font-semibold mb-4">Follow Me</h4>
                        <div class="flex gap-3">
                            <a href="https://www.linkedin.com/in/sylvester-obikwelu-997aa9241/" target="_blank"
                                class="w-12 h-12 rounded-full glass flex items-center justify-center text-gray-400 hover:text-white hover:bg-gradient-to-r hover:from-cyan-500 hover:to-blue-500 transition-all duration-300">
                                <i class="bi bi-linkedin text-lg"></i>
                            </a>
                            <a href="https://github.com/SYLVESTER-OBIKWELU" target="_blank"
                                class="w-12 h-12 rounded-full glass flex items-center justify-center text-gray-400 hover:text-white hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-500 transition-all duration-300">
                                <i class="bi bi-github text-lg"></i>
                            </a>
                            <a href="https://x.com/Donvestar" target="_blank"
                                class="w-12 h-12 rounded-full glass flex items-center justify-center text-gray-400 hover:text-white hover:bg-gradient-to-r hover:from-blue-400 hover:to-blue-500 transition-all duration-300">
                                <i class="bi bi-twitter-x text-lg"></i>
                            </a>
                            <a href="https://www.instagram.com/iam_donvest/" target="_blank"
                                class="w-12 h-12 rounded-full glass flex items-center justify-center text-gray-400 hover:text-white hover:bg-gradient-to-r hover:from-pink-500 hover:to-rose-500 transition-all duration-300">
                                <i class="bi bi-instagram text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form Column -->
            <div class="lg:col-span-3">
                <div class="glass rounded-2xl p-8">
                    <h3 class="text-2xl font-bold text-white mb-6">Send a Message</h3>

                    <form wire:submit.prevent="sendMessage" class="space-y-6">
                        <div class="grid sm:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name" class="block text-gray-300 text-sm font-medium mb-2">Your Name</label>
                                <div class="relative">
                                    <input type="text" id="name" wire:model="name" required
                                        class="w-full px-5 py-4 rounded-xl bg-slate-800/50 border border-slate-700 text-white placeholder-gray-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all duration-300"
                                        placeholder="John Doe">
                                    <i class="bi bi-person absolute right-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                                </div>
                                @error('name')
                                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="block text-gray-300 text-sm font-medium mb-2">Your
                                    Email</label>
                                <div class="relative">
                                    <input type="email" id="email" wire:model="email" required
                                        class="w-full px-5 py-4 rounded-xl bg-slate-800/50 border border-slate-700 text-white placeholder-gray-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all duration-300"
                                        placeholder="john@example.com">
                                    <i
                                        class="bi bi-envelope absolute right-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                                </div>
                                @error('email')
                                <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Subject -->
                        <div class="form-group">
                            <label for="subject" class="block text-gray-300 text-sm font-medium mb-2">Subject</label>
                            <div class="relative">
                                <input type="text" id="subject" wire:model="subject" required
                                    class="w-full px-5 py-4 rounded-xl bg-slate-800/50 border border-slate-700 text-white placeholder-gray-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all duration-300"
                                    placeholder="Project Inquiry">
                                <i
                                    class="bi bi-chat-left-text absolute right-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                            </div>
                            @error('subject')
                            <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Message -->
                        <div class="form-group">
                            <label for="message" class="block text-gray-300 text-sm font-medium mb-2">Your
                                Message</label>
                            <textarea id="message" wire:model="body" rows="5" required
                                class="w-full px-5 py-4 rounded-xl bg-slate-800/50 border border-slate-700 text-white placeholder-gray-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all duration-300 resize-none"
                                placeholder="Tell me about your project..."></textarea>
                            @error('body')
                            <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-modern w-full sm:w-auto"
                            wire:loading.attr="disabled"
                            wire:loading.class="opacity-75 cursor-not-allowed">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                <i class="bi bi-send" wire:loading.remove wire:target="sendMessage"></i>
                                <i class="bi bi-arrow-repeat animate-spin" wire:loading wire:target="sendMessage"></i>
                                <span wire:loading.remove wire:target="sendMessage">Send Message</span>
                                <span wire:loading wire:target="sendMessage">Sending...</span>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- /Portfolio Contact Section -->