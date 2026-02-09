@extends('frontend.layouts.web')

@section('content')
<main class="content-wrapper">
<!-- Hero slider -->
<section class="container pt-4">
    <div class="row">
        <div class="col-lg-9 offset-lg-3">
            <div class="position-relative">
                <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none-dark rtl-flip" style="
                  background: linear-gradient(90deg, #accbee 0%, #e7f0fd 100%);
                "></span>
                <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none d-block-dark rtl-flip" style="
                  background: linear-gradient(90deg, #1b273a 0%, #1f2632 100%);
                "></span>
                <div class="row justify-content-center position-relative z-2">
                    <div class="col-xl-5 col-xxl-4 offset-xxl-1 d-flex align-items-center mt-xl-n3">
                        <!-- Text content master slider -->
                        <div class="swiper px-5 pe-xl-0 ps-xxl-0 me-xl-n5" data-swiper='{
                    "spaceBetween": 64,
                    "loop": true,
                    "speed": 400,
                    "controlSlider": "#sliderImages",
                    "autoplay": {
                      "delay": 5500,
                      "disableOnInteraction": false
                    },
                    "scrollbar": {
                      "el": ".swiper-scrollbar"
                    }
                  }'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide text-center text-xl-start pt-5 py-xl-5">
                                    <p class="text-body">Feel the real quality sound</p>
                                    <h2 class="display-4 pb-2 pb-xl-4">
                                        Headphones ProMax
                                    </h2>
                                    <a class="btn btn-lg btn-primary" href="shop-product-general-electronics.html">
                                        Shop now
                                        <i class="ci-arrow-up-right fs-lg ms-2 me-n1"></i>
                                    </a>
                                </div>
                                <div class="swiper-slide text-center text-xl-start pt-5 py-xl-5">
                                    <p class="text-body">Deal of the week</p>
                                    <h2 class="display-4 pb-2 pb-xl-4">
                                        Powerful iPad Pro M2
                                    </h2>
                                    <a class="btn btn-lg btn-primary" href="shop-product-general-electronics.html">
                                        Shop now
                                        <i class="ci-arrow-up-right fs-lg ms-2 me-n1"></i>
                                    </a>
                                </div>
                                <div class="swiper-slide text-center text-xl-start pt-5 py-xl-5">
                                    <p class="text-body">Virtual reality glasses</p>
                                    <h2 class="display-4 pb-2 pb-xl-4">
                                        Experience New Reality
                                    </h2>
                                    <a class="btn btn-lg btn-primary" href="shop-catalog-electronics.html">
                                        Shop now
                                        <i class="ci-arrow-up-right fs-lg ms-2 me-n1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-9 col-sm-7 col-md-6 col-lg-5 col-xl-7">
                        <!-- Binded images (controlled slider) -->
                        <div class="swiper user-select-none" id="sliderImages" data-swiper='{
                    "allowTouchMove": false,
                    "loop": true,
                    "effect": "fade",
                    "fadeEffect": {
                      "crossFade": true
                    }
                  }'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide d-flex justify-content-end">
                                    <div class="ratio rtl-flip" style="
                            max-width: 495px;
                            --cz-aspect-ratio: calc(537 / 495 * 100%);
                          ">
                                        <img src="{{ static_asset('asset/img/home/electronics/hero-slider/01.png')}}"
                                            alt="Image" />
                                    </div>
                                </div>
                                <div class="swiper-slide d-flex justify-content-end">
                                    <div class="ratio rtl-flip" style="
                            max-width: 495px;
                            --cz-aspect-ratio: calc(537 / 495 * 100%);
                          ">
                                        <img src="{{ static_asset('asset/img/home/electronics/hero-slider/02.png')}}"
                                            alt="Image" />
                                    </div>
                                </div>
                                <div class="swiper-slide d-flex justify-content-end">
                                    <div class="ratio rtl-flip" style="
                            max-width: 495px;
                            --cz-aspect-ratio: calc(537 / 495 * 100%);
                          ">
                                        <img src="{{ static_asset('asset/img/home/electronics/hero-slider/03.png')}}"
                                            alt="Image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Scrollbar -->
                <div class="row justify-content-center" data-bs-theme="dark">
                    <div class="col-xxl-10">
                        <div class="position-relative mx-5 mx-xxl-0">
                            <div class="swiper-scrollbar mb-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container pt-5 mt-1 mt-sm-3 mt-lg-4">
    <div class="row row-cols-2 row-cols-md-4 g-4">
        <!-- Item -->
        <div class="col">
            <div class="d-flex flex-column flex-xxl-row align-items-center">
                <div class="d-flex text-dark-emphasis bg-body-tertiary rounded-circle p-4 mb-3 mb-xxl-0">
                    <i class="ci-delivery fs-2 m-xxl-1"></i>
                </div>
                <div class="text-center text-xxl-start ps-xxl-3">
                    <h3 class="h6 mb-1">Fast Delivery
                    </h3>
                    <p class="fs-sm mb-0">We deliver on time</p>
                </div>
            </div>
        </div>

        <!-- Item -->
        <div class="col">
            <div class="d-flex flex-column flex-xxl-row align-items-center">
                <div class="d-flex text-dark-emphasis bg-body-tertiary rounded-circle p-4 mb-3 mb-xxl-0">
                    <i class="ci-credit-card fs-2 m-xxl-1"></i>
                </div>
                <div class="text-center text-xxl-start ps-xxl-3">
                    <h3 class="h6 mb-1">Secure Payment</h3>
                    <p class="fs-sm mb-0">We ensure secure payment</p>
                </div>
            </div>
        </div>

        <!-- Item -->
        <div class="col">
            <div class="d-flex flex-column flex-xxl-row align-items-center">
                <div class="d-flex text-dark-emphasis bg-body-tertiary rounded-circle p-4 mb-3 mb-xxl-0">
                    <i class="ci-refresh-cw fs-2 m-xxl-1"></i>
                </div>
                <div class="text-center text-xxl-start ps-xxl-3">
                    <h3 class="h6 mb-1">Money Back Guarantee</h3>
                    <p class="fs-sm mb-0">Returning money 30 days</p>
                </div>
            </div>
        </div>

        <!-- Item -->
        <div class="col">
            <div class="d-flex flex-column flex-xxl-row align-items-center">
                <div class="d-flex text-dark-emphasis bg-body-tertiary rounded-circle p-4 mb-3 mb-xxl-0">
                    <i class="ci-chat fs-2 m-xxl-1"></i>
                </div>
                <div class="text-center text-xxl-start ps-xxl-3">
                    <h3 class="h6 mb-1">24/7 Customer Support</h3>
                    <p class="fs-sm mb-0">Friendly customer support</p>
                </div>
            </div>
        </div>
    </div>
