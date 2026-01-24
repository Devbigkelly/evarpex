@extends('frontend.layouts.web')
@section('content')
    <main class="content-wrapper">
      <div class="container py-5 mt-n2 mt-sm-0">
        <div class="row pt-md-2 pt-lg-3 pb-sm-2 pb-md-3 pb-lg-4 pb-xl-5">
            @include('frontend.components.customer_side')
            @yield('panel_content')
      </div>
     </div>
    </main>
@endsection