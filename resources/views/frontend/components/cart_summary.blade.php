
          <!-- Order summary (sticky sidebar) -->
     @php
    $subtotal_for_min_order_amount = 0;
    $subtotal = 0;
    $tax = 0;
    $product_shipping_cost = 0;
    $shipping = 0;
    $coupon_code = null;
    $coupon_discount = 0;
    $total_point = 0;
@endphp

@php
    $proceed = $proceed ?? 0;
@endphp


@foreach ($carts as $key => $cartItem)
    @php
        $product = get_single_product($cartItem['product_id']);
        $subtotal_for_min_order_amount += cart_product_price($cartItem, $cartItem->product, false, false) * $cartItem['quantity'];
        $subtotal += cart_product_price($cartItem, $product, false, false) * $cartItem['quantity'];
        $tax += cart_product_tax($cartItem, $product, false) * $cartItem['quantity'];
        $product_shipping_cost = $cartItem['shipping_cost'];
        $shipping += $product_shipping_cost;
        if ((get_setting('coupon_system') == 1) && ($cartItem->coupon_applied == 1)) {
            $coupon_code = $cartItem->coupon_code;
            $coupon_discount = $carts->sum('discount');
        }
        if (addon_is_activated('club_point')) {
            $total_point += $product->earn_point * $cartItem['quantity'];
        }
    @endphp
@endforeach

<aside class="col-lg-4" style="margin-top: -100px">
    <div class="position-sticky top-0" style="padding-top: 100px">
        <div class="bg-body-tertiary rounded-5 p-4 mb-3">
            <div class="p-sm-2 p-lg-0 p-xl-2">
                <h5 class="border-bottom pb-4 mb-4">{{ translate('Order summary') }}</h5>
                <ul class="list-unstyled fs-sm gap-3 mb-0">
                    <li class="d-flex justify-content-between">
                        {{ translate('Subtotal') }} ({{ count($carts) }} {{ translate('items') }}):
                        <span class="text-dark-emphasis fw-medium">{{ single_price($subtotal) }}</span>
                    </li>
                    @if($coupon_discount > 0)
                    <li class="d-flex justify-content-between">
                        {{ translate('Saving') }}:
                        <span class="text-danger fw-medium">-{{ single_price($coupon_discount) }}</span>
                    </li>
                    @endif
                    <li class="d-flex justify-content-between">
                        {{ translate('Tax collected') }}:
                        <span class="text-dark-emphasis fw-medium">{{ single_price($tax) }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                        {{ translate('Shipping') }}:
                        <span class="text-dark-emphasis fw-medium">
                            @if($proceed != 1)
                                {{ single_price($shipping) }}
                            @else
                                {{ translate('Calculated at checkout') }}
                            @endif
                        </span>
                    </li>
                </ul>

                @php
                    $estimated_total = $subtotal + $tax + ($proceed != 1 ? $shipping : 0);
                    if ($coupon_discount > 0) {
                        $estimated_total -= $coupon_discount;
                    }
                    if (Session::has('club_point')) {
                        $estimated_total -= Session::get('club_point');
                    }
                @endphp

                <div class="border-top pt-4 mt-4">
                    <div class="d-flex justify-content-between mb-3">
                        <span class="fs-sm">{{ translate('Estimated total') }}:</span>
                        <span class="h5 mb-0">{{ single_price($estimated_total) }}</span>
                    </div>
                    
                    <a class="btn btn-lg btn-primary w-100" href="{{ route('checkout') }}" wire:navigate>
                        {{ translate('Proceed to checkout') }}
                        <i class="ci-chevron-right fs-lg ms-1 me-n1"></i>
                    </a>
               
                </div>
            </div>
        </div>

        <!-- Promo Code Accordion -->
        @if(get_setting('coupon_system') == 1)
        <div class="accordion bg-body-tertiary rounded-5 p-4">
            <div class="accordion-item border-0">
                <h3 class="accordion-header" id="promoCodeHeading">
                    <button type="button" class="accordion-button animate-underline collapsed py-0 ps-sm-2 ps-lg-0 ps-xl-2"
                        data-bs-toggle="collapse" data-bs-target="#promoCode" aria-expanded="false" aria-controls="promoCode">
                        <i class="ci-percent fs-xl me-2"></i>
                        <span class="animate-target me-2">{{ translate('Apply promo code') }}</span>
                    </button>
                </h3>
                <div class="accordion-collapse collapse" id="promoCode" aria-labelledby="promoCodeHeading">
                    <div class="accordion-body pt-3 pb-2 ps-sm-2 px-lg-0 px-xl-2">
                        @if($coupon_discount > 0 && $coupon_code)
                        <form id="remove-coupon-form" class="d-flex gap-2">
                            @csrf
                            <input type="hidden" name="proceed" value="{{ $proceed }}">
                            <div class="form-control">{{ $coupon_code }}</div>
                            <button type="button" id="coupon-remove" class="btn btn-dark">{{ translate('Change Coupon') }}</button>
                        </form>
                        @else
                        <form id="apply-coupon-form" class="needs-validation d-flex gap-2" novalidate>
                            @csrf
                            <input type="hidden" name="proceed" value="{{ $proceed }}">
                            <input type="text" class="form-control" name="code" placeholder="{{ translate('Enter promo code') }}" required>
                            <button type="submit" class="btn btn-dark">{{ translate('Apply') }}</button>
                            <div class="invalid-tooltip bg-transparent py-0">{{ translate('Enter a valid promo code!') }}</div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</aside>