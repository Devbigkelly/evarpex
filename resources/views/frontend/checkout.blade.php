@extends('frontend.layouts.web')

@section('content')
<section class="container pt-5 pb-5 mb-2 mb-md-3 mb-lg-4 mb-xl-5">
        <div class="row gx-4">
            <!-- Checkout Form -->
            <div class="col-lg-8 mx-auto">
                <form id="checkout-form" class="form-default" action="{{ route('payment.checkout') }}" method="POST" data-toggle="validator">
                    @csrf

                    <div class="accordion" id="checkoutAccordion">

                        <!-- Shipping Info -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingShipping">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseShipping" aria-expanded="true" aria-controls="collapseShipping">
                                    {{ translate('Shipping Info') }}
                                </button>
                            </h2>
                            <div id="collapseShipping" class="accordion-collapse collapse show" aria-labelledby="headingShipping" data-bs-parent="#checkoutAccordion">
                                <div class="accordion-body" id="shipping_info">
                                    @include('frontend.partials.cart.shipping_info', ['address_id' => $address_id])
                                </div>
                            </div>
                        </div>

                        <!-- Delivery Info -->
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="headingDelivery">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDelivery" aria-expanded="false" aria-controls="collapseDelivery">
                                    {{ translate('Delivery Info') }}
                                </button>
                            </h2>
                            <div id="collapseDelivery" class="accordion-collapse collapse" aria-labelledby="headingDelivery" data-bs-parent="#checkoutAccordion">
                                <div class="accordion-body" id="delivery_info">
                                    @include('frontend.partials.cart.delivery_info', ['carts' => $carts, 'carrier_list' => $carrier_list, 'shipping_info' => $shipping_info])
                                </div>
                            </div>
                        </div>

                        <!-- Payment Info -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingPayment">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePayment" aria-expanded="false" aria-controls="collapsePayment">
                                    {{ translate('Payment') }}
                                </button>
                            </h2>
                            <div id="collapsePayment" class="accordion-collapse collapse" aria-labelledby="headingPayment" data-bs-parent="#checkoutAccordion">
                                <div class="accordion-body" id="payment_info">
                                    @include('frontend.partials.cart.payment_info', ['carts' => $carts, 'total' => $total])

                                    <!-- Agree Box -->
                                    <div class="mt-3 fs-14">
                                        <label class="form-check-label">
                                            <input type="checkbox" required id="agree_checkbox" class="form-check-input" onchange="stepCompletionPaymentInfo()">
                                            {{ translate('I agree to the') }}
                                        </label>
                                        <a href="{{ route('terms') }}" class="fw-bold">{{ translate('terms and conditions') }}</a>,
                                        <a href="{{ route('returnpolicy') }}" class="fw-bold">{{ translate('return policy') }}</a> &
                                        <a href="{{ route('privacypolicy') }}" class="fw-bold">{{ translate('privacy policy') }}</a>
                                    </div>

                                    <div class="d-flex justify-content-between mt-4">
                                        <a href="{{ route('home') }}" class="btn btn-link px-0">
                                            <i class="las la-arrow-left"></i> {{ translate('Return to shop') }}
                                        </a>
                                        <button type="button" id="submitOrderBtn" onclick="submitOrder(this)" class="btn btn-primary">
                                            {{ translate('Complete Order') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            <!-- Cart Summary -->
                @include('frontend.components.cart_summary', ['proceed' => 0, 'carts' => $carts])
            
        </div>
</section>
@endsection

@section('modal')
@if(Auth::check())
    @include('frontend.partials.address.address_modal')
@endif
@endsection

@section('script')
@include('frontend.partials.address.address_js')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize accordion behavior
        var accordionEl = document.querySelectorAll('.accordion-button');
        accordionEl.forEach(function(button) {
            button.addEventListener('click', function() {
                stepCompletionShippingInfo();
                stepCompletionDeliveryInfo();
                stepCompletionPaymentInfo();
            });
        });
    });

    
</script>
<script>
    window.submitOrder = function (el) {
        $(el).prop('disabled', true);

        if (!$('#agree_checkbox').is(':checked')) {
            notify('danger', '{{ translate('You need to agree with our policies') }}');
            $(el).prop('disabled', false);
            return;
        }

        if (minimum_order_amount_check && Number($('#sub_total').val()) < Number(minimum_order_amount)) {
            notify('danger', '{{ translate('Your order amount is less than the minimum order amount') }}');
            $(el).prop('disabled', false);
            return;
        }

        var offline_payment_active = '{{ addon_is_activated('offline_payment') }}';

        if (
            offline_payment_active == '1' &&
            $('.offline_payment_option').is(':checked') &&
            $('#trx_id').val() === ''
        ) {
            notify('danger', '{{ translate('You need to put Transaction id') }}');
            $(el).prop('disabled', false);
            return;
        }

        var isOkShipping = stepCompletionShippingInfo();
        var isOkDelivery = stepCompletionDeliveryInfo();
        var isOkPayment  = stepCompletionPaymentInfo();

        if (!isOkShipping || !isOkDelivery || !isOkPayment) {
            notify('danger', '{{ translate("Please fill in all mandatory fields!") }}');

            $('#checkout-form [required]').each(function () {
                if (!$(this).val()) {
                    var isHiddenTrx = $('.d-none #trx_id').length;
                    if ($(this).attr('name') !== 'trx_id' || isHiddenTrx === 0) {
                        $(this).focus();
                        this.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        return false;
                    }
                }
            });

            $(el).prop('disabled', false);
            return;
        }

        $('#checkout-form').submit();
    };
</script>

@endsection
