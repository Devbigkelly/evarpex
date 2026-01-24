@extends('frontend.layouts.user')

@section('panel_content')

    @php
        $welcomeCoupon = ifUserHasWelcomeCouponAndNotUsed();
    @endphp
    @if($welcomeCoupon)
        <div class="alert alert-primary align-items-center border d-flex flex-wrap justify-content-between" style="border-color: #3490F3 !important;">
            @php
                $discount = $welcomeCoupon->discount_type == 'amount' ? single_price($welcomeCoupon->discount) : $welcomeCoupon->discount.'%';
            @endphp
            <div class="fw-400 fs-14" style="color: #3490F3 !important;">
                {{ translate('Welcome Coupon') }} <strong>{{ $discount }}</strong> {{ translate('Discount on your Purchase Within') }} <strong>{{ $welcomeCoupon->validation_days }}</strong> {{ translate('days of Registration') }}
            </div>
            <button class="btn btn-sm mt-3 mt-lg-0 rounded-4" onclick="copyCouponCode('{{ $welcomeCoupon->coupon_code }}')" style="background-color: #3490F3; color: white;" >{{ translate('Copy coupon Code') }}</button>
        </div>
    @endif

    
          <!-- Dashboard content -->
          <div class="col-lg-9 pt-2 pt-xl-3">

            <!-- Header -->
            <div class="d-flex align-items-center justify-content-between gap-3 pb-3 mb-2 mb-md-3">
              <h1 class="h2 mb-0">Dashboard</h1>
            
            </div>

            <!-- Stats -->
            <div class="row g-3 g-xl-4 pb-3 mb-2 mb-sm-3">
              <div class="col-md-4 col-sm-6">
                <div class="h-100 bg-success-subtle rounded-4 text-center p-4">
                  <h2 class="fs-sm pb-2 mb-1">Wallet Balance</h2>
                  <div class="h2 pb-1 mb-2">{{ single_price(Auth::user()->balance) }}</div>
                  <p class="fs-sm text-body-secondary mb-0">Recharge Wallet</p>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="h-100 bg-info-subtle rounded-4 text-center p-4">
                  <h2 class="fs-sm pb-2 mb-1">Total Expenditure</h2>
                  <div class="h2 pb-1 mb-2">{{ single_price(get_user_total_expenditure()) }}</div>
                  <a href="{{ route('order-history.index') }}" wire:navigate class="fs-sm text-body-secondary mb-0">View Order History</a>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="h-100 bg-warning-subtle rounded-4 text-center p-4">
                  <h2 class="fs-sm pb-2 mb-1">Products in Cart</h2>
                   @php
                     $cart = get_user_cart();
                    @endphp
                  <div class="h2 pb-1 mb-2">{{ count($cart) > 0 ? sprintf("%02d", count($cart)) : 0 }}</div>
                </div>
              </div>
            </div>

            <!-- Most recent sales -->
           
          <!-- Favorites content -->
          <div class="col-lg-12 pt-2 pt-xl-3">

            <!-- Header -->
            <div class="d-flex align-items-center justify-content-between gap-3 pb-3 mb-2 mb-md-3">
              <h1 class="h2 mb-0">Wishlist</h1>
            </div>

            <!-- Products grid -->
            <div class="row row-cols-2 row-cols-md-3 g-3 g-sm-4 g-lg-3 g-xl-4">
            @php
            $wishlists = get_user_wishlist();
            @endphp
         @if (count($wishlists) > 0)
              <!-- Product -->
                @foreach($wishlists->take(6) as $key => $wishlist)
                @if ($wishlist->product != null)
              <div class="col">
                <div class="card h-100 animate-underline hover-effect-scale rounded-4 overflow-hidden">
                  <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                    <a class="ratio d-block hover-effect-target" style="--cz-aspect-ratio: calc(220 / 304 * 100%)" href="{{ route('product', $wishlist->product->slug) }}" wire:navigate>
                       <img src="{{ uploaded_asset($wishlist->product->thumbnail_img) }}" title="{{ $wishlist->product->getTranslation('name') }}">
                    </a>
                    <div class="position-absolute top-0 end-0 z-2 hover-effect-target pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                      <button type="button" class="btn btn-sm btn-icon btn-light text-danger bg-light border-0 rounded-circle animate-pulse" aria-label="Add to wishlist">
                        <i class="ci-heart-filled animate-target fs-sm"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <div class="d-flex min-w-0 justify-content-between gap-2 gap-sm-3 mb-2">
                      <h3 class="nav min-w-0 mb-0">
                        <a class="nav-link text-truncate p-0" href="{{ route('product', $wishlist->product->slug) }}" wire:navigate>
                          <span class="text-truncate animate-target">{{ $wishlist->product->getTranslation('name') }}</span>
                        </a>
                      </h3>
                      <div class="h6 mb-0">{{ home_discounted_base_price($wishlist->product) }}</div>
                      @if(home_base_price($wishlist->product) != home_discounted_base_price($wishlist->product))
                       <del class="opacity-60 ml-1">{{ home_base_price($wishlist->product) }}</del>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            @endif
            @endforeach
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
          </div>

   
@endsection

@section('modal')
    <!-- Wallet Recharge Modal -->
    @include('frontend.partials.wallet_modal')
    <script type="text/javascript">
        function show_wallet_modal() {
            $('#wallet_modal').modal('show');
        }
    </script>

    <!-- Address modal Modal -->
    @include('frontend.partials.address.address_modal')
@endsection

@section('script')
    @include('frontend.partials.address.address_js')

     @if(get_active_countries()->count() == 1)
    <script>
        $(document).ready(function() {
            get_states(@json(get_active_countries()[0]->id))
        });
    </script>
    @endif

    @if (get_setting('google_map') == 1)
        @include('frontend.partials.google_map')
    @endif
@endsection
