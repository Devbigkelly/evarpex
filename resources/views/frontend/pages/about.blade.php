@extends('frontend.layouts.web')

@section('content')
     <section class="container pt-3 pt-sm-4 mb-4">
        <div class="position-relative">
          <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none-dark rtl-flip" style="background: linear-gradient(-90deg, #accbee 0%, #e7f0fd 100%)"></span>
          <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none d-block-dark rtl-flip" style="background: linear-gradient(-90deg, #1b273a 0%, #1f2632 100%)"></span>
          <div class="row align-items-center position-relative z-1">
            <div class="col-lg-7 col-xl-5 offset-xl-1 py-5">
              <div class="px-4 px-sm-5 px-xl-0 pe-lg-4">
                <h1 class="text-center text-sm-start mb-4">About Us</h1>
               <p class="pb-2 pb-md-3">Get the best from Evarpex today!!</p>
           
              </div>
            </div>
            <div class="col-lg-5 offset-xl-1 d-none d-lg-block">
              <div class="ratio rtl-flip" style="--cz-aspect-ratio: calc(356 / 526 * 100%)">
                <img src="{{ asset('asset/img/35.png')}}" class="d-none-dark" alt="Image">

              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="container pt-5">
        <div class="row pt-2 pt-sm-3 pt-md-4 pt-lg-5">
          <div class="col-md-5 col-lg-6 pb-1 pb-sm-2 pb-md-0 mb-4 mb-md-0">
            <div class="ratio ratio-1x1">
              <img src="{{ asset('asset/img/38.jpg')}}" class="rounded-5" alt="Image">
            </div>
          </div>
          <div class="col-md-7 col-lg-6 pt-md-3 pt-xl-4 pt-xxl-5">
            <div class="ps-md-3 ps-lg-4 ps-xl-5 ms-xxl-4">
              <h3 class="h1 pb-1 pb-sm-2 pb-lg-3">About Us</h3>
              <p class="pb-xl-3">Evarpex is a global online marketplace that connects buyers and sellers of various products and services. We provide a secure and convenient platform for transactions, ensuring a seamless experience for all users.</p>

              <!-- Accordion -->
              <div class="accordion accordion-alt-icon" id="principles">

                <!-- Item (expanded) -->
                <div class="accordion-item">
                  <h3 class="accordion-header" id="headingFocus">
                    <button type="button" class="accordion-button animate-underline collapsed" data-bs-toggle="collapse" data-bs-target="#focus" aria-expanded="false" aria-controls="focus">
                      <span class="animate-target me-2">Our Mission</span>
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="focus" aria-labelledby="headingFocus" data-bs-parent="#principles">
                    <div class="accordion-body">To make online commerce safer, easier, and more rewarding for everyone by providing a trusted platform where individuals and businesses can confidently buy, sell, and discover products and services.</div>
                  </div>
                </div>

                <!-- Item -->
                <div class="accordion-item">
                  <h3 class="accordion-header" id="headingReputation">
                    <button type="button" class="accordion-button animate-underline collapsed" data-bs-toggle="collapse" data-bs-target="#reputation" aria-expanded="false" aria-controls="reputation">
                      <span class="animate-target me-2">Our Story</span>
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="reputation" aria-labelledby="headingReputation" data-bs-parent="#principles">
                    <div class="accordion-body">Evarpex was founded with a simple purpose: To create a marketplace that truly serves the needs of Nigerian consumers and businesses.

We understand the unique challenges and opportunities in the Nigerian market, and we've built our platform to address these specific needs.

From our humble beginnings, we've grown to become a trusted platform where thousands of sellers showcase their products and millions of customers find exactly what they're looking for.

Our commitment to quality, security, transparency and customer satisfaction has made us a preferred choice for online shopping in Nigeria.

Whether you're looking to buy quality products or sell your own, Evarpex is the perfect platform for you.</div>
                  </div>
                </div>

           
              </div>
            </div>
          </div>
        </div>
      </section>
     
        <section class="container pt-5 mt-1 mt-sm-3 mt-md-4 mt-lg-5">
         <!-- Heading -->
        <div class="d-flex align-items-center justify-content-between pb-3 mb-2 mb-sm-3 mt-xxl-3">
          <div class="text-center mx-auto" style="max-width: 690px">
          <h3 class="h2 pb-2 pb-md-3 mx-auto" style="max-width: 400px">Why Choose Evarpex?</h3>  
        </div>
        
        </div>
        <div class="row row-cols-1 row-cols-md-4 gy-3 gy-sm-4 gx-2 gx-lg-4">
          <div class="col text-center">
             <div class="d-inline-flex position-relative text-light p-3 mb-3">
                          <span class="position-absolute top-0 start-0 w-100 h-100 bg-primary rounded-pill d-none-dark"></span>
                          <span class="position-absolute top-0 start-0 w-100 h-100 rounded-pill d-none d-block-dark"></span>
                           <i class="ci-check-shield position-relative z-2 fs-4 m-1"></i>
                        </div>
            <h3 class="h5">Secure Transactions</h3>
            <p class="fs-sm px-5 mb-md-0">
            Your money and personal information are protected with industry-standard security measures. No losses on Evarpex</p>
          </div>
          <div class="col text-center">
                <div class="d-inline-flex position-relative text-light p-3 mb-3">
                          <span class="position-absolute top-0 start-0 w-100 h-100 bg-primary rounded-pill d-none-dark"></span>
                          <span class="position-absolute top-0 start-0 w-100 h-100 rounded-pill d-none d-block-dark"></span>
                           <i class="ci-delivery-2  position-relative z-2 fs-4 m-1"></i>
                        </div>
            <h3 class="h5">Fast Delivery</h3>
            <p class="fs-sm px-5 mb-md-0">Say goodbye to delayed and unfulfilled deliveries. We guarantee quick and reliable delivery services ensuring your order arrives on time, every time.</p>
          </div>
          <div class="col text-center">
              <div class="d-inline-flex position-relative text-light p-3 mb-3">
                          <span class="position-absolute top-0 start-0 w-100 h-100 bg-primary rounded-pill d-none-dark"></span>
                          <span class="position-absolute top-0 start-0 w-100 h-100 rounded-pill d-none d-block-dark"></span>
                           <i class="ci-headphones-2  position-relative z-2 fs-4 m-1"></i>
                        </div>
            <h3 class="h5">24/7 Support</h3>
            <p class="fs-sm px-5 mb-md-0"> Our dedicated and professional support team is on standby to help you with any questions or concerns.</p>
          </div>

            <div class="col text-center">
                  <div class="d-inline-flex position-relative text-light p-3 mb-3">
                          <span class="position-absolute top-0 start-0 w-100 h-100 bg-primary rounded-pill d-none-dark"></span>
                          <span class="position-absolute top-0 start-0 w-100 h-100 rounded-pill d-none d-block-dark"></span>
                           <i class="ci-lock  position-relative z-2 fs-4 m-1"></i>
                        </div>
            <h3 class="h5">Verified Sellers Only</h3>
            <p class="fs-sm px-5 mb-md-0">For every order, there must be a delivery. We eliminate online shopping scams by subjecting all sellers through a verification system.</p>
          </div>
        </div>
      </section>

      
         <section class="container pt-3 pt-sm-4 mb-4">
        <div class="position-relative">
          <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none-dark rtl-flip" style="background: linear-gradient(-90deg, #accbee 0%, #e7f0fd 100%)"></span>
          <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none d-block-dark rtl-flip" style="background: linear-gradient(-90deg, #1b273a 0%, #1f2632 100%)"></span>
          <div class="row align-items-center position-relative z-1">
            <div class="col-lg-7 col-xl-5 offset-xl-1 py-5">
              <div class="px-4 px-sm-5 px-xl-0 pe-lg-4">
                <h1 class="text-center text-sm-start mb-4">Join Our Community</h1>
               <p class="pb-2 pb-md-3">Start your journey with Evarpex today</p>
              <a class="btn btn-lg btn-primary" href="{{ route('shops.create') }}" wire:navigate><i class="ci-archive me-2"></i> Sell on Evarpex</a>

              <a class="btn btn-lg btn-secondary" href="{{ route('shops.create') }}" wire:navigate><i class="ci-shopping-bag me-2"></i> Start Shopping</a>
              </div>
            </div>
            <div class="col-lg-5 offset-xl-1 d-none d-lg-block">
              <div class="ratio rtl-flip" style="--cz-aspect-ratio: calc(356 / 526 * 100%)">
                <img src="{{ asset('asset/img/35.png')}}" class="d-none-dark" alt="Image">

              </div>
            </div>
          </div>
        </div>
      </section>
@endsection