@php
use App\Models\Review;

// Try to get reviews from database, fallback to hardcoded if table doesn't exist yet
try {
$reviews = Review::active()->ordered()->get();
} catch (\Exception $e) {
$reviews = collect([]);
}

// Fallback reviews if database is empty or not migrated
$fallbackReviews = [
[
'reviewer_name' => 'TWEX',
'company_name' => 'THE WESTERN EXIM SERVICES & LTD.',
'company_tagline' => 'Exchange with Ease, thewesternexim.com',
'reviewer_image' => asset('home/img/testimonials/testimonials-1.png'),
'review_text' => 'We give VTAPP five stars for their exceptional work. They delivered more than we expected, their user
friendly UI UX design is absolutely amazing, thank you so much VTAPP.',
'rating' => 5,
'gradient_color' => 'from-cyan-400 to-blue-500',
'text_color' => 'text-cyan-400',
],
[
'reviewer_name' => 'GOLF LTD',
'company_name' => 'Crypto exchange group',
'company_tagline' => 'Your Gateway to Affordable Trading, golfstrade.com',
'reviewer_image' => asset('home/img/testimonials/testimonials-2.png'),
'review_text' => 'From idea to launch, VTAPP was instrumental in building our exchange website. The UI is beautiful,
performance is smooth, and they stayed with us post-launch for optimization and updates. Highly recommend!',
'rating' => 5,
'gradient_color' => 'from-purple-400 to-pink-500',
'text_color' => 'text-purple-400',
],
[
'reviewer_name' => 'OSCARMOH',
'company_name' => 'Water Industrial Firm',
'company_tagline' => 'Innovation And Durability, Oscarmoh.com',
'reviewer_image' => asset('home/img/testimonials/testimonials-3.png'),
'review_text' => 'We approached VTAPP to modernize our outdated corporate website. The result exceeded expectations. The
new site is visually impressive and technically robust — our clients can now monitor plant data in real-time.',
'rating' => 5,
'gradient_color' => 'from-teal-400 to-cyan-500',
'text_color' => 'text-teal-400',
],
[
'reviewer_name' => 'EZE CHIDERA EZIGBO',
'company_name' => 'Freelancer',
'company_tagline' => null,
'reviewer_image' => asset('home/img/testimonials/testimonials-4.jpg'),
'review_text' => 'My WORK was transformed into a fast, stunning website with integrated parts. The process was smooth
and the team even gave me a short training after delivery.',
'rating' => 5,
'gradient_color' => 'from-orange-400 to-red-500',
'text_color' => 'text-orange-400',
],
];

// Use database reviews if available, otherwise use fallback
$displayReviews = $reviews->count() > 0 ? $reviews : collect($fallbackReviews);

// Helper function to get gradient text color from gradient class
function getTextColorFromGradient($gradient) {
$colorMap = [
'from-cyan-400' => 'text-cyan-400',
'from-purple-400' => 'text-purple-400',
'from-teal-400' => 'text-teal-400',
'from-orange-400' => 'text-orange-400',
'from-green-400' => 'text-green-400',
'from-blue-400' => 'text-blue-400',
'from-pink-400' => 'text-pink-400',
'from-yellow-400' => 'text-yellow-400',
'from-red-400' => 'text-red-400',
'from-indigo-400' => 'text-indigo-400',
];

foreach ($colorMap as $gradientStart => $textColor) {
if (str_contains($gradient, $gradientStart)) {
return $textColor;
}
}
return 'text-cyan-400';
}
@endphp

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
        @foreach($displayReviews as $review)
        @php
        // Handle both database model and array fallback
        $isModel = $review instanceof \App\Models\Review;
        $name = $isModel ? $review->reviewer_name : $review['reviewer_name'];
        $company = $isModel ? $review->company_name : $review['company_name'];
        $tagline = $isModel ? $review->company_tagline : ($review['company_tagline'] ?? null);
        $image = $isModel ? ($review->reviewer_image ? asset('storage/' . $review->reviewer_image) :
        asset('home/img/testimonials/default.png')) : $review['reviewer_image'];
        $text = $isModel ? $review->review_text : $review['review_text'];
        $rating = $isModel ? $review->rating : $review['rating'];
        $gradient = $isModel ? $review->gradient_color : $review['gradient_color'];
        $textColor = $isModel ? getTextColorFromGradient($gradient) : $review['text_color'];
        @endphp
        <div class="swiper-slide">
          <div class="card-modern p-8 lg:p-10 mx-4 text-center" data-tilt>
            <!-- Quote Icon -->
            <div
              class="w-16 h-16 mx-auto mb-6 rounded-full bg-gradient-to-r {{ $gradient }} flex items-center justify-center">
              <i class="bi bi-quote text-3xl text-white"></i>
            </div>

            <!-- Avatar -->
            <div class="relative w-24 h-24 mx-auto mb-6">
              <div class="absolute inset-0 bg-gradient-to-r {{ $gradient }} rounded-full animate-pulse"></div>
              <img src="{{ $image }}" class="relative w-full h-full object-cover rounded-full border-4 border-slate-800"
                alt="{{ $name }}" />
            </div>

            <!-- Content -->
            <h3 class="text-xl font-bold text-white mb-1">{{ $name }}</h3>
            <p class="{{ $textColor }} text-sm mb-6">{{ $company }}</p>

            <!-- Stars -->
            <div class="flex justify-center gap-1 mb-6">
              @for($i = 0; $i < $rating; $i++) <i class="bi bi-star-fill text-yellow-400"></i>
                @endfor
                @for($i = $rating; $i < 5; $i++) <i class="bi bi-star text-gray-500"></i>
                  @endfor
            </div>

            <!-- Quote -->
            <p class="text-gray-300 leading-relaxed">
              "{{ $text }}"
            </p>
            @if($tagline)
            <p class="text-gray-500 text-sm mt-4 italic">— {{ $tagline }}</p>
            @endif
          </div>
        </div>
        @endforeach
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