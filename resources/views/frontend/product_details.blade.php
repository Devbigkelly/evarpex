@extends('frontend.layouts.web')

@section('meta_title'){{ $detailedProduct->meta_title }}@stop

@section('meta_description'){{ $detailedProduct->meta_description }}@stop

@section('meta_keywords'){{ $detailedProduct->tags }}@stop

@section('meta')
    @php
        $availability = "out of stock";
        $qty = 0;
        if($detailedProduct->variant_product) {
            foreach ($detailedProduct->stocks as $key => $stock) {
                $qty += $stock->qty;
            }
        }
        else {
            $qty = optional($detailedProduct->stocks->first())->qty;
        }
        if($qty > 0){
            $availability = "in stock";
        }
    @endphp
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $detailedProduct->meta_title }}">
    <meta itemprop="description" content="{{ $detailedProduct->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $detailedProduct->meta_title }}">
    <meta name="twitter:description" content="{{ $detailedProduct->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}">
    <meta name="twitter:data1" content="{{ single_price($detailedProduct->unit_price) }}">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $detailedProduct->meta_title }}" />
    <meta property="og:type" content="og:product" />
    <meta property="og:url" content="{{ route('product', $detailedProduct->slug) }}" />
    <meta property="og:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}" />
    <meta property="og:description" content="{{ $detailedProduct->meta_description }}" />
    <meta property="og:site_name" content="{{ get_setting('meta_title') }}" />
    <meta property="og:price:amount" content="{{ single_price($detailedProduct->unit_price) }}" />
    <meta property="product:brand" content="{{ $detailedProduct->brand ? $detailedProduct->brand->name : env('APP_NAME') }}">
    <meta property="product:availability" content="{{ $availability }}">
    <meta property="product:condition" content="new">
    <meta property="product:price:amount" content="{{ number_format($detailedProduct->unit_price, 2) }}">
    <meta property="product:retailer_item_id" content="{{ $detailedProduct->slug }}">
    <meta property="product:price:currency"
        content="{{ get_system_default_currency()->code }}" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
@endsection

@section('content')

    <!-- Page content -->
    <main class="content-wrapper pt-5">
      <!-- Page title -->

        @php
                    $total = 0;
                    $total += $detailedProduct->reviews->where('status', 1)->count();
                @endphp
   

      <!-- Gallery + Product options -->
   <section class="container pb-5 mb-1 mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5">
@php
    $photos = $detailedProduct->photos ? explode(',', $detailedProduct->photos) : [];
    $shortVideos = $detailedProduct->short_video ? explode(',', $detailedProduct->short_video) : [];
    $shortVideoThumbs = $detailedProduct->short_video_thumbnail
        ? explode(',', $detailedProduct->short_video_thumbnail)
        : [];
    $videos = is_iterable($detailedProduct->video_link ?? null)
        ? $detailedProduct->video_link
        : [];
@endphp

