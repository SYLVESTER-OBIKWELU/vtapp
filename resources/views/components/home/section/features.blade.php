<!-- Features Section -->
<section id="features" class="relative py-24 lg:py-32 bg-gradient-to-b from-slate-800 to-slate-900 overflow-hidden">
  <!-- Background Elements -->
  <div
    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-gradient-to-r from-cyan-500/5 to-purple-500/5 rounded-full blur-3xl">
  </div>

  <!-- Grid Pattern -->
  <div class="absolute inset-0 opacity-5"
    style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;1&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
  </div>

  <div class="container mx-auto px-4 lg:px-8 relative z-10">
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-16" data-scroll-reveal>
      <div
        class="inline-flex items-center gap-2 px-4 py-2 bg-purple-500/10 rounded-full border border-purple-500/20 mb-6">
        <span class="text-sm font-medium text-purple-400">Features</span>
      </div>
      <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
        Powerful <span
          class="bg-gradient-to-r from-purple-400 to-pink-500 bg-clip-text text-transparent">Features</span>
      </h2>
      <p class="text-lg text-gray-400">
        Everything you need to build exceptional digital products
      </p>
    </div>

    <!-- Features Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8">
      @php
      $features = [
      ['icon' => 'bi-eye', 'title' => 'End-to-End Development', 'color' => 'from-yellow-400 to-orange-500', 'delay' =>
      '0'],
      ['icon' => 'bi-infinity', 'title' => 'Long-Term Partnership', 'color' => 'from-blue-400 to-indigo-500', 'delay' =>
      '0.1'],
      ['icon' => 'bi-mortarboard', 'title' => 'Cross-Platform Expertise', 'color' => 'from-pink-400 to-rose-500',
      'delay' => '0.2'],
      ['icon' => 'bi-nut', 'title' => 'Performance-Optimized', 'color' => 'from-purple-400 to-pink-500', 'delay' =>
      '0.3'],
      ['icon' => 'bi-shuffle', 'title' => 'Secure & Compliant', 'color' => 'from-cyan-400 to-blue-500', 'delay' =>
      '0.4'],
      ['icon' => 'bi-star', 'title' => 'Intuitive UI/UX Design', 'color' => 'from-orange-400 to-red-500', 'delay' =>
      '0.5'],
      ['icon' => 'bi-x-diamond', 'title' => 'Scalable Architecture', 'color' => 'from-teal-400 to-cyan-500', 'delay' =>
      '0.6'],
      ['icon' => 'bi-camera-video', 'title' => 'Analytics & Integrations', 'color' => 'from-indigo-400 to-purple-500',
      'delay' => '0.7'],
      ];
      @endphp

      @foreach ($features as $feature)
      <div class="group" data-scroll-reveal style="transition-delay: {{ $feature['delay'] }}s;">
        <div
          class="relative p-6 lg:p-8 rounded-2xl bg-white/5 border border-white/10 hover:border-white/20 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-500/10"
          data-tilt>
          <!-- Glow on hover -->
          <div
            class="absolute inset-0 rounded-2xl bg-gradient-to-br {{ $feature['color'] }} opacity-0 group-hover:opacity-10 transition-opacity duration-500">
          </div>

          <!-- Icon -->
          <div class="relative mb-4 lg:mb-6">
            <div
              class="w-14 h-14 lg:w-16 lg:h-16 rounded-xl bg-gradient-to-br {{ $feature['color'] }} flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
              <i class="{{ $feature['icon'] }} text-2xl lg:text-3xl text-white"></i>
            </div>
          </div>

          <!-- Title -->
          <h3
            class="relative text-sm lg:text-base font-semibold text-white group-hover:text-cyan-400 transition-colors duration-300">
            {{ $feature['title'] }}
          </h3>

          <!-- Arrow indicator -->
          <div
            class="absolute bottom-6 right-6 w-8 h-8 rounded-full bg-white/5 flex items-center justify-center opacity-0 group-hover:opacity-100 transform translate-x-2 group-hover:translate-x-0 transition-all duration-300">
            <i class="bi bi-arrow-right text-sm text-cyan-400"></i>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Bottom CTA -->
    <div class="text-center mt-16" data-scroll-reveal>
      <a href="#contact"
        class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full text-white font-semibold hover:shadow-lg hover:shadow-purple-500/25 hover:-translate-y-1 transition-all duration-300"
        data-magnetic data-ripple>
        <span>Explore All Features</span>
        <i class="bi bi-arrow-right"></i>
      </a>
    </div>
  </div>
</section>
<!-- /Features Section -->