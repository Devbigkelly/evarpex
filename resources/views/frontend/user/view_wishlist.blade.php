@extends('frontend.layouts.user')

@section('panel_content')
     <!-- Favorites content -->
          <div class="col-lg-9 pt-2 pt-xl-3">

            <!-- Header -->
            <div class="d-flex align-items-center justify-content-between gap-3 pb-3 mb-2 mb-md-3">
              <h1 class="h2 mb-0">Wishlist</h1>
          
            </div>

            <!-- Products grid -->
            <div class="row row-cols-2 row-cols-md-3 g-3 g-sm-4 g-lg-3 g-xl-4">

              <!-- Product -->
                 @if (count($wishlists) > 0)
                 @foreach($wishlists as $key => $wishlist)
              <div class="col">
                <div class="card h-100 animate-underline hover-effect-scale rounded-4 overflow-hidden">
                  <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                    <a class="ratio d-block hover-effect-target" style="--cz-aspect-ratio: calc(220 / 304 * 100%)" href="{{ route('product', $wishlist->product->slug) }}" wire:navigate>
                      <img src="{{ uploaded_asset($wishlist->product->thumbnail_img) }}" title="{{ $wishlist->product->getTranslation('name') }}">
                    </a>
                    <div class="position-absolute top-0 end-0 z-2 hover-effect-target pt-1 pt-sm-0 pe-1 pe-sm-0 mt-2 mt-sm-3 me-2 me-sm-3">
                      <button type="button" class="btn btn-sm btn-icon btn-light text-danger bg-light border-0 rounded-circle animate-pulse" aria-label="Remove from wishlist">
                        <i class="ci-heart-filled animate-target fs-sm"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <div class="d-flex min-w-0 justify-content-between gap-2 gap-sm-3 mb-2">
                      <h3 class="nav min-w-0 mb-0">
                        <a class="nav-link text-truncate p-0" href="shop-product-marketplace.html">
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
@endsection

@section('modal')
    <!-- add To Cart Modal -->
    <div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <button type="button" class="close absolute-close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function removeFromWishlist(id){
            $.post('{{ route('wishlists.remove') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
                $('#wishlist').html(data);
                $('#wishlist_'+id).hide();
                AIZ.plugins.notify('success', '{{ translate("Item has been renoved from wishlist") }}');
            })
        }
    </script>
@endsection