<div class="row">

    <!-- PRODUCT GALLERY -->
    <div class="col-md-6">

        <!-- MAIN SWIPER -->
        <div class="swiper product-main-swiper" data-swiper='{
            "loop": true,
            "navigation": {
                "prevEl": ".btn-prev",
                "nextEl": ".btn-next"
            },
            "thumbs": {
                "swiper": "#product-thumbs"
            }
        }'>
            <div class="swiper-wrapper">

                {{-- Variant images --}}
                @if ($detailedProduct->digital == 0)
                    @foreach ($detailedProduct->stocks as $stock)
                        @if ($stock->image)
                            <div class="swiper-slide">
                                <div class="ratio ratio-1x1">
                                    <img src="{{ uploaded_asset($stock->image) }}" alt="Product image">
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

                {{-- Product photos --}}
                @foreach ($photos as $photo)
                    <div class="swiper-slide">
                        <div class="ratio ratio-1x1">
                            <img src="{{ uploaded_asset($photo) }}" alt="Product image">
                        </div>
                    </div>
                @endforeach

                {{-- Short videos --}}
                @foreach ($shortVideos as $i => $video)
                    <div class="swiper-slide">
                        <div class="ratio ratio-1x1">
                            <video controls poster="{{ $shortVideoThumbs[$i] ?? '' }}" class="w-100 h-100">
                                <source src="{{ uploaded_asset($video) }}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                @endforeach

                {{-- YouTube videos --}}
                @foreach ($videos as $video)
                    <div class="swiper-slide">
                        <div class="ratio ratio-1x1">
                            <iframe
                                src="{{ convertToEmbedUrl($video) }}"
                                allowfullscreen
                                class="w-100 h-100 border-0"></iframe>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- NAV BUTTONS -->
            <div class="position-absolute top-50 start-0 translate-middle-y z-2 ms-2">
                <button type="button" class="btn btn-prev btn-icon btn-outline-secondary bg-body rounded-circle">
                    <i class="ci-chevron-left"></i>
                </button>
            </div>
            <div class="position-absolute top-50 end-0 translate-middle-y z-2 me-2">
                <button type="button" class="btn btn-next btn-icon btn-outline-secondary bg-body rounded-circle">
                    <i class="ci-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- THUMBNAILS -->
        <div class="swiper swiper-thumbs pt-2 mt-2" id="product-thumbs" data-swiper='{
            "loop": true,
            "spaceBetween": 12,
            "slidesPerView": 4,
            "watchSlidesProgress": true,
            "breakpoints": {
                "480": { "slidesPerView": 4 },
                "768": { "slidesPerView": 5 },
                "992": { "slidesPerView": 6 }
            }
        }'>
            <div class="swiper-wrapper">

                {{-- Variant thumbs --}}
                @if ($detailedProduct->digital == 0)
                    @foreach ($detailedProduct->stocks as $stock)
                        @if ($stock->image)
                            <div class="swiper-slide">
                                <div class="ratio ratio-1x1">
                                    <img src="{{ uploaded_asset($stock->image) }}" class="swiper-thumb-img">
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

                {{-- Photo thumbs --}}
                @foreach ($photos as $photo)
                    <div class="swiper-slide">
                        <div class="ratio ratio-1x1">
                            <img src="{{ uploaded_asset($photo) }}" class="swiper-thumb-img">
                        </div>
                    </div>
                @endforeach

                {{-- Short video thumbs --}}
                @foreach ($shortVideos as $i => $video)
                    <div class="swiper-slide position-relative">
                        <div class="ratio ratio-1x1">
                            <img src="{{ $shortVideoThumbs[$i] ?? '' }}" class="swiper-thumb-img">
                        </div>
                        <span class="position-absolute top-50 start-50 translate-middle text-white">
                            <i class="la la-play fs-5"></i>
                        </span>
                    </div>
                @endforeach

                {{-- YouTube thumbs --}}
                @foreach ($videos as $video)
                    @php $yt = youtubeVideoId($video); @endphp
                    <div class="swiper-slide position-relative">
                        <div class="ratio ratio-1x1">
                            <img src="https://img.youtube.com/vi/{{ $yt }}/hqdefault.jpg" class="swiper-thumb-img">
                        </div>
                        <span class="position-absolute top-50 start-50 translate-middle text-white">
                            <i class="la la-play fs-5"></i>
                        </span>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-5 offset-xl-1 pt-4">
            <div class="ps-md-4 ps-xl-0">
              <div class="position-relative" id="zoomPane">

                 <!-- Reviews -->
              <a class="d-none d-md-flex align-items-center gap-2 text-decoration-none mb-3" href="#reviews">
               <div class="d-flex gap-1 fs-sm">
              {!! renderStarRating($detailedProduct->rating) !!}

            </div>
            <span class="text-body-tertiary fs-xs">{{ $total }} reviews</span>
              </a>

               <h1 class="fs-xl fw-medium">{{ $detailedProduct->name }}</h1>
                 @if (home_price($detailedProduct) != home_discounted_price($detailedProduct))
              <div class="h4 fw-bold mb-4">{{ home_discounted_price($detailedProduct) }}
                <del class="fs-sm fw-normal text-body-tertiary">{{ home_price($detailedProduct) }}</del></div>
                  <!-- Unit -->
                            @if ($detailedProduct->unit != null)
                                <span class="opacity-70 ml-1">/{{ $detailedProduct->getTranslation('unit') }}</span>
                            @endif
                            <!-- Discount percentage -->
                            @if (discount_in_percentage($detailedProduct) > 0)
                                <span class="bg-primary ml-2 fs-11 fw-700 text-white w-35px text-center p-1"
                                    style="padding-top:2px;padding-bottom:2px;">-{{ discount_in_percentage($detailedProduct) }}%</span>
                            @endif
              @else
               <div class="h4 fw-bold mb-4"> {{ home_discounted_price($detailedProduct) }}
                 <!-- Unit -->
                            @if ($detailedProduct->unit != null)
                                <span class="opacity-70">/{{ $detailedProduct->getTranslation('unit') }}</span>
                            @endif
               </div>
              @endif 
               @if ($detailedProduct->brand != null)
            <label class="form-label fw-semibold pb-1 mb-2">Brand: <a href="{{ route('products.brand', $detailedProduct->brand->slug) }}" wire:navigate class="text-body fw-normal">{{ $detailedProduct->brand->name }}</a></label>
            @endif

              <ul class="list-unstyled fs-sm text-body-emphasis mb-4">
                  @if ($detailedProduct->has_warranty == 1 && $detailedProduct->warranty_id != null)
                <li>
                  <span class="me-1">We provide a <span class="fw-semibold">{{ $detailedProduct->warranty->getTranslation('text')}} warranty</span></span>
                  <svg class="text-body-emphasis" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"><path fill-rule="evenodd" d="M22.287 10.967l-1.7-2c-.215-.254-.346-.568-.373-.9L20 5.46c-.029-.379-.193-.734-.462-1.002s-.625-.43-1.004-.458l-2.607-.213c-.332-.027-.646-.158-.9-.373l-2-1.7c-.288-.247-.654-.383-1.033-.383s-.746.136-1.033.383l-2 1.7c-.254.215-.568.346-.9.373L5.467 4c-.38.028-.737.191-1.006.461s-.433.626-.46 1.006l-.213 2.607c-.027.332-.158.646-.373.9l-1.7 2c-.247.288-.383.654-.383 1.033s.136.746.383 1.033l1.7 2c.215.254.346.568.373.9L4 18.547c.031.377.196.731.465.998s.624.428 1.002.456l2.607.213c.332.027.646.158.9.373l2 1.7c.288.247.654.383 1.033.383s.746-.136 1.033-.383l2-1.7c.254-.215.568-.346.9-.373L18.534 20c.38-.028.737-.191 1.006-.46s.433-.626.46-1.006l.213-2.607c.027-.332.158-.646.373-.9l1.7-2c.245-.287.38-.652.38-1.03s-.135-.743-.38-1.03zm-11.08 4.153l-2.96-2.96 1.127-1.127 1.833 1.827 3.42-3.42 1.127 1.127-4.547 4.553z"></path></svg>
                </li>
                @endif
              </ul>
                 <!-- Seller Info -->
    <div class="d-flex flex-wrap align-items-center">
        <div class="d-flex align-items-center mr-4">
            <!-- Shop Name -->
            @if ($detailedProduct->added_by == 'seller' && get_setting('vendor_system_activation') == 1)
            <div class="d-flex align-items-center gap-2">
                <span class="text-secondary fs-14 fw-400">
                    {{ translate('Sold by') }}
                </span>
            
                <a href="{{ route('shop.visit', $detailedProduct->user->shop->slug) }}"
                   class="text-reset hov-text-primary fs-14 fw-700">
                    {{ $detailedProduct->user->shop->name }}
                </a>
            </div>
            
            @else
                <p class="mb-0 fs-14 fw-700">{{ translate('Evarpex product') }}</p>
            @endif
        </div>
        <div class="w-100 d-sm-none"></div>



        <!-- Size guide -->
        @php
            $sizeChartId = ($detailedProduct->main_category && $detailedProduct->main_category->sizeChart) ? $detailedProduct->main_category->sizeChart->id : 0;
            $sizeChartName = ($detailedProduct->main_category && $detailedProduct->main_category->sizeChart) ? $detailedProduct->main_category->sizeChart->name : null;
        @endphp
        @if($sizeChartId != 0)
            <div class=" ml-4">
                <a href="javascript:void(1);" onclick='showSizeChartDetail({{ $sizeChartId }}, "{{ $sizeChartName }}")' class="animate-underline-primary">{{ translate('Show size guide') }}</a>
            </div>
        @endif
    </div>
