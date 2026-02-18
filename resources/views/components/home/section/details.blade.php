<!-- How We Work Section -->
<section id="details" class="relative py-24 lg:py-32 bg-slate-900 overflow-hidden">
  <!-- Animated background lines -->
  <div class="absolute inset-0 overflow-hidden opacity-20">
    <div class="absolute top-0 left-1/4 w-px h-full bg-gradient-to-b from-transparent via-cyan-500 to-transparent">
    </div>
    <div class="absolute top-0 left-2/4 w-px h-full bg-gradient-to-b from-transparent via-purple-500 to-transparent">
    </div>
    <div class="absolute top-0 left-3/4 w-px h-full bg-gradient-to-b from-transparent via-pink-500 to-transparent">
    </div>
  </div>

  <div class="container mx-auto px-4 lg:px-8 relative z-10">
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-20" data-scroll-reveal>
      <div class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-500/10 rounded-full border border-cyan-500/20 mb-6">
        <span class="text-sm font-medium text-cyan-400">How We Work</span>
      </div>
      <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
        Our Proven <span class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Development
          Process</span>
      </h2>
      <p class="text-lg text-gray-400">
        We follow a structured, transparent process to ensure every project is delivered on time, on budget, and beyond
        expectations.
      </p>
    </div>

    <!-- Detail Items -->
    <div class="space-y-24 lg:space-y-32">
      <!-- Detail 1: Discovery & Strategy -->
      <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div class="order-2 lg:order-1" data-scroll-reveal="left">
          <div class="relative" data-tilt>
            <div class="absolute -inset-4 bg-gradient-to-r from-cyan-500/20 to-blue-500/20 rounded-3xl blur-2xl"></div>
            <div class="relative glass rounded-2xl overflow-hidden">
              <img src="{{asset('home/img/details-1.png')}}" class="w-full h-auto" alt="Discovery & Strategy" />
            </div>
            <!-- Step badge -->
            <div
              class="absolute -top-4 -left-4 w-14 h-14 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-2xl flex items-center justify-center shadow-lg shadow-cyan-500/30">
              <span class="text-white font-bold text-xl">01</span>
            </div>
          </div>
        </div>
        <div class="order-1 lg:order-2" data-scroll-reveal="right">
          <div class="inline-flex items-center gap-2 px-3 py-1 bg-cyan-500/10 rounded-full mb-4">
            <span class="text-xs font-semibold text-cyan-400 uppercase tracking-wider">Phase 1</span>
          </div>
          <h3 class="text-2xl lg:text-3xl font-bold text-white mb-6">
            Discovery, Research & <span class="text-cyan-400">Strategic Planning</span>
          </h3>
          <p class="text-gray-400 mb-8 leading-relaxed">
            Every successful project starts with deep understanding. We analyze your business goals, target audience,
            competitors, and technical requirements to build a comprehensive roadmap. This phase includes market
            research, user persona development, and SEO keyword research.
          </p>
          <ul class="space-y-4">
            <li class="flex items-start gap-4 group">
              <span
                class="flex-shrink-0 w-6 h-6 rounded-full bg-gradient-to-r from-cyan-400 to-blue-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="bi bi-check text-white text-sm"></i>
              </span>
              <span class="text-gray-300">Business goals analysis & competitor research</span>
            </li>
            <li class="flex items-start gap-4 group">
              <span
                class="flex-shrink-0 w-6 h-6 rounded-full bg-gradient-to-r from-cyan-400 to-blue-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="bi bi-check text-white text-sm"></i>
              </span>
              <span class="text-gray-300">SEO keyword research & content strategy</span>
            </li>
            <li class="flex items-start gap-4 group">
              <span
                class="flex-shrink-0 w-6 h-6 rounded-full bg-gradient-to-r from-cyan-400 to-blue-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="bi bi-check text-white text-sm"></i>
              </span>
              <span class="text-gray-300">Technical architecture & technology stack selection</span>
            </li>
            <li class="flex items-start gap-4 group">
              <span
                class="flex-shrink-0 w-6 h-6 rounded-full bg-gradient-to-r from-cyan-400 to-blue-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="bi bi-check text-white text-sm"></i>
              </span>
              <span class="text-gray-300">Project timeline, milestones & budget planning</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- Detail 2: Design & Prototyping -->
      <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div data-scroll-reveal="left">
          <div class="inline-flex items-center gap-2 px-3 py-1 bg-purple-500/10 rounded-full mb-4">
            <span class="text-xs font-semibold text-purple-400 uppercase tracking-wider">Phase 2</span>
          </div>
          <h3 class="text-2xl lg:text-3xl font-bold text-white mb-6">
            UI/UX Design & <span class="text-purple-400">Interactive Prototyping</span>
          </h3>
          <p class="text-gray-400 mb-6 leading-relaxed">
            Our design team creates pixel-perfect mockups and interactive prototypes that bring your vision to life
            before a single line of code is written. We focus on conversion-optimized layouts, intuitive navigation, and
            mobile-first responsive design.
          </p>
          <p class="text-gray-400 mb-6 leading-relaxed">
            You'll review and approve every design in real-time through our collaborative Figma workspace, with
            unlimited revision rounds until you're 100% satisfied.
          </p>
          <div class="flex flex-wrap gap-3">
            <span
              class="px-3 py-1.5 bg-purple-500/10 text-purple-400 text-sm rounded-full border border-purple-500/20">Figma</span>
            <span
              class="px-3 py-1.5 bg-purple-500/10 text-purple-400 text-sm rounded-full border border-purple-500/20">Wireframes</span>
            <span
              class="px-3 py-1.5 bg-purple-500/10 text-purple-400 text-sm rounded-full border border-purple-500/20">Prototyping</span>
            <span
              class="px-3 py-1.5 bg-purple-500/10 text-purple-400 text-sm rounded-full border border-purple-500/20">Mobile-First</span>
          </div>
        </div>
        <div data-scroll-reveal="right">
          <div class="relative" data-tilt>
            <div class="absolute -inset-4 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-3xl blur-2xl">
            </div>
            <div class="relative glass rounded-2xl overflow-hidden">
              <img src="{{asset('home/img/details-2.png')}}" class="w-full h-auto" alt="Design & Prototyping" />
            </div>
            <div
              class="absolute -top-4 -right-4 w-14 h-14 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg shadow-purple-500/30">
              <span class="text-white font-bold text-xl">02</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Detail 3: Development & Testing -->
      <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div class="order-2 lg:order-1" data-scroll-reveal="left">
          <div class="relative" data-tilt>
            <div class="absolute -inset-4 bg-gradient-to-r from-teal-500/20 to-cyan-500/20 rounded-3xl blur-2xl"></div>
            <div class="relative glass rounded-2xl overflow-hidden">
              <img src="{{asset('home/img/details-3.png')}}" class="w-full h-auto" alt="Development" />
            </div>
            <div
              class="absolute -top-4 -left-4 w-14 h-14 bg-gradient-to-r from-teal-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg shadow-teal-500/30">
              <span class="text-white font-bold text-xl">03</span>
            </div>
          </div>
        </div>
        <div class="order-1 lg:order-2" data-scroll-reveal="right">
          <div class="inline-flex items-center gap-2 px-3 py-1 bg-teal-500/10 rounded-full mb-4">
            <span class="text-xs font-semibold text-teal-400 uppercase tracking-wider">Phase 3</span>
          </div>
          <h3 class="text-2xl lg:text-3xl font-bold text-white mb-6">
            Agile Development, SEO & <span class="text-teal-400">Rigorous Testing</span>
          </h3>
          <p class="text-gray-400 mb-8 leading-relaxed">
            Our developers build clean, maintainable, and SEO-optimized code using modern frameworks like Laravel,
            React, Vue.js, and Flutter. Every feature is tested across devices and browsers, with built-in on-page SEO,
            schema markup, and performance optimization from day one.
          </p>
          <ul class="space-y-4">
            <li class="flex items-start gap-4 group">
              <span
                class="flex-shrink-0 w-6 h-6 rounded-full bg-gradient-to-r from-teal-400 to-cyan-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="bi bi-check text-white text-sm"></i>
              </span>
              <span class="text-gray-300">Clean code with modern frameworks (Laravel, React, Vue.js)</span>
            </li>
            <li class="flex items-start gap-4 group">
              <span
                class="flex-shrink-0 w-6 h-6 rounded-full bg-gradient-to-r from-teal-400 to-cyan-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="bi bi-check text-white text-sm"></i>
              </span>
              <span class="text-gray-300">Built-in SEO: meta tags, sitemaps, structured data & fast loading</span>
            </li>
            <li class="flex items-start gap-4 group">
              <span
                class="flex-shrink-0 w-6 h-6 rounded-full bg-gradient-to-r from-teal-400 to-cyan-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="bi bi-check text-white text-sm"></i>
              </span>
              <span class="text-gray-300">Cross-browser & cross-device QA testing</span>
            </li>
            <li class="flex items-start gap-4 group">
              <span
                class="flex-shrink-0 w-6 h-6 rounded-full bg-gradient-to-r from-teal-400 to-cyan-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="bi bi-check text-white text-sm"></i>
              </span>
              <span class="text-gray-300">Weekly progress demos & transparent communication</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- Detail 4: Launch & Maintenance -->
      <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div data-scroll-reveal="left">
          <div class="inline-flex items-center gap-2 px-3 py-1 bg-pink-500/10 rounded-full mb-4">
            <span class="text-xs font-semibold text-pink-400 uppercase tracking-wider">Phase 4</span>
          </div>
          <h3 class="text-2xl lg:text-3xl font-bold text-white mb-6">
            Launch, Maintenance & <span class="text-pink-400">Continuous Growth</span>
          </h3>
          <p class="text-gray-400 mb-6 leading-relaxed">
            We don't just launch and leave. Our team handles deployment, DNS configuration, SSL setup, and post-launch
            optimization. Then we stay with you — providing ongoing maintenance, security updates, performance
            monitoring, and continuous improvement.
          </p>
          <div class="grid grid-cols-2 gap-4 mt-6">
            <div class="glass rounded-xl p-4 text-center">
              <div class="text-2xl font-bold text-cyan-400 mb-1">99.9%</div>
              <div class="text-gray-400 text-sm">Uptime Guarantee</div>
            </div>
            <div class="glass rounded-xl p-4 text-center">
              <div class="text-2xl font-bold text-purple-400 mb-1">24/7</div>
              <div class="text-gray-400 text-sm">Monitoring</div>
            </div>
            <div class="glass rounded-xl p-4 text-center">
              <div class="text-2xl font-bold text-pink-400 mb-1">&lt;2hr</div>
              <div class="text-gray-400 text-sm">Response Time</div>
            </div>
            <div class="glass rounded-xl p-4 text-center">
              <div class="text-2xl font-bold text-emerald-400 mb-1">Monthly</div>
              <div class="text-gray-400 text-sm">SEO Reports</div>
            </div>
          </div>
        </div>
        <div data-scroll-reveal="right">
          <div class="relative" data-tilt>
            <div class="absolute -inset-4 bg-gradient-to-r from-pink-500/20 to-rose-500/20 rounded-3xl blur-2xl"></div>
            <div class="relative glass rounded-2xl overflow-hidden">
              <img src="{{asset('home/img/details-4.png')}}" class="w-full h-auto" alt="Launch & Maintenance" />
            </div>
            <div
              class="absolute -top-4 -right-4 w-14 h-14 bg-gradient-to-r from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg shadow-pink-500/30">
              <span class="text-white font-bold text-xl">04</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /How We Work Section -->