<!-- FAQ Section -->
<section id="faq" class="relative py-24 lg:py-32 bg-gradient-to-b from-slate-900 to-slate-800 overflow-hidden">
  <!-- Background Decorations -->
  <div class="absolute top-1/4 right-0 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl"></div>
  <div class="absolute bottom-1/4 left-0 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl"></div>

  <div class="container mx-auto px-4 lg:px-8 relative z-10">
    <div class="grid lg:grid-cols-2 gap-16 items-start">
      <!-- FAQ Content -->
      <div class="order-2 lg:order-1" data-scroll-reveal="left">
        <div
          class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-500/10 rounded-full border border-cyan-500/20 mb-6">
          <span class="text-sm font-medium text-cyan-400">FAQ</span>
        </div>
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-8">
          Frequently Asked <span
            class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Questions</span>
        </h2>

        <!-- FAQ Items -->
        <div class="space-y-4" x-data="{ open: null }">
          @php
          $faqs = [
          [
          'question' => 'Do you offer post-launch support?',
          'answer' => 'Yes! We provide ongoing maintenance, bug fixes, updates, performance monitoring, and feature
          enhancements as part of our support packages.'
          ],
          [
          'question' => 'How much does it cost to build a website or app?',
          'answer' => 'Costs vary based on the scope, complexity, and features of your project. We offer flexible
          pricing—whether you\'re building a simple website or a full-scale app. Contact us for a free quote and
          consultation.'
          ],
          [
          'question' => 'How long does it take to complete a project?',
          'answer' => 'Timelines depend on the project scope. A simple website may take 2–4 weeks, while a mobile app or
          custom platform can take 8–16 weeks or more. We\'ll provide a detailed timeline after our initial discussion.'
          ],
          [
          'question' => 'Do you work with startups or only large businesses?',
          'answer' => 'We work with startups, small businesses, and enterprises. Whether you need an MVP or a scalable
          enterprise solution, we\'ll tailor our services to fit your goals.'
          ],
          [
          'question' => 'Can you redesign my existing website or app?',
          'answer' => 'Yes, we specialize in redesigning outdated or underperforming digital products to improve
          usability, performance, and visual appeal.'
          ],
          [
          'question' => 'What technologies do you use?',
          'answer' => 'Web: HTML/CSS/JAVASCRIPT, WordPress | Mobile: Flutter, React Native | Backend: PHP, Laravel |
          Design: Figma, Adobe XD'
          ],
          ];
          @endphp

          @foreach ($faqs as $index => $faq)
          <div class="group" data-scroll-reveal style="transition-delay: {{ $index * 0.1 }}s;">
            <div
              class="relative rounded-2xl bg-white/5 border border-white/10 hover:border-cyan-500/30 transition-all duration-300 overflow-hidden">
              <!-- Glow effect on hover -->
              <div
                class="absolute inset-0 bg-gradient-to-r from-cyan-500/5 to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
              </div>

              <button class="relative w-full px-6 py-5 flex items-center justify-between text-left"
                onclick="this.parentElement.classList.toggle('faq-open')">
                <div class="flex items-center gap-4">
                  <span
                    class="flex-shrink-0 w-10 h-10 rounded-xl bg-gradient-to-r from-cyan-400/20 to-blue-500/20 flex items-center justify-center">
                    <i class="bi bi-question-circle text-cyan-400"></i>
                  </span>
                  <span class="font-semibold text-white group-hover:text-cyan-400 transition-colors duration-300">
                    {{ $faq['question'] }}
                  </span>
                </div>
                <i class="bi bi-chevron-down text-gray-400 transition-transform duration-300 faq-icon"></i>
              </button>

              <div class="faq-content px-6 pb-0 overflow-hidden transition-all duration-300 max-h-0">
                <div class="pb-5 pl-14">
                  <p class="text-gray-400 leading-relaxed">
                    {{ $faq['answer'] }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <!-- FAQ Image -->
      <div class="order-1 lg:order-2 lg:sticky lg:top-32" data-scroll-reveal="right">
        <div class="relative" data-tilt>
          <div class="absolute -inset-4 bg-gradient-to-r from-cyan-500/20 to-purple-500/20 rounded-3xl blur-2xl"></div>
          <div class="relative glass rounded-3xl overflow-hidden">
            <img src="{{asset('home/img/faq.jpg')}}" class="w-full h-auto" alt="FAQ" />
          </div>

          <!-- Floating card -->
          <div class="absolute -bottom-6 -left-6 glass rounded-2xl p-6 float-slow">
            <div class="flex items-center gap-4">
              <div
                class="w-12 h-12 rounded-full bg-gradient-to-r from-cyan-400 to-blue-500 flex items-center justify-center">
                <i class="bi bi-headset text-xl text-white"></i>
              </div>
              <div>
                <p class="text-sm text-gray-400">Need Help?</p>
                <p class="text-white font-semibold">24/7 Support</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .faq-open .faq-icon {
    transform: rotate(180deg);
  }

  .faq-open .faq-content {
    max-height: 200px;
  }
</style>
<!-- /FAQ Section -->