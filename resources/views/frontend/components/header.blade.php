@php
$topbar_banner = uploaded_asset(get_setting('topbar_banner'));
$topbar_banner_medium = uploaded_asset(get_setting('topbar_banner_medium')) ?? $topbar_banner;
$topbar_banner_small = uploaded_asset(get_setting('topbar_banner_small')) ?? $topbar_banner;
@endphp

  <div class="alert alert-dismissible bg-dark text-white rounded-0 py-2 px-0 m-0 fade show" data-bs-theme="dark">
      <div class="container position-relative d-flex min-w-0">
        <div class="d-flex flex-nowrap align-items-center g-2 w-100 min-w-0 mx-auto mt-n1" style="max-width: 458px">
          <div class="nav me-2">
            <button type="button" class="nav-link fs-lg p-0" id="topbarPrev" aria-label="Prev">
              <i class="ci-chevron-left"></i>
            </button>
          </div>
          <div class="swiper fs-sm text-white" data-swiper="{
            &quot;spaceBetween&quot;: 24,
            &quot;loop&quot;: true,
            &quot;autoplay&quot;: {
              &quot;delay&quot;: 5000,
              &quot;disableOnInteraction&quot;: false
            },
            &quot;navigation&quot;: {
              &quot;prevEl&quot;: &quot;#topbarPrev&quot;,
              &quot;nextEl&quot;: &quot;#topbarNext&quot;
            }
          }">
            <div class="swiper-wrapper min-w-0">
              <div class="swiper-slide text-truncate text-center">ðŸŽ‰ Free Shipping on orders over â‚¦500,000. <span class="d-none d-sm-inline">Don't miss a discount!</span></div>
              <div class="swiper-slide text-truncate text-center">ðŸ’° Money back guarantee. <span class="d-none d-sm-inline">We return money within 30 days.</span></div>
              <div class="swiper-slide text-truncate text-center">ðŸ’ª Friendly 24/7 customer support. <span class="d-none d-sm-inline">We've got you covered!</span></div>
            </div>
          </div>
          <div class="nav ms-2">
            <button type="button" class="nav-link fs-lg p-0" id="topbarNext" aria-label="Next">
              <i class="ci-chevron-right"></i>
            </button>
          </div>
        </div>
        <button type="button" class="btn-close position-static flex-shrink-0 p-1 ms-3 ms-md-n4" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>


