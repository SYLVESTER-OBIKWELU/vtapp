<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section light-background">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>
            "Here’s a glimpse into what I’ve built, designed, and brought to life. Each project represents not just a
            final product, but a journey of creativity, problem-solving, and collaboration.
        </p>
    </div>
    <!-- End Section Title -->

    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <!-- <ul
              class="portfolio-filters isotope-filters"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-product">Product</li>
              <li data-filter=".filter-branding">Branding</li>
              <li data-filter=".filter-books">Books</li>
            </ul> -->
            <!-- End Portfolio Filters -->

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <div class="portfolio-content h-100">
                        <img src="{{asset('portfolio/img/portfolio/app-1.png')}}" class="img-fluid" alt="" />
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>The Western Exim LTD</p>
                            <a target="_blank" href="{{asset('portfolio/img/portfolio/app-1.png')}}" title="App 1"
                                data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="https://thewesternexim.com/" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Portfolio Item -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                    <div class="portfolio-content h-100">
                        <img src="{{asset('portfolio/img/portfolio/app-2.png')}}" class="img-fluid" alt="" />
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p> Oscarmoh </p>
                            <a target="_blank" href="{{asset('portfolio/img/portfolio/app-2.png')}}" title="Product 1"
                                data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="https://oscarmoh.com/" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Portfolio Item -->

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                    <div class="portfolio-content h-100">
                        <img src="{{asset('portfolio/img/portfolio/app-3.png')}}" class="img-fluid" alt="" />
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <p>Golf Trade</p>
                            <a href="{{asset('portfolio/img/portfolio/app-3.png')}}" title="Branding 1"
                                data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a target="_blank" href="https://golfstrade.com/" title="More Details"
                                class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Portfolio Item -->


                <!-- End Portfolio Container -->
            </div>
        </div>
</section>
<!-- /Portfolio Section -->