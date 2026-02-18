<!-- Services Section -->
<section id="services" class="relative py-24 xl:ml-72 overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900"></div>

    <!-- Grid Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0"
            style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.2) 1px, transparent 0); background-size: 40px 40px;">
        </div>
    </div>

    <!-- Decorative Orbs -->
    <div
        class="absolute top-1/3 left-0 w-80 h-80 bg-gradient-to-r from-amber-500/10 to-orange-500/10 rounded-full blur-3xl">
    </div>
    <div
        class="absolute bottom-1/3 right-0 w-72 h-72 bg-gradient-to-l from-cyan-500/10 to-blue-500/10 rounded-full blur-3xl">
    </div>

    <!-- Spiral Decoration -->
    <div class="spiral-decoration absolute top-20 right-20 w-28 h-28 opacity-15"></div>

    <div class="container relative mx-auto px-6 lg:px-12">
        <!-- Section Header -->
        <div class="text-center mb-16" data-scroll-reveal>
            <span
                class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-amber-500/20 to-orange-500/20 text-amber-400 text-sm font-semibold tracking-wider uppercase mb-4">
                What I Do
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                My <span
                    class="bg-gradient-to-r from-amber-400 to-orange-500 bg-clip-text text-transparent">Services</span>
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Professional services I offer to help bring your ideas to life
            </p>
            <div class="w-24 h-1 bg-gradient-to-r from-amber-500 to-orange-500 mx-auto rounded-full mt-4"></div>
        </div>

        <!-- Services Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
            $services = [
            [
            'icon' => 'bi-code-square',
            'title' => 'Custom Web Development',
            'description' => 'Building fast, responsive, SEO-optimized websites and web applications using Laravel, React, Vue.js, and Tailwind CSS.',
            'features' => ['Custom Web Apps', 'E-commerce Solutions', 'SaaS Platforms'],
            'color' => 'from-cyan-500 to-blue-500'
            ],
            [
            'icon' => 'bi-phone',
            'title' => 'Mobile App Development',
            'description' => 'Creating cross-platform mobile apps with Flutter and React Native for iOS and Android with seamless UX.',
            'features' => ['iOS & Android Apps', 'Flutter & React Native', 'App Store Deployment'],
            'color' => 'from-purple-500 to-pink-500'
            ],
            [
            'icon' => 'bi-search',
            'title' => 'SEO & Digital Marketing',
            'description' => 'Boosting your search rankings with on-page SEO, technical audits, keyword research, content strategy, and link building.',
            'features' => ['Technical SEO Audit', 'Keyword Research', 'Monthly Reports'],
            'color' => 'from-emerald-500 to-teal-500'
            ],
            [
            'icon' => 'bi-wordpress',
            'title' => 'CMS & WordPress Solutions',
            'description' => 'Custom WordPress themes, plugins, and headless CMS integrations. Full site setup, migration, and optimization.',
            'features' => ['Custom Themes', 'Plugin Development', 'CMS Migration'],
            'color' => 'from-blue-600 to-indigo-500'
            ],
            [
            'icon' => 'bi-wrench-adjustable',
            'title' => 'Maintenance & Support',
            'description' => 'Ongoing website and app maintenance including security updates, performance monitoring, backups, and 24/7 uptime watching.',
            'features' => ['Security Updates', '24/7 Monitoring', 'Performance Optimization'],
            'color' => 'from-amber-500 to-orange-500'
            ],
            [
            'icon' => 'bi-palette',
            'title' => 'UI/UX Design & Branding',
            'description' => 'User-centric interface design, wireframing, prototyping, and brand identity that converts visitors into customers.',
            'features' => ['Figma Prototypes', 'User Research', 'Brand Identity'],
            'color' => 'from-pink-500 to-rose-500'
            ],
            ];
            @endphp

            @foreach($services as $index => $service)
            <div class="group" data-scroll-reveal style="--delay: {{ $index * 0.1 }}s">
                <div class="h-full glass rounded-2xl p-8 hover:bg-white/10 transition-all duration-500 transform hover:-translate-y-2 relative overflow-hidden"
                    data-tilt>
                    <!-- Gradient Border Effect -->
                    <div
                        class="absolute inset-0 rounded-2xl bg-gradient-to-r {{ $service['color'] }} opacity-0 group-hover:opacity-20 transition-opacity duration-500">
                    </div>

                    <!-- Icon -->
                    <div class="relative mb-6">
                        <div
                            class="w-16 h-16 rounded-2xl bg-gradient-to-r {{ $service['color'] }} flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                            <i class="{{ $service['icon'] }} text-white text-2xl"></i>
                        </div>
                        <!-- Floating particles -->
                        <div
                            class="absolute -top-2 -right-2 w-4 h-4 rounded-full bg-gradient-to-r {{ $service['color'] }} opacity-0 group-hover:opacity-50 transform scale-0 group-hover:scale-100 transition-all duration-500 delay-100">
                        </div>
                        <div
                            class="absolute -bottom-1 -left-1 w-3 h-3 rounded-full bg-gradient-to-r {{ $service['color'] }} opacity-0 group-hover:opacity-50 transform scale-0 group-hover:scale-100 transition-all duration-500 delay-200">
                        </div>
                    </div>

                    <!-- Content -->
                    <h3
                        class="relative text-xl font-bold text-white mb-3 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:{{ $service['color'] }} group-hover:bg-clip-text transition-all duration-300">
                        {{ $service['title'] }}
                    </h3>
                    <p class="relative text-gray-400 mb-6 leading-relaxed">
                        {{ $service['description'] }}
                    </p>

                    <!-- Features List -->
                    <ul class="relative space-y-2">
                        @foreach($service['features'] as $feature)
                        <li class="flex items-center gap-2 text-gray-300 text-sm">
                            <i
                                class="bi bi-check-circle-fill text-transparent bg-gradient-to-r {{ $service['color'] }} bg-clip-text"></i>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>

                    <!-- Hover Arrow -->
                    <div
                        class="absolute bottom-6 right-6 w-10 h-10 rounded-full bg-gradient-to-r {{ $service['color'] }} flex items-center justify-center opacity-0 group-hover:opacity-100 transform translate-x-4 group-hover:translate-x-0 transition-all duration-500">
                        <i class="bi bi-arrow-right text-white"></i>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- CTA Section -->
        <div class="mt-20 glass rounded-3xl p-8 md:p-12 relative overflow-hidden" data-scroll-reveal>
            <!-- Background Gradient -->
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 via-purple-500/10 to-pink-500/10"></div>

            <div class="relative flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="text-center md:text-left">
                    <h3 class="text-2xl md:text-3xl font-bold text-white mb-3">Have a Project in Mind?</h3>
                    <p class="text-gray-400">Let's work together to create something amazing</p>
                </div>
                <a href="#contact" class="btn-modern magnetic-btn whitespace-nowrap">
                    <span class="relative z-10 flex items-center gap-2">
                        <i class="bi bi-send"></i>
                        Start a Project
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>