<!-- Portfolio Hero Section -->
<section id="hero"
    class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 xl:ml-72">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{asset('portfolio/img/Portfolio.jpg')}}" alt=""
            class="absolute inset-0 w-full h-full object-cover opacity-30" data-parallax="0.3" />
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-slate-800/70 to-cyan-900/50"></div>
    </div>

    <!-- Floating Particles -->
    <div class="particles">
        @for ($i = 0; $i < 15; $i++) <div class="particle"
            style="left: {{ rand(0, 100) }}%; animation-delay: {{ $i * 0.7 }}s; animation-duration: {{ rand(12, 20) }}s;">
    </div>
    @endfor
    </div>

    <!-- Glowing Orbs -->
    <div class="absolute top-1/3 left-1/4 w-80 h-80 bg-cyan-500/20 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-1/3 right-1/4 w-64 h-64 bg-purple-500/20 rounded-full blur-3xl animate-pulse"
        style="animation-delay: 1.5s;"></div>

    <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center">
        <div data-scroll-reveal>
            <!-- Badge -->
            <div
                class="inline-flex items-center gap-2 px-4 py-2 bg-white/5 backdrop-blur-sm rounded-full border border-white/10 mb-8">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-sm text-gray-300">Available for freelance</span>
            </div>

            <!-- Name -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-white mb-6">
                <span class="block">Hi, I'm</span>
                <span
                    class="bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-500 bg-clip-text text-transparent gradient-animate"
                    data-scramble>
                    Sylvester Obikwelu
                </span>
            </h1>

            <!-- Typed Text -->
            <div class="text-xl md:text-2xl lg:text-3xl text-gray-300 mb-10">
                <span>I'm a </span>
                <span class="typed text-cyan-400 font-semibold"
                    data-typed-items="Project Manager,Software Developer,Freelancer,Designer"></span>
                <span class="typed-cursor text-cyan-400">|</span>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#contact" class="btn-modern group" data-magnetic data-ripple>
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        Hire Me
                        <i class="bi bi-send transform group-hover:translate-x-1 transition-transform duration-300"></i>
                    </span>
                </a>
                <a href="#portfolio" class="btn-outline-modern group" data-magnetic>
                    <span class="flex items-center justify-center gap-2">
                        <i class="bi bi-folder"></i>
                        View My Work
                    </span>
                </a>
            </div>

            <!-- Scroll Indicator -->
            <div class="mt-16 animate-bounce">
                <a href="#about"
                    class="inline-flex flex-col items-center gap-2 text-gray-400 hover:text-cyan-400 transition-colors duration-300">
                    <span class="text-sm">Scroll Down</span>
                    <i class="bi bi-chevron-double-down"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Wave Decoration -->
    {{-- <div class="wave-container">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                opacity=".25" class="fill-slate-800"></path>
            <path
                d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                opacity=".5" class="fill-slate-800"></path>
            <path
                d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                class="fill-slate-800"></path>
        </svg>
    </div> --}}
</section>
<!-- /Portfolio Hero Section -->