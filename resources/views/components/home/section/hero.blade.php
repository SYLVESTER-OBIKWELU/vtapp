<!-- Hero Section -->
<section id="hero"
  class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
  <!-- Animated Background -->
  <div class="absolute inset-0">
    <img src="{{asset('home/img/hero-bg-2.jpg')}}" alt="" class="absolute inset-0 w-full h-full object-cover opacity-20"
      data-parallax="0.3" />
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900/90 via-slate-800/80 to-cyan-900/40"></div>
  </div>

  <!-- Floating Particles -->
  <div class="particles">
    @for ($i = 0; $i < 20; $i++) <div class="particle"
      style="left: {{ rand(0, 100) }}%; animation-delay: {{ $i * 0.5 }}s; animation-duration: {{ rand(15, 25) }}s;">
  </div>
  @endfor
  </div>

  <!-- Spiral Decorations -->
  <div class="spiral-decoration top-20 left-10" data-spiral="30" data-spiral-speed="0.5"></div>
  <div class="spiral-decoration bottom-20 right-10" data-spiral="40" data-spiral-speed="0.7"></div>

  <!-- Glowing Orbs -->
  <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl animate-pulse"></div>
  <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-500/20 rounded-full blur-3xl animate-pulse"
    style="animation-delay: 1s;"></div>
  <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl animate-pulse"
    style="animation-delay: 2s;"></div>

  <div class="container mx-auto mt-30 px-4 lg:px-8 relative z-10">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
      <!-- Hero Content -->
      <div class="text-center lg:text-left order-2 lg:order-1" data-scroll-reveal="left">
        <div
          class="inline-flex items-center gap-2 px-4 py-2 bg-white/5 backdrop-blur-sm rounded-full border border-white/10 mb-6">
          <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
          <span class="text-sm text-gray-300">Available for new projects</span>
        </div>

        <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold leading-tight mb-6">
          <span class="text-white">Build Your</span><br>
          <span class="text-white">Applications With</span><br>
          <span
            class="bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-500 bg-clip-text text-transparent gradient-animate neon-text"
            data-scramble>
            VTAPP
          </span>
        </h1>

        <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-xl mx-auto lg:mx-0">
          We are a team of talented developers crafting <span class="text-cyan-400">innovative digital solutions</span>
          that transform your ideas into reality.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
          <a href="#about" class="btn-modern group" data-magnetic data-ripple>
            <span class="relative z-10 flex items-center justify-center gap-2">
              Get Started
              <i class="bi bi-arrow-right transform group-hover:translate-x-1 transition-transform duration-300"></i>
            </span>
          </a>
          <a href="#features" class="btn-outline-modern group" data-magnetic>
            <span class="flex items-center justify-center gap-2">
              <i class="bi bi-play-circle"></i>
              Learn More
            </span>
          </a>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-3 gap-8 mt-12 pt-8 border-t border-white/10">
          <div class="text-center lg:text-left" data-scroll-reveal>
            <div class="text-3xl md:text-4xl font-bold text-white" data-counter="50" data-counter-suffix="+">0+</div>
            <div class="text-sm text-gray-400 mt-1">Projects Completed</div>
          </div>
          <div class="text-center lg:text-left" data-scroll-reveal>
            <div class="text-3xl md:text-4xl font-bold text-white" data-counter="30" data-counter-suffix="+">0+</div>
            <div class="text-sm text-gray-400 mt-1">Happy Clients</div>
          </div>
          <div class="text-center lg:text-left" data-scroll-reveal>
            <div class="text-3xl md:text-4xl font-bold text-white" data-counter="4" data-counter-suffix="+">0+</div>
            <div class="text-sm text-gray-400 mt-1">Years Experience</div>
          </div>
        </div>
      </div>

      <!-- Hero Image -->
      <div class="order-1 lg:order-2 flex justify-center lg:justify-end" data-scroll-reveal="right">
        <div class="relative" data-tilt>
          <!-- Glow Effect -->
          <div
            class="absolute -inset-4 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-3xl blur-2xl opacity-30 animate-pulse">
          </div>

          <!-- Image Container -->
          <div class="relative glass rounded-3xl p-4">
            <img src="{{asset('home/img/hero-img.png')}}" alt="Hero Image"
              class="w-full max-w-lg h-auto float-animation" />
          </div>

          <!-- Floating Elements -->
          <div class="absolute -top-6 -left-6 w-20 h-20 glass rounded-2xl flex items-center justify-center float-slow"
            style="animation-delay: 0.5s;">
            <i class="bi bi-code-slash text-3xl text-cyan-400"></i>
          </div>
          <div
            class="absolute -bottom-6 -right-6 w-20 h-20 glass rounded-2xl flex items-center justify-center float-slow"
            style="animation-delay: 1s;">
            <i class="bi bi-gear text-3xl text-blue-400"></i>
          </div>
          <div class="absolute top-1/2 -right-10 w-16 h-16 glass rounded-xl flex items-center justify-center float-slow"
            style="animation-delay: 1.5s;">
            <i class="bi bi-lightning-charge text-2xl text-purple-400"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Wave Decoration -->
  <div class="wave-container">
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
  </div>
</section>
<!-- /Hero Section -->