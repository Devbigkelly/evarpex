@extends('frontend.layouts.web')

@if (isset($category_id))
    @php
        $meta_title = $category->meta_title;
        $meta_description = $category->meta_description;
    @endphp
@elseif (isset($brand_id))
    @php
        $meta_title = get_single_brand($brand_id)->meta_title;
        $meta_description = get_single_brand($brand_id)->meta_description;
    @endphp
@else
    @php
        $meta_title         = get_setting('meta_title');
        $meta_description   = get_setting('meta_description');
    @endphp
@endif

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title }}">
    <meta itemprop="description" content="{{ $meta_description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
@endsection

@section('content')

   <!-- Page content -->
    <main class="content-wrapper pt-4">


      <!-- Selected filters + Sorting -->
      <section class="container mb-4">
        <div class="row">
          <div class="col-lg-9">
            <div class="d-md-flex align-items-start">
              <div class="h6 fs-sm fw-normal text-nowrap translate-middle-y mt-3 mb-0 me-4">Found <span class="fw-semibold">732</span> items</div>
              <div class="d-flex flex-wrap gap-2">
                <button type="button" class="btn btn-sm btn-secondary">
                  <i class="ci-close fs-sm ms-n1 me-1"></i>
                  Sale
                </button>
                <button type="button" class="btn btn-sm btn-secondary">
                  <i class="ci-close fs-sm ms-n1 me-1"></i>
                  Asus
                </button>
                <button type="button" class="btn btn-sm btn-secondary">
                  <i class="ci-close fs-sm ms-n1 me-1"></i>
                  1 TB
                </button>
                <button type="button" class="btn btn-sm btn-secondary">
                  <i class="ci-close fs-sm ms-n1 me-1"></i>
                  $340 - $1,250
                </button>
                <button type="button" class="btn btn-sm btn-secondary bg-transparent border-0 text-decoration-underline px-0 ms-2">
                  Clear all
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-3 mt-3 mt-lg-0">
            <div class="d-flex align-items-center justify-content-lg-end text-nowrap">
              <label class="form-label fw-semibold mb-0 me-2">Sort by:</label>
              <div style="width: 190px">
                <select class="form-select border-0 rounded-0 px-1" data-select="{
                  &quot;removeItemButton&quot;: false,
                  &quot;classNames&quot;: {
                    &quot;containerInner&quot;: [&quot;form-select&quot;, &quot;border-0&quot;, &quot;rounded-0&quot;, &quot;px-1&quot;]
                  }
                }">
                  <option value="Relevance">Relevance</option>
                  <option value="Popularity">Popularity</option>
                  <option value="Price: Low to High">Price: Low to High</option>
                  <option value="Price: High to Low">Price: High to Low</option>
                  <option value="Newest Arrivals">Newest Arrivals</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <hr class="d-lg-none my-3">
      </section>


      <!-- Products grid + Sidebar with filters -->
      <section class="container pb-5 mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5">
        <div class="row">

          <!-- Filter sidebar that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
          <aside class="col-lg-3">
            <div class="offcanvas-lg offcanvas-start" id="filterSidebar">
              <div class="offcanvas-header py-3">
                <h5 class="offcanvas-title">Filter and sort</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#filterSidebar" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body flex-column pt-2 py-lg-0">

                <!-- Categories -->
                <div class="w-100 border rounded p-3 p-xl-4 mb-3 mb-xl-4">
                  <h4 class="h6 mb-2">Categories</h4>
                  <ul class="list-unstyled d-block m-0">
                    <li class="nav d-block pt-2 mt-1">
                      <a class="nav-link animate-underline fw-normal p-0" href="#!">
                        <span class="animate-target text-truncate me-3">Smartphones</span>
                        <span class="text-body-secondary fs-xs ms-auto">218</span>
                      </a>
                    </li>
                
                  </ul>
                </div>

                <!-- Price range -->
                <div class="w-100 border rounded p-3 p-xl-4 mb-3 mb-xl-4">
                  <h4 class="h6 mb-2" id="slider-label">Price</h4>
                  <div class="range-slider" data-range-slider="{&quot;startMin&quot;: 340, &quot;startMax&quot;: 1250, &quot;min&quot;: 0, &quot;max&quot;: 1600, &quot;step&quot;: 1, &quot;tooltipPrefix&quot;: &quot;$&quot;}" aria-labelledby="slider-label">
                    <div class="range-slider-ui"></div>
                    <div class="d-flex align-items-center">
                      <div class="position-relative w-50">
                        <i class="ci-dollar-sign position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="number" class="form-control form-icon-start" min="0" data-range-slider-min="">
                      </div>
                      <i class="ci-minus text-body-emphasis mx-2"></i>
                      <div class="position-relative w-50">
                        <i class="ci-dollar-sign position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input type="number" class="form-control form-icon-start" min="0" data-range-slider-max="">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Brand (checkboxes) -->
                <div class="w-100 border rounded p-3 p-xl-4 mb-3 mb-xl-4">
                  <h4 class="h6">Brand</h4>
                  <div class="d-flex flex-column gap-1">
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="apple" checked="">
                        <label for="apple" class="form-check-label text-body-emphasis">Apple</label>
                      </div>
                      <span class="text-body-secondary fs-xs">64</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="asus">
                        <label for="asus" class="form-check-label text-body-emphasis">Asus</label>
                      </div>
                      <span class="text-body-secondary fs-xs">310</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="bao">
                        <label for="bao" class="form-check-label text-body-emphasis">Bang &amp; Olufsen</label>
                      </div>
                      <span class="text-body-secondary fs-xs">47</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="bosh">
                        <label for="bosh" class="form-check-label text-body-emphasis">Bosh</label>
                      </div>
                      <span class="text-body-secondary fs-xs">112</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="cobra">
                        <label for="cobra" class="form-check-label text-body-emphasis">Cobra</label>
                      </div>
                      <span class="text-body-secondary fs-xs">96</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="dell">
                        <label for="dell" class="form-check-label text-body-emphasis">Dell</label>
                      </div>
                      <span class="text-body-secondary fs-xs">178</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="foxconn">
                        <label for="foxconn" class="form-check-label text-body-emphasis">Foxconn</label>
                      </div>
                      <span class="text-body-secondary fs-xs">95</span>
                    </div>
                    <div class="accordion mb-n2">
                      <div class="accordion-item border-0">
                        <div class="accordion-collapse collapse" id="more-brands">
                          <div class="d-flex flex-column gap-1">
                            <div class="d-flex align-items-center justify-content-between">
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="hp">
                                <label for="hp" class="form-check-label text-body-emphasis">Hewlett Packard</label>
                              </div>
                              <span class="text-body-secondary fs-xs">61</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="huawei">
                                <label for="huawei" class="form-check-label text-body-emphasis">Huawei</label>
                              </div>
                              <span class="text-body-secondary fs-xs">417</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="panasonic">
                                <label for="panasonic" class="form-check-label text-body-emphasis">Panasonic</label>
                              </div>
                              <span class="text-body-secondary fs-xs">123</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="samsung">
                                <label for="samsung" class="form-check-label text-body-emphasis">Samsung</label>
                              </div>
                              <span class="text-body-secondary fs-xs">284</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="sony">
                                <label for="sony" class="form-check-label text-body-emphasis">Sony</label>
                              </div>
                              <span class="text-body-secondary fs-xs">133</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="toshiba">
                                <label for="toshiba" class="form-check-label text-body-emphasis">Toshiba</label>
                              </div>
                              <span class="text-body-secondary fs-xs">39</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="xiaomi">
                                <label for="xiaomi" class="form-check-label text-body-emphasis">Xiaomi</label>
                              </div>
                              <span class="text-body-secondary fs-xs">421</span>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-header">
                          <button type="button" class="accordion-button w-auto fs-sm fw-medium collapsed animate-underline py-2" data-bs-toggle="collapse" data-bs-target="#more-brands" aria-expanded="false" aria-controls="more-brands" aria-label="Show/hide more brands">
                            <span class="animate-target me-2" data-label-collapsed="Show all" data-label-expanded="Show less"></span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- SSD size (checkboxes) -->
                <div class="w-100 border rounded p-3 p-xl-4 mb-3 mb-xl-4">
                  <h4 class="h6">SSD size</h4>
                  <div class="d-flex flex-column gap-1">
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="tb-2">
                        <label for="tb-2" class="form-check-label text-body-emphasis">2 TB</label>
                      </div>
                      <span class="text-body-secondary fs-xs">13</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="tb-1">
                        <label for="tb-1" class="form-check-label text-body-emphasis">1 TB</label>
                      </div>
                      <span class="text-body-secondary fs-xs">28</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="gb-512" checked="">
                        <label for="gb-512" class="form-check-label text-body-emphasis">512 GB</label>
                      </div>
                      <span class="text-body-secondary fs-xs">47</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="gb-256">
                        <label for="gb-256" class="form-check-label text-body-emphasis">256 GB</label>
                      </div>
                      <span class="text-body-secondary fs-xs">56</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="gb-128">
                        <label for="gb-128" class="form-check-label text-body-emphasis">128 GB</label>
                      </div>
                      <span class="text-body-secondary fs-xs">69</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="gb-64">
                        <label for="gb-64" class="form-check-label text-body-emphasis">64 GB or less</label>
                      </div>
                      <span class="text-body-secondary fs-xs">141</span>
                    </div>
                  </div>
                </div>

                <!-- Color -->
                <div class="w-100 border rounded p-3 p-xl-4">
                  <h4 class="h6">Color</h4>
                  <div class="nav d-block mt-n2">
                    <button type="button" class="nav-link w-auto animate-underline fw-normal pt-2 pb-0 px-0">
                      <span class="rounded-circle me-2" style="width: .875rem; height: .875rem; margin-top: .125rem; background-color: #8bc4ab"></span>
                      <span class="animate-target">Green</span>
                    </button>
                    <button type="button" class="nav-link w-auto animate-underline fw-normal mt-1 pt-2 pb-0 px-0">
                      <span class="rounded-circle me-2" style="width: .875rem; height: .875rem; margin-top: .125rem; background-color: #ee7976"></span>
                      <span class="animate-target">Coral red</span>
                    </button>
                    <button type="button" class="nav-link w-auto animate-underline fw-normal mt-1 pt-2 pb-0 px-0">
                      <span class="rounded-circle me-2" style="width: .875rem; height: .875rem; margin-top: .125rem; background-color: #df8fbf"></span>
                      <span class="animate-target">Light pink</span>
                    </button>
                    <button type="button" class="nav-link w-auto animate-underline fw-normal mt-1 pt-2 pb-0 px-0">
                      <span class="rounded-circle me-2" style="width: .875rem; height: .875rem; margin-top: .125rem; background-color: #9acbf1"></span>
                      <span class="animate-target">Sky blue</span>
                    </button>
                    <button type="button" class="nav-link w-auto animate-underline fw-normal mt-1 pt-2 pb-0 px-0">
                      <span class="rounded-circle me-2" style="width: .875rem; height: .875rem; margin-top: .125rem; background-color: #364254"></span>
                      <span class="animate-target">Black</span>
                    </button>
                    <button type="button" class="nav-link w-auto animate-underline fw-normal mt-1 pt-2 pb-0 px-0">
                      <span class="border rounded-circle me-2" style="width: .875rem; height: .875rem; margin-top: .125rem; background-color: #ffffff"></span>
                      <span class="animate-target">White</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </aside>


          <!-- Product grid -->
         <div class="col-lg-9">

    @if ($products->count())

    <div class="row row-cols-2 row-cols-md-3 g-4 pb-3 mb-3">

        @foreach ($products as $key => $product)
            @php
                $product_url = route('product', $product->slug);
                if ($product->auction_product == 1) {
                    $product_url = route('auction-product', $product->slug);
                }
                $total = $product->reviews->where('status', 1)->count();
            @endphp

            <div class="col">
                <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
                    <div class="position-relative">

                        <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                            <div class="d-flex flex-column gap-2">
                                <button type="button" class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex">
                                    <i class="ci-heart fs-base animate-target"></i>
                                </button>
                                <button type="button" class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex">
                                    <i class="ci-refresh-cw fs-base animate-target"></i>
                                </button>
                            </div>
                        </div>

                        <div class="dropdown d-lg-none position-absolute top-0 end-0 z-2 mt-2 me-2">
                            <button type="button" class="btn btn-icon btn-sm btn-secondary bg-body" data-bs-toggle="dropdown">
                                <i class="ci-more-vertical fs-lg"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end fs-xs p-2">
                                <li><a class="dropdown-item" href="#"><i class="ci-heart fs-sm me-2"></i>Add to Wishlist</a></li>
                                <li><a class="dropdown-item" href="#"><i class="ci-refresh-cw fs-sm me-2"></i>Compare</a></li>
                            </ul>
                        </div>

                        <a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="{{ $product_url }}" wire:navigate>
                            @if (discount_in_percentage($product) > 0)
                                <span class="badge bg-danger position-absolute top-0 start-0 mt-2 ms-2 mt-lg-3 ms-lg-3">
                                    -{{ discount_in_percentage($product) }}%
                                </span>
                            @endif

                            <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                                <img src="{{ get_image($product->thumbnail) }}"
                                     alt="{{ $product->getTranslation('name') }}"
                                     onerror="this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                            </div>
                        </a>
                    </div>

                    <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            {!! renderStarRating($product->rating) !!}
                            <span class="text-body-tertiary fs-xs">({{ $total }})</span>
                        </div>

                        <h3 class="pb-1 mb-2">
                            <a class="d-block fs-sm fw-medium text-truncate" href="{{ $product_url }}">
                                <span class="animate-target">{{ $product->getTranslation('name') }}</span>
                            </a>
                        </h3>

                        <div class="d-flex align-items-center justify-content-between">
                            <div class="h5 lh-1 mb-0">
                                {{ home_discounted_base_price($product) }}
                                <del class="text-body-tertiary fs-sm fw-normal">
                                    {{ home_base_price($product) }}
                                </del>
                            </div>

                            <button type="button" class="product-card-button btn btn-icon btn-secondary ms-2">
                                <i class="ci-shopping-cart fs-base animate-target"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>

    <nav class="border-top mt-4 pt-3" aria-label="Catalog pagination">
        {{ $products->appends(request()->input())->links() }}
    </nav>

    @else

    <div class="d-flex flex-column align-items-center justify-content-center py-5 my-5 text-center">
        <i class="ci-search fs-1 text-body-tertiary mb-3"></i>
        <h3 class="fs-4 mb-2">No products found</h3>
        <p class="fs-sm text-body-tertiary mb-4">
            Try adjusting your filters or search keywords
        </p>
        <a href="{{ route('home') }}" class="btn btn-outline-primary">
            Back to home
        </a>
    </div>

    @endif

</div>

      </section>



    </main>
@endsection

@section('script')
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
    </script>
@endsection