</section>

@php
$flash_deal = get_featured_flash_deal();
@endphp
@if ($flash_deal != null)
  <section class="container pt-5 mt-2 mt-sm-3 mt-lg-4">
      <!-- Heading + Countdown -->
      <div class="d-flex align-items-start align-items-md-center justify-content-between border-bottom pb-3 pb-md-4">
        <div class="d-md-flex align-items-center">
          <h2 class="h3 pe-3 me-3 mb-md-0">Flash Deals</h2>

  <div class="d-flex align-items-center"
     data-countdown="{{ date('Y-m-d H:i:s', $flash_deal->end_date) }}">

    <div class="btn btn-primary pe-none px-2">
        <span data-days>0</span>
        <span>d</span>
    </div>

    <div class="animate-blinking text-body-tertiary fs-lg fw-medium mx-2">:</div>

    <div class="btn btn-primary pe-none px-2">
        <span data-hours>00</span>
        <span>h</span>
    </div>

    <div class="animate-blinking text-body-tertiary fs-lg fw-medium mx-2">:</div>

    <div class="btn btn-primary pe-none px-2">
        <span data-minutes>00</span>
        <span>m</span>
    </div>

    <div class="animate-blinking text-body-tertiary fs-lg fw-medium mx-2">:</div>

    <div class="btn btn-primary pe-none px-2">
        <span data-seconds>00</span>
        <span>s</span>
    </div>

    <!-- Hidden ended text -->
    <span class="fw-semibold text-danger ms-2 d-none" data-ended>
        Deal Ended
    </span>
