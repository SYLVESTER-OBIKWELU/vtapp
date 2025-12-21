<!-- Testimonials Section -->
<section id="testimonials"
  class="relative py-24 lg:py-32 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 overflow-hidden">
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0">
    <img src="{{asset('home/img/testimonials-bg.jpg')}}" class="w-full h-full object-cover opacity-10" alt="" />
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900/90 via-slate-800/80 to-cyan-900/40"></div>
  </div>

  <!-- Decorative Elements -->
  <div class="absolute top-20 left-10 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl"></div>
  <div class="absolute bottom-20 right-10 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl"></div>

  <div class="container mx-auto px-4 lg:px-8 relative z-10">
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-16" data-scroll-reveal>
      <div class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-500/10 rounded-full border border-cyan-500/20 mb-6">
        <span class="text-sm font-medium text-cyan-400">Testimonials</span>
      </div>
      <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
        What Our <span class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Clients
          Say</span>
      </h2>
      <p class="text-lg text-gray-400">
        Trusted by amazing companies and individuals
      </p>
    </div>

    <!-- Testimonials Swiper -->
    <div class="swiper testimonials-swiper" data-scroll-reveal>
      <div class="swiper-wrapper pb-12">
        <!-- Testimonial 1 - TWEX -->
        <div class="swiper-slide">
          <div class="card-modern p-8 lg:p-10 mx-4 text-center" data-tilt>
            <!-- Quote Icon -->
            <div
              class="w-16 h-16 mx-auto mb-6 rounded-full bg-gradient-to-r from-cyan-400 to-blue-500 flex items-center justify-center">
              <i class="bi bi-quote text-3xl text-white"></i>
            </div>

            <!-- Avatar -->
            <div class="relative w-24 h-24 mx-auto mb-6">
              <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full animate-pulse"></div>
              <img src="{{asset('home/img/testimonials/testimonials-1.png')}}"
                class="relative w-full h-full object-cover rounded-full border-4 border-slate-800" alt="TWEX" />
            </div>

            <!-- Content -->
            <h3 class="text-xl font-bold text-white mb-1">TWEX</h3>
            <p class="text-cyan-400 text-sm mb-6">THE WESTERN EXIM SERVICES & LTD.</p>

            <!-- Stars -->
            <div class="flex justify-center gap-1 mb-6">
              @for($i = 0; $i < 5; $i++) <i class="bi bi-star-fill text-yellow-400"></i>
                @endfor
            </div>

            <!-- Quote -->
            <p class="text-gray-300 leading-relaxed">
              "We give VTAPP five stars for their exceptional work. They delivered more than we expected, their user
              friendly UI UX design is absolutely amazing, thank you so much VTAPP."
            </p>
            <p class="text-gray-500 text-sm mt-4 italic">— Exchange with Ease, thewesternexim.com</p>
          </div>
        </div>

        <!-- Testimonial 2 - GOLF LTD -->
        <div class="swiper-slide">
          <div class="card-modern p-8 lg:p-10 mx-4 text-center" data-tilt>
            <div
              class="w-16 h-16 mx-auto mb-6 rounded-full bg-gradient-to-r from-purple-400 to-pink-500 flex items-center justify-center">
              <i class="bi bi-quote text-3xl text-white"></i>
            </div>

            <div class="relative w-24 h-24 mx-auto mb-6">
              <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full animate-pulse">
              </div>
              <img src="{{asset('home/img/testimonials/testimonials-2.png')}}"
                class="relative w-full h-full object-cover rounded-full border-4 border-slate-800" alt="GOLF LTD" />
            </div>

            <h3 class="text-xl font-bold text-white mb-1">GOLF LTD</h3>
            <p class="text-purple-400 text-sm mb-6">Crypto exchange group</p>

            <div class="flex justify-center gap-1 mb-6">
              @for($i = 0; $i < 5; $i++) <i class="bi bi-star-fill text-yellow-400"></i>
                @endfor
            </div>

            <p class="text-gray-300 leading-relaxed">
              "From idea to launch, VTAPP was instrumental in building our exchange website. The UI is beautiful,
              performance is smooth, and they stayed with us post-launch for optimization and updates. Highly
              recommend!"
            </p>
            <p class="text-gray-500 text-sm mt-4 italic">— Your Gateway to Affordable Trading, golfstrade.com</p>
          </div>
        </div>

        <!-- Testimonial 3 - OSCARMOH -->
        <div class="swiper-slide">
          <div class="card-modern p-8 lg:p-10 mx-4 text-center" data-tilt>
            <div
              class="w-16 h-16 mx-auto mb-6 rounded-full bg-gradient-to-r from-teal-400 to-cyan-500 flex items-center justify-center">
              <i class="bi bi-quote text-3xl text-white"></i>
            </div>

            <div class="relative w-24 h-24 mx-auto mb-6">
              <div class="absolute inset-0 bg-gradient-to-r from-teal-400 to-cyan-500 rounded-full animate-pulse"></div>
              <img src="{{asset('home/img/testimonials/testimonials-3.png')}}"
                class="relative w-full h-full object-cover rounded-full border-4 border-slate-800" alt="OSCARMOH" />
            </div>

            <h3 class="text-xl font-bold text-white mb-1">OSCARMOH</h3>
            <p class="text-teal-400 text-sm mb-6">Water Industrial Firm</p>

            <div class="flex justify-center gap-1 mb-6">
              @for($i = 0; $i < 5; $i++) <i class="bi bi-star-fill text-yellow-400"></i>
                @endfor
            </div>

            <p class="text-gray-300 leading-relaxed">
              "We approached VTAPP to modernize our outdated corporate website. The result exceeded expectations. The
              new site is visually impressive and technically robust — our clients can now monitor plant data in
              real-time."
            </p>
            <p class="text-gray-500 text-sm mt-4 italic">— Innovation And Durability, Oscarmoh.com</p>
          </div>
        </div>

        <!-- Testimonial 4 - EZE CHIDERA -->
        <div class="swiper-slide">
          <div class="card-modern p-8 lg:p-10 mx-4 text-center" data-tilt>
            <div
              class="w-16 h-16 mx-auto mb-6 rounded-full bg-gradient-to-r from-orange-400 to-red-500 flex items-center justify-center">
              <i class="bi bi-quote text-3xl text-white"></i>
            </div>

            <div class="relative w-24 h-24 mx-auto mb-6">
              <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-red-500 rounded-full animate-pulse">
              </div>
              <img src="{{asset('home/img/testimonials/testimonials-4.jpg')}}"
                class="relative w-full h-full object-cover rounded-full border-4 border-slate-800" alt="Eze Chidera" />
            </div>

            <h3 class="text-xl font-bold text-white mb-1">EZE CHIDERA EZIGBO</h3>
            <p class="text-orange-400 text-sm mb-6">Freelancer</p>

            <div class="flex justify-center gap-1 mb-6">
              @for($i = 0; $i < 5; $i++) <i class="bi bi-star-fill text-yellow-400"></i>
                @endfor
            </div>

            <p class="text-gray-300 leading-relaxed">
              "My WORK was transformed into a fast, stunning website with integrated parts. The process was smooth and
              the team even gave me a short training after delivery."
            </p>
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <div class="swiper-pagination !relative mt-8"></div>
    </div>
  </div>
</section>

<!-- Initialize Swiper -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.testimonials-swiper', {
        loop: true,
        speed: 600,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
        },
    });
});
</script>
<!-- /Testimonials Section -->