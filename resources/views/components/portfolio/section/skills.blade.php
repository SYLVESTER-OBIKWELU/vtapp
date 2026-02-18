<!-- Skills Section -->
<section id="skills" class="relative py-24 xl:ml-72 overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-800 via-slate-900 to-slate-800"></div>

    <!-- Grid Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0"
            style="background-image: linear-gradient(rgba(255,255,255,.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.1) 1px, transparent 1px); background-size: 50px 50px;">
        </div>
    </div>

    <!-- Floating Orbs -->
    <div class="absolute top-1/4 left-10 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-1/4 right-10 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl animate-pulse"
        style="animation-delay: 1s;"></div>

    <div class="container relative mx-auto px-6 lg:px-12">
        <!-- Section Header -->
        <div class="text-center mb-16" data-scroll-reveal>
            <span
                class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-purple-500/20 to-pink-500/20 text-purple-400 text-sm font-semibold tracking-wider uppercase mb-4">
                My Skills
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Technical <span
                    class="bg-gradient-to-r from-purple-400 to-pink-500 bg-clip-text text-transparent">Expertise</span>
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Technologies and tools I work with to bring ideas to life</p>
            <div class="w-24 h-1 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto rounded-full mt-4"></div>
        </div>

        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Technical Skills -->
            <div class="space-y-6" data-scroll-reveal>
                <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center">
                        <i class="bi bi-code-slash text-white"></i>
                    </div>
                    Development Skills
                </h3>

                <!-- Skill Bars -->
                @php
                $devSkills = [
                ['name' => 'PHP / Laravel', 'level' => 95, 'color' => 'from-red-500 to-pink-500'],
                ['name' => 'JavaScript / Vue.js / React', 'level' => 90, 'color' => 'from-cyan-500 to-blue-500'],
                ['name' => 'HTML5 / CSS3 / Tailwind CSS', 'level' => 95, 'color' => 'from-orange-500 to-red-500'],
                ['name' => 'Flutter / Dart', 'level' => 80, 'color' => 'from-blue-400 to-cyan-400'],
                ['name' => 'WordPress / CMS', 'level' => 85, 'color' => 'from-blue-600 to-indigo-500'],
                ['name' => 'MySQL / PostgreSQL', 'level' => 88, 'color' => 'from-yellow-500 to-orange-500'],
                ];
                @endphp

                @foreach($devSkills as $skill)
                <div class="skill-item group">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-300 font-medium group-hover:text-white transition-colors">{{
                            $skill['name'] }}</span>
                        <span class="text-cyan-400 font-semibold">{{ $skill['level'] }}%</span>
                    </div>
                    <div class="h-3 bg-slate-700/50 rounded-full overflow-hidden">
                        <div class="skill-bar h-full bg-gradient-to-r {{ $skill['color'] }} rounded-full relative"
                            style="width: 0%;" data-width="{{ $skill['level'] }}%">
                            <div class="absolute inset-0 bg-white/20 animate-shimmer"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Design Skills -->
            <div class="space-y-6" data-scroll-reveal>
                <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center">
                        <i class="bi bi-palette text-white"></i>
                    </div>
                    Design & Other Skills
                </h3>

                @php
                $designSkills = [
                ['name' => 'UI/UX Design', 'level' => 88, 'color' => 'from-purple-500 to-pink-500'],
                ['name' => 'Figma', 'level' => 90, 'color' => 'from-pink-500 to-rose-500'],
                ['name' => 'SEO Optimization', 'level' => 85, 'color' => 'from-emerald-500 to-teal-500'],
                ['name' => 'Performance Optimization', 'level' => 82, 'color' => 'from-amber-500 to-orange-500'],
                ['name' => 'DevOps & Deployment', 'level' => 78, 'color' => 'from-blue-500 to-indigo-500'],
                ];
                @endphp

                @foreach($designSkills as $skill)
                <div class="skill-item group">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-300 font-medium group-hover:text-white transition-colors">{{
                            $skill['name'] }}</span>
                        <span class="text-purple-400 font-semibold">{{ $skill['level'] }}%</span>
                    </div>
                    <div class="h-3 bg-slate-700/50 rounded-full overflow-hidden">
                        <div class="skill-bar h-full bg-gradient-to-r {{ $skill['color'] }} rounded-full relative"
                            style="width: 0%;" data-width="{{ $skill['level'] }}%">
                            <div class="absolute inset-0 bg-white/20 animate-shimmer"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Tech Stack Icons -->
        <div class="mt-20" data-scroll-reveal>
            <h3 class="text-center text-xl font-bold text-white mb-10">Technologies I Work With</h3>
            <div class="flex flex-wrap justify-center gap-6">
                @php
                $techIcons = [
                ['icon' => 'bi-filetype-html', 'name' => 'HTML5', 'color' => 'from-orange-500 to-red-500'],
                ['icon' => 'bi-filetype-css', 'name' => 'CSS3', 'color' => 'from-blue-500 to-cyan-500'],
                ['icon' => 'bi-filetype-js', 'name' => 'JavaScript', 'color' => 'from-yellow-400 to-orange-400'],
                ['icon' => 'bi-filetype-php', 'name' => 'PHP', 'color' => 'from-indigo-500 to-purple-500'],
                ['icon' => 'bi-bootstrap', 'name' => 'Tailwind', 'color' => 'from-cyan-400 to-blue-500'],
                ['icon' => 'bi-phone', 'name' => 'Flutter', 'color' => 'from-blue-400 to-cyan-400'],
                ['icon' => 'bi-wordpress', 'name' => 'WordPress', 'color' => 'from-blue-600 to-indigo-500'],
                ['icon' => 'bi-git', 'name' => 'Git', 'color' => 'from-orange-500 to-red-600'],
                ['icon' => 'bi-database', 'name' => 'MySQL', 'color' => 'from-blue-600 to-cyan-500'],
                ['icon' => 'bi-cloud', 'name' => 'DigitalOcean', 'color' => 'from-blue-500 to-cyan-400'],
                ];
                @endphp

                @foreach($techIcons as $tech)
                <div class="group relative" data-tilt>
                    <div
                        class="glass rounded-2xl p-6 hover:bg-white/10 transition-all duration-300 transform hover:-translate-y-2">
                        <div
                            class="w-16 h-16 rounded-xl bg-gradient-to-r {{ $tech['color'] }} flex items-center justify-center mb-3 mx-auto group-hover:scale-110 transition-transform duration-300">
                            <i class="{{ $tech['icon'] }} text-white text-3xl"></i>
                        </div>
                        <p class="text-gray-400 text-sm text-center group-hover:text-white transition-colors">{{
                            $tech['name'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes shimmer {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .animate-shimmer {
        animation: shimmer 2s infinite;
    }

    .skill-bar {
        transition: width 1.5s ease-out;
    }
</style>

<script>
    // Animate skill bars on scroll
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const bars = entry.target.querySelectorAll('.skill-bar');
                    bars.forEach(bar => {
                        const width = bar.getAttribute('data-width');
                        setTimeout(() => {
                            bar.style.width = width;
                        }, 200);
                    });
                }
            });
        }, { threshold: 0.3 });

        document.querySelectorAll('#skills').forEach(section => {
            observer.observe(section);
        });
    });
</script>