</div>


        </div>
        <div class="nav ms-3">
          <a class="nav-link animate-underline px-0 py-2" href="{{ route('flash-deals') }}" wire:navigate>
            <span class="animate-target text-nowrap">View all</span>
            <i class="ci-chevron-right fs-base ms-1"></i>
          </a>
        </div>
      </div>

      <!-- Product carousel -->
      <div class="position-relative mx-md-1">
        <!-- External slider prev/next buttons visible on screens > 500px wide (sm breakpoint) -->
        <button type="button"
          class="offers-prev btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start position-absolute top-50 start-0 z-2 translate-middle-y ms-n1 d-none d-sm-inline-flex"
          aria-label="Prev">
          <i class="ci-chevron-left fs-lg animate-target"></i>
        </button>
        <button type="button"
          class="offers-next btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end position-absolute top-50 end-0 z-2 translate-middle-y me-n1 d-none d-sm-inline-flex"
          aria-label="Next">
          <i class="ci-chevron-right fs-lg animate-target"></i>
        </button>

        <!-- Slider -->
        <div class="swiper py-4 px-sm-3" data-swiper='{
            "slidesPerView": 2,
            "spaceBetween": 24,
            "loop": true,
            "navigation": {
              "prevEl": ".offers-prev",
              "nextEl": ".offers-next"
            },
            "breakpoints": {
              "768": {
                "slidesPerView": 3
              },
              "992": {
                "slidesPerView": 4
              }
            }
          }'>
          <div class="swiper-wrapper">
           
             @php
                $flash_deal_products = get_flash_deal_products($flash_deal->id);
                @endphp
            <!-- Item -->
              @foreach ($flash_deal_products as $key => $flash_deal_product)
            <div class="swiper-slide">
              <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
                <div class="position-relative">
                  <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                    <div class="d-flex flex-column gap-2">
                      <button type="button" class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex"
                        aria-label="Add to Wishlist" onclick="addToWishList({{ $flash_deal_product->id }})">
                        <i class="ci-heart fs-base animate-target"></i>
                      </button>
                      <button type="button" class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex"
                        aria-label="Compare" onclick="addToCompare({{ $flash_deal_product->id }})">
                        <i class="ci-refresh-cw fs-base animate-target"></i>
                      </button>
                    </div>
                  </div>
                  <div class="dropdown d-lg-none position-absolute top-0 end-0 z-2 mt-2 me-2">
                    <button type="button" class="btn btn-icon btn-sm btn-secondary bg-body" data-bs-toggle="dropdown"
                      aria-expanded="false" aria-label="More actions">
                      <i class="ci-more-vertical fs-lg"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end fs-xs p-2" style="min-width: auto">
                      <li>
                        <a class="dropdown-item" href="#!" onclick="addToWishList()">
                          <i class="ci-heart fs-sm ms-n1 me-2"></i>
                          Add to Wishlist
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!" onclick="addToCompare({{ $flash_deal_product->id }})">
                          <i class="ci-refresh-cw fs-sm ms-n1 me-2"></i>
                          Compare
                        </a>
                      </li>
                    </ul>
                  </div>
                    @php
                        $product_url = route('product', $flash_deal_product->product->slug);
                        if ($flash_deal_product->product->auction_product == 1) {
                        $product_url = route(
                        'auction-product',
                        $flash_deal_product->product->slug,
                        );
                        }
                        @endphp
                  <a class="d-block rounded-top overflow-hidden p-3 p-sm-4"
                    href="{{ $product_url }}" wire:navigate>
                    <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                     <img src="{{ get_image($flash_deal_product->product->thumbnail) }}"
                      alt="{{ $flash_deal_product->product->getTranslation('name') }}"
                      onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                    </div>
                  </a>
                </div>
                <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
                   <div class="d-flex align-items-center gap-2 mb-2">
                        @php
                        $rating = round($flash_deal_product->rating); // 0–5
                        @endphp
                        <div class="d-flex gap-1 fs-xs">
                            @for ($i = 1; $i <= 5; $i++) <i
                                class="ci-star-filled {{ $i <= $rating ? 'text-warning' : 'text-body-tertiary' }}"></i>
                                @endfor
                        </div>
                        <span class="text-body-tertiary fs-xs">({{ $flash_deal_product->reviews_count ?? 0 }})</span>
                    </div>
                  <h3 class="pb-1 mb-2">
                    <a class="d-block fs-sm fw-medium text-truncate" href="{{ $product_url }}" wire:navigate>
                      <span class="animate-target">{{ $flash_deal_product->product->getTranslation('name') }}</span>
                    </a>
                  </h3>
                  <div class="d-flex align-items-center justify-content-between pb-2 mb-1">
                    <div class="h5 lh-1 mb-0">
                     {{ home_discounted_base_price($flash_deal_product->product) }}
                       @if (home_base_price($flash_deal_product->product) != home_discounted_base_price($flash_deal_product->product))
                      <del class="text-body-tertiary fs-sm fw-normal">{{ home_base_price($flash_deal_product->product) }}</del>
                      @endif
                    </div>
                    <button type="button" class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2"
                      aria-label="Add to Cart">
                      <i class="ci-shopping-cart fs-base animate-target"></i>
                    </button>
                  </div>
                  
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <!-- External slider prev/next buttons visible on screens < 500px wide (sm breakpoint) -->
        <div class="d-flex justify-content-center gap-2 mt-n2 mb-3 pb-1 d-sm-none">
          <button type="button"
            class="offers-prev btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start me-1"
            aria-label="Prev">
            <i class="ci-chevron-left fs-lg animate-target"></i>
          </button>
          <button type="button"
            class="offers-next btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end"
            aria-label="Next">
            <i class="ci-chevron-right fs-lg animate-target"></i>
          </button>
        </div>
      </div>
