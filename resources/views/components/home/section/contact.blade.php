<!-- Contact Section -->
<section id="contact" class="contact section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up" wire:ignore>
    <h2>Contact</h2>
    <div>
      <span>Check Our</span>
      <span class="description-title">Contact</span>
    </div>
    <span>Let’s Build Something Great Together <br>
      Tell us about your project, and we’ll bring it to life. Reach out
      via the form or email us directly.</span>
  </div>
  <!-- End Section Title -->

  <div class="container" data-aos="fade" data-aos-delay="100" wire:ignore>
    <div class="row gy-4">
      <div class="col-lg-4">
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>Awka, Anambra State</h3>
            <p>Nigeria, AWK 420102</p>
          </div>
        </div>
        <!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Call Us</h3>
            <p><a href="tel:+2347018508896">+234 7018508896</a></p>
          </div>
        </div>
        <!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>Email Us</h3>
            <p>hello@vtapp.com.ng</p>
          </div>
        </div>
        <!-- End Info Item -->
      </div>

      <div class="col-lg-8">
        <form wire:submit.prevent="sendMessage" class="php-email-form">
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" wire:model="name" class="form-control" placeholder="Your Name" />
            </div>

            <div class="col-md-6">
              <input type="email" class="form-control" wire:model="email" placeholder="Your Email" />
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" wire:model="subject" placeholder="Subject" />
            </div>

            <div class="col-md-12">
              <textarea class="form-control" wire:model="body" rows="6" placeholder="Message"></textarea>
            </div>
            @error('name')
            <div class="col-md-12">
              <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
            @error('email')
            <div class="col-md-12">
              <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
            @error('subject')
            <div class="col-md-12">
              <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
            @error('body')
            <div class="col-md-12">
              <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
            <div class="col-md-12 text-center">
              <div wire:loading class="loading">Loading ...</div>

              <button wire:loading.remove type="submit">Send Message</button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Contact Form -->
    </div>
  </div>
</section>
<!-- /Contact Section -->