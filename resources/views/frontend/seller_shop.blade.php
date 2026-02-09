@extends('frontend.layouts.web')

@section('meta_title'){{ $shop->meta_title }}@stop

@section('meta_description'){{ $shop->meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $shop->meta_title }}">
    <meta itemprop="description" content="{{ $shop->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($shop->logo) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="website">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $shop->meta_title }}">
    <meta name="twitter:description" content="{{ $shop->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($shop->meta_img) }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $shop->meta_title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('shop.visit', $shop->slug) }}" />
    <meta property="og:image" content="{{ uploaded_asset($shop->logo) }}" />
    <meta property="og:description" content="{{ $shop->meta_description }}" />
    <meta property="og:site_name" content="{{ $shop->name }}" />
@endsection

@section('content')
@php
$followed_sellers = [];
if (Auth::check()) {
    $followed_sellers = get_followed_sellers();
}
@endphp
<main class="content-wrapper">

    <!-- Page title -->
  
      <h1 class="h3 container mb-4 pt-4">
        <a class="btn btn-icon hover-effect-scale border rounded-circle overflow-hidden" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="My account">
            <img src="{{ uploaded_asset($shop->logo) }}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Avatar">
          </a>

        <a href="{{ route('shop.visit', $shop->slug) }}">{{ $shop->name }} @if ($shop->verification_status == 1)
        <span class="ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="17.5" viewBox="0 0 17.5 17.5">
                <g id="Group_25616" data-name="Group 25616" transform="translate(-537.249 -1042.75)">
                    <path id="Union_5" data-name="Union 5" d="M0,8.75A8.75,8.75,0,1,1,8.75,17.5,8.75,8.75,0,0,1,0,8.75Zm.876,0A7.875,7.875,0,1,0,8.75.875,7.883,7.883,0,0,0,.876,8.75Zm.875,0a7,7,0,1,1,7,7A7.008,7.008,0,0,1,1.751,8.751Zm3.73-.907a.789.789,0,0,0,0,1.115l2.23,2.23a.788.788,0,0,0,1.115,0l3.717-3.717a.789.789,0,0,0,0-1.115.788.788,0,0,0-1.115,0l-3.16,3.16L6.6,7.844a.788.788,0,0,0-1.115,0Z" transform="translate(537.249 1042.75)" fill="#3490f3"/>
                </g>
            </svg>
        </span>
    @else
        <span class="ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="17.5" viewBox="0 0 17.5 17.5">
                <g id="Group_25616" data-name="Group 25616" transform="translate(-537.249 -1042.75)">
                    <path id="Union_5" data-name="Union 5" d="M0,8.75A8.75,8.75,0,1,1,8.75,17.5,8.75,8.75,0,0,1,0,8.75Zm.876,0A7.875,7.875,0,1,0,8.75.875,7.883,7.883,0,0,0,.876,8.75Zm.875,0a7,7,0,1,1,7,7A7.008,7.008,0,0,1,1.751,8.751Zm3.73-.907a.789.789,0,0,0,0,1.115l2.23,2.23a.788.788,0,0,0,1.115,0l3.717-3.717a.789.789,0,0,0,0-1.115.788.788,0,0,0-1.115,0l-3.16,3.16L6.6,7.844a.788.788,0,0,0-1.115,0Z" transform="translate(537.249 1042.75)" fill="red"/>
                </g>
            </svg>
        </span>
    @endif</a></h1>


    <!-- Nav links + Reviews -->
    <section class="container pb-2 pb-lg-4">
        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center border-bottom gap-2 gap-md-4">
          
          <!-- Navigation Tabs -->
          <ul class="nav nav-underline flex-nowrap gap-4">
            <li class="nav-item me-sm-2">
              <a class="nav-link pe-none active" href="{{ route('shop.visit', $shop->slug) }}">Store Home</a>
            </li>
            <li class="nav-item me-sm-2">
              <a class="nav-link" href="{{ route('shop.visit.type', ['slug'=>$shop->slug, 'type'=>'top-selling']) }}">Top Selling</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('shop.visit.type', ['slug'=>$shop->slug, 'type'=>'cupons']) }}">Coupons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('shop.visit.type', ['slug'=>$shop->slug, 'type'=>'all-products']) }}">All Products</a>
              </li>
          </ul>
      
          <!-- User Info + Rating + Follow Button -->
          <div class="ms-auto d-flex flex-column align-items-start align-items-md-end gap-2">
            
            <!-- Joined Date, Followers + Follow Button -->
            <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-2 fs-sm text-body-tertiary">
              <span>Joined: <strong>{{ date('d M Y',strtotime($shop->created_at)) }}</strong></span>
              @php $shopFollowers = count($shop->followers) + $shop->custom_followers; @endphp

              <span>Followers: <strong>{{ $shopFollowers }}</strong></span>

              @if(in_array($shop->id, $followed_sellers))

              <a href="{{ route("followed_seller.remove", ['id'=>$shop->id]) }}" class="btn btn-sm btn-primary ms-sm-2">Unfollow</a>
              @else
              <a href="{{ route("followed_seller.store", ['id'=>$shop->id]) }}" class="btn btn-sm btn-primary ms-sm-2">Follow</a>
              @endif

            </div>
      
            <!-- Rating -->
            <a class="d-flex align-items-center gap-2 text-decoration-none mt-1" href="#reviews">
                <div class="d-flex gap-1 fs-sm">
                    @php
                        $rating = round($shop->rating * 2) / 2; // round to nearest 0.5
                        $fullStars = floor($rating);
                        $halfStar = ($rating - $fullStars) == 0.5 ? 1 : 0;
                        $emptyStars = 5 - $fullStars - $halfStar;
                    @endphp
            
                    @for ($i = 0; $i < $fullStars; $i++)
                        <i class="ci-star-filled text-warning"></i>
                    @endfor
            
                    @if ($halfStar)
                        <i class="ci-star-half text-warning"></i>
                    @endif
            
                    @for ($i = 0; $i < $emptyStars; $i++)
                        <i class="ci-star text-warning"></i>
                    @endfor
                </div>
              <span class="text-body-tertiary fs-xs">{{ $shop->num_of_reviews }} reviews</span>
            </a>
            
          </div>
          
        </div>
      </section>

      <section class="container pt-5 mt-2 mt-sm-3 mt-lg-4">

        <!-- Heading -->
        <div class="d-flex align-items-center justify-content-between border-bottom pb-3 pb-md-4">
          
            <h2 class="h3 mb-0">
                @if (!isset($type))
                            {{ translate('New Arrival Products')}}
                        @elseif ($type == 'top-selling')
                            {{ translate('Top Selling')}}
                        @elseif ($type == 'cupons')
                            {{ translate('All Cupons')}}
                        @endif
            </h2>

          <div class="nav ms-3">
            Filter
          </div>
        </div>

        <!-- Product grid -->
        
          <!-- Item -->
          @php
          if (!isset($type)){
              $products = get_seller_products($shop->user->id);
          }
          elseif ($type == 'top-selling'){
              $products = get_shop_best_selling_products($shop->user->id);
          }
          elseif ($type == 'cupons'){
              $coupons = get_coupons($shop->user->id , 24);
          }
      @endphp

