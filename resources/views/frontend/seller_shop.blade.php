@extends('frontend.layouts.web')

@section('meta_title'){{ $shop->meta_title }}@stop

@section('meta_description'){{ $shop->meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $shop->meta_title }}">
    <meta itemprop="description" content="{{ $shop->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($shop->logo) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="website">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $shop->meta_title }}">
    <meta name="twitter:description" content="{{ $shop->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($shop->meta_img) }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $shop->meta_title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('shop.visit', $shop->slug) }}" />
    <meta property="og:image" content="{{ uploaded_asset($shop->logo) }}" />
    <meta property="og:description" content="{{ $shop->meta_description }}" />
    <meta property="og:site_name" content="{{ $shop->name }}" />
@endsection

@section('content')
   <header class="navbar navbar-expand-lg bg-body shadow px-0">
  <div class="container py-1">
    <nav class="collapse navbar-collapse" id="navbarCollapse1">
      <ul class="navbar-nav pt-2 pt-lg-0 me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('shop.visit', $shop->slug) }}" wire:navigate>Store Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('shop.visit.type', ['slug'=>$shop->slug, 'type'=>'top-selling']) }}" wire:navigate>Top Selling</a>
        </li>

          <li class="nav-item">
          <a class="nav-link" href="{{ route('shop.visit.type', ['slug'=>$shop->slug, 'type'=>'cupons']) }}" wire:navigate>Coupons</a>
        </li>

         <li class="nav-item">
          <a class="nav-link" href="{{ route('shop.visit.type', ['slug'=>$shop->slug, 'type'=>'all-products']) }}" wire:navigate>All Products</a>
        </li>
       
      </ul>
    
    </nav>
  </div>
</header>

   @php
        $followed_sellers = [];
        if (Auth::check()) {
            $followed_sellers = get_followed_sellers();
        }
    @endphp
  @if (!isset($type) || $type == 'top-selling' || $type == 'cupons')
    @if ($shop->top_banner_image)
        <section class="container mb-3 pt-4">
            <div class="position-relative rounded-5 overflow-hidden mb-4 h-160px h-md-200px h-lg-300px w-100">
                <a href="{{ $shop->top_banner_link }}" wire:navigate class="d-block h-100">
                    <img
                        class="d-block w-100 h-100 img-fit lazyload"
                        src="{{ uploaded_asset($shop->top_banner_image) }}"
                        data-src="{{ uploaded_asset($shop->top_banner_image) }}"
                        alt="{{ env('APP_NAME') }} offer"
                    >
                </a>
            </div>
        </section>
    @endif
