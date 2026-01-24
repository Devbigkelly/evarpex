  <aside class="col-lg-3">
            <div class="offcanvas-lg offcanvas-start pe-lg-0 pe-xl-4" id="accountSidebar">

              <!-- Header -->
        @php
            $user = auth()->user();
            $user_avatar = null;
            $carts = [];
            if ($user && $user->avatar_original != null) {
                $user_avatar = uploaded_asset($user->avatar_original);
            }
        @endphp
              <div class="offcanvas-header d-lg-block py-3 p-lg-0">
                <div class="d-flex align-items-center">
                      @if ($user->avatar_original != null)
                      <img src="{{ $user_avatar }}" class="h5 d-flex justify-content-center align-items-center flex-shrink-0 text-primary bg-primary-subtle lh-1 rounded-circle mb-0" style="width: 3rem; height: 3rem"
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                      @else

<div
    class="h5 d-flex justify-content-center align-items-center flex-shrink-0 text-primary bg-primary-subtle lh-1 rounded-circle mb-0"
    style="width: 3rem; height: 3rem"
>
    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
</div>
                  @endif
                  <div class="min-w-0 ps-3">
                    <h5 class="h6 mb-1">{{ $user->name }}</h5>
                    <div class="nav flex-nowrap text-nowrap min-w-0">
                      <a class="nav-link animate-underline text-body p-0" href="#bonusesModal" data-bs-toggle="modal">
                        <svg class="text-warning flex-shrink-0 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"><path d="M1.333 9.667H7.5V16h-5c-.64 0-1.167-.527-1.167-1.167V9.667zm13.334 0v5.167c0 .64-.527 1.167-1.167 1.167h-5V9.667h6.167zM0 5.833V7.5c0 .64.527 1.167 1.167 1.167h.167H7.5v-1-3H1.167C.527 4.667 0 5.193 0 5.833zm14.833-1.166H8.5v3 1h6.167.167C15.473 8.667 16 8.14 16 7.5V5.833c0-.64-.527-1.167-1.167-1.167z"></path><path d="M8 5.363a.5.5 0 0 1-.495-.573C7.752 3.123 9.054-.03 12.219-.03c1.807.001 2.447.977 2.447 1.813 0 1.486-2.069 3.58-6.667 3.58zM12.219.971c-2.388 0-3.295 2.27-3.595 3.377 1.884-.088 3.072-.565 3.756-.971.949-.563 1.287-1.193 1.287-1.595 0-.599-.747-.811-1.447-.811z"></path><path d="M8.001 5.363c-4.598 0-6.667-2.094-6.667-3.58 0-.836.641-1.812 2.448-1.812 3.165 0 4.467 3.153 4.713 4.819a.5.5 0 0 1-.495.573zM3.782.971c-.7 0-1.448.213-1.448.812 0 .851 1.489 2.403 5.042 2.566C7.076 3.241 6.169.971 3.782.971z"></path></svg>
                        <span class="animate-target me-1">100 bonuses</span>
                        <span class="text-body fw-normal text-truncate">available</span>
                      </a>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn-close d-lg-none" data-bs-dismiss="offcanvas" data-bs-target="#accountSidebar" aria-label="Close"></button>
              </div>

              <!-- Body (Navigation) -->
              <div class="offcanvas-body d-block pt-2 pt-lg-4 pb-lg-0">
                <nav class="list-group list-group-borderless">
                    <a class="list-group-item list-group-item-action d-flex align-items-center {{ areActiveRoutes(['dashboard']) }}" href="{{ route('dashboard') }}" wire:naviagate>
                    <i class="ci-box fs-base opacity-75 me-2"></i>
                    Dashboard
                   
                  </a>

                     @php
                    $delivery_viewed = get_count_by_delivery_viewed();
                    $payment_status_viewed = get_count_by_payment_status_viewed();
                    @endphp

                  <a class="list-group-item list-group-item-action d-flex align-items-center {{ areActiveRoutes(['order-history.index', 'purchase_history.details']) }}" href="{{ route('order-history.index') }}" wire:navigate>
                    <i class="ci-shopping-bag fs-base opacity-75 me-2"></i>
                    Orders
                     @if ($delivery_viewed > 0 || $payment_status_viewed > 0)
                    <span class="badge bg-primary rounded-pill ms-auto">New</span>
                    @endif
                  </a>
                  <a class="list-group-item list-group-item-action d-flex align-items-center {{ areActiveRoutes(['wishlists.index']) }}" href="{{ route('wishlists.index') }}" wire:navigate>
                    <i class="ci-heart fs-base opacity-75 me-2"></i>
                    Wishlist
                  </a>

                   <a class="list-group-item list-group-item-action d-flex align-items-center {{ areActiveRoutes(['compare']) }}" href="{{ route('compare') }}" wire:navigate>
                    <i class="ci-refresh-cw fs-base opacity-75 me-2"></i>
                    Compare
                  </a>
                  
                   @php
                        $conversation = get_non_viewed_conversations();
                    @endphp
                  <a class="list-group-item list-group-item-action d-flex align-items-center {{ areActiveRoutes(['conversations.index', 'conversations.show']) }}" href="{{ route('conversations.index') }}" wire:navigate>
                    <i class="ci-message-square fs-base opacity-75 me-2"></i>
                    Messages
                    @if (count($conversation) > 0)
                    <span class="badge bg-primary rounded-pill ms-auto">({{ count($conversation) }})</span>
                    @endif
                  </a>

                  <a class="list-group-item list-group-item-action d-flex align-items-center {{ areActiveRoutes(['followed_seller']) }}" href="{{ route('followed_seller') }}" wire:navigate>
                    <i class="ci-refresh-cw fs-base opacity-75 me-2"></i>
                    Followed Sellers
                  </a>

                  <a class="list-group-item list-group-item-action d-flex align-items-center {{ areActiveRoutes(['wallet.index']) }}" href="{{ route('wallet.index') }}" wire:navigate>
                    <i class="ci-credit-card fs-base opacity-75 me-2"></i>
                   Wallet
                  </a>
                   @if (addon_is_activated('refund_request'))
                  <a class="list-group-item list-group-item-action d-flex align-items-center" href="{{ route('customer_refund_request') }}" wire:navigate>
                    <i class="ci-star fs-base opacity-75 me-2"></i>
                    Refund
                  </a>
                  @endif
                </nav>
                <h6 class="pt-4 ps-2 ms-1">Manage account</h6>
                <nav class="list-group list-group-borderless">
                  <a class="list-group-item list-group-item-action d-flex align-items-center {{ areActiveRoutes(['profile']) }}" href="{{ route('profile') }}" wire:navigate>
                    <i class="ci-user fs-base opacity-75 me-2"></i>
                    Profile
                  </a>
                  <!-- <a class="list-group-item list-group-item-action d-flex align-items-center" href="account-addresses.html">
                    <i class="ci-map-pin fs-base opacity-75 me-2"></i>
                    Delete Account
                  </a> -->
                
                </nav>
                <h6 class="pt-4 ps-2 ms-1">Customer service</h6>
                <nav class="list-group list-group-borderless">
                       @php
                    $support_ticket = DB::table('tickets')
                        ->where('client_viewed', 0)
                        ->where('user_id', Auth::user()->id)
                        ->count();
                @endphp

                      <a class="list-group-item list-group-item-action d-flex align-items-center {{ areActiveRoutes(['support_ticket.index', 'support_ticket.show']) }}" href="{{ route('support_ticket.index') }}" wire:navigate>
                    <i class="ci-headphones fs-base opacity-75 me-2"></i>
                    Support Tickets
                    @if ($support_ticket > 0)
                     <span class="badge bg-primary rounded-pill ms-auto">>{{ $support_ticket }}</span>
                    @endif
                  </a>
                  <a class="list-group-item list-group-item-action d-flex align-items-center" href="help-topics-v1.html">
                    <i class="ci-help-circle fs-base opacity-75 me-2"></i>
                    Help center
                  </a>
                  <a class="list-group-item list-group-item-action d-flex align-items-center" href="{{ route('terms') }}" wire:navigate>
                    <i class="ci-info fs-base opacity-75 me-2"></i>
                    Terms and conditions
                  </a>
                </nav>
                <nav class="list-group list-group-borderless pt-3">
                  <a class="list-group-item list-group-item-action d-flex align-items-center" href="{{ route('logout') }}" wire:navigate>
                    <i class="ci-log-out fs-base opacity-75 me-2"></i>
                    Log out
                  </a>
                </nav>
              </div>
            </div>
          </aside>