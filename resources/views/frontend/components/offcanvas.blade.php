    <!-- Shopping cart offcanvas -->
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

    <div class="offcanvas offcanvas-end pb-sm-2 px-sm-2" id="shoppingCart" tabindex="-1"
        aria-labelledby="shoppingCartLabel" style="width: 500px">
        <!-- Header -->
        <div class="offcanvas-header flex-column align-items-start py-3 pt-lg-4">
            <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-lg-4">
                <h4 class="offcanvas-title" id="shoppingCartLabel">Shopping cart</h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
        </div>

        @if (isset($carts) && count($carts) > 0)
        <!-- Items -->
        <div class="offcanvas-body d-flex flex-column gap-4 pt-2">

            <!-- Item -->
            @foreach ($carts as $key => $cartItem)
            @php
            $product = get_single_product($cartItem['product_id']);
            @endphp
            @if ($product != null)
            <div class="d-flex align-items-center">
                <a class="flex-shrink-0" href="{{ route('product', $product->slug) }}">
                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}"
                        data-src="{{ uploaded_asset($product->thumbnail_img) }}" width="110"
                        alt="{{ $product->getTranslation('name') }}"
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                </a>
                <div class="w-100 min-w-0 ps-2 ps-sm-3">
                    <h5 class="d-flex animate-underline mb-2">
                        <a class="d-block fs-sm fw-medium text-truncate animate-target"
                            href="{{ route('product', $product->slug) }}"> {{ $product->name }}</a>
                    </h5>
                    <div class="h6 pb-1 mb-2">{{ cart_product_price($cartItem, $product) }}</div>
                    <div class="d-flex align-items-center justify-content-between">
                          <span class="fs-14 fw-400 text-secondary">{{ $cartItem['quantity'] }}x</span>
                                    <span class="fs-14 fw-400 text-secondary">{{ cart_product_price($cartItem, $product) }}</span>
                        <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip"
                            data-bs-custom-class="tooltip-sm" data-bs-title="Remove"
                            aria-label="Remove from cart"></button>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>

        <!-- Footer -->
        <div class="offcanvas-header flex-column align-items-start">
            <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-md-4">
                <span class="text-light-emphasis">Subtotal:</span>
                <span class="h6 mb-0">{{ single_price($total) }}</span>
            </div>
            <div class="d-flex w-100 gap-3">
                <a class="btn btn-lg btn-secondary w-100" href="{{ route('cart') }}" wire:navigate>View cart</a>
                <a class="btn btn-lg btn-primary w-100" href="{{ route('checkout.store_shipping_infostore') }}"
                    wire:navigate>Checkout</a>
            </div>
        </div>
        @else
        <div class="text-center p-3 d-flex align-items-center justify-content-center">

            <div class="col-10 col-sm-7 col-md-6 col-lg-5 col-xxl-4 offset-lg-1 offset-xxl-2 order-md-2">
                <svg width="447" viewBox="0 0 447 420" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.05" filter="url(#filter0_f_2921_40054)">
                        <ellipse cx="223.5" cy="371" rx="193.5" ry="19" fill="#181D25"></ellipse>
                    </g>
                    <path class="d-none-dark" d="M44 374V97H403V374H44Z" fill="url(#paint0_linear_2921_40054)"></path>
                    <path class="d-none d-block-dark" d="M44 374V97H403V374H44Z" fill="#394557"></path>
                    <path class="d-none-dark"
                        d="M387.803 74.034H232.968H208.083H46.3354L67.0016 85L44 97L208.083 96.8446H232.968L403.002 97L380.002 85L387.803 74.034Z"
                        fill="url(#paint1_linear_2921_40054)"></path>
                    <path class="d-none d-block-dark"
                        d="M387.803 74.034H232.968H208.083H46.3354L67.0016 85L44 97L208.083 96.8446H232.968L403.002 97L380.002 85L387.803 74.034Z"
                        fill="url(#paint0_linear_6256_34079)"></path>
                    <path class="d-none-dark" d="M67 85V97H44L67 85Z" fill="#cad0d9"></path>
                    <path class="d-none-dark" d="M380 85V97H403L380 85Z" fill="#cad0d9"></path>
                    <path class="d-none d-block-dark" d="M67 85V97H44L67 85Z" fill="#303947"></path>
                    <path class="d-none d-block-dark" d="M380 85V97H403L380 85Z" fill="#303947"></path>
                    <path class="text-body-emphasis" style="animation-duration: 1.75s"
                        d="M168 119.5C168 122.342 166.176 124.757 163.636 125.641C165.819 174.426 193.987 199.96 221.691 200.876C236.17 201.355 250.811 195.175 262.062 181.776C272.468 169.385 280.03 150.739 281.707 125.371C279.515 124.327 278 122.09 278 119.5C278 115.91 280.91 113 284.5 113C288.09 113 291 115.91 291 119.5C291 122.686 288.707 125.337 285.681 125.893C283.926 151.781 276.159 171.209 265.125 184.349C253.127 198.637 237.33 205.395 221.559 204.874C191.136 203.868 161.872 176.02 159.637 125.729C156.955 124.928 155 122.442 155 119.5C155 115.91 157.91 113 161.5 113C165.09 113 168 115.91 168 119.5Z"
                        fill="currentColor"></path>
                    <g clip-path="url(#clip0_2921_40054)">
                        <path class="animate-down-up text-body-emphasis" fill-rule="evenodd" clip-rule="evenodd"
                            d="M85.5309 99.8036L81.1914 83.1734L105.747 6.60145L132.18 -0.295868L149.245 65.1031L161.632 61.8707L166.048 78.7935L153.661 82.0258L158.242 99.5826L138.052 104.851L133.471 87.2943L85.5309 99.8036ZM117.606 28.0932L118.386 27.8896L129.445 70.2697L102.378 77.3324L102.175 76.5521L117.606 28.0932Z"
                            fill="currentColor"></path>
                        <path class="animate-down-up text-body-emphasis"
                            style="animation-duration: 3s; animation-delay: .35s" fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M218.542 111.74C210 110.26 203.002 106.91 197.546 101.692C192.125 96.4801 188.428 89.6344 186.456 81.1554C184.517 72.682 184.507 62.8824 186.425 51.7565C188.305 40.6582 191.546 31.4775 196.15 24.2144C200.787 16.9569 206.516 11.8098 213.335 8.77286C220.192 5.70843 227.878 4.89721 236.393 6.3392C244.907 7.78118 251.881 11.0752 257.314 16.2213C262.78 21.3729 266.508 28.1386 268.497 36.5182C270.491 44.8647 270.532 54.5843 268.619 65.677C266.728 76.8416 263.456 86.1024 258.802 93.4592C254.181 100.822 248.453 106.071 241.617 109.207C234.781 112.344 227.089 113.188 218.542 111.74ZM221.563 93.9002C227.394 94.8877 232.545 92.7441 237.017 87.4693C241.489 82.1945 244.701 73.6905 246.654 61.957C247.962 54.2379 248.255 47.6761 247.534 42.2717C246.847 36.873 245.281 32.6375 242.836 29.5652C240.425 26.4986 237.281 24.6371 233.405 23.9806C227.607 22.9987 222.478 25.112 218.018 30.3205C213.557 35.529 210.331 43.9115 208.34 55.4681C207.016 63.2866 206.689 69.945 207.36 75.4431C208.069 80.9138 209.643 85.2018 212.082 88.3071C214.527 91.3794 217.687 93.2437 221.563 93.9002Z"
                            fill="currentColor"></path>
                        <path class="animate-down-up text-body-emphasis"
                            style="animation-duration: 3s; animation-delay: .75s" fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M290.23 71.3761L288.056 88.425L337.203 94.6927L334.908 112.692L355.606 115.331L357.902 97.3324L370.601 98.9519L372.813 81.603L360.114 79.9835L368.664 12.9377L341.566 9.4819L290.23 71.3761ZM345.356 33.9476L344.556 33.8455L312.169 73.0561L312.067 73.8561L339.815 77.3948L345.356 33.9476Z"
                            fill="currentColor"></path>
                    </g>
                    <defs>
                        <filter id="filter0_f_2921_40054" x="0" y="322" width="447" height="98"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
                            <feGaussianBlur stdDeviation="15" result="effect1_foregroundBlur_2921_40054">
                            </feGaussianBlur>
                        </filter>
                        <linearGradient id="paint0_linear_2921_40054" x1="195" y1="125" x2="275" y2="338"
                            gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#ffffff"></stop>
                            <stop offset="1" stop-color="#eff5fd"></stop>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2921_40054" x1="229.5" y1="101.5" x2="229.5" y2="74"
                            gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#9ca3af"></stop>
                            <stop offset="1" stop-color="#d2d4d9"></stop>
                        </linearGradient>
                        <linearGradient id="paint0_linear_6256_34079" x1="229.5" y1="101.5" x2="229.5" y2="74"
                            gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#21262f"></stop>
                            <stop offset="1" stop-color="#374150"></stop>
                        </linearGradient>
                        <clipPath id="clip0_2921_40054">
                            <rect width="359" height="97" fill="white" transform="translate(44)"></rect>
                        </clipPath>
                    </defs>
                </svg>
            </div>

            <h3 class="h6 fw-700">{{ translate('Your Cart is empty') }}</h3>
        </div>

        @endif

    </div>