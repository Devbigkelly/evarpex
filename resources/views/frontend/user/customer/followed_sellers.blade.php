@extends('frontend.layouts.user')

@section('panel_content')
     <!-- Wishlist content -->
          <div class="col-lg-9">
            <div class="ps-lg-3 ps-xl-0">

              <!-- Page title + Add list button-->
              <div class="d-flex align-items-center justify-content-between pb-3 mb-1 mb-sm-2 mb-md-3">
                <h1 class="h2 me-3 mb-0">Followed Sellers</h1>
              </div>


              <!-- Wishlist items (Grid) -->
                @if (count($followed_sellers) > 0)
              <div class="row row-cols-2 row-cols-md-3 g-4" id="wishlistSelection">

                <!-- Item -->
                  @foreach ($followed_sellers as $key => $followed_seller)
                    @if($followed_seller->shop !=null)
                <div class="col">
                  <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
                    <div class="position-relative">
                      <div class="position-absolute top-0 end-0 z-1 pt-1 pe-1 mt-2 me-2">
                       
                      </div>
                      <a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="{{ route('shop.visit', $followed_seller->shop->slug) }}" wire:navigate>
                       
                        <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                           <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                    data-src="{{ uploaded_asset($followed_seller->shop->logo) }}"
                                    alt="{{ $followed_seller->shop->name }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                        </div>
                      </a>
                    </div>
                    <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
                      <div class="d-flex align-items-center gap-2 mb-2">
                       @php
    $rating = round($followed_seller->shop->rating ?? 0);
@endphp

<div class="d-flex gap-1 fs-xs">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $rating)
            <i class="ci-star-filled text-warning"></i>
        @else
            <i class="ci-star text-body-tertiary opacity-75"></i>
        @endif
    @endfor
</div>

                        <span class="text-body-tertiary fs-xs">({{ $followed_seller->shop->num_of_reviews }})</span>
                      </div>
                      <h3 class="pb-1 mb-2">
                        <a class="d-block fs-sm fw-medium text-truncate" href="{{ route('shop.visit', $followed_seller->shop->slug) }}" wire:navigate>
                          <span class="animate-target">{{ $followed_seller->shop->name }}</span>
                        </a>
                      </h3>
                      <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('shop.visit', $followed_seller->shop->slug) }}" wire:navigate class="h5 lh-1 mb-0">Visit Store</a>
                        <a href="{{ route("followed_seller.remove", ['id'=>$followed_seller->shop->id]) }}" wire:naviagate class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2" aria-label="Add to Cart">
                          <i class="ci-pause"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach


             
              </div>
                @else
        <div class="row">
            <div class="col">
                <div class="text-center bg-white p-4 border">
                    <img class="mw-100 h-200px" src="{{ static_asset('assets/img/nothing.svg') }}" alt="Image">
                    <h5 class="mb-0 h5 mt-3">{{ translate("There isn't anything added yet")}}</h5>
                </div>
            </div>
        </div>
    @endif

            </div>
          </div>
@endsection
