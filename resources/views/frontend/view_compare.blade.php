@extends('frontend.layouts.web')

@section('content')
   <main class="content-wrapper">
      <div class="container pt-4 pt-lg-5 pb-5">
        <div class="row pt-sm-2 pt-md-3 pt-lg-0 pb-2 pb-sm-3 pb-md-4 pb-lg-5">

          <!-- Favorites content -->
          <div class="col-lg-12 pt-2 pt-xl-3">

            <!-- Header -->
            <div class="d-flex align-items-center justify-content-between gap-3 pb-3 mb-2 mb-md-3">
              <h1 class="h2 mb-0">Compare List</h1>
              <div>
                 <a href="{{ route('compare.reset') }}" wire:navigate class="fs-xs text-body-secondary">Reset list</a>
              </div>
            </div>

            <!-- Products grid -->
               @if(Session::has('compare'))
                @if(count(Session::get('compare')) > 0)
            <div class="row row-cols-2 row-cols-md-4 g-3 g-sm-4 g-lg-3 g-xl-4">

              <!-- Product -->
                @foreach (Session::get('compare') as $key => $item)
                                    @php
                                        $product = get_single_product($item);
                                    @endphp
              <div class="col">
                <div class="card h-100 animate-underline hover-effect-scale rounded-4 overflow-hidden">
                  <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                    <a class="ratio d-block hover-effect-target" style="--cz-aspect-ratio: calc(220 / 304 * 100%)" href="{{ route('product', get_single_product($item)->slug) }}" wire:navigate>
                      <img src="{{ uploaded_asset(get_single_product($item)->thumbnail_img) }}" alt="Image">
                    </a>
                   
                  </div>
                  <div class="card-body p-3">
                    <div class="d-flex min-w-0 justify-content-between gap-2 gap-sm-3 mb-2">
                      <h3 class="nav min-w-0 mb-0">
                        <a class="nav-link text-truncate p-0" href="{{ route('product', get_single_product($item)->slug) }}" wire:navigate>
                          <span class="text-truncate animate-target"> {{ get_single_product($item)->getTranslation('name') }}</span>
                        </a>
                      </h3>
                      <div class="h6 mb-0">{{ home_discounted_base_price($product) }}</div>
                        @if(home_base_price($product) != home_discounted_base_price($product))
                                                        <del class="fw-400 opacity-50 mr-1">{{ home_base_price($product) }}</del>
                                                    @endif
                    </div>
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                      <div class="nav align-items-center gap-1 fs-xs">
                        <a class="nav-link fs-xs text-body gap-1 p-0" href="#!">
                         Category
                        </a>
                        <div class="text-body-secondary">-</div>
                        <a class="nav-link fs-xs text-body p-0" href="#!">                                                    @if (get_single_product($item)->main_category != null)
                                                        {{ get_single_product($item)->main_category->getTranslation('name') }}
                                                    @endif</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>

              @endforeach

         
            </div>
              @endif
                @else
                    <div class="text-center p-4">
                        <p class="fs-17">{{ translate('Your comparison list is empty')}}</p>
                    </div>
                @endif
          </div>
        </div>
      </div>
    </main>
 
@endsection
