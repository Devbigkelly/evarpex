@extends('frontend.layouts.web')

@section('content')
    <section class="container mb-4 pt-3">
        <div class="row">

          <!-- Cover image -->
          <div class="col-md-7 order-md-2 mb-4 mb-md-0">
            <div class="position-relative h-100">
              <div class="ratio ratio-16x9"></div>
              <img src="{{ asset('asset/img/34.jpg')}}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover rounded-5" alt="Image">
            </div>
          </div>

          <!-- Text + button -->
          <div class="col-md-5 order-md-1">
            <div class="position-relative py-5 px-4 px-sm-5">
              <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none-dark rtl-flip" style="background: linear-gradient(-90deg, #accbee 0%, #e7f0fd 100%)"></span>
              <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none d-block-dark rtl-flip" style="background: linear-gradient(-90deg, #1b273a 0%, #1f2632 100%)"></span>
              <div class="position-relative z-1 py-md-2 py-lg-4 py-xl-5 px-xl-2 px-xxl-4 my-xxl-3">
                <h1 class="pb-1 pb-md-2 pb-lg-3">Make Money With Evarpex</h1>
                <p class="text-dark-emphasis pb-sm-2 pb-lg-0 mb-4 mb-lg-5">Join thousands of successful sellers across Nigeria. Reach millions of customers, grow your business, and maximize your profits on Africa's trusted marketplace.</p>
                <a class="btn btn-lg btn-outline-dark animate-slide-down" href="{{ route('shops.create') }}" wire:navigate>
                  Start Selling Now
                  <i class="ci-arrow-right fs-lg animate-target ms-2 me-n1"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

         <!-- Features -->
      <section class="container pt-5 mt-1 mt-sm-3 mt-md-4 mt-lg-5">
         <!-- Heading -->
        <div class="d-flex align-items-center justify-content-between pb-3 mb-2 mb-sm-3 mt-xxl-3">
          <div class="text-center mx-auto" style="max-width: 690px">
          <h3 class="h1 pb-2 pb-md-3 mx-auto" style="max-width: 400px">How It Works</h3>
          <p class="fs-xl pb-2 pb-md-3 pb-lg-4">Start selling in 4 simple steps</p>
         
        </div>
        
        </div>
        <div class="row row-cols-1 row-cols-md-4 gy-3 gy-sm-4 gx-2 gx-lg-4">
          <div class="col text-center">
            <svg class="d-block text-dark-emphasis mx-auto mb-3 mb-lg-4" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="currentColor"><path d="M62.189 9.902c0-.604-.604-1.208-1.208-1.208h-6.158-3.14l-1.69.121-1.57.242c-2.174.483-4.226 1.087-6.158 2.174s-3.623 2.294-5.072 3.864h-.121c-3.14 3.019-5.313 7.004-6.038 11.351l-.241 1.57-.121 1.691v3.14 5.796c-.604.845-1.087 1.691-1.57 2.536.121-1.328.121-2.536.241-3.864 0-.966.121-1.811.121-2.777v-1.449l-.121-1.449c-.241-1.811-.845-3.743-1.691-5.434a20.6 20.6 0 0 0-3.26-4.71c-2.657-2.777-6.279-4.709-10.143-5.434L12.8 15.82l-1.449-.121H8.574 3.019c-.604 0-1.208.604-1.208 1.208v5.555 2.777l.121 1.449.242 1.449C2.898 32 4.83 35.502 7.729 38.159c1.449 1.328 3.019 2.415 4.709 3.26s3.623 1.328 5.434 1.691l1.449.121h1.449c.966 0 1.811-.121 2.777-.121 1.57-.121 3.14-.121 4.709-.242-.362.604-.604 1.328-.966 1.932-1.449 3.381-2.294 7.004-2.294 10.506.966-3.502 2.294-6.642 3.985-9.66.966-1.811 2.174-3.623 3.381-5.313h5.675 3.14l1.691-.121 1.57-.242c2.174-.483 4.227-1.087 6.159-2.174s3.623-2.294 5.072-3.864h.121c3.14-3.019 5.313-7.004 6.038-11.351l.242-1.57.121-1.69v-3.14-6.279zM49.63 35.743c-1.691.966-3.623 1.449-5.555 1.811l-1.449.242-1.449.121h-3.019-3.864c.242-.242.483-.604.725-.845 2.174-2.657 4.589-5.192 7.004-7.728l7.366-7.728c-3.019 1.932-5.917 3.985-8.694 6.279-2.657 2.294-5.192 4.709-7.487 7.487v-2.536-3.019l.121-1.449.242-1.449c.362-1.932.845-3.864 1.811-5.555.845-1.691 2.053-3.381 3.381-4.83 1.449-1.328 3.019-2.415 4.709-3.381s3.623-1.449 5.555-1.811l1.449-.241 1.449-.121h3.019 4.951v4.951 3.019l-.121 1.57-.242 1.449c-.362 1.932-.845 3.864-1.811 5.555-.845 1.691-2.053 3.381-3.381 4.83-1.449 1.449-3.019 2.536-4.709 3.381zm-26.083 6.762c-.966 0-1.811-.121-2.777-.121l-1.328-.121-1.328-.242c-3.502-.724-6.641-2.536-9.057-5.072-1.208-1.328-2.174-2.657-3.019-4.226-.725-1.57-1.208-3.26-1.57-4.951l-.242-1.328-.121-1.328V22.34v-4.347h4.347 2.777 1.328l1.328.121c1.691.242 3.381.725 4.951 1.57 1.449 1.087 2.898 2.053 4.106 3.26 2.536 2.415 4.347 5.555 5.072 9.057l.241 1.328.121 1.328c.121.845.121 1.811.121 2.777.121 1.449.121 2.777.241 4.226-.241.483-.483.845-.724 1.328-1.328-.362-2.898-.362-4.468-.483zm-5.434-12.437c-1.449-.966-2.898-1.932-4.589-2.657.966 1.449 2.174 2.777 3.381 3.985 2.415 2.536 4.83 4.709 7.487 7.124 1.328 1.087 2.536 2.294 4.106 3.381-.725-1.691-1.57-3.26-2.657-4.589-2.174-2.898-4.709-5.193-7.728-7.245z"></path></svg>
            <h3 class="h5">Register Your Account</h3>
            <p class="fs-sm px-5 mb-md-0">
            Create your seller account in under 5 minutes. Provide your basic information and verify your email address.</p>
          </div>
          <div class="col text-center">
            <svg class="d-block text-dark-emphasis mx-auto mb-3 mb-lg-4" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="currentColor"><path d="M55.526 24.465l-.145-10.159-.094-5.08-.012-.635c-.016-.23-.016-.481-.061-.717-.06-.481-.22-.945-.413-1.384-.407-.875-1.061-1.625-1.868-2.136a4.99 4.99 0 0 0-2.699-.769l-2.548.061-15.238.437 15.238.437 2.532.069a3.93 3.93 0 0 1 2.088.71c.601.431 1.085 1.017 1.365 1.692.131.339.242.688.27 1.051.029.181.017.356.026.548l-.012.635-.094 5.08-.119 8.281c-3.476-.415-6.952-.651-10.428-.808-3.769-.185-7.537-.235-11.306-.255-3.769.023-7.537.073-11.306.258-3.471.158-6.941.392-10.412.803l-.131-9.156-.085-5.05c.009-1.448.949-2.849 2.313-3.435.691-.318 1.391-.355 2.28-.357l2.54-.066 15.239-.439-17.778-.505c-.425-.009-.83-.032-1.325-.006-.472.048-.941.145-1.388.317-1.798.674-3.123 2.475-3.216 4.432l-.105 5.109-.145 10.159-.111 10.159-.046 5.714c.011.242.006.518.048.774.054.523.214 1.031.415 1.516.421.967 1.122 1.802 1.996 2.394a5.52 5.52 0 0 0 2.985.937l1.885.008a219.85 219.85 0 0 0-2.615 7.372l-1.399 4.349-.166.552a2.42 2.42 0 0 0-.062 1.062c.109.703.567 1.362 1.196 1.705a2.42 2.42 0 0 0 2.973-.484c.144-.164.17-.207.235-.287l.177-.224c3.518-4.56 6.926-9.206 10.121-14.015l5.451.014 6.309-.017c3.205 4.808 6.615 9.457 10.14 14.017l.177.224c.065.081.092.123.235.287.753.837 2.009 1.035 2.971.484.629-.343 1.086-1.001 1.195-1.704a2.42 2.42 0 0 0-.062-1.061l-.166-.552-1.403-4.349a228.34 228.34 0 0 0-2.625-7.375l1.007-.003c.425-.003.814.01 1.383-.037.524-.067 1.042-.192 1.53-.396 1.966-.798 3.353-2.796 3.404-4.903l-.03-5.126-.112-10.159zM14.167 57.718l-.293.386c-.011.016-.023.027-.04.035-.035.018-.081.021-.114.004-.043-.018-.066-.046-.08-.095a.18.18 0 0 1-.002-.069l.153-.545 1.157-4.419c.65-2.627 1.271-5.264 1.822-7.92l7.761.02c-3.608 4.082-7.037 8.303-10.363 12.603zm34.91-4.704l1.155 4.42.153.544a.19.19 0 0 1-.002.07c-.014.049-.037.077-.081.096-.034.018-.08.015-.115-.004-.018-.008-.029-.019-.041-.035l-.294-.386c-3.321-4.302-6.749-8.521-10.35-12.607l7.309-.02.452-.001c.549 2.657 1.17 5.293 1.814 7.922zm4.528-18.39l-.05 5.033c-.051 1.297-.928 2.501-2.124 2.963-.626.251-1.14.252-2.08.235l-17.778-.047c-25.374.066 7.11-.017-17.761.043a3.42 3.42 0 0 1-1.802-.541 3.43 3.43 0 0 1-1.238-1.434c-.123-.294-.234-.599-.268-.92-.032-.162-.025-.312-.04-.492l-.046-5.714-.112-10.159-.011-.8c3.47.411 6.94.645 10.409.803 3.769.186 7.537.235 11.306.258 3.769-.02 7.537-.07 11.306-.255 3.475-.157 6.95-.393 10.425-.808l-.024 1.677-.112 10.159zm-14.693-23.94c-3.673-1.557-10.14-1.544-13.805 0 3.66 1.542 10.125 1.559 13.805 0zM25.107 28.829c3.647 1.537 10.114 1.564 13.805 0-3.697-1.567-10.167-1.533-13.805 0z"></path></svg>
            <h3 class="h5">Complete Verification</h3>
            <p class="fs-sm px-5 mb-md-0">Verify your identity with NIN, business with CAC (optional), and banking details. Quick and secure process.</p>
          </div>
          <div class="col text-center">
            <svg class="d-block text-dark-emphasis mx-auto mb-3 mb-lg-4" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="currentColor"><path d="M5.36 29.423c.111 0 2.111 1 6.333 2.667l-.222 10.222c-.111 3.667-.111 7.334-.111 11a1.07 1.07 0 0 0 .778 1c.333.111 10 2.778 9.889 2.667.111 0 10 2.667 9.889 2.667h.111.111.111.111.111l9.889-2.667c.111 0 10-2.778 9.889-2.667a1.07 1.07 0 0 0 .778-1c-.111-3.667-.111-7.334-.111-11l-.222-10.222 6.222-2.667c.111 0 .111-.111.222-.111.222-.222.333-.667 0-.889l-7.111-7.556 5.556 7.667c-3.111 1-6.111 2-9.111 3.111l-9.111 3.333-5.333-6.334c6.222-2.556 12-5.111 18.112-7.889-6-2.778-11.889-5.333-18-7.889l5.333-6.333 9.111 3.333c3 1.111 6.111 2.111 9.111 3.111l-5.556 7.667c2.333-2.333 4.778-4.889 7.111-7.556 0 0 .111-.111.111-.222.111-.333 0-.667-.333-.889-3.222-1.444-6.445-2.778-9.778-4l-9.778-3.889c-.444-.222-.889 0-1.222.333l-5.778 7.111c-1.889-2.445-3.889-4.778-5.778-7.111-.333-.333-.778-.556-1.222-.333-3.222 1.222-6.556 2.556-9.778 3.889-3.778 1.444-7 2.778-10.222 4.222-.111 0-.222.111-.222.111-.222.222-.333.667 0 .889 2.111 2.333 4.333 4.667 6.334 6.778-.444.444-.444 1.222 0 1.556-2.111 2.111-4.222 4.444-6.334 6.778-.444.444-.222 1 .111 1.111zm6.556-7.556l9.889 3.556 3.778 1.333 4.778 2-5.333 6.334-9.111-3.333c-3-1.111-6.111-2.111-9.111-3.111 1.667-2.222 3.222-4.444 4.889-6.778 0-.111.111 0 .222 0zm1.445 30.667c0-3.111-.111-9.556-.445-19.889.778.333 1.445.667 2.222.889l9.778 3.889c.444.222.889 0 1.222-.333 1.778-2.111 3.556-4.333 5.222-6.444-.111 1.778-.111 3.556-.111 5.333l-.222 7.556-.222 13.778-8.556-2.333-8.889-2.444zm37.334 0l-9.111 2.444-8.556 2.333c0-5.778-.111-7.222-.222-13.778l-.222-7.556c-.111-1.778-.111-3.556-.111-5.333 1.778 2.111 3.445 4.333 5.222 6.444.333.333.778.556 1.222.333 3.222-1.222 6.556-2.556 9.778-3.889.778-.333 1.444-.556 2.222-.889l-.222 19.889zm.889-31.667c-5.334 1.556-9.111 2.778-13.556 4.333-2 .667-4 1.222-6 1.889l-9.556-3.667-7-2.556 7-2.556 9.556-3.667c1.889.667 3.778 1.222 5.667 1.889l14 4.445c0-.111-.111-.111-.111-.111zm-44.89-7.667l9.222-3.222 9.111-3.333 5.333 6.333c-1.556.667-3.111 1.222-4.667 1.889l-3.889 1.333-9.889 3.556c-.111 0-.222.111-.222.111l-5-6.667z"></path></svg>
            <h3 class="h5">List Your Products</h3>
            <p class="fs-sm px-5 mb-md-0"> Upload your products with photos and descriptions. Set your prices and manage your inventory easily.</p>
          </div>

            <div class="col text-center">
            <svg class="d-block text-dark-emphasis mx-auto mb-3 mb-lg-4" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="currentColor"><path d="M5.36 29.423c.111 0 2.111 1 6.333 2.667l-.222 10.222c-.111 3.667-.111 7.334-.111 11a1.07 1.07 0 0 0 .778 1c.333.111 10 2.778 9.889 2.667.111 0 10 2.667 9.889 2.667h.111.111.111.111.111l9.889-2.667c.111 0 10-2.778 9.889-2.667a1.07 1.07 0 0 0 .778-1c-.111-3.667-.111-7.334-.111-11l-.222-10.222 6.222-2.667c.111 0 .111-.111.222-.111.222-.222.333-.667 0-.889l-7.111-7.556 5.556 7.667c-3.111 1-6.111 2-9.111 3.111l-9.111 3.333-5.333-6.334c6.222-2.556 12-5.111 18.112-7.889-6-2.778-11.889-5.333-18-7.889l5.333-6.333 9.111 3.333c3 1.111 6.111 2.111 9.111 3.111l-5.556 7.667c2.333-2.333 4.778-4.889 7.111-7.556 0 0 .111-.111.111-.222.111-.333 0-.667-.333-.889-3.222-1.444-6.445-2.778-9.778-4l-9.778-3.889c-.444-.222-.889 0-1.222.333l-5.778 7.111c-1.889-2.445-3.889-4.778-5.778-7.111-.333-.333-.778-.556-1.222-.333-3.222 1.222-6.556 2.556-9.778 3.889-3.778 1.444-7 2.778-10.222 4.222-.111 0-.222.111-.222.111-.222.222-.333.667 0 .889 2.111 2.333 4.333 4.667 6.334 6.778-.444.444-.444 1.222 0 1.556-2.111 2.111-4.222 4.444-6.334 6.778-.444.444-.222 1 .111 1.111zm6.556-7.556l9.889 3.556 3.778 1.333 4.778 2-5.333 6.334-9.111-3.333c-3-1.111-6.111-2.111-9.111-3.111 1.667-2.222 3.222-4.444 4.889-6.778 0-.111.111 0 .222 0zm1.445 30.667c0-3.111-.111-9.556-.445-19.889.778.333 1.445.667 2.222.889l9.778 3.889c.444.222.889 0 1.222-.333 1.778-2.111 3.556-4.333 5.222-6.444-.111 1.778-.111 3.556-.111 5.333l-.222 7.556-.222 13.778-8.556-2.333-8.889-2.444zm37.334 0l-9.111 2.444-8.556 2.333c0-5.778-.111-7.222-.222-13.778l-.222-7.556c-.111-1.778-.111-3.556-.111-5.333 1.778 2.111 3.445 4.333 5.222 6.444.333.333.778.556 1.222.333 3.222-1.222 6.556-2.556 9.778-3.889.778-.333 1.444-.556 2.222-.889l-.222 19.889zm.889-31.667c-5.334 1.556-9.111 2.778-13.556 4.333-2 .667-4 1.222-6 1.889l-9.556-3.667-7-2.556 7-2.556 9.556-3.667c1.889.667 3.778 1.222 5.667 1.889l14 4.445c0-.111-.111-.111-.111-.111zm-44.89-7.667l9.222-3.222 9.111-3.333 5.333 6.333c-1.556.667-3.111 1.222-4.667 1.889l-3.889 1.333-9.889 3.556c-.111 0-.222.111-.222.111l-5-6.667z"></path></svg>
            <h3 class="h5">Start Earning</h3>
            <p class="fs-sm px-5 mb-md-0">Receive orders, ship products, and get paid directly to your verified bank account. Track all earnings in real-time.</p>
          </div>
        </div>
      </section>

         <section class="container-start pt-5">
        <div class="row align-items-center g-0 pt-2 pt-sm-3 pt-md-4 pt-lg-5">
          <div class="col-md-4 col-lg-3 pb-1 pb-md-0 pe-3 ps-md-0 mb-4 mb-md-0">
            <div class="d-flex flex-md-column align-items-end align-items-md-start">
              <div class="mb-md-5 me-3 me-md-0">
                <h3 class="h1 mb-0">Why Sell on Evarpex?</h3>
                <h2 class="text-body fs-sm fw-normal">Everything you need to succeed online</h2>
              </div>

              <!-- External slider prev/next buttons -->
              <div class="d-flex gap-2">
                <button type="button" id="prev-values" class="btn btn-icon btn-outline-secondary rounded-circle animate-slide-start me-1" aria-label="Prev">
                  <i class="ci-chevron-left fs-xl animate-target"></i>
                </button>
                <button type="button" id="next-values" class="btn btn-icon btn-outline-secondary rounded-circle animate-slide-end" aria-label="Next">
                  <i class="ci-chevron-right fs-xl animate-target"></i>
                </button>
              </div>
            </div>
          </div>

          <div class="col-md-8 col-lg-9">
            <div class="ps-md-4 ps-lg-5">
              <div class="swiper" data-swiper="{
                &quot;slidesPerView&quot;: &quot;auto&quot;,
                &quot;spaceBetween&quot;: 24,
                &quot;loop&quot;: true,
                &quot;navigation&quot;: {
                  &quot;prevEl&quot;: &quot;#prev-values&quot;,
                  &quot;nextEl&quot;: &quot;#next-values&quot;
                }
              }">
                <div class="swiper-wrapper">

                  <!-- Item -->
                  <div class="swiper-slide w-auto h-auto">
                    <div class="card h-100 rounded-4 px-3" style="max-width: 306px">
                      <div class="card-body py-5 px-3">
                        <div class="h2 h5 d-flex align-items-center">
                          <i class="ci-user-plus fs-4 me-3"></i>
                         Millions of Customers
                        </div>
                        <p class="mb-0">Access to a growing customer base across Nigeria. Your products reach buyers actively searching for what you sell.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item -->
                  <div class="swiper-slide w-auto h-auto">
                    <div class="card h-100 rounded-4 px-3" style="max-width: 306px">
                      <div class="card-body py-5 px-3">
                        <div class="h4 h5 d-flex align-items-center">
                         <i class="ci-check-shield fs-4 me-3"></i>
                         Secure Payments
                        </div>
                        <p class="mb-0">Get paid safely and on time. All transactions are protected, and funds are transferred directly to your verified bank account.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item -->
                  <div class="swiper-slide w-auto h-auto">
                    <div class="card h-100 rounded-4 px-3" style="max-width: 306px">
                      <div class="card-body py-5 px-3">
                        <div class="h4 h5 d-flex align-items-center">
                          <i class="ci-delivery-2 fs-4 me-3"></i>
                         Reliable Logistics
                        </div>
                        <p class="mb-0">Our verified riders handle deliveries for you. Focus on your products while we handle the last mile.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item -->
                  <div class="swiper-slide w-auto h-auto">
                    <div class="card h-100 rounded-4 px-3" style="max-width: 306px">
                      <div class="card-body py-5 px-3">
                        <div class="h4 h5 d-flex align-items-center">
                          <i class="ci-bar-chart fs-4 me-3"></i>
                          
                          Growth Analytics
                        </div>
                        <p class="mb-0">Track your sales, revenue, and customer behavior with detailed analytics. Make data-driven decisions to grow faster.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item -->
                  <div class="swiper-slide w-auto h-auto">
                    <div class="card h-100 rounded-4 px-3" style="max-width: 306px">
                      <div class="card-body py-5 px-3">
                        <div class="h4 h5 d-flex align-items-center">
                            <i class="ci-headphones-2 fs-4 me-3"></i>
                
                          Dedicated Support
                        </div>
                        <p class="mb-0">Get help when you need it. Our seller support team is ready to assist you with any questions or issues.</p>
                      </div>
                    </div>
                  </div>

                  <!-- Item -->
                  <div class="swiper-slide w-auto h-auto">
                    <div class="card h-100 rounded-4 px-3" style="max-width: 306px">
                      <div class="card-body py-5 px-3">
                        <div class="h4 h5 d-flex align-items-center">
                            <i class="ci-percent fs-4 me-3"></i>
                        Low Fees
                        </div>
                        <p class="mb-0">Competitive commission rates that let you keep more of your earnings. Transparent pricing with no hidden charges.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

            <!-- Stats -->
      <section class="container py-5 mt-md-2 mt-lg-4">
        <div class="row row-cols-2 row-cols-md-4 g-4">
          <div class="col text-center">
            <div class="display-4 text-dark-emphasis mb-2">10k</div>
            <p class="fs-sm mb-0">Active Sellers</p>
          </div>
          <div class="col text-center">
            <div class="display-4 text-dark-emphasis mb-2">500k</div>
            <p class="fs-sm mb-0">Products Listed</p>
          </div>
          <div class="col text-center">
            <div class="display-4 text-dark-emphasis mb-2">2M+</div>
            <p class="fs-sm mb-0">Customers Reached </p>
          </div>
          <div class="col text-center">
            <div class="display-4 text-dark-emphasis mb-2">₦500M+</div>
            <p class="fs-sm mb-0">Seller Earnings</p>
          </div>
        </div>
      </section>

       <section class="container py-5">
        <div class="row py-1 py-sm-2 py-md-3 py-lg-4 py-xl-5">
          <div class="col-md-4 col-xl-3 mb-4 mb-md-0" style="margin-top: -120px">
            <div class="sticky-md-top text-center text-md-start pe-md-4 pe-lg-5 pe-xl-0" style="padding-top: 120px;">
              <h2>Frequently Asked Questions</h2>
              <p class="pb-2 pb-md-3">Everything you need to know about selling on Evarpex</p>
            </div>
          </div>
          <div class="col-md-8 offset-xl-1">

            <!-- Accordion of questions -->
            <div class="accordion" id="faq">

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-1">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-1" aria-expanded="false" aria-controls="faqCollapse-1">
                    <span class="me-2">How do I become a seller?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-1" aria-labelledby="faqHeading-1" data-bs-parent="#faq">
                  <div class="accordion-body">Register as a seller, complete the verification process by providing required documents, and wait for approval. Once approved, you can start listing your products.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-2">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-2" aria-expanded="false" aria-controls="faqCollapse-2">
                    <span class="me-2">How do I create a seller account?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-2" aria-labelledby="faqHeading-2" data-bs-parent="#faq">
                  <div class="accordion-body">To become a seller, register for an account and complete the seller verification process. You'll need to provide identification documents and business information. Once verified, you can start listing your products and managing your store.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-3">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-3" aria-expanded="false" aria-controls="faqCollapse-3">
                    <span class="me-2">What documents do I need to become a seller?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-3" aria-labelledby="faqHeading-3" data-bs-parent="#faq">
                  <div class="accordion-body">You need a valid ID, business registration certificate (if applicable), bank account details, and tax identification number. Additional documents may be required based on your business type.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-4">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-4" aria-expanded="false" aria-controls="faqCollapse-4">
                    <span class="me-2">How do I list a product for sale?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-4" aria-labelledby="faqHeading-4" data-bs-parent="#faq">
                  <div class="accordion-body">After logging into your seller account, click "Sell" or "Add Product" from your dashboard. Fill in all required information including product title, description, price, category, and upload clear photos. Make sure your listing is accurate and complete.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-5">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-5" aria-expanded="false" aria-controls="faqCollapse-5">
                    <span class="me-2">How do I list my products?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-5" aria-labelledby="faqHeading-5" data-bs-parent="#faq">
                  <div class="accordion-body">Go to your seller dashboard, click "Add Product", fill in product details including title, description, price, and images, then submit for review.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-6">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-6" aria-expanded="false" aria-controls="faqCollapse-6">
                    <span class="me-2">What are the fees for selling on Evarpex?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-6" aria-labelledby="faqHeading-6" data-bs-parent="#faq">
                  <div class="accordion-body">Evarpex charges a small commission on successful sales. The exact fee structure varies by category and can be found in your seller dashboard. There are no upfront fees to list products - you only pay when you make a sale.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-7">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-7" aria-expanded="false" aria-controls="faqCollapse-7">
                    <span class="me-2">What are the seller fees?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-7" aria-labelledby="faqHeading-7" data-bs-parent="#faq">
                  <div class="accordion-body">We charge a small commission on each sale, typically 5-10% depending on the product category. There are no upfront fees to start selling.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-8">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-8" aria-expanded="false" aria-controls="faqCollapse-8">
                    <span class="me-2">How do I manage my product listings?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-8" aria-labelledby="faqHeading-8" data-bs-parent="#faq">
                  <div class="accordion-body">Access your seller dashboard to manage all your listings. You can edit product details, update prices, mark items as sold, or remove listings. You can also view analytics about your listings' performance and customer inquiries.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-9">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-9" aria-expanded="false" aria-controls="faqCollapse-9">
                    <span class="me-2">How do I manage my inventory?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-9" aria-labelledby="faqHeading-9" data-bs-parent="#faq">
                  <div class="accordion-body">Use the inventory management section in your seller dashboard to update stock levels, prices, and product information in real-time.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-10">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-10" aria-expanded="false" aria-controls="faqCollapse-10">
                    <span class="me-2">How do I handle customer inquiries?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-10" aria-labelledby="faqHeading-10" data-bs-parent="#faq">
                  <div class="accordion-body">Customer messages will appear in your seller dashboard under "Messages" or "Inquiries". Respond promptly and professionally to build trust with potential buyers. You can also set up automated responses for common questions</div>
                </div>
              </div>

                 <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-10">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-10" aria-expanded="false" aria-controls="faqCollapse-10">
                    <span class="me-2">When do I get paid?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-10" aria-labelledby="faqHeading-10" data-bs-parent="#faq">
                  <div class="accordion-body">Payments are processed weekly and transferred to your registered bank account. You can also request immediate payment for a small fee.</div>
                </div>
              </div>

                 <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-11">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-11" aria-expanded="false" aria-controls="faqCollapse-11">
                    <span class="me-2">Can I promote my products?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-11" aria-labelledby="faqHeading-11" data-bs-parent="#faq">
                  <div class="accordion-body">Yes, Evarpex offers various promotion options including featured listings, sponsored posts, and premium placement. These options help increase visibility for your products and can lead to more sales. Check your seller dashboard for available promotion packages.</div>
                </div>
              </div>

                 <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-12">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-12" aria-expanded="false" aria-controls="faqCollapse-12">
                    <span class="me-2">How do I handle customer complaints?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-12" aria-labelledby="faqHeading-12" data-bs-parent="#faq">
                  <div class="accordion-body">Respond to customer messages promptly, address issues professionally, and work with our support team to resolve disputes fairly.</div>
                </div>
              </div>
                 <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-13">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-13" aria-expanded="false" aria-controls="faqCollapse-13">
                    <span class="me-2">Can I promote my products?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-13" aria-labelledby="faqHeading-13" data-bs-parent="#faq">
                  <div class="accordion-body">Yes, we offer various promotional tools including featured listings, banner ads, and sponsored products to help increase your visibility.</div>
                </div>
              </div>

                 <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-14">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-14" aria-expanded="false" aria-controls="faqCollapse-14">
                    <span class="me-2">How do I handle customer complaints?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-14" aria-labelledby="faqHeading-14" data-bs-parent="#faq">
                  <div class="accordion-body">Address customer complaints promptly and professionally. Listen to their concerns, offer solutions, and work towards resolution. If you can't resolve the issue, contact our support team for mediation. Good customer service builds your reputation.</div>
                </div>
              </div>

                 <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-15">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-15" aria-expanded="false" aria-controls="faqCollapse-15">
                    <span class="me-2">Can I sell services on Evarpex?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-9" aria-labelledby="faqHeading-9" data-bs-parent="#faq">
                  <div class="accordion-body">Yes, Evarpex supports both product and service listings. When listing services, clearly describe what you offer, pricing, duration, and any requirements. Make sure to set clear expectations with customers.</div>
                </div>
              </div>
                  <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-16">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-16" aria-expanded="false" aria-controls="faqCollapse-16">
                    <span class="me-2">How do I optimize my product listings?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-9" aria-labelledby="faqHeading-9" data-bs-parent="#faq">
                  <div class="accordion-body">Use clear, high-quality photos, write detailed descriptions with relevant keywords, set competitive prices, and respond quickly to inquiries. Keep your listings updated and consider using our promotion features to increase visibility.</div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>

      <section class="container pt-3 pt-sm-4 mb-4">
        <div class="position-relative">
          <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none-dark rtl-flip" style="background: linear-gradient(-90deg, #accbee 0%, #e7f0fd 100%)"></span>
          <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none d-block-dark rtl-flip" style="background: linear-gradient(-90deg, #1b273a 0%, #1f2632 100%)"></span>
          <div class="row align-items-center position-relative z-1">
            <div class="col-lg-7 col-xl-5 offset-xl-1 py-5">
              <div class="px-4 px-sm-5 px-xl-0 pe-lg-4">
                <h1 class="text-center text-sm-start mb-4">Ready to Start Your Selling Journey?</h1>
               <p class="pb-2 pb-md-3">Join Evarpex today and turn your products into profit!</p>
              <a class="btn btn-lg btn-primary" href="{{ route('shops.create') }}" wire:navigate>Register as a seller</a>
              </div>
            </div>
            <div class="col-lg-5 offset-xl-1 d-none d-lg-block">
              <div class="ratio rtl-flip" style="--cz-aspect-ratio: calc(356 / 526 * 100%)">
                <img src="{{ asset('asset/img/35.png')}}" class="d-none-dark" alt="Image">

              </div>
            </div>
          </div>
        </div>
      </section>
@endsection