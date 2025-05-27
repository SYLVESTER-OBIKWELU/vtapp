<!-- Contact Section -->
<section id="contact" class="contact section" wire:ignore>
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>
            Let’s Build Something Great Together <br>
            Tell us about your project, and we’ll bring it to life. Reach out
            via the form or email us directly.
        </p>
    </div>
    <!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="info-wrap">
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
                            <h3>Reach me on</h3>
                            <p><a href="tel:+2347018508896">+234 7018508896</a></p>
                        </div>
                    </div>
                    <!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email me at</h3>
                            <p>theopensly@gmail.com</p>
                        </div>
                    </div>
                    <!-- End Info Item -->

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31730.52163990613!2d7.060003412186903!3d6.222103214015646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104382bd8b94e753%3A0xcf2391eb8abd4753!2sAwka%2C%20Anambra%2C%20Nigeria!5e0!3m2!1sen!2sus!4v1748252093450!5m2!1sen!2sus"
                        width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="col-lg-7">
                <form wire:submit.prevent="sendMessage" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <label for="name-field" class="pb-2">Your Name</label>
                            <input type="text" wire:model="name" id="name-field" class="form-control" />
                        </div>

                        <div class="col-md-6">
                            <label for="email-field" class="pb-2">Your Email</label>
                            <input type="email" class="form-control" wire:model="email" id="email-field" />
                        </div>

                        <div class="col-md-12">
                            <label for="subject-field" class="pb-2">Subject</label>
                            <input type="text" class="form-control" wire:model="subject" id="subject-field" />
                        </div>

                        <div class="col-md-12">
                            <label for="message-field" class="pb-2">Message</label>
                            <textarea class="form-control" wire:model="body" rows="10" id="message-field"></textarea>
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
                            <div wire:loading wire:target='sendMessage' class="loading">Loading ...</div>

                            <button wire:loading.remove wire:target='sendMessage' type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Contact Form -->
        </div>
    </div>

</section>
<!-- /Contact Section -->