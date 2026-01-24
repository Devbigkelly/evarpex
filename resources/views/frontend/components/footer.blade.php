
   <!-- Page footer -->
        <section class="bg-body-tertiary py-5">
        <div class="container pt-sm-2 pt-md-3 pt-lg-4 pt-xl-5">
          <div class="row">
            <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
              <h2 class="h4 mb-2">Sign up to our newsletter</h2>
              <p class="text-body pb-2 pb-ms-3">Subscribe to our newsletter for regular updates about Offers, Coupons & more</p>
              <form class="d-flex needs-validation pb-1 pb-sm-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5" method="POST" action="{{ route('subscribers.store') }}">
                  @csrf
                <div class="position-relative w-100 me-2">
                  <input type="email" name="email" class="form-control form-control-lg" placeholder="Your email" required="">
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Subscribe</button>
              </form>
              <div class="d-flex gap-3">
                <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="Instagram">
                  <i class="ci-instagram fs-base"></i>
                </a>
                <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="Facebook">
                  <i class="ci-facebook fs-base"></i>
                </a>
                <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="YouTube">
                  <i class="ci-youtube fs-base"></i>
                </a>
                <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="Telegram">
                  <i class="ci-telegram fs-base"></i>
                </a>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 col-xl-4 offset-lg-1 offset-xl-2">
         
              @php
    $lastViewedProducts = getLastViewedProducts();
@endphp