@if (!isset($type))

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 pt-4">

<!--new arrivals-->

          @foreach ($products as $key => $product)
          <div class="col">
            <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
              <div class="position-relative">
                <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                  <div class="d-flex flex-column gap-2">
                    <button type="button" class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex" aria-label="Add to Wishlist">
                      <i class="ci-heart fs-base animate-target"></i>
                    </button>
                    <button type="button" class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex" aria-label="Compare">
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
                      <a class="dropdown-item" href="#!">
                        <i class="ci-heart fs-sm ms-n1 me-2"></i>
                        Add to Wishlist
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#!">
                        <i class="ci-refresh-cw fs-sm ms-n1 me-2"></i>
                        Compare
                      </a>
                    </li>
                  </ul>
                </div>
                <a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="shop-product-general-electronics.html">
                  <span class="badge bg-danger position-absolute top-0 start-0 mt-2 ms-2 mt-lg-3 ms-lg-3">-21%</span>
                  <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                    <img src="assets/img/shop/electronics/01.png" alt="VR Glasses">
                  </div>
                </a>
              </div>
              <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
                <div class="d-flex align-items-center gap-2 mb-2">
                  <div class="d-flex gap-1 fs-xs">
                    <i class="ci-star-filled text-warning"></i>
                    <i class="ci-star-filled text-warning"></i>
                    <i class="ci-star-filled text-warning"></i>
                    <i class="ci-star-filled text-warning"></i>
                    <i class="ci-star text-body-tertiary opacity-75"></i>
                  </div>
                  <span class="text-body-tertiary fs-xs">(123)</span>
                </div>
                <h3 class="pb-1 mb-2">
                  <a class="d-block fs-sm fw-medium text-truncate" href="shop-product-general-electronics.html">
                    <span class="animate-target">VRB01 Virtual Reality Glasses</span>
                  </a>
                </h3>
                <div class="d-flex align-items-center justify-content-between">
                  <div class="h5 lh-1 mb-0">$340.99 <del class="text-body-tertiary fs-sm fw-normal">$430.00</del></div>
                  <button type="button" class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2" aria-label="Add to Cart">
                    <i class="ci-shopping-cart fs-base animate-target"></i>
                  </button>
                </div>
              </div>
              <div class="product-card-details position-absolute top-100 start-0 w-100 bg-body rounded-bottom shadow mt-n2 p-3 pt-1">
                <span class="position-absolute top-0 start-0 w-100 bg-body mt-n2 py-2"></span>
                <ul class="list-unstyled d-flex flex-column gap-2 m-0">
                  <li class="d-flex align-items-center">
                    <span class="fs-xs">Display:</span>
                    <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                    <span class="text-dark-emphasis fs-xs fw-medium text-end">OLED 1440x1600</span>
                  </li>
                  <li class="d-flex align-items-center">
                    <span class="fs-xs">Graphics:</span>
                    <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                    <span class="text-dark-emphasis fs-xs fw-medium text-end">Adreno 540</span>
                  </li>
                  <li class="d-flex align-items-center">
                    <span class="fs-xs">Sound:</span>
                    <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                    <span class="text-dark-emphasis fs-xs fw-medium text-end">2x3.5mm jack</span>
                  </li>
                  <li class="d-flex align-items-center">
                    <span class="fs-xs">Input:</span>
                    <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                    <span class="text-dark-emphasis fs-xs fw-medium text-end">4 built-in cameras</span>
                  </li>
                </ul>
              </div>
            </div>
          </div> 
          @endforeach   

        </div>
        @elseif ($type == 'all-products')
        coming
        @else
        
        @foreach ($products as $key => $product)
        <div class="col">
          <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
            <div class="position-relative">
              <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                <div class="d-flex flex-column gap-2">
                  <button type="button" class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex" aria-label="Add to Wishlist">
                    <i class="ci-heart fs-base animate-target"></i>
                  </button>
                  <button type="button" class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex" aria-label="Compare">
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
                    <a class="dropdown-item" href="#!">
                      <i class="ci-heart fs-sm ms-n1 me-2"></i>
                      Add to Wishlist
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#!">
                      <i class="ci-refresh-cw fs-sm ms-n1 me-2"></i>
                      Compare
                    </a>
                  </li>
                </ul>
              </div>
              <a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="shop-product-general-electronics.html">
                <span class="badge bg-danger position-absolute top-0 start-0 mt-2 ms-2 mt-lg-3 ms-lg-3">-21%</span>
                <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                  <img src="assets/img/shop/electronics/01.png" alt="VR Glasses">
                </div>
              </a>
            </div>
            <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
              <div class="d-flex align-items-center gap-2 mb-2">
                <div class="d-flex gap-1 fs-xs">
                  <i class="ci-star-filled text-warning"></i>
                  <i class="ci-star-filled text-warning"></i>
                  <i class="ci-star-filled text-warning"></i>
                  <i class="ci-star-filled text-warning"></i>
                  <i class="ci-star text-body-tertiary opacity-75"></i>
                </div>
                <span class="text-body-tertiary fs-xs">(123)</span>
              </div>
              <h3 class="pb-1 mb-2">
                <a class="d-block fs-sm fw-medium text-truncate" href="shop-product-general-electronics.html">
                  <span class="animate-target">VRB01 Virtual Reality Glasses</span>
                </a>
              </h3>
              <div class="d-flex align-items-center justify-content-between">
                <div class="h5 lh-1 mb-0">$340.99 <del class="text-body-tertiary fs-sm fw-normal">$430.00</del></div>
                <button type="button" class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2" aria-label="Add to Cart">
                  <i class="ci-shopping-cart fs-base animate-target"></i>
                </button>
              </div>
            </div>
            <div class="product-card-details position-absolute top-100 start-0 w-100 bg-body rounded-bottom shadow mt-n2 p-3 pt-1">
              <span class="position-absolute top-0 start-0 w-100 bg-body mt-n2 py-2"></span>
              <ul class="list-unstyled d-flex flex-column gap-2 m-0">
                <li class="d-flex align-items-center">
                  <span class="fs-xs">Display:</span>
                  <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                  <span class="text-dark-emphasis fs-xs fw-medium text-end">OLED 1440x1600</span>
                </li>
                <li class="d-flex align-items-center">
                  <span class="fs-xs">Graphics:</span>
                  <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                  <span class="text-dark-emphasis fs-xs fw-medium text-end">Adreno 540</span>
                </li>
                <li class="d-flex align-items-center">
                  <span class="fs-xs">Sound:</span>
                  <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                  <span class="text-dark-emphasis fs-xs fw-medium text-end">2x3.5mm jack</span>
                </li>
                <li class="d-flex align-items-center">
                  <span class="fs-xs">Input:</span>
                  <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                  <span class="text-dark-emphasis fs-xs fw-medium text-end">4 built-in cameras</span>
                </li>
              </ul>
            </div>
          </div>
        </div> 
        @endforeach 

        @endif
      </section>

  </main>
 @endsection

@section('script')
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }

        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
    </script>
@endsection
