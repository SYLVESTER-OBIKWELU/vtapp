<!-- Footer & Newsletter Section -->
<footer id="footer" class="relative bg-gradient-to-b from-slate-800 to-slate-900 overflow-hidden">
    <!-- Newsletter Section -->
    <div class="relative py-16 lg:py-20 border-b border-white/10">
        <!-- Background Decorations -->
        <div class="absolute -top-20 left-1/4 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 right-1/4 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl"></div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center" data-scroll-reveal>
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-500/10 rounded-full border border-cyan-500/20 mb-6">
                    <i class="bi bi-envelope-paper text-cyan-400"></i>
                    <span class="text-sm font-medium text-cyan-400">Newsletter</span>
                </div>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-4">
                    Stay Updated With Our <span
                        class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Newsletter</span>
                </h2>
                <p class="text-gray-400 mb-8 max-w-xl mx-auto">
                    Subscribe to receive the latest news about our products, services, and exclusive offers!
                </p>

                <form wire:submit.prevent="subcribe" class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                    <div class="flex-1">
                        <input type="email" wire:model="newsletter"
                            class="w-full px-6 py-4 bg-white/5 border border-white/10 rounded-full text-white placeholder-gray-400 focus:outline-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20 transition-all duration-300"
                            placeholder="Enter your email" />
                    </div>
                    <button type="submit"
                        class="px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full text-white font-semibold hover:shadow-lg hover:shadow-cyan-500/25 hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2"
                        data-ripple wire:loading.class="opacity-75">
                        <span wire:loading.remove>Subscribe</span>
                        <span wire:loading>Please wait...</span>
                        <i class="bi bi-arrow-right" wire:loading.remove></i>
                    </button>
                </form>
                @error('newsletter')
                <p class="text-red-400 text-sm mt-3">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <!-- Footer Content -->
    <div class="py-16 lg:py-20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- Brand -->
                <div class="lg:col-span-1" data-scroll-reveal>
                    <a href="{{route('home')}}" class="inline-block mb-6">
                        <img src="{{asset('home/img/logo.png')}}" alt="VTAPP Logo" class="h-16 w-auto" />
                    </a>
                    <div class="space-y-3 text-gray-400">
                        <p>Awka, Anambra State</p>
                        <p>Nigeria, AWK 420102</p>
                        <a href="tel:+2347018508896" class="block hover:text-cyan-400 transition-colors duration-300">
                            <strong class="text-white">Phone:</strong> +234 7018508896
                        </a>
                        <a href="mailto:hello@vtapp.com.ng"
                            class="block hover:text-cyan-400 transition-colors duration-300">
                            <strong class="text-white">Email:</strong> hello@vtapp.com.ng
                        </a>
                    </div>

                    <!-- Social Links -->
                    <div class="flex gap-3 mt-6">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:text-white hover:bg-cyan-500 hover:border-cyan-500 transition-all duration-300">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:text-white hover:bg-blue-600 hover:border-blue-600 transition-all duration-300">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:text-white hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-500 hover:border-transparent transition-all duration-300">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:text-white hover:bg-blue-700 hover:border-blue-700 transition-all duration-300">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>

                <!-- Useful Links -->
                <div data-scroll-reveal style="transition-delay: 0.1s;">
                    <h4 class="text-lg font-semibold text-white mb-6">Useful Links</h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="#hero"
                                class="text-gray-400 hover:text-cyan-400 transition-colors duration-300 flex items-center gap-2 group">
                                <i
                                    class="bi bi-chevron-right text-xs text-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#about"
                                class="text-gray-400 hover:text-cyan-400 transition-colors duration-300 flex items-center gap-2 group">
                                <i
                                    class="bi bi-chevron-right text-xs text-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                About us
                            </a>
                        </li>
                        <li>
                            <a href="#features"
                                class="text-gray-400 hover:text-cyan-400 transition-colors duration-300 flex items-center gap-2 group">
                                <i
                                    class="bi bi-chevron-right text-xs text-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Services
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-cyan-400 transition-colors duration-300 flex items-center gap-2 group">
                                <i
                                    class="bi bi-chevron-right text-xs text-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Terms of service
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-cyan-400 transition-colors duration-300 flex items-center gap-2 group">
                                <i
                                    class="bi bi-chevron-right text-xs text-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Privacy policy
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Our Services -->
                <div data-scroll-reveal style="transition-delay: 0.2s;">
                    <h4 class="text-lg font-semibold text-white mb-6">Our Services</h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-cyan-400 transition-colors duration-300 flex items-center gap-2 group">
                                <i
                                    class="bi bi-chevron-right text-xs text-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Graphic Design
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-cyan-400 transition-colors duration-300 flex items-center gap-2 group">
                                <i
                                    class="bi bi-chevron-right text-xs text-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Web Design
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-cyan-400 transition-colors duration-300 flex items-center gap-2 group">
                                <i
                                    class="bi bi-chevron-right text-xs text-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Web Development
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-cyan-400 transition-colors duration-300 flex items-center gap-2 group">
                                <i
                                    class="bi bi-chevron-right text-xs text-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                App Development
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="text-gray-400 hover:text-cyan-400 transition-colors duration-300 flex items-center gap-2 group">
                                <i
                                    class="bi bi-chevron-right text-xs text-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                                Product Management
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact CTA -->
                <div data-scroll-reveal style="transition-delay: 0.3s;">
                    <h4 class="text-lg font-semibold text-white mb-6">Get Started</h4>
                    <p class="text-gray-400 mb-6">Ready to bring your ideas to life? Let's create something amazing
                        together.</p>
                    <a href="#contact"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full text-white font-semibold hover:shadow-lg hover:shadow-cyan-500/25 hover:-translate-y-0.5 transition-all duration-300">
                        <span>Contact Us</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="py-6 border-t border-white/10">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-center md:text-left">
                <p class="text-gray-400 text-sm">
                    © <span id="current-year"></span> Copyright <strong class="text-white">VTAPP</strong>. All Rights
                    Reserved
                </p>
                <p class="text-gray-500 text-sm">
                    Designed by <a href="https://vtapp.com.ng/"
                        class="text-cyan-400 hover:text-cyan-300 transition-colors duration-300">Virtual App
                        Technologies</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<script>
    document.getElementById('current-year').textContent = new Date().getFullYear();
</script>