<header class="navbar navbar-expand-lg navbar-light bg-light d-block z-fixed p-0" data-sticky-navbar='{"offset": 500}'>
    <div class="container d-block py-1 py-lg-3" data-bs-theme="dark">
        <div class="navbar-stuck-hide pt-1"></div>
        <div class="row flex-nowrap align-items-center g-0">
            <div class="col col-lg-3 d-flex align-items-center">
                <!-- Mobile offcanvas menu toggler (Hamburger) -->
                <button type="button" class="navbar-toggler me-4 me-lg-0" data-bs-toggle="offcanvas"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar brand (Logo) -->
                <a href="{{ route('home')}}" class="navbar-brand py-1 py-md-2 py-xl-1" wire:navigate>
                    <span class="d-none d-sm-flex flex-shrink-0 text-primary me-2">
                        @php
                        $header_logo = get_setting('header_logo');
                        @endphp
                        @if ($header_logo != null)
                        <img src="{{ uploaded_asset($header_logo) }}" alt="{{ env('APP_NAME') }}" width="200">
                        @else
                        <img src="{{ static_asset('asset/img/logo.png') }}" alt="{{ env('APP_NAME') }}" width="200">
                        @endif
                    </span>

                </a>
            </div>
            <div class="col col-lg-9 d-flex align-items-center justify-content-end">
                <!-- Search visible on screens > 991px wide (lg breakpoint) -->
                <div class="position-relative w-100 d-none d-md-block mx-3 mx-lg-4">
                    <form action="{{ route('search') }}" method="GET" class="d-flex">
                        <input
                            type="search"
                            name="q"
                            class="form-control"
                            placeholder="Search products and stores"
                            aria-label="Search"
                            required
                        >
                
                        <button type="submit" class="btn btn-primary ms-2">
                            Search
                        </button>
                    </form>
                </div>
                



                <!-- Button group -->
                <div class="d-flex align-items-center">
                    <!-- Navbar stuck nav toggler -->
                    <button type="button" class="navbar-toggler d-none navbar-stuck-show me-3" data-bs-toggle="collapse"
                        data-bs-target="#stuckNav" aria-controls="stuckNav" aria-expanded="false"
                        aria-label="Toggle navigation in navbar stuck state">
                        <span class="navbar-toggler-icon"></span>
                    </button>



                    <!-- Search toggle button visible on screens < 992px wide (lg breakpoint) -->
                    <button type="button"
                        class="btn btn-icon btn-lg fs-xl btn-outline-secondary border-0 rounded-circle animate-shake d-lg-none me-2"
                        data-bs-toggle="collapse" data-bs-target="#searchBar" aria-expanded="false"
                        aria-controls="searchBar" aria-label="Toggle search bar">
                        <i class="ci-search animate-target"></i>
                    </button>


                     @auth

                <div class="dropdown mx-1">
                       @php
            $user = auth()->user();
            $user_avatar = null;
            $carts = [];
            if ($user && $user->avatar_original != null) {
                $user_avatar = uploaded_asset($user->avatar_original);
            }
        @endphp
         @if ($user->avatar_original != null)
                <a class="btn btn-icon hover-effect-scale position-relative border rounded-circle overflow-hidden" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="My account">
              <img src="{{ $user_avatar }}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Avatar">
            </a>
            @else
              <a class="btn btn-icon hover-effect-scale position-relative border rounded-circle overflow-hidden" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="My account">
              <span class="h5 d-flex justify-content-center align-items-center flex-shrink-0 text-primary bg-primary-subtle lh-1 rounded-circle mb-0"
    style="width: 3rem; height: 3rem">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
            </a>
            @endif
            <ul class="dropdown-menu dropdown-menu-end" style="--cz-dropdown-spacer: .625rem">
              <li><span class="h6 dropdown-header">{{ $user->name }}</span></li>
              <li>
                <a class="dropdown-item" href="{{ route('dashboard') }}" wire:navigate>
                  <i class="ci-grid fs-base opacity-75 me-2"></i>
                  Dashboard
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('order-history.index') }}" wire:navigate>
                  <i class="ci-shopping-bag fs-base opacity-75 me-2"></i>
                  Orders 
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('wishlists.index') }}" wire:navigate>
                  <i class="ci-heart fs-base opacity-75 me-2"></i>
                 Wishlist
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('compare') }}" wire:navigate>
                  <i class="ci-refresh-cw fs-base opacity-75 me-2"></i>
                 Compare
                </a>
              </li>
             
              <li>
                <a class="dropdown-item" href="{{ route('wallet.index') }}" wire:navigate>
                  <i class="ci-dollar-sign fs-base opacity-75 me-2"></i>
                  Wallet
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('profile') }}" wire:navigate>
                  <i class="ci-settings fs-base opacity-75 me-2"></i>
                  Profile
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}" wire:navigate>
                  <i class="ci-log-out fs-base opacity-75 me-2"></i>
                  Sign out
                </a>
              </li>
            </ul>
          </div>


                     @else

                    <!-- Account button visible on screens > 768px wide (md breakpoint) -->
                    <div class="dropdown me-4">
                        <button type="button" class="btn btn-link dropdown-toggle text-dark text-decoration-none p-0"
                            data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">
                            <i class="ci-user animate-target me-4"></i>
                            Account
                        </button>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('user.login') }}" wire:navigate>Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.registration') }}"
                                    wire:navigate>Register</a></li>
                        </ul>
                    </div>
                     @endauth

                    <div class="dropdown d-none d-md-block">
                        <button type="button" class="btn btn-link dropdown-toggle text-dark text-decoration-none p-0"
                            data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">
                            <i class="ci-help-circle me-2"></i>
                            Help
                        </button>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">FAQ</a></li>
                            <li><a class="dropdown-item" href="#">Shipping Info</a></li>
                            <li><a class="dropdown-item" href="#">Return Policy</a></li>
                            <li><a class="dropdown-item" href="#">Call Us</a></li>
                        </ul>
                    </div>



                    <!-- Wishlist button visible on screens > 768px wide (md breakpoint) -->
                    <a class="btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle position-relative animate-pulse d-none d-md-inline-flex"
                        href="{{ route('wishlists.index') }}" wire:navigate>

                        <i class="ci-heart animate-target"></i>
                        <span class="visually-hidden">Wishlist</span>

                        @auth
                        @php
                        $wishlistProductCount = get_wishlists()->count();
                        @endphp

                        @if ($wishlistProductCount > 0)
                        <span
                            class="badge badge-primary badge-inline badge-pill position-absolute top-0 end-0 translate-middle">
                            {{ $wishlistProductCount }}
                        </span>
                        @endif
                        @endauth

                    </a>


                    <!-- Cart button -->
                    @php
                    $total = 0;
                    $carts = get_user_cart();
                    if(count($carts) > 0) {
                    foreach ($carts as $key => $cartItem) {
                    $product = get_single_product($cartItem['product_id']);
                    $total = $total + cart_product_price($cartItem, $product, false) * $cartItem['quantity'];
                    }
                    }
                    @endphp
                    <button type="button" class="btn btn-icon btn-lg btn-primary position-relative rounded-circle ms-2"
                        data-bs-toggle="offcanvas" data-bs-target="#shoppingCart" aria-controls="shoppingCart"
                        aria-label="Shopping cart">
                        <span
                            class="position-absolute top-0 start-100 mt-n1 ms-n3 badge text-bg-success border border-3 border-dark rounded-pill"
                            style="--cz-badge-padding-y: 0.25em;--cz-badge-padding-x: 0.42em;">{{count($carts) > 0 ? count($carts) : 0 }}</span>
                        <span
                            class="position-absolute top-0 start-0 d-flex align-items-center justify-content-center w-100 h-100 rounded-circle animate-slide-end fs-lg">
                            <i class="ci-shopping-cart animate-target ms-n1"></i>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="navbar-stuck-hide pb-1"></div>
    </div>

    <!-- Search visible on screens < 992px wide (lg breakpoint). It is hidden inside collapse by default -->
    <div class="collapse position-absolute top-100 z-2 w-100 bg-lighr d-lg-none me-2" id="searchBar">
        <div class="container position-relative my-3" data-bs-theme="light">
            <form action="{{ route('search') }}" method="GET" class="position-relative">
                
                <!-- Left icon -->
                <i class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3 fs-lg text-muted z-2"></i>
        
                <input
                    type="search"
                    name="q"
                    class="form-control form-icon-start border rounded-pill pe-5"
                    placeholder="Search the products"
                    required
                />
        
                <!-- Right submit button -->
                <button
                    type="submit"
                    class="position-absolute top-50 end-0 translate-middle-y me-3 border-0 bg-transparent z-2"
                >
                    Search
                </button>
        
            </form>
        </div>
        
        
    </div>

    <!-- Main navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
    <div class="collapse navbar-stuck-hide" id="stuckNav">
        <nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="navbarNavLabel">
            <div class="offcanvas-header py-3">
                <h5 class="offcanvas-title" id="navbarNavLabel">
                    Browse Evarpex
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body py-3 py-lg-0">
                <div class="container px-0 px-lg-3">
                    <div class="row">
                        <!-- Categories mega menu -->
                        <div class="col-lg-3">
                            <div class="navbar-nav">
                                <div class="dropdown w-100">
                                    <!-- Buttton visible on screens > 991px wide (lg breakpoint) -->
                                    <div class="cursor-pointer d-none d-lg-block" data-bs-toggle="dropdown"
                                        data-bs-trigger="hover" data-bs-theme="dark">
                                            <span class="visually-hidden">Categories</span>
                                        
                                        <button type="button"
                                            class="btn btn-lg btn-secondary dropdown-toggle w-100 rounded-bottom-0 justify-content-start pe-none">
                                            <i class="ci-grid fs-lg"></i>
                                            <span class="ms-2 me-auto">Categories</span>
                                        </button>
                                    </div>

                                    <!-- Buttton visible on screens < 992px wide (lg breakpoint) -->
                                    <button type="button"
                                        class="btn btn-lg btn-secondary dropdown-toggle w-100 justify-content-start d-lg-none mb-2"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                        <i class="ci-grid fs-lg"></i>
                                        <span class="ms-2 me-auto">Categories</span>
                                    </button>

                                    <!-- Mega menu -->
                               <ul class="dropdown-menu 
    {{ request()->routeIs('home') ? 'dropdown-menu-static' : '' }} 
    w-100 rounded-top-0 rounded-bottom-4 py-1 p-lg-1"
    style="
        --cz-dropdown-spacer: 0;
        --cz-dropdown-item-padding-y: 0.625rem;
        --cz-dropdown-item-spacer: 0;
    ">

                                        <li class="d-lg-none pt-2">
                                            <a class="dropdown-item fw-medium" href="{{ route('categories.all') }}" wire:navigate>
                                                <i class="ci-grid fs-xl opacity-60 pe-1 me-2"></i>
                                                All Categories
                                                <i class="ci-chevron-right fs-base ms-auto me-n1"></i>
                                            </a>
                                        </li>
                                      @foreach (get_level_zero_categories()->take(10) as $key => $category)
    @php
        $category_name = $category->getTranslation('name');
    @endphp

    <li class="dropend position-static">
        <div class="position-relative rounded pt-2 pb-1 px-lg-2"
            data-bs-toggle="dropdown" data-bs-trigger="hover">

            <a class="dropdown-item fw-medium stretched-link d-none d-lg-flex"
                href="{{ route('products.category', $category->slug) }}"
                wire:navigate>
                <img class="fs-xl opacity-60 pe-1 me-2"
                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                    data-src="{{ optional($category->catIcon)->file_name ? my_asset($category->catIcon->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                    width="16" alt="{{ $category_name }}">
                <span class="text-truncate">{{ $category_name }}</span>
                <i class="ci-chevron-right fs-base ms-auto me-n1"></i>
            </a>
        </div>

        {{-- CHILD CATEGORIES --}}
        @if ($category->childrenCategories->isNotEmpty())
            <div class="dropdown-menu rounded-4 p-4"
                style="top: 1rem;height: calc(100% - 0.1875rem);">

                <div class="d-flex flex-column flex-lg-row h-100 gap-4">

                    @foreach ($category->childrenCategories as $childCategory)
                        <div style="min-width: 194px">
                            <div class="d-flex w-100">
                                <a class="h6 text-dark-emphasis text-decoration-none text-truncate"
                                    href="{{ route('products.category', $childCategory->slug) }}">
                                    {{ $childCategory->getTranslation('name') }}
                                </a>
                            </div>

                            {{-- GRAND CHILDREN --}}
                            @if ($childCategory->childrenCategories->isNotEmpty())
                                <ul class="nav flex-column gap-2 mt-2">
                                    @foreach ($childCategory->childrenCategories as $grandChild)
                                        <li>
                                            <a class="nav-link p-0 text-truncate"
                                                href="{{ route('products.category', $grandChild->slug) }}">
                                                {{ $grandChild->getTranslation('name') }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach

                </div>
            </div>
        @endif
    </li>
@endforeach








                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Navbar nav -->
                        @php
                        $nav_txt_color = ((get_setting('header_nav_menu_text') == 'light') ||
                        (get_setting('header_nav_menu_text') == null)) ? 'text-white' : 'text-dark';
                        @endphp

                        <div class="col-lg-9 d-lg-flex pt-3 pt-lg-0 ps-lg-0">
                            <ul class="navbar-nav position-relative">
                                @if (get_setting('header_menu_labels') != null)
                                @foreach (json_decode(get_setting('header_menu_labels'), true) as $key => $value)
                                <li class="nav-item me-lg-n2 me-xl-0">
                                    <a class="nav-link @if (url()->current() == json_decode(get_setting('header_menu_links'), true)[$key]) active @endif"
                                        href="{{ json_decode(get_setting('header_menu_links'), true)[$key] }}"
                                        wire:navigate> {{ $value}}</a>
                                </li>
                                @endforeach
                                @endif

                            </ul>
                            <hr class="d-lg-none my-3" />
                            <ul class="navbar-nav ms-auto d-none d-md-block">
                                <a class="btn btn-primary me-3" href="{{ route('sellers.home')}}" wire:navigate>
                                    <i class="ci-dollar-sign"></i>
                                    Sell on Evarpex

                                </a>
                                <a class="btn btn-primary" href="#">
                                    <i class="ci-dollar-sign"></i>
                                    Earn on Evarpex

                                </a>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-header border-top px-0 py-3 mt-3 d-md-none">
                <div class="nav nav-justified w-100">
                    <a class="nav-link border-end" href="account-signin.html">
                        <i class="ci-user fs-lg opacity-60 me-2"></i>
                        Account
                    </a>
                    <a class="nav-link" href="{{ route('wishlists.index') }}" wire:navigate>
                        <i class="ci-heart fs-lg opacity-60 me-2"></i>
                        Wishlist

                        @auth
                        @php
                        $wishlistProductCount = get_wishlists()->count();
                        @endphp

                        @if ($wishlistProductCount > 0)
                        <span
                            class="badge badge-primary badge-inline badge-pill position-absolute top-0 end-0 translate-middle">
                            {{ $wishlistProductCount }}
                        </span>
                        @endif
                        @endauth
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>