@if ($lastViewedProducts->count())
    <h3 class="fs-16 fw-700 mb-2">
        {{ translate('Last Viewed Products') }}
    </h3>

    <ul class="list-unstyled d-flex flex-column gap-4 mb-3">
        @foreach ($lastViewedProducts as $product)
              @continue(empty($product->slug))

    @php
        $product_url = $product->auction_product
            ? route('auction-product', $product->slug)
            : route('product', $product->slug);
    @endphp

            <li class="nav align-items-center position-relative">
                <img class="rounded"
                     src="{{ get_image($product->thumbnail) }}"
                     alt="{{ $product->getTranslation('name') }}"
                     onerror="this.src='{{ static_asset('assets/img/placeholder.jpg') }}'">

                <div class="ps-3">
                    <div class="fs-xs text-body-secondary mb-2">
                        {{ home_discounted_base_price($product) }}
                    </div>

                    <a class="nav-link fs-sm stretched-link p-0"
                       href="{{ $product_url }}">
                        {{ $product->getTranslation('name') }}
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
@endif

            
            </div>
          </div>
        </div>
      </section>
   <footer class="footer position-relative bg-dark">
       <span class="position-absolute top-0 start-0 w-100 h-100 bg-body d-none d-block-dark"></span>
       <div class="container position-relative z-1 pt-sm-2 pt-md-3 pt-lg-4" data-bs-theme="dark">
           <!-- Columns with links that are turned into accordion on screens < 500px wide (sm breakpoint) -->
           <div class="accordion py-5" id="footerLinks">
               <div class="row">
                   <div class="col-md-4 d-sm-flex flex-md-column align-items-center align-items-md-start pb-3 mb-sm-4">
                       <h4 class="mb-sm-0 mb-md-4 me-4">
                           <a class="text-dark-emphasis text-decoration-none" href="{{route('home')}}" wire:navigate>
                               @if(get_setting('footer_logo') != null)
                               <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                   data-src="{{ uploaded_asset(get_setting('footer_logo')) }}"
                                   alt="{{ env('APP_NAME') }}" width="200">
                               @else
                               <img src="{{ static_asset('asset/img/evarpexwhite.png') }}"
                                   data-src="{{ static_asset('asset/img/evarpexwhite.png') }}"
                                   alt="{{ env('APP_NAME') }}" width="200">
                               @endif
                           </a>
                       </h4>
                       <p
                           class="text-body fs-sm text-sm-end text-md-start mb-sm-0 mb-md-3 ms-0 ms-sm-auto ms-md-0 me-4">
                           Evarpex is a global online marketplace that connects buyers and sellers of various products
                           and services. We provide a secure and convenient platform for transactions, ensuring a
                           seamless experience for all users.
                       </p>
                       <div class="dropdown" style="max-width: 250px">
                           <button type="button" class="btn btn-secondary dropdown-toggle justify-content-between w-100"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Help and consultation
                           </button>
                           <ul class="dropdown-menu">
                               <li>
                                   <a class="dropdown-item" href="#!">Help center &amp; FAQ</a>
                               </li>
                               <li><a class="dropdown-item" href="#!">Support chat</a></li>
                               <li>
                                   <a class="dropdown-item" href="#!">Open support ticket</a>
                               </li>
                               <li><a class="dropdown-item" href="#!">Call center</a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-md-8">
                       <div class="row row-cols-1 row-cols-sm-3 gx-3 gx-md-4">
                           <div class="accordion-item col border-0">
                               <h6 class="accordion-header" id="companyHeading">
                                   <span class="text-dark-emphasis d-none d-sm-block">Company</span>
                                   <button type="button" class="accordion-button collapsed py-3 d-sm-none"
                                       data-bs-toggle="collapse" data-bs-target="#companyLinks" aria-expanded="false"
                                       aria-controls="companyLinks">
                                       Company
                                   </button>
                               </h6>
                               <div class="accordion-collapse collapse d-sm-block" id="companyLinks"
                                   aria-labelledby="companyHeading" data-bs-parent="#footerLinks">
                                   <ul class="nav flex-column gap-2 pt-sm-3 pb-3 mt-n1 mb-1">
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="{{route('about')}}" wire:navigate>About company</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Our team</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Careers</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Contact us</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">News</a>
                                       </li>
                                   </ul>
                               </div>
                               <hr class="d-sm-none my-0" />
                           </div>
                           <div class="accordion-item col border-0">
                               <h6 class="accordion-header" id="accountHeading">
                                   <span class="text-dark-emphasis d-none d-sm-block">Account</span>
                                   <button type="button" class="accordion-button collapsed py-3 d-sm-none"
                                       data-bs-toggle="collapse" data-bs-target="#accountLinks" aria-expanded="false"
                                       aria-controls="accountLinks">
                                       Account
                                   </button>
                               </h6>
                               <div class="accordion-collapse collapse d-sm-block" id="accountLinks"
                                   aria-labelledby="accountHeading" data-bs-parent="#footerLinks">
                                   <ul class="nav flex-column gap-2 pt-sm-3 pb-3 mt-n1 mb-1">
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Your account</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Shipping rates &amp; policies</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Refunds &amp; replacements</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Delivery info</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="{{ route('orders.track') }}" wire:navigate>Order tracking</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Taxes &amp; fees</a>
                                       </li>
                                   </ul>
                               </div>
                               <hr class="d-sm-none my-0" />
                           </div>
                           <div class="accordion-item col border-0">
                               <h6 class="accordion-header" id="customerHeading">
                                   <span class="text-dark-emphasis d-none d-sm-block">Customer service</span>
                                   <button type="button" class="accordion-button collapsed py-3 d-sm-none"
                                       data-bs-toggle="collapse" data-bs-target="#customerLinks" aria-expanded="false"
                                       aria-controls="customerLinks">
                                       Customer service
                                   </button>
                               </h6>
                               <div class="accordion-collapse collapse d-sm-block" id="customerLinks"
                                   aria-labelledby="customerHeading" data-bs-parent="#footerLinks">
                                   <ul class="nav flex-column gap-2 pt-sm-3 pb-3 mt-n1 mb-1">
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Payment methods</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Money back guarantee</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Product returns</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Support center</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Shipping</a>
                                       </li>
                                       <li class="d-flex w-100 pt-1">
                                           <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                               href="#!">Terms &amp; conditions</a>
                                       </li>
                                   </ul>
                               </div>
                               <hr class="d-sm-none my-0" />
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- Copyright + Payment methods -->
           <div class="d-md-flex align-items-center border-top py-4">
               <div class="d-flex gap-2 gap-sm-3 justify-content-center ms-md-auto mb-4 mb-md-0 order-md-2">
                   <div>
                       <img src="{{ static_asset('asset/img/payment-methods/visa-dark-mode.svg')}}" alt="Visa" />
                   </div>
                   <div>
                       <img src="{{ static_asset('asset/img/payment-methods/mastercard.svg')}}" alt="Mastercard" />
                   </div>
                   <div>
                       <img src="{{ static_asset('asset/img/payment-methods/paypal-dark-mode.svg')}}" alt="PayPal" />
                   </div>
                   <div>
                       <img src="{{ static_asset('asset/img/payment-methods/google-pay-dark-mode.svg')}}"
                           alt="Google Pay" />
                   </div>
                   <div>
                       <img src="{{ static_asset('asset/img/payment-methods/apple-pay-dark-mode.svg')}}"
                           alt="Apple Pay" />
                   </div>
               </div>
               <p class="text-body fs-xs text-center text-md-start mb-0 me-4 order-md-1">
                   © All rights reserved. Made by
                   <span class="animate-underline"><a
                           class="animate-target text-dark-emphasis fw-medium text-decoration-none"
                           href="https://evarpex.com/" target="_blank" rel="noreferrer">Evarpex Team</a></span>
               </p>
           </div>
       </div>
   </footer>

   <!-- Back to top button -->
   <div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
       <a class="btn-scroll-top btn btn-sm bg-body border-0 rounded-pill shadow animate-slide-end" href="#top">
           Top
           <i class="ci-arrow-right fs-base ms-1 me-n1 animate-target"></i>
           <span class="position-absolute top-0 start-0 w-100 h-100 border rounded-pill z-0"></span>
           <svg class="position-absolute top-0 start-0 w-100 h-100 z-1" viewBox="0 0 62 32" fill="none"
               xmlns="http://www.w3.org/2000/svg">
               <rect x=".75" y=".75" width="60.5" height="30.5" rx="15.25" stroke="currentColor" stroke-width="1.5"
                   stroke-miterlimit="10"></rect>
           </svg>
       </a>

   </div>