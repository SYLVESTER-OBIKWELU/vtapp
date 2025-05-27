<footer id="footer" class="footer dark-background">
  <div class="container footer-top">
    <div class="row gy-4">
      <div class="col-lg-4 col-md-6 footer-about">
        <a href="{{route('home')}}" class="logo d-flex align-items-center">
          <span class="sitename"><img src="{{asset('home/img/logo.png')}}" alt="" width="100px" height="150px" ></span>
        </a>
        <div class="footer-contact pt-3">
          <p>Awka, Anambra State</p>
          <p>Nigeria, AWK 420102</p>
          <a href="tel:+2347018508896"><strong>Phone:</strong> <span>+234 7018508896</span></a><br />
          <a href="mailto:hello@vtapp.com.ng"><strong>Email:</strong> <span>hello@vtapp.com.ng</span></a>
        </div>
        <div class="social-links d-flex mt-4">
          <a href=""><i class="bi bi-twitter-x"></i></a>
          <a href=""><i class="bi bi-facebook"></i></a>
          <a href=""><i class="bi bi-instagram"></i></a>
          <a href=""><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Terms of service</a></li>
          <li><a href="#">Privacy policy</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><a href="#">Graphic Design</a></li>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Web Development</a></li>
          <li><a href="#">App Development</a></li>
          <li><a href="#">Product Management</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-12 footer-newsletter">
        <h4>Our Newsletter</h4>
        <p>
          Subscribe to our newsletter and receive the latest news about our
          products and services!
        </p>
        <form wire:submit.prevent="subcribe">
          <div class="newsletter-form">
            <input type="email" wire:model="newsletter" /><input type="submit" value="Subscribe" />
          </div>
          @error('newsletter')
          <div class="text-danger text-center mt-2">
            {{ $message }}
          </div>

          @enderror
          <div wire:loading class="loading">Please wait.....</div>
        </form>
      </div>
    </div>
  </div>

  <div class="container copyright text-center mt-4">
    <p>
      © <span>Copyright</span> <strong class="px-1 sitename">VTAPP</strong>
      <span>All Rights Reserved</span>
    </p>
    <div class="credits">
      Designed by
      <a href="https://vtapp.com.ng/">Virtual App Technologies</a>
    </div>
  </div>
</footer>