</section>
@endif


@if (count($todays_deal_products) > 0)
<section class="container pt-5 mt-1 mt-sm-2 mt-md-3 mt-lg-4">
    <h2 class="h3 pb-2 pb-sm-3">Today's Deal</h2>
    <div class="row">
        <!-- Banner -->
              @php
                $todays_deal_banner = get_setting('todays_deal_banner', null);
                $todays_deal_banner_small = get_setting('todays_deal_banner_small', null);
            @endphp
       <div class="col-lg-4" data-bs-theme="dark">
       <div class="d-flex flex-column align-items-center justify-content-end h-100 text-center overflow-hidden rounded-5 px-4 px-lg-3 pt-4 pb-5 position-relative"
        style="background:#1d2c41;">

        <img
            src="{{ static_asset('asset/img/home/electronics/banner/background.jpg') }}"
            data-src="{{ uploaded_asset($todays_deal_banner) }}"
            alt="{{ env('APP_NAME') }} promo"
            class="lazyload position-absolute top-0 start-0 w-100 h-100 img-fit"
            onerror="this.onerror=null;this.src='{{ static_asset('asset/img/home/electronics/banner/background.jpg') }}';"
        >

    </div>
</div>


        <!-- Product list -->

        @foreach ($todays_deal_products->chunk(5) as $chunk)
        <div class="col-sm-6 col-lg-4 d-flex flex-column gap-3 pt-4 py-lg-4">
            @foreach ($chunk as $key => $product)

            <div class="position-relative animate-underline d-flex align-items-center ps-xl-3">
                <div class="ratio ratio-1x1 flex-shrink-0" style="width: 110px">
                    <img src="{{ get_image($product->thumbnail) }}" alt="{{ $product->getTranslation('name') }}"
                        title="{{ $product->getTranslation('name') }}"
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                </div>
                <div class="w-100 min-w-0 ps-2 ps-sm-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        @php
                        $rating = round($product->rating); // 0–5
                        @endphp
                        <div class="d-flex gap-1 fs-xs">
                            @for ($i = 1; $i <= 5; $i++) <i
                                class="ci-star-filled {{ $i <= $rating ? 'text-warning' : 'text-body-tertiary' }}"></i>
                                @endfor
                        </div>
                        <span class="text-body-tertiary fs-xs">({{ $product->reviews_count ?? 0 }})</span>
                    </div>
                    @php
                    $product_url = route('product', $product->slug);
                    @endphp

                    <h4 class="mb-2">
                        <a class="stretched-link d-block fs-sm fw-medium text-truncate" href="{{ $product_url }}"
                            wire:navigate>
                            <span class="animate-target">
                                {{ $product->name }}
                            </span>
                        </a>
                    </h4>
                    <div class="h5 mb-0">{{ home_base_price($product) }}</div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach



    </div>
</section>
@endif

