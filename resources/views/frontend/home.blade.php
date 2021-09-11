@extends('frontend.theme')
@section('content')
 <section class="section section-sm text-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <h1 class="fw-bold">What We Offer</h1>
              <p class="lead big">We create <a class="text-primary" href="#">user interfaces</a> and modern <a class="text-primary" href="#">websites</a>. We will help you build strong <a class="text-primary" href="#">online business</a> by creating a professional website which best suits your needs.</p><img class="box-shadow margin-2 margin-negative" src="images/index_img1.jpg" alt=""/>
            </div>
          </div>
        </div>
      </section>
      <!--Template Features-->
      <section class="section section-sm bg-lighter relative text-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-6">
              <h1 class="fw-bold">Our Product Features</h1>
              <p class="lead">
                We worked out an amazing combination of vast functionality
                and user's comfort. It will totally impress you with its power!
              </p>
            </div>
          </div>
          <div class="row row-30 margin-1 text-lg-start">
            <div class="col-md-6 col-lg-3"><span class="icon icon-lg icon-primary fa-heartbeat"></span>
              <h5>Retina Ready</h5>
              <p>All our products are Retina-ready and highly responsive to provide the best performance on all devices.</p>
            </div>
            <div class="col-md-6 col-lg-3"><span class="icon icon-lg icon-primary fa-compass"></span>
              <h5>Incredibly Flexible</h5>
              <p>Our websites are highly flexible and support deep customization providing you with unique possibilities</p>
            </div>
            <div class="col-md-6 col-lg-3"><span class="icon icon-lg icon-primary fa-edit"></span>
              <h5>Clean Design</h5>
              <p>The products we offer to our clients look and feel clean and bright to satisfy all their needs in web design.</p>
            </div>
            <div class="col-md-6 col-lg-3"><span class="icon icon-lg icon-primary fa-comments-o"></span>
              <h5>24/7 Support</h5>
              <p>
                Our qualified team provides 24/7 support to help you solve any issues you may have with our products.
                
                
              </p>
            </div>
          </div>
        </div>
      </section>
      <!--About Us-->
      <section class="section section-sm text-center text-lg-start">
        <div class="container">
          <div class="row justify-content-lg-between">
            <div class="col-lg-6 col-xl-5">
              <h1 class="fw-bold">About Us</h1>
              <p class="lead">We are a studio that aims to make our users experience easier and much more pleasant. <br><br>You probably won't have a better opportunity to make sure of our competence, as well as friendliness towards our customers.</p>
            </div>
            <div class="col-lg-6 col-xl-6 text-start">
              <div class="inset-2">
                      <!--Linear progress bar-->
                      <div class="progress-linear">
                        <div class="progress-linear-header">
                          <p class="progress-linear-title">CREATIVE DESIGN</p>
                        </div>
                        <div class="progress-linear-body">
                          <div class="progress-linear-bar"></div><span class="progress-linear-counter">75</span>
                        </div>
                      </div>
                      <!--Linear progress bar-->
                      <div class="progress-linear">
                        <div class="progress-linear-header">
                          <p class="progress-linear-title">BRANDING</p>
                        </div>
                        <div class="progress-linear-body">
                          <div class="progress-linear-bar"></div><span class="progress-linear-counter">85</span>
                        </div>
                      </div>
                      <!--Linear progress bar-->
                      <div class="progress-linear">
                        <div class="progress-linear-header">
                          <p class="progress-linear-title">SUPPORT</p>
                        </div>
                        <div class="progress-linear-body">
                          <div class="progress-linear-bar"></div><span class="progress-linear-counter">80</span>
                        </div>
                      </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Counters-->
      <section class="section bg-dark-var1 text-center">
        <div class="container counter-panel">
          <div class="row">
            <div class="col-6 col-md-6 col-lg-3">
              <div class="counter">197</div>
              <p class="text-opacity font-secondary text-uppercase">CUPS OF COFFEE</p>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
              <div class="counter">23</div>
              <p class="text-opacity font-secondary text-uppercase">coders</p>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
              <div class="counter">98</div>
              <p class="text-opacity font-secondary text-uppercase">designers</p>
            </div>
            <div class="col-6 col-md-6 col-lg-3">
              <div class="counter">7230</div>
              <p class="text-opacity font-secondary text-uppercase">Lines of Code</p>
            </div>
          </div>
        </div>
      </section>
      <!--Brand-->
      <section class="section section-sm text-center section-border">
        <div class="container">
          <ul class="flex-list">
            <li><a href="#"><img src="images/partner1.png" alt=""/></a></li>
            <li><a href="#"><img src="images/partner2.png" alt=""/></a></li>
            <li><a href="#"><img src="images/partner3.png" alt=""/></a></li>
            <li><a href="#"><img src="images/partner4.png" alt=""/></a></li>
            <li><a href="#"><img src="images/partner5.png" alt=""/></a></li>
            <li><a href="#"><img src="images/partner6.png" alt=""/></a></li>
          </ul>
        </div>
      </section>
      <!--Latest From The Blog-->
      <section class="section section-sm inset-bottom-2 text-center text-lg-start">
        <div class="container">
          <h1 class="fw-bold text-center">Latest From The Blog</h1>
          <div class="row row-50">
            <div class="col-lg-4">
              <article class="thumbnail thumbnail-4"><img src="images/index_img2.jpg" alt=""/>
                <div class="caption">
                  <h4><a href="post-page.html">A Team Approach to Large-scale Design Projects</a></h4>
                  <p class="text-dark-variant-2">The collaborative approach to large-scale design projects is an innovative approach to time and…</p>
                  <div class="blog-info">
                    <div class="pull-md-left">
                      <time class="meta fa-calendar" datetime="2020">Feb 10, 2020</time><a class="badge fa-comments font-secondary" href="#">13</a>
                    </div><a class="button-link" href="post-page.html">Read More</a>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-lg-4">
              <article class="thumbnail thumbnail-4"><img src="images/index_img3.jpg" alt=""/>
                <div class="caption">
                  <h4><a href="post-page.html">18 Web Design Trends of 2020 You Should Know About</a></h4>
                  <p class="text-dark-variant-2">In this article, we are going to talk about a few web design industry trends to watch in 2020 as shared…</p>
                  <div class="blog-info">
                    <div class="pull-md-left">
                      <time class="meta fa-calendar" datetime="2020">Feb 10, 2020</time><a class="badge fa-comments font-secondary" href="#">13</a>
                    </div><a class="button-link" href="post-page.html">Read More</a>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-lg-4">
              <article class="thumbnail thumbnail-4"><img src="images/index_img4.jpg" alt=""/>
                <div class="caption">
                  <h4><a href="post-page.html">Why Your Client Needs a Responsive Website</a></h4>
                  <p class="text-dark-variant-2">To capacitate your web pages to look good and load faster on all types of devices, you need to have…</p>
                  <div class="blog-info">
                    <div class="pull-md-left">
                      <time class="meta fa-calendar" datetime="2020">Feb 10, 2020</time><a class="badge fa-comments font-secondary" href="#">13</a>
                    </div><a class="button-link" href="post-page.html">Read More</a>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <!--Subscribe to Our Newsletter-->
      <section class="section section-sm inset-bottom-3 bg-image bg-image-1 context-dark text-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <h1 class="fw-bold">Subscribe to Our Newsletter</h1>
              <p class="lead">Sign up for our newsletter to receive the latest news and web design tips from our team as well as special offers from our partners. 100% spam-free!</p>
              <form class="rd-mailform subscribe-form margin-1" data-form-output="form-output-global" data-form-type="forms" method="post" action="bat/rd-mailform.php">
                <div class="form-wrap form-wrap-validation">
                  <input class="form-input" id="forms-news-email" type="email" name="email" placeholder="Enter your e-mail" data-constraints="@Required">
                </div>
                <div class="button-wrap text-center">
                  <button class="button button-primary button-xs round-xl" type="submit">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!--Testimonials-->
      <section class="section section-sm inset-bottom-2 text-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-6">
              <h1 class="fw-bold text-center">Testimonials</h1>
              <p class="lead">Take a look at the most recent testimonials published by our clients to learn more about the quality of our products.</p>
            </div>
          </div>
          <div class="row margin-1">
            <!--Owl Carousel-->
            <div class="owl-carousel" data-autoplay="true" data-items="1" data-md-items="2" data-sm-items="1" data-lg-items="3" data-margin="30" data-loop="true" data-owl='{"nav":true}'>
              <blockquote class="quote-2"><img class="rounded-circle" src="images/index_img5.jpg" alt=""/>
                <h6>
                  <cite>Jennifer Rogers</cite>
                </h6>
                <p class="small text-light-clr text-uppercase">Regular Client</p>
                <p class="heading-6 font-italic font-base text-base">
                  <q>We partnered with Modicate to design our website. We found them incredibly helpful and patient as we really didn't know what we wanted. They met with us on numerous occasions and did a great job.</q>
                </p>
              </blockquote>
              <blockquote class="quote-2"><img class="rounded-circle" src="images/index_img6.jpg" alt=""/>
                <h6>
                  <cite>Walter Williams</cite>
                </h6>
                <p class="small text-light-clr text-uppercase">Regular Client</p>
                <p class="heading-6 font-italic font-base text-base">
                  <q>This team provided the promptest quote of three requested for website design, communicated well during the project, and provided a well-designed website with an easy to use functionality.</q>
                </p>
              </blockquote>
              <blockquote class="quote-2"><img class="rounded-circle" src="images/index_img7.jpg" alt=""/>
                <h6>
                  <cite>John McMillan</cite>
                </h6>
                <p class="small text-light-clr text-uppercase">Regular Client</p>
                <p class="heading-6 font-italic font-base text-base">
                  <q>Modicate did a fantastic job of creating a new website for my company. They were friendly and nothing was too much trouble. A fantastic service, I will continue to work with them in the nearest future.</q>
                </p>
              </blockquote>
            </div>
          </div>
        </div>
      </section>
      @endsection