@extends('frontend.layouts.web')

@section('content')
    @php
        $cart_count = count($carts);
        $active_carts = $cart_count > 0 ? $carts->toQuery()->active()->get() : [];
    @endphp
    <main class="content-wrapper">
       @if( $cart_count > 0 )
    <section class="container pt-5 pb-5 mb-2 mb-md-3 mb-lg-4 mb-xl-5">
        <h1 class="h3 mb-4">Shopping cart</h1>
        <div class="row">

          <!-- Items list -->
          <div class="col-lg-8">
            <div class="pe-lg-2 pe-xl-3 me-xl-3">
             

              <!-- Table of items -->
              <table class="table position-relative z-2 mb-4">
                <thead>
                  <tr>
                    <th scope="col" class="fs-sm fw-normal py-3 ps-0"><span class="text-body">Product</span></th>
                    <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-xl-table-cell"><span class="text-body">Price</span></th>
                    <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-md-table-cell"><span class="text-body">Quantity</span></th>
                    <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-md-table-cell"><span class="text-body">Total</span></th>
                    <th scope="col" class="py-0 px-0">
                      <div class="nav justify-content-end">
                        <button type="button" class="nav-link d-inline-block text-decoration-underline text-nowrap py-3 px-0">Clear cart</button>
                      </div>
                    </th>
                  </tr>
                </thead>
                <tbody class="align-middle">

                  <!-- Item -->
                 @foreach ($carts as $cartItem)
@php
    $product = get_single_product($cartItem['product_id']);
    $product_stock = $product->stocks->where('variant', $cartItem->variation)->first();
@endphp
<tr>
    <td class="py-3 ps-0">
        <div class="d-flex align-items-center">
                <img src="{{ uploaded_asset($product->thumbnail_img) }}"
                    width="110"
                    alt="{{ $product->getTranslation('name') }}"
                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
           
            <div class="w-100 min-w-0 ps-2 ps-xl-3">
                <h5 class="d-flex animate-underline mb-2">
                    
                        {{ $product->getTranslation('name') }}
                   
                </h5>
                <ul class="list-unstyled gap-1 fs-xs mb-0">
                    @if($cartItem->variation)
                        <li><span class="text-body-secondary">Variation:</span> <span class="text-dark-emphasis fw-medium">{{ $cartItem->variation }}</span></li>
                    @endif
                    <li class="d-xl-none"><span class="text-body-secondary">Price:</span> <span class="text-dark-emphasis fw-medium">{{ single_price(cart_product_price($cartItem, $product, false) ) }}</span></li>
                </ul>
                <div class="count-input rounded-2 d-md-none mt-3">
                    <button type="button" class="btn btn-sm btn-icon" onclick="updateQuantity({{ $cartItem->id }}, 'decrement')">
                        <i class="ci-minus"></i>
                    </button>
                    <input type="number" class="form-control form-control-sm" value="{{ $cartItem->quantity }}" readonly>
                    <button type="button" class="btn btn-sm btn-icon" onclick="updateQuantity({{ $cartItem->id }}, 'increment')">
                        <i class="ci-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </td>
    <td class="h6 py-3 d-none d-xl-table-cell">{{ single_price(cart_product_price($cartItem, $product, false)) }}</td>
    <td class="py-3 d-none d-md-table-cell">
        <div class="count-input">
            <button type="button" class="btn btn-icon" onclick="updateQuantity({{ $cartItem->id }}, 'decrement')">
                <i class="ci-minus"></i>
            </button>
            <input type="number" class="form-control" value="{{ $cartItem->quantity }}" readonly>
            <button type="button" class="btn btn-icon" onclick="updateQuantity({{ $cartItem->id }}, 'increment')">
                <i class="ci-plus"></i>
            </button>
        </div>
    </td>
    <td class="h6 py-3 d-none d-md-table-cell">{{ single_price(cart_product_price($cartItem, $product, false) * $cartItem->quantity) }}</td>
    <td class="text-end py-3 px-0">
        <button type="button" class="btn-close fs-sm" onclick="removeFromCartView(event, {{ $cartItem->id }})" aria-label="Remove from cart"></button>
    </td>
</tr>
@endforeach


    
                </tbody>
              </table>

              <div class="nav position-relative z-2 mb-4 mb-lg-0">
                <a class="nav-link animate-underline px-0" href="shop-catalog-electronics.html">
                  <i class="ci-chevron-left fs-lg me-1"></i>
                  <span class="animate-target">Continue shopping</span>
                </a>
              </div>
            </div>
          </div>

            @include('frontend.components.cart_summary', ['proceed' => 1, 'carts' => $active_carts])


        </div>
      </section>

      @else
      @endif


</main>

@endsection

@section('script')
    <script type="text/javascript">
        function removeFromCartView(e, key) {
            e.preventDefault();
            removeFromCart(key);
        }

        function updateQuantity(key, element) {
            $.post('{{ route('cart.updateQuantity') }}', {
                _token: AIZ.data.csrf,
                id: key,
                quantity: element.value
            }, function(data) {
                updateNavCart(data.nav_cart_view, data.cart_count);
                $('#cart-details').html(data.cart_view);
                AIZ.extra.plusMinus();
            });
        }

        // Cart item selection
        $(document).on("change", ".check-all", function() {
            $('.check-one:checkbox').prop('checked', this.checked);
            updateCartStatus();
        });
        $(document).on("change", ".check-seller", function() {
            var value = this.value;
            $('.check-one-'+value+':checkbox').prop('checked', this.checked);
            updateCartStatus();
        });
        $(document).on("change", ".check-one[name='id[]']", function(e) {
            e.preventDefault();
            updateCartStatus();
        });
        function updateCartStatus() {
            $('.aiz-refresh').addClass('active');
            let product_id = [];
            $(".check-one[name='id[]']:checked").each(function() {
                product_id.push($(this).val());
            });

            $.post('{{ route('cart.updateCartStatus') }}', {
                _token: AIZ.data.csrf,
                product_id: product_id
            }, function(data) {
                $('#cart-details').html(data);
                AIZ.extra.plusMinus();
                $('.aiz-refresh').removeClass('active');
            });
        }

        // coupon apply
        $(document).on("click", "#coupon-apply", function() {
            @if (Auth::check())
                @if(Auth::user()->user_type != 'customer')
                    AIZ.plugins.notify('warning', "{{ translate('Please Login as a customer to apply coupon code.') }}");
                    return false;
                @endif

                var data = new FormData($('#apply-coupon-form')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: "{{ route('checkout.apply_coupon_code') }}",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, textStatus, jqXHR) {
                        AIZ.plugins.notify(data.response_message.response, data.response_message.message);
                        $("#cart_summary").html(data.html);
                    }
                });
            @else
                $('#login_modal').modal('show');
            @endif
        });

        // coupon remove
        $(document).on("click", "#coupon-remove", function() {
            @if (Auth::check() && Auth::user()->user_type == 'customer')
                var data = new FormData($('#remove-coupon-form')[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: "{{ route('checkout.remove_coupon_code') }}",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, textStatus, jqXHR) {
                        $("#cart_summary").html(data);
                    }
                });
            @endif
        });

    </script>
@endsection