<form id="option-choice-form">
    @csrf
    <input type="hidden" name="id" value="{{ $detailedProduct->id }}">

    <!-- Color Options -->
    @if ($detailedProduct->colors != null && count(json_decode($detailedProduct->colors)) > 0)
        <div class="pb-3 mb-2 mb-lg-3">
            <label class="form-label fw-semibold pb-1 mb-2">
                Color: <span class="text-body fw-normal" id="colorOption">Gray blue</span>
            </label>
            <div class="d-flex flex-wrap gap-2" data-binded-label="#colorOption">
                @foreach (json_decode($detailedProduct->colors) as $key => $color)
                    @php
                        $colorName = get_single_color_name($color);
                        $id = 'color-'.$key;
                    @endphp
                    <input type="radio" class="btn-check" name="color" id="{{ $id }}" value="{{ $colorName }}" @if($key==0) checked @endif>
                    <label for="{{ $id }}" class="btn btn-color fs-xl" data-label="{{ $colorName }}" style="background: {{ $color }};">
                        <span class="visually-hidden">{{ $colorName }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Count + Buttons -->
    <div class="d-flex flex-wrap flex-sm-nowrap flex-md-wrap flex-lg-nowrap gap-3 gap-lg-2 gap-xl-3 mb-4">
        <div class="count-input flex-shrink-0 order-sm-1">
            <button type="button" class="btn btn-icon btn-lg" data-decrement aria-label="Decrement quantity">
                <i class="ci-minus"></i>
            </button>
            <input type="number" name="quantity" class="form-control form-control-lg text-center" value="1" min="1" max="5" readonly>
            <button type="button" class="btn btn-icon btn-lg" data-increment aria-label="Increment quantity">
                <i class="ci-plus"></i>
            </button>
        </div>

        <!-- Wishlist -->
        <button type="button" class="btn btn-icon btn-lg btn-secondary animate-pulse order-sm-3 order-md-2 order-lg-3"
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-sm" data-bs-title="Add to Wishlist" aria-label="Add to Wishlist" onclick="addToWishList()">
            <i class="ci-heart fs-lg animate-target"></i>
        </button>

        <!-- Compare -->
        <button type="button" class="btn btn-icon btn-lg btn-secondary animate-rotate order-sm-4 order-md-3 order-lg-4"
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-sm" data-bs-title="Compare" aria-label="Compare" onclick="addToCompare()">
            <i class="ci-refresh-cw fs-lg animate-target"></i>
        </button>

        <!-- Add to Cart -->
        <button type="button" class="btn btn-lg btn-primary w-100 animate-slide-end order-sm-2 order-md-4 order-lg-2"
            @if (Auth::check() || get_setting('guest_checkout_activation') == 1)
                onclick="addToCart()"
            @else
                onclick="showLoginModal()"
            @endif>
            <i class="ci-shopping-cart fs-lg animate-target ms-n1 me-2"></i>
            {{ translate('Add to cart') }}
        </button>
    </div>
</form>


              <!-- Shipping options -->
              <div class="d-flex align-items-center pb-2">
                <h3 class="h6 mb-0">Shipping options</h3>
                <a class="btn btn-sm btn-secondary ms-auto" href="#!">
                  <i class="ci-map-pin fs-sm ms-n1 me-1"></i>
                  Find local store
                </a>
              </div>
              <table class="table table-borderless fs-sm mb-2">
                <tbody>
                  <tr>
                    <td class="py-2 ps-0">Pickup from the store</td>
                    <td class="py-2">Today</td>
                    <td class="text-body-emphasis fw-semibold text-end py-2 pe-0">Free</td>
                  </tr>
                  <tr>
                    <td class="py-2 ps-0">Pickup from postal offices</td>
                    <td class="py-2">Tomorrow</td>
                    <td class="text-body-emphasis fw-semibold text-end py-2 pe-0">$25.00</td>
                  </tr>
                  <tr>
                    <td class="py-2 ps-0">Delivery by courier</td>
                    <td class="py-2">2-3 days</td>
                    <td class="text-body-emphasis fw-semibold text-end py-2 pe-0">$35.00</td>
                  </tr>
                </tbody>
              </table>

              <!-- Warranty + Payment info accordion -->
                @if ($detailedProduct->has_warranty == 1 && $detailedProduct->warranty_id != null)
              <div class="accordion" id="infoAccordion">
                <div class="accordion-item border-top">
                  <h3 class="accordion-header" id="headingWarranty">
                    <button type="button" class="accordion-button animate-underline collapsed" data-bs-toggle="collapse" data-bs-target="#warranty" aria-expanded="false" aria-controls="warranty">
                      <span class="animate-target me-2">Warranty information</span>
                    </button>
                  </h3>
                  <div class="accordion-collapse collapse" id="warranty" aria-labelledby="headingWarranty" data-bs-parent="#infoAccordion">
                    <div class="accordion-body">
                      <div class="alert d-flex alert-info mb-3" role="alert">
                        <i class="ci-check-shield fs-xl mt-1 me-2"></i>
                        <div class="fs-sm"><span class="fw-semibold">Warranty:</span> {{ $detailedProduct->warranty->getTranslation('text')}}</div>
                      </div>
                      <p class="mb-0">{{ $detailedProduct->warrantyNote->getTranslation('description') }}</p>
                    </div>
                  </div>
                </div>
               
              </div>
              @endif
            </div>
          </div>

</div>
</section>


      <!-- Sticky product preview + Add to cart CTA -->
      <section class="sticky-product-banner sticky-top d-md-none" data-sticky-element="">
        <div class="sticky-product-banner-inner pt-5">
          <div class="bg-body border-bottom border-light border-opacity-10 shadow pt-4 pb-2">
            <div class="container d-flex align-items-center">
              <div class="d-flex align-items-center min-w-0 ms-n2 me-3">
                <div class="ratio ratio-1x1 flex-shrink-0" style="width: 50px">
                  <img src="{{ get_image($detailedProduct->thumbnail) }}" alt="{{ $detailedProduct->getTranslation('name') }}"
                                title="{{ $detailedProduct->getTranslation('name') }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                </div>
                <div class="w-100 min-w-0 ps-2">
                  <h4 class="fs-sm fw-medium text-truncate mb-1">{{ $detailedProduct->name }}</h4>
                  <div class="h6 mb-0">{{ home_discounted_price($detailedProduct) }}</div>
                </div>
              </div>
              <div class="d-flex gap-2 ms-auto">
                <button type="button" class="btn btn-icon btn-secondary animate-pulse" aria-label="Add to Wishlist" onclick="addToWishList()">
                  <i class="ci-heart fs-base animate-target"></i>
                </button>
                <button type="button"
        class="btn btn-primary animate-slide-end d-none d-sm-inline-flex"
        @if (Auth::check() || get_setting('guest_checkout_activation') == 1) onclick="addToCart()" @else onclick="showLoginModal()" @endif>
    <i class="ci-shopping-cart fs-base animate-target ms-n1 me-2"></i>
    {{ translate('Add to cart') }}
</button>

            <button type="button"
        class="btn btn-icon btn-primary animate-slide-end d-sm-none"
        aria-label="Add to Cart"
        @if (Auth::check() || get_setting('guest_checkout_activation') == 1) onclick="addToCart()" @else onclick="showLoginModal()" @endif>
    <i class="ci-shopping-cart fs-lg animate-target"></i>
</button>

              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- Product details and Reviews shared container -->
      <section class="container pb-5 mb-2 mb-md-3 mb-lg-4 mb-xl-5">
        <div class="row">
         <div class="col-md-7">

    <!-- Product details -->
    <h2 class="h3 pb-2 pb-md-3">Product details</h2>
<div class="bg-white mb-4 border p-3 p-sm-4">
    <!-- Tabs -->
    <div class="nav aiz-nav-tabs">
        <a href="#tab_default_1" data-toggle="tab"
            class="mr-5 pb-2 fs-16 fw-700 text-reset active show">{{ translate('Description') }}</a>
        @if ($detailedProduct->video_link != null)
            <a href="#tab_default_2" data-toggle="tab"
                class="mr-5 pb-2 fs-16 fw-700 text-reset">{{ translate('Video') }}</a>
        @endif
        @if ($detailedProduct->pdf != null)
            <a href="#tab_default_3" data-toggle="tab"
                class="mr-5 pb-2 fs-16 fw-700 text-reset">{{ translate('Downloads') }}</a>
        @endif
    </div>

    <!-- Description -->
    <div class="tab-content pt-0">
        <!-- Description -->
        <div class="tab-pane fade active show" id="tab_default_1">
            <div class="py-5">
                <div class="mw-100 overflow-hidden text-left aiz-editor-data">
                    <?php echo $detailedProduct->getTranslation('description'); ?>
                </div>
            </div>
        </div>

        
        <!-- Download -->
        <div class="tab-pane fade" id="tab_default_3">
            <div class="py-5 text-center ">
                <a href="{{ uploaded_asset($detailedProduct->pdf) }}"
                    class="btn btn-primary">{{ translate('Download') }}</a>
            </div>
        </div>
    </div>
</div>

    <!-- Reviews header -->
    <div class="d-flex align-items-center pt-5 mb-4 mt-2 mt-md-3 mt-lg-4"
         id="reviews" style="scroll-margin-top: 80px">
        <h2 class="h3 mb-0">Reviews</h2>
        <button type="button"
                class="btn btn-secondary ms-auto"
                onclick="product_review('{{ $detailedProduct->id }}')">
            <i class="ci-edit-3 fs-base ms-n1 me-2"></i>
            Leave a review
        </button>
    </div>

    @php
        $totalReviews = $detailedProduct->reviews->where('status', 1)->count();
        $ratings = [5,4,3,2,1];
    @endphp

    <!-- Reviews stats -->
    <div class="row g-4 pb-3">
        <div class="col-sm-4">

            <!-- Overall rating card -->
            <div class="d-flex flex-column align-items-center justify-content-center h-100 bg-body-tertiary rounded p-4">
                <div class="h1 pb-2 mb-1">
                    {{ number_format($detailedProduct->rating, 1) }}
                </div>

                <div class="hstack justify-content-center gap-1 fs-sm mb-2">
                    {!! renderStarRating($detailedProduct->rating) !!}
                </div>

                <div class="fs-sm">
                    {{ $totalReviews }} reviews
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="vstack gap-3">
                @foreach ($ratings as $star)
                    @php
                        $count = $detailedProduct->reviews
                                    ->where('rating', $star)
                                    ->where('status', 1)
                                    ->count();
                        $percent = $totalReviews ? ($count / $totalReviews) * 100 : 0;
                    @endphp

                    <div class="hstack gap-2">
                        <div class="hstack fs-sm gap-1">
                            {{ $star }}<i class="ci-star-filled text-warning"></i>
                        </div>
                        <div class="progress w-100" style="height: 4px">
                            <div class="progress-bar bg-warning rounded-pill"
                                 style="width: {{ $percent }}%"></div>
                        </div>
                        <div class="fs-sm text-nowrap text-end" style="width: 40px;">
                            {{ $count }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Reviews list -->
    @foreach ($reviews as $review)
        @php
            if ($review->type === 'real') {
                $name = $review->user?->name ?? 'User';
            } else {
                $name = $review->custom_reviewer_name;
            }

            $orderDetail = get_order_details_by_review($review);
        @endphp

        <div class="border-bottom py-3 mb-3">
            <div class="d-flex align-items-center mb-3">
                <div class="text-nowrap me-3">
                    <span class="h6 mb-0">{{ $name }}</span>
                </div>
                <span class="text-body-secondary fs-sm ms-auto">
                    {{ date('M d, Y', strtotime($review->created_at)) }}
                </span>
            </div>

            <div class="d-flex gap-1 fs-sm pb-2 mb-1">
                @for ($i = 0; $i < $review->rating; $i++)
                    <i class="ci-star-filled text-warning"></i>
                @endfor
                @for ($i = 0; $i < 5 - $review->rating; $i++)
                    <i class="ci-star text-body-tertiary opacity-75"></i>
                @endfor
            </div>

            @if ($orderDetail && $orderDetail->variation)
                <ul class="list-inline gap-2 pb-2 mb-1">
                    <li class="fs-sm">
                        <span class="text-dark-emphasis fw-medium">Variation:</span>
                        {{ $orderDetail->variation }}
                    </li>
                </ul>
            @endif

            <p class="fs-sm">{{ $review->comment }}</p>

            <div class="nav align-items-center">
                <button type="button" class="nav-link animate-underline px-0">
                    <i class="ci-corner-down-right fs-base ms-1 me-1"></i>
                    <span class="animate-target">Reply</span>
                </button>
            </div>
        </div>
    @endforeach

    <!-- Pagination -->
    <div class="nav">
        {{ $reviews->links() }}
    </div>

</div>



          <!-- Sticky product preview visible on screens > 991px wide (lg breakpoint) -->
          <aside class="col-md-5 col-xl-4 offset-xl-1 d-none d-md-block" style="margin-top: -100px">
            <div class="position-sticky top-0 ps-3 ps-lg-4 ps-xl-0" style="padding-top: 100px">
              <div class="border rounded p-3 p-lg-4">
                <div class="d-flex align-items-center mb-3">
                  <div class="ratio ratio-1x1 flex-shrink-0" style="width: 110px">
                    <img src="{{ get_image($detailedProduct->thumbnail) }}"  width="110" alt="{{ $detailedProduct->getTranslation('name') }}"
                                title="{{ $detailedProduct->getTranslation('name') }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                  </div>
                  <div class="w-100 min-w-0 ps-2 ps-sm-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                      <div class="d-flex gap-1 fs-xs">
                          {!! renderStarRating($detailedProduct->rating) !!}
                      </div>
                      <span class="text-body-tertiary fs-xs">{{ $total }}</span>
                    </div>
                    <h4 class="fs-sm fw-medium mb-2">{{ $detailedProduct->name }}</h4>
                    <div class="h5 mb-0">{{ home_discounted_price($detailedProduct) }}</div>
                  </div>
                </div>
                <div class="d-flex gap-2 gap-lg-3">
                <button type="button"
        class="btn btn-primary w-100 animate-slide-end"
        @if (Auth::check() || get_setting('guest_checkout_activation') == 1) onclick="addToCart()" @else onclick="showLoginModal()" @endif>
        <i class="ci-shopping-cart fs-base animate-target ms-n1 me-2"></i>
    Add to cart
</button>

                  <button type="button" class="btn btn-icon btn-secondary animate-pulse" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-sm" data-bs-title="Add to Wishlist" aria-label="Add to Wishlist" onclick="addToWishList()">
                    <i class="ci-heart fs-base animate-target"></i>
                  </button>
                  <button type="button" class="btn btn-icon btn-secondary animate-rotate" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-sm" data-bs-title="Compare" aria-label="Compare" onclick="addToCompare()">
                    <i class="ci-refresh-cw fs-base animate-target"></i>
                  </button>
                </div>
              </div>
            </div>
          </aside>
        </div>
      </section>


      <!-- Viewed products (Carousel) -->
      <section class="container pb-4 pb-md-5 mb-2 mb-sm-0 mb-lg-2 mb-xl-4">
        <h2 class="h3 border-bottom pb-4 mb-0">Frequently Bought products</h2>

        <!-- Product carousel -->
        <div class="position-relative mx-md-1">

          <!-- External slider prev/next buttons visible on screens > 500px wide (sm breakpoint) -->
          <button type="button" class="viewed-prev btn btn-prev btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start position-absolute top-50 start-0 z-2 translate-middle-y ms-n1 d-none d-sm-inline-flex" aria-label="Prev">
            <i class="ci-chevron-left fs-lg animate-target"></i>
          </button>
          <button type="button" class="viewed-next btn btn-next btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end position-absolute top-50 end-0 z-2 translate-middle-y me-n1 d-none d-sm-inline-flex" aria-label="Next">
            <i class="ci-chevron-right fs-lg animate-target"></i>
          </button>

          <!-- Slider -->
          <div class="swiper py-4 px-sm-3" data-swiper="{
            &quot;slidesPerView&quot;: 2,
            &quot;spaceBetween&quot;: 24,
            &quot;loop&quot;: true,
            &quot;navigation&quot;: {
              &quot;prevEl&quot;: &quot;.viewed-prev&quot;,
              &quot;nextEl&quot;: &quot;.viewed-next&quot;
            },
            &quot;breakpoints&quot;: {
              &quot;768&quot;: {
                &quot;slidesPerView&quot;: 3
              },
              &quot;992&quot;: {
                &quot;slidesPerView&quot;: 4
              }
            }
          }">
            <div class="swiper-wrapper">

              <!-- Item -->
                 @foreach (get_frequently_bought_products($detailedProduct) as $key => $related_product)
              <div class="swiper-slide">
                <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
                  <div class="position-relative">
                    <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                      <div class="d-flex flex-column gap-2">
                        <button type="button" class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex" aria-label="Add to Wishlist" onclick="addToWishList()">
                          <i class="ci-heart fs-base animate-target"></i>
                        </button>
                        <button type="button" class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex" aria-label="Compare" onclick="addToCompare()">
                          <i class="ci-refresh-cw fs-base animate-target"></i>
                        </button>
                      </div>
                    </div>
                    <div class="dropdown d-lg-none position-absolute top-0 end-0 z-2 mt-2 me-2">
                      <button type="button" class="btn btn-icon btn-sm btn-secondary bg-body" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More actions">
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
                          <a class="dropdown-item" href="#!" onclick="addToCompare()">
                            <i class="ci-refresh-cw fs-sm ms-n1 me-2"></i>
                            Compare
                          </a>
                        </li>
                      </ul>
                    </div>
                    <a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="#!">
                      <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                       <img src="{{ static_asset('assets/img/placeholder.jpg') }}"
                        data-src="{{ uploaded_asset($related_product->thumbnail_img) }}"
                        alt="{{ $related_product->getTranslation('name') }}"
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                      </div>
                    </a>
                  </div>
                  <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                      <div class="d-flex gap-1 fs-xs">
                       {!! renderStarRating($detailedProduct->rating) !!}

                      </div>
                      <span class="text-body-tertiary fs-xs">({{ $total }})</span>
                    </div>
                    <h3 class="pb-1 mb-2">
                      <a class="d-block fs-sm fw-medium text-truncate" href="#!">
                        <span class="animate-target">{{ $related_product->getTranslation('name') }}</span>
                      </a>
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="h5 lh-1 mb-0">{{ home_discounted_base_price($related_product) }}</div>
                      <button type="button" class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2"   @if (Auth::check() || get_setting('guest_checkout_activation') == 1) onclick="addToCart()" @else onclick="showLoginModal()" @endif aria-label="Add to Cart">
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
            <button type="button" class="viewed-prev btn btn-prev btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start me-1" aria-label="Prev">
              <i class="ci-chevron-left fs-lg animate-target"></i>
            </button>
            <button type="button" class="viewed-next btn btn-next btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end" aria-label="Next">
              <i class="ci-chevron-right fs-lg animate-target"></i>
            </button>
          </div>
        </div>
      </section>
    </main>

 
@endsection

@section('modal')
    <!-- Image Modal -->
    <div class="modal fade" id="image_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="p-4">
                    <div class="size-300px size-lg-450px">
                        <img class="img-fit h-100 lazyload"
                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                            data-src=""
                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bid Modal -->
    @if($detailedProduct->auction_product == 1)
        @php 
            $highest_bid = $detailedProduct->bids->max('amount');
            $min_bid_amount = $highest_bid != null ? $highest_bid+1 : $detailedProduct->starting_bid; 
        @endphp
        <div class="modal fade" id="bid_for_detail_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ translate('Bid For Product') }} <small>({{ translate('Min Bid Amount: ').$min_bid_amount }})</small> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="{{ route('auction_product_bids.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $detailedProduct->id }}">
                            <div class="form-group">
                                <label class="form-label">
                                    {{translate('Place Bid Price')}}
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="number" step="0.01" class="form-control form-control-sm" name="amount" min="{{ $min_bid_amount }}" placeholder="{{ translate('Enter Amount') }}" required>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary transition-3d-hover mr-1">{{ translate('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <!-- Product Review Modal -->
    <div class="modal fade" id="product-review-modal">
        <div class="modal-dialog">
            <div class="modal-content" id="product-review-modal-content">

            </div>
        </div>
    </div>

    <!-- Size chart show Modal -->
    @include('modals.size_chart_show_modal')

    <!-- Product Warranty Modal -->
    <div class="modal fade" id="warranty-note-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6">{{ translate('Warranty Note') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body c-scrollbar-light">
                    @if($detailedProduct->warranty_note_id != null)
                        <p>{{ $detailedProduct->warrantyNote->getTranslation('description') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Product Refund Modal -->
    <div class="modal fade" id="refund-note-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6">{{ translate('Refund Note') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body c-scrollbar-light">
                    @if($detailedProduct->refund_note_id != null)
                        <p>{{ $detailedProduct->refundNote->getTranslation('description') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            getVariantPrice();
        });

        function CopyToClipboard(e) {
            var url = $(e).data('url');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            try {
                document.execCommand("copy");
                AIZ.plugins.notify('success', '{{ translate('Link copied to clipboard') }}');
            } catch (err) {
                AIZ.plugins.notify('danger', '{{ translate('Oops, unable to copy') }}');
            }
            $temp.remove();
            // if (document.selection) {
            //     var range = document.body.createTextRange();
            //     range.moveToElementText(document.getElementById(containerid));
            //     range.select().createTextRange();
            //     document.execCommand("Copy");

            // } else if (window.getSelection) {
            //     var range = document.createRange();
            //     document.getElementById(containerid).style.display = "block";
            //     range.selectNode(document.getElementById(containerid));
            //     window.getSelection().addRange(range);
            //     document.execCommand("Copy");
            //     document.getElementById(containerid).style.display = "none";

            // }
            // AIZ.plugins.notify('success', 'Copied');
        }

        function show_chat_modal() {
            @if (Auth::check())
                $('#chat_modal').modal('show');
            @else
                $('#login_modal').modal('show');
            @endif
        }

        // Pagination using ajax
        $(window).on('hashchange', function() {
            if(window.history.pushState) {
                window.history.pushState('', '/', window.location.pathname);
            } else {
                window.location.hash = '';
            }
        });

        $(document).ready(function() {
            $(document).on('click', '.product-queries-pagination .pagination a', function(e) {
                getPaginateData($(this).attr('href').split('page=')[1], 'query', 'queries-area');
                e.preventDefault();
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.product-reviews-pagination .pagination a', function(e) {
                getPaginateData($(this).attr('href').split('page=')[1], 'review', 'reviews-area');
                e.preventDefault();
            });
        });

        function getPaginateData(page, type, section) {
            $.ajax({
                url: '?page=' + page,
                dataType: 'json',
                data: {type: type},
            }).done(function(data) {
                $('.'+section).html(data);
                location.hash = page;
            }).fail(function() {
                alert('Something went worng! Data could not be loaded.');
            });
        }
        // Pagination end

        function showImage(photo) {
            $('#image_modal img').attr('src', photo);
            $('#image_modal img').attr('data-src', photo);
            $('#image_modal').modal('show');
        }

        function bid_modal(){
            @if (isCustomer() || isSeller())
                $('#bid_for_detail_product').modal('show');
          	@elseif (isAdmin())
                AIZ.plugins.notify('warning', '{{ translate("Sorry, Only customers & Sellers can Bid.") }}');
            @else
                $('#login_modal').modal('show');
            @endif
        }

        function product_review(product_id) {
            @if (isCustomer())
                @if ($review_status == 1)
                    $.post('{{ route('product_review_modal') }}', {
                        _token: '{{ @csrf_token() }}',
                        product_id: product_id
                    }, function(data) {
                        $('#product-review-modal-content').html(data);
                        $('#product-review-modal').modal('show', {
                            backdrop: 'static'
                        });
                        AIZ.extra.inputRating();
                    });
                @else
                    AIZ.plugins.notify('warning', '{{ translate("Sorry, You need to buy this product to give review.") }}');
                @endif
            @elseif (Auth::check() && !isCustomer())
                AIZ.plugins.notify('warning', '{{ translate("Sorry, Only customers can give review.") }}');
            @else
                $('#login_modal').modal('show');
            @endif
        }

        function showSizeChartDetail(id, name){
            $('#size-chart-show-modal .modal-title').html('');
            $('#size-chart-show-modal .modal-body').html('');
            if (id == 0) {
                AIZ.plugins.notify('warning', '{{ translate("Sorry, There is no size guide found for this product.") }}');
                return false;
            }
            $.ajax({
                type: "GET",
                url: "{{ route('size-charts-show', '') }}/"+id,
                data: {},
                success: function(data) {
                    $('#size-chart-show-modal .modal-title').html(name);
                    $('#size-chart-show-modal .modal-body').html(data);
                    $('#size-chart-show-modal').modal('show');
                }
            });
        }
    </script>
@endsection
