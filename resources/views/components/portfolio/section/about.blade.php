<!-- About Section -->
<section id="about" class="relative py-24 xl:ml-72 overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900"></div>
    <div
        class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-cyan-500/10 to-blue-500/10 rounded-full blur-3xl">
    </div>
    <div
        class="absolute bottom-0 left-0 w-80 h-80 bg-gradient-to-tr from-purple-500/10 to-pink-500/10 rounded-full blur-3xl">
    </div>

    <!-- Spiral Decoration -->
    <div class="spiral-decoration absolute top-20 right-10 w-32 h-32 opacity-20"></div>

    <div class="container relative mx-auto px-6 lg:px-12">
        <!-- Section Header -->
        <div class="text-center mb-16" data-scroll-reveal>
            <span
                class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-cyan-500/20 to-blue-500/20 text-cyan-400 text-sm font-semibold tracking-wider uppercase mb-4">
                About Me
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Get To Know <span
                    class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Me</span>
            </h2>
            <div class="w-24 h-1 bg-gradient-to-r from-cyan-500 to-blue-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Profile Image Column -->
            <div class="relative" data-scroll-reveal>
                <div class="relative group">
                    <!-- Decorative Frame -->
                    <div
                        class="absolute -inset-4 bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-500 rounded-2xl opacity-30 blur-lg group-hover:opacity-50 transition-opacity duration-500">
                    </div>

                    <!-- Main Image Container -->
                    <div class="relative overflow-hidden rounded-2xl" data-tilt>
                        <img src="{{ asset('portfolio/img/Portfolio_side.jpg') }}" alt="Profile"
                            class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700">

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent">
                        </div>
                    </div>

                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -right-6 glass rounded-2xl p-4 shadow-2xl">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-12 h-12 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center">
                                <i class="bi bi-award text-white text-xl"></i>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-white" data-counter="5">0</div>
                                <div class="text-gray-400 text-sm">Years Experience</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Column -->
            <div class="space-y-8" data-scroll-reveal>
                <!-- Bio Text -->
                <div class="space-y-4">
                    <h3 class="text-2xl font-bold text-white">Full-Stack Developer & Digital Agency Founder</h3>
                    <p class="text-gray-300 leading-relaxed">
                        I'm Sylvester Obikwelu — a passionate full-stack developer and the founder of VTAPP, a digital
                        agency specializing in custom web development, mobile applications, SEO optimization, and CMS
                        solutions. I turn business ideas into high-performing digital products.
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        With expertise across Laravel, React, Vue.js, Flutter, and WordPress, I deliver end-to-end
                        solutions — from strategy and design to development, deployment, and ongoing maintenance. My
                        mission is helping businesses grow through technology that works.
                    </p>
                </div>

                <!-- Info Grid -->
                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="glass rounded-xl p-4 hover:bg-white/10 transition-colors duration-300">
                        <div class="flex items-center gap-3">
                            <i class="bi bi-person text-cyan-400 text-xl"></i>
                            <div>
                                <span class="text-gray-400 text-sm">Name</span>
                                <p class="text-white font-medium">Sylvester Obikwelu</p>
                            </div>
                        </div>
                    </div>
                    <div class="glass rounded-xl p-4 hover:bg-white/10 transition-colors duration-300">
                        <div class="flex items-center gap-3">
                            <i class="bi bi-geo-alt text-cyan-400 text-xl"></i>
                            <div>
                                <span class="text-gray-400 text-sm">Location</span>
                                <p class="text-white font-medium">Awka, Nigeria</p>
                            </div>
                        </div>
                    </div>
                    <div class="glass rounded-xl p-4 hover:bg-white/10 transition-colors duration-300">
                        <div class="flex items-center gap-3">
                            <i class="bi bi-envelope text-cyan-400 text-xl"></i>
                            <div>
                                <span class="text-gray-400 text-sm">Email</span>
                                <p class="text-white font-medium">theopensly@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="glass rounded-xl p-4 hover:bg-white/10 transition-colors duration-300">
                        <div class="flex items-center gap-3">
                            <i class="bi bi-calendar text-cyan-400 text-xl"></i>
                            <div>
                                <span class="text-gray-400 text-sm">Available</span>
                                <p class="text-green-400 font-medium">Open to work</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Row -->
                <div class="flex flex-wrap gap-8 pt-4">
                    <div class="text-center">
                        <div class="text-3xl font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent"
                            data-counter="50">0</div>
                        <div class="text-gray-400 text-sm">Projects</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent"
                            data-counter="30">0</div>
                        <div class="text-gray-400 text-sm">Happy Clients</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent"
                            data-counter="15">0</div>
                        <div class="text-gray-400 text-sm">Awards</div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#contact" class="btn-modern magnetic-btn">
                        <span class="relative z-10 flex items-center gap-2">
                            <i class="bi bi-chat-dots"></i>
                            Let's Talk
                        </span>
                    </a>
                    <a href="#" class="btn-outline-modern magnetic-btn">
                        <span class="relative z-10 flex items-center gap-2">
                            <i class="bi bi-download"></i>
                            Download CV
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>