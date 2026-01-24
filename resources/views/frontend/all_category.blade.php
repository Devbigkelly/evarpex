@extends('frontend.layouts.web')

@section('content')
     <main class="content-wrapper">

      <!-- Page title -->
      <h1 class="h3 container mb-sm-4 pt-4">Shop categories</h1>

         <!-- Banners -->
      <section class="container pb-4 pt-5 mb-3">
        <div class="row g-3 g-lg-4">
          <div class="col-md-7">
            <div class="position-relative d-flex flex-column flex-sm-row align-items-center h-100 rounded-5 overflow-hidden px-5 px-sm-0 pe-sm-4">
              <span class="position-absolute top-0 start-0 w-100 h-100 d-none-dark rtl-flip" style="background: linear-gradient(90deg, #accbee 0%, #e7f0fd 100%)"></span>
              <span class="position-absolute top-0 start-0 w-100 h-100 d-none d-block-dark rtl-flip" style="background: linear-gradient(90deg, #1b273a 0%, #1f2632 100%)"></span>
              <div class="position-relative z-1 text-center text-sm-start pt-4 pt-sm-0 ps-xl-4 mt-2 mt-sm-0 order-sm-2">
                <h2 class="h3 mb-2">iPhone 14</h2>
                <p class="fs-sm text-light-emphasis mb-sm-4">Apple iPhone 14 128GB Blue</p>
                <a class="btn btn-primary" href="#">
                  From $899
                  <i class="ci-arrow-up-right fs-base ms-1 me-n1"></i>
                </a>
              </div>
              <div class="position-relative z-1 w-100 align-self-end order-sm-1" style="max-width: 416px">
                <div class="ratio rtl-flip" style="--cz-aspect-ratio: calc(320 / 416 * 100%)">
                  <img src="{{ asset('asset/img/shop/electronics/banners/iphone-1.png')}}" alt="iPhone 14">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="position-relative d-flex flex-column align-items-center justify-content-between h-100 rounded-5 overflow-hidden pt-3">
              <span class="position-absolute top-0 start-0 w-100 h-100 d-none-dark rtl-flip" style="background: linear-gradient(90deg, #fdcbf1 0%, #fdcbf1 1%, #ffecfa 100%)"></span>
              <span class="position-absolute top-0 start-0 w-100 h-100 d-none d-block-dark rtl-flip" style="background: linear-gradient(90deg, #362131 0%, #322730 100%)"></span>
              <div class="position-relative z-1 text-center pt-3 mx-4">
                <i class="ci-apple text-body-emphasis fs-3 mb-3"></i>
                <p class="fs-sm text-light-emphasis mb-1">Deal of the week</p>
                <h2 class="h3 mb-4">iPad Pro M1</h2>
              </div>
              <a class="position-relative z-1 d-block w-100" href="#">
                <div class="ratio rtl-flip" style="--cz-aspect-ratio: calc(159 / 525 * 100%)">
                  <img src="{{ asset('asset/img/shop/electronics/banners/ipad.png')}}" width="525" alt="iPad">
                </div>
              </a>
            </div>
          </div>
        </div>
      </section>



      <!-- Category cards -->
      <section class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 gy-5">

          <!-- Category -->
             @foreach ($categories as $key => $category)
          <div class="col">
            <div class="hover-effect-scale">
              <a class="d-block bg-body-tertiary rounded p-4 mb-4" href="{{ route('products.category', $category->slug) }}" wire:navigate>
                <div class="ratio" style="--cz-aspect-ratio: calc(184 / 258 * 100%)">
                  <img src="{{ uploaded_asset($category->banner) }}" class="hover-effect-target" alt="Smartphones">
                </div>
              </a>
              <h2 class="h6 d-flex w-100 pb-2 mb-1">
                <a class="animate-underline animate-target d-inline text-truncate" href="{{ route('products.category', $category->slug) }}" wire:navigate>  {{ $category->name }}</a>
              </h2>
             <ul class="nav flex-column gap-2 mt-n1">
    @foreach ($category->childrenCategories as $child_category)
        <li class="d-flex w-100 pt-1">
            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
               href="{{ route('products.category', $child_category->slug) }}" wire:navigate>
                {{ $child_category->getTranslation('name') }}
            </a>
        </li>

        @foreach ($child_category->childrenCategories as $second_level_category)
            <li class="d-flex w-100 ps-3 pt-1">
                <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0 fs-sm text-body-secondary"
                   href="{{ route('products.category', $second_level_category->slug) }}" wire:navigate>
                    {{ $second_level_category->getTranslation('name') }}
                </a>
            </li>
        @endforeach
    @endforeach
</ul>

            </div>
          </div>
          @endforeach

        </div>
      </section>


   


    </main>

@endsection