<section class="container pt-5 mt-2 mt-sm-3 mt-lg-4">
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 pb-md-4">
        <h2 class="h3 mb-0">New arrivals</h2>
    </div>

    <!-- Product grid -->
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 pt-4">
        @foreach ($newest_products as $key => $product)
        @php
        $cart_added = [];
        @endphp
        @php
        $product_url = route('product', $product->slug);
        @endphp
        <!-- Item -->
        <div class="col" id="product-card-{{ $product->id }}">
            <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
                <div class="position-relative">
                    <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                        <div class="d-flex flex-column gap-2">
                            <button type="button"
                                class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex"
                                aria-label="Add to Wishlist" onclick="addToWishList({{ $product->id }})">
                                <i class="ci-heart fs-base animate-target"></i>
                            </button>

                            <button type="button"
                                class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex"
                                aria-label="Compare" onclick="addToCompare({{ $product->id }})">
                                <i class="ci-refresh-cw fs-base animate-target"></i>
                            </button>
                        </div>
                    </div>
                    <div class="dropdown d-lg-none position-absolute top-0 end-0 z-2 mt-2 me-2">
                        <button type="button" class="btn btn-icon btn-sm btn-secondary bg-body"
                            data-bs-toggle="dropdown" aria-expanded="false" aria-label="More actions">
                            <i class="ci-more-vertical fs-lg"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end fs-xs p-2" style="min-width: auto">
                            <li>
                                <a class="dropdown-item" href="#!" onclick="addToWishList({{ $product->id }})">
                                    <i class="ci-heart fs-sm ms-n1 me-2"></i>
                                    Add to Wishlist
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#!" onclick="addToCompare({{ $product->id }})">
                                    <i class="ci-refresh-cw fs-sm ms-n1 me-2"></i>
                                    Compare
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="{{ $product_url }}" wire:navigate>

                      @if (discount_in_percentage($product) > 0)
                        <span class="badge bg-danger position-absolute top-0 start-0 mt-2 ms-2 mt-lg-3 ms-lg-3">-{{ discount_in_percentage($product) }}%</span>
                        @endif

                        <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                            <img src="{{ get_image($product->thumbnail) }}" alt="{{ $product->getTranslation('name') }}"
                                title="{{ $product->getTranslation('name') }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                        </div>
                    </a>
                </div>
                <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        @php
                        $rating = round($product->rating); // 0–5
                        @endphp
                        <div class="d-flex gap-1 fs-xs">
                            @for ($i = 1; $i <= 5; $i++) <i
                                class="ci-star-filled {{ $i <= $rating ? 'text-warning' : 'text-body-tertiary' }}"></i>
                                @endfor
                        </div>
                        <span class="text-body-tertiary fs-xs">({{ $product->reviews_count ?? 0 }})</span>
                    </div>
                    <h3 class="pb-1 mb-2">
                        <a class="d-block fs-sm fw-medium text-truncate" href="shop-product-general-electronics.html">
                            <span class="animate-target">{{ $product->name }}</span>
                        </a>
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="h5 lh-1 mb-0">
                            @if (home_base_price($product) != home_discounted_base_price($product))
                            <span class="text-dark fw-700">{{ home_discounted_base_price($product) }}</span>
                            <del class="text-body-tertiary fs-sm fw-normal ms-1">{{ home_base_price($product) }}</del>
                            @else
                            <span class="text-dark fw-700">{{ home_base_price($product) }}</span>
                            @endif
                        </div>
                        <form id="add-to-cart-form-{{ $product->id }}">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <!-- Add other option inputs if needed -->
                        </form>
                
                        <button type="button"
                            class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2"
                            aria-label="Add to Cart" onclick="addToCart({{ $product->id }})">
                            <i class="ci-shopping-cart fs-base animate-target"></i>
                        </button>

                    </div>
                </div>
            
            </div>
        </div>
        @endforeach
    </div>
</section>

