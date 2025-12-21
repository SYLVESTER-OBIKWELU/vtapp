<!-- Resume Section -->
<section id="resume" class="relative py-24 xl:ml-72 overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900"></div>

    <!-- Decorative Elements -->
    <div
        class="absolute top-0 left-1/4 w-96 h-96 bg-gradient-to-br from-emerald-500/10 to-teal-500/10 rounded-full blur-3xl">
    </div>
    <div
        class="absolute bottom-0 right-1/4 w-80 h-80 bg-gradient-to-tr from-blue-500/10 to-cyan-500/10 rounded-full blur-3xl">
    </div>

    <!-- Spiral Decoration -->
    <div class="spiral-decoration absolute bottom-20 left-10 w-24 h-24 opacity-10"></div>

    <div class="container relative mx-auto px-6 lg:px-12">
        <!-- Section Header -->
        <div class="text-center mb-16" data-scroll-reveal>
            <span
                class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-emerald-500/20 to-teal-500/20 text-emerald-400 text-sm font-semibold tracking-wider uppercase mb-4">
                My Resume
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Experience & <span
                    class="bg-gradient-to-r from-emerald-400 to-teal-500 bg-clip-text text-transparent">Education</span>
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">My professional journey and academic background</p>
            <div class="w-24 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 mx-auto rounded-full mt-4"></div>
        </div>

        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Experience Column -->
            <div data-scroll-reveal>
                <h3 class="text-2xl font-bold text-white mb-8 flex items-center gap-3">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center">
                        <i class="bi bi-briefcase text-white text-xl"></i>
                    </div>
                    Work Experience
                </h3>

                <!-- Timeline -->
                <div class="relative pl-8 border-l-2 border-cyan-500/30 space-y-8">
                    @php
                    $experiences = [
                    [
                    'title' => 'Senior Full-Stack Developer',
                    'company' => 'Tech Innovations Inc.',
                    'period' => '2022 - Present',
                    'description' => 'Leading development of enterprise web applications using Laravel, Vue.js, and AWS
                    services.',
                    'color' => 'from-cyan-500 to-blue-500'
                    ],
                    [
                    'title' => 'Full-Stack Developer',
                    'company' => 'Digital Solutions Ltd.',
                    'period' => '2020 - 2022',
                    'description' => 'Developed and maintained multiple client projects, focusing on performance
                    optimization and clean code practices.',
                    'color' => 'from-blue-500 to-purple-500'
                    ],
                    [
                    'title' => 'Junior Developer',
                    'company' => 'StartUp Hub',
                    'period' => '2019 - 2020',
                    'description' => 'Started my professional journey building responsive websites and learning modern
                    development practices.',
                    'color' => 'from-purple-500 to-pink-500'
                    ],
                    ];
                    @endphp

                    @foreach($experiences as $exp)
                    <div class="relative group">
                        <!-- Timeline Dot -->
                        <div
                            class="absolute -left-[41px] top-0 w-5 h-5 rounded-full bg-gradient-to-r {{ $exp['color'] }} border-4 border-slate-900 group-hover:scale-125 transition-transform duration-300">
                        </div>

                        <!-- Card -->
                        <div class="glass rounded-2xl p-6 hover:bg-white/10 transition-all duration-300 transform hover:-translate-y-1"
                            data-tilt>
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <span
                                    class="px-3 py-1 rounded-full bg-gradient-to-r {{ $exp['color'] }} text-white text-xs font-semibold">
                                    {{ $exp['period'] }}
                                </span>
                            </div>
                            <h4 class="text-xl font-bold text-white mb-1">{{ $exp['title'] }}</h4>
                            <p class="text-cyan-400 font-medium mb-3">{{ $exp['company'] }}</p>
                            <p class="text-gray-400 text-sm leading-relaxed">{{ $exp['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Education Column -->
            <div data-scroll-reveal>
                <h3 class="text-2xl font-bold text-white mb-8 flex items-center gap-3">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-500 flex items-center justify-center">
                        <i class="bi bi-mortarboard text-white text-xl"></i>
                    </div>
                    Education
                </h3>

                <!-- Timeline -->
                <div class="relative pl-8 border-l-2 border-emerald-500/30 space-y-8">
                    @php
                    $education = [
                    [
                    'degree' => 'Master in Computer Science',
                    'school' => 'MIT University',
                    'period' => '2018 - 2019',
                    'description' => 'Specialized in Software Engineering and Machine Learning. Graduated with honors.',
                    'color' => 'from-emerald-500 to-teal-500'
                    ],
                    [
                    'degree' => 'Bachelor in Computer Science',
                    'school' => 'Stanford University',
                    'period' => '2014 - 2018',
                    'description' => 'Comprehensive study of computer science fundamentals, algorithms, and software
                    development.',
                    'color' => 'from-teal-500 to-cyan-500'
                    ],
                    [
                    'degree' => 'Web Development Bootcamp',
                    'school' => 'Udacity',
                    'period' => '2014',
                    'description' => 'Intensive training in modern web development technologies and best practices.',
                    'color' => 'from-cyan-500 to-blue-500'
                    ],
                    ];
                    @endphp

                    @foreach($education as $edu)
                    <div class="relative group">
                        <!-- Timeline Dot -->
                        <div
                            class="absolute -left-[41px] top-0 w-5 h-5 rounded-full bg-gradient-to-r {{ $edu['color'] }} border-4 border-slate-900 group-hover:scale-125 transition-transform duration-300">
                        </div>

                        <!-- Card -->
                        <div class="glass rounded-2xl p-6 hover:bg-white/10 transition-all duration-300 transform hover:-translate-y-1"
                            data-tilt>
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <span
                                    class="px-3 py-1 rounded-full bg-gradient-to-r {{ $edu['color'] }} text-white text-xs font-semibold">
                                    {{ $edu['period'] }}
                                </span>
                            </div>
                            <h4 class="text-xl font-bold text-white mb-1">{{ $edu['degree'] }}</h4>
                            <p class="text-emerald-400 font-medium mb-3">{{ $edu['school'] }}</p>
                            <p class="text-gray-400 text-sm leading-relaxed">{{ $edu['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Certifications -->
        <div class="mt-20" data-scroll-reveal>
            <h3 class="text-2xl font-bold text-white text-center mb-10">Certifications & Awards</h3>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                $certs = [
                ['icon' => 'bi-patch-check-fill', 'title' => 'AWS Certified', 'org' => 'Amazon Web Services', 'color' =>
                'from-orange-500 to-amber-500'],
                ['icon' => 'bi-google', 'title' => 'Google Cloud', 'org' => 'Google', 'color' => 'from-blue-500
                to-green-500'],
                ['icon' => 'bi-trophy-fill', 'title' => 'Best Developer', 'org' => 'Tech Awards 2023', 'color' =>
                'from-yellow-500 to-orange-500'],
                ['icon' => 'bi-award-fill', 'title' => 'Laravel Expert', 'org' => 'Laravel Certified', 'color' =>
                'from-red-500 to-pink-500'],
                ];
                @endphp

                @foreach($certs as $cert)
                <div class="glass rounded-2xl p-6 text-center hover:bg-white/10 transition-all duration-300 transform hover:-translate-y-2 group"
                    data-tilt>
                    <div
                        class="w-16 h-16 rounded-full bg-gradient-to-r {{ $cert['color'] }} flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="{{ $cert['icon'] }} text-white text-2xl"></i>
                    </div>
                    <h4 class="text-white font-bold mb-1">{{ $cert['title'] }}</h4>
                    <p class="text-gray-400 text-sm">{{ $cert['org'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Download CV Button -->
        <div class="text-center mt-12" data-scroll-reveal>
            <a href="#" class="btn-modern magnetic-btn inline-flex items-center gap-3">
                <i class="bi bi-download text-lg"></i>
                <span>Download Full Resume</span>
            </a>
        </div>
    </div>
</section>