@endif
   <section class="@if (!isset($type) || $type == 'top-selling' || $type == 'cupons') mb-3 @endif border-top border-bottom" style="background: #fcfcfd;">
        <div class="container">
            <!-- Seller Info -->
            <div class="py-4">
                <div class="row justify-content-md-between align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="d-flex align-items-center">
                            <!-- Shop Logo -->
                            <a href="{{ route('shop.visit', $shop->slug) }}" class="overflow-hidden size-64px rounded-content" style="border: 1px solid #e5e5e5;
                                box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.06);min-width: fit-content;">
                                <img class="lazyload h-64px  mx-auto"
                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($shop->logo) }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                            </a>
                            <div class="ml-3">
                                <!-- Shop Name & Verification Status -->
                                <a href="{{ route('shop.visit', $shop->slug) }}"
                                    class="text-dark d-block fs-16 fw-700">
                                    {{ $shop->name }}
                                    @if ($shop->verification_status == 1)
                                        <span class="ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="17.5" viewBox="0 0 17.5 17.5">
                                                <g id="Group_25616" data-name="Group 25616" transform="translate(-537.249 -1042.75)">
                                                    <path id="Union_5" data-name="Union 5" d="M0,8.75A8.75,8.75,0,1,1,8.75,17.5,8.75,8.75,0,0,1,0,8.75Zm.876,0A7.875,7.875,0,1,0,8.75.875,7.883,7.883,0,0,0,.876,8.75Zm.875,0a7,7,0,1,1,7,7A7.008,7.008,0,0,1,1.751,8.751Zm3.73-.907a.789.789,0,0,0,0,1.115l2.23,2.23a.788.788,0,0,0,1.115,0l3.717-3.717a.789.789,0,0,0,0-1.115.788.788,0,0,0-1.115,0l-3.16,3.16L6.6,7.844a.788.788,0,0,0-1.115,0Z" transform="translate(537.249 1042.75)" fill="#3490f3"/>
                                                </g>
                                            </svg>
                                        </span>
                                    @else
                                        <span class="ml-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="17.5" viewBox="0 0 17.5 17.5">
                                                <g id="Group_25616" data-name="Group 25616" transform="translate(-537.249 -1042.75)">
                                                    <path id="Union_5" data-name="Union 5" d="M0,8.75A8.75,8.75,0,1,1,8.75,17.5,8.75,8.75,0,0,1,0,8.75Zm.876,0A7.875,7.875,0,1,0,8.75.875,7.883,7.883,0,0,0,.876,8.75Zm.875,0a7,7,0,1,1,7,7A7.008,7.008,0,0,1,1.751,8.751Zm3.73-.907a.789.789,0,0,0,0,1.115l2.23,2.23a.788.788,0,0,0,1.115,0l3.717-3.717a.789.789,0,0,0,0-1.115.788.788,0,0,0-1.115,0l-3.16,3.16L6.6,7.844a.788.788,0,0,0-1.115,0Z" transform="translate(537.249 1042.75)" fill="red"/>
                                                </g>
                                            </svg>
                                        </span>
                                    @endif
                                </a>
                                <!-- Ratting -->
                                <div class="d-flex gap-1 fs-sm">
                                    {{ renderStarRating($shop->rating) }}
                                    <span class="opacity-60 fs-12">({{ $shop->num_of_reviews }}
                                        {{ translate('Reviews') }})</span>
                                </div>
                                <!-- Address -->
                                <div class="location fs-12 opacity-70 text-dark mt-1">{{ $shop->address }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col pl-5 pl-md-0 ml-5 ml-md-0">
                        <div class="d-lg-flex align-items-center justify-content-lg-end">
                            <div class="d-md-flex justify-content-md-end align-items-md-baseline">
                                <!-- Member Since -->
                                <div class="pr-md-3 mt-2 mt-md-0 border-md-right">
                                    <div class="fs-10 fw-400 text-secondary">{{ translate('Member Since') }}</div>
                                    <div class="mt-1 fs-16 fw-700 text-secondary">{{ date('d M Y',strtotime($shop->created_at)) }}</div>
                                </div>
                                <!-- Social Links -->
                                @if ($shop->facebook || $shop->instagram || $shop->google || $shop->twitter || $shop->youtube)
                                    <div class="pl-md-3 pr-lg-3 mt-2 mt-md-0 border-lg-right">
                                        <span class="fs-10 fw-400 text-secondary">{{ translate('Social Media') }}</span><br>
                                        <ul class="social-md colored-light list-inline mb-0 mt-1">
                                            @if ($shop->facebook)
                                            <li class="list-inline-item mr-2">
                                                <a href="{{ $shop->facebook }}" class="facebook"
                                                    target="_blank">
                                                    <i class="lab la-facebook-f"></i>
                                                </a>
                                            </li>
                                            @endif
                                            @if ($shop->instagram)
                                            <li class="list-inline-item mr-2">
                                                <a href="{{ $shop->instagram }}" class="instagram"
                                                    target="_blank">
                                                    <i class="lab la-instagram"></i>
                                                </a>
                                            </li>
                                            @endif
                                            @if ($shop->google)
                                            <li class="list-inline-item mr-2">
                                                <a href="{{ $shop->google }}" class="google"
                                                    target="_blank">
                                                    <i class="lab la-google"></i>
                                                </a>
                                            </li>
                                            @endif
                                            @if ($shop->twitter)
                                            <li class="list-inline-item mr-2">
                                                <a href="{{ $shop->twitter }}" class="twitter"
                                                    target="_blank">
                                                    <i class="lab la-twitter"></i>
                                                </a>
                                            </li>
                                            @endif
                                            @if ($shop->youtube)
                                            <li class="list-inline-item">
                                                <a href="{{ $shop->youtube }}" class="youtube"
                                                    target="_blank">
                                                    <i class="lab la-youtube"></i>
                                                </a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <!-- follow -->
                            <div class="d-flex justify-content-md-end pl-lg-3 pt-3 pt-lg-0">
                                @php $shopFollowers = count($shop->followers) + $shop->custom_followers; @endphp
                                @if(in_array($shop->id, $followed_sellers))
                                    <a href="{{ route("followed_seller.remove", ['id'=>$shop->id]) }}"  data-toggle="tooltip" data-title="{{ translate('Unfollow Seller') }}" data-placement="top"
                                        class="btn btn-success d-flex align-items-center justify-content-center fs-12 w-190px follow-btn followed"
                                        style="height: 40px; border-radius: 30px !important; justify-content: center;">
                                        <i class="las la-check fs-16 mr-2"></i>
                                        <span class="fw-700">{{ translate('Followed') }}</span> &nbsp; ({{ $shopFollowers }})
                                    </a>
                                @else
                                    <a href="{{ route("followed_seller.store", ['id'=>$shop->id]) }}"
                                        class="btn btn-primary d-flex align-items-center justify-content-center fs-12 w-190px follow-btn"
                                        style="height: 40px; border-radius: 30px !important; justify-content: center;">
                                        <i class="las la-plus fs-16 mr-2"></i>
                                        <span class="fw-700">{{ translate('Follow Seller') }}</span> &nbsp; ({{ $shopFollowers }})
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



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