@if ($featured_products->count() > 0)
<section class="container pt-5 mt-2 mt-sm-3 mt-lg-4">
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 pb-md-4">
        <h2 class="h3 mb-0">Featured products</h2>
      
    </div>

    <!-- Product grid -->
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 pt-4">
        @foreach ($featured_products as $key => $product)
        @php
        $cart_added = [];
        @endphp
        @php
        $product_url = route('product', $product->slug);
        @endphp
        <!-- Item -->
        <div class="col">
            <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
                <div class="position-relative">
                    <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                        <div class="d-flex flex-column gap-2">
                            <button type="button"
                                class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex"
                                aria-label="Add to Wishlist" onclick="addToWishList({{ $product->id }})">
                                <i class="ci-heart fs-base animate-target"></i>
                            </button>

                            <button type="button"
                                class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex"
                                aria-label="Compare" onclick="addToCompare({{ $product->id }})">
                                <i class="ci-refresh-cw fs-base animate-target"></i>
                            </button>
                        </div>
                    </div>
                    <div class="dropdown d-lg-none position-absolute top-0 end-0 z-2 mt-2 me-2">
                        <button type="button" class="btn btn-icon btn-sm btn-secondary bg-body"
                            data-bs-toggle="dropdown" aria-expanded="false" aria-label="More actions">
                            <i class="ci-more-vertical fs-lg"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end fs-xs p-2" style="min-width: auto">
                            <li>
                                <a class="dropdown-item" href="#!" onclick="addToWishList({{ $product->id }})">
                                    <i class="ci-heart fs-sm ms-n1 me-2"></i>
                                    Add to Wishlist
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#!" onclick="addToCompare({{ $product->id }})">
                                    <i class="ci-refresh-cw fs-sm ms-n1 me-2"></i>
                                    Compare
                                </a>
                            </li>
                        </ul>
                    </div>
                    <a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="{{ $product_url }}" wire:navigate>
                         @if (discount_in_percentage($product) > 0)
                        <span class="badge bg-danger position-absolute top-0 start-0 mt-2 ms-2 mt-lg-3 ms-lg-3">-{{ discount_in_percentage($product) }}%/span>
                        @endif
                        <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                            <img src="{{ get_image($product->thumbnail) }}" alt="{{ $product->getTranslation('name') }}"
                                title="{{ $product->getTranslation('name') }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                        </div>
                    </a>
                </div>
                <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        @php
                        $rating = round($product->rating); // 0–5
                        @endphp
                        <div class="d-flex gap-1 fs-xs">
                            @for ($i = 1; $i <= 5; $i++) <i
                                class="ci-star-filled {{ $i <= $rating ? 'text-warning' : 'text-body-tertiary' }}"></i>
                                @endfor
                        </div>
                        <span class="text-body-tertiary fs-xs">({{ $product->reviews_count ?? 0 }})</span>
                    </div>
                    <h3 class="pb-1 mb-2">
                        <a class="d-block fs-sm fw-medium text-truncate" href="shop-product-general-electronics.html">
                            <span class="animate-target">{{ $product->name }}</span>
                        </a>
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="h5 lh-1 mb-0">
                            @if (home_base_price($product) != home_discounted_base_price($product))
                            <span class="text-dark fw-700">{{ home_discounted_base_price($product) }}</span>
                            <del class="text-body-tertiary fs-sm fw-normal ms-1">{{ home_base_price($product) }}</del>
                            @else
                            <span class="text-dark fw-700">{{ home_base_price($product) }}</span>
                            @endif
                        </div>
                        <button type="button"
                            class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2"
                            aria-label="Add to Cart" onclick="addToCart()">
                            <i class="ci-shopping-cart fs-base animate-target"></i>
                        </button>

                    </div>
                </div>
              
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Top Sellers -->
@php
$best_selers = get_best_sellers(12);
@endphp
@if (count($best_selers) > 0)
 <section class="container pt-5 mt-1 mt-sm-2 mt-md-3 mt-lg-4 pb-4">
   <div class="d-flex align-items-center justify-content-between border-bottom pb-3 pb-md-4">
        <h2 class="h3 mb-0">Top Sellers</h2>
        <div class="nav ms-3">
          <a class="nav-link animate-underline px-0 py-2" href="{{ route('sellers') }}" wire:navigate>
            <span class="animate-target">View all</span>
            <i class="ci-chevron-right fs-base ms-1"></i>
          </a>
        </div>
      </div>

  <div class="row pt-3">
    
    <!-- ITEM -->
     @foreach ($best_selers as $key => $seller)
      @if ($seller->user != null)
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="position-relative animate-underline d-flex align-items-center h-100">
        <div class="ratio ratio-1x1 flex-shrink-0" style="width: 110px">
           <a href="{{ route('shop.visit', $seller->slug) }}" wire:navigate>
            <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                data-src="{{ uploaded_asset($seller->logo) }}"
                alt="{{ $seller->name }}"
                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
           </a>
  
        </div>
        
        
        <div class="w-100 min-w-0 ps-2">
          <div class="d-flex align-items-center gap-2 mb-2">
        <div class="d-flex gap-1 fs-xs">
        @for ($i = 1; $i <= 5; $i++)
            @if ($seller->rating >= $i)
                <i class="ci-star-filled text-warning"></i>
            @elseif ($seller->rating >= ($i - 0.5))
                <i class="ci-star-half text-warning"></i>
            @else
                <i class="ci-star text-body-tertiary opacity-75"></i>
            @endif
        @endfor
    </div>

    <span class="text-body-tertiary fs-xs">
        {{ $seller->num_of_reviews }}
    </span>
</div>
          <a href="{{ route('shop.visit', $seller->slug) }}" wire:navigate>
          <h4 class="mb-2 fs-sm fw-medium text-truncate">
            {{ $seller->name }}
          </h4>
          </a>
        
        </div>
      </div>
    </div>
    @endif
    @endforeach

  </div>
</section>
@endif


@endif
 </main>
@endsection