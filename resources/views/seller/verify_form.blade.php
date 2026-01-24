@extends('seller.layouts.app')

@section('panel_content')
    <div class="aiz-titlebar mt-2 mb-4">
      <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{ translate('Shop Verification')}}
                <a href="{{ route('shop.visit', $shop->slug) }}" class="btn btn-link btn-sm" target="_blank">({{ translate('Visit Store')}})<i class="la la-external-link"></i>)</a>
            </h1>
        </div>
      </div>
    </div>
    <form class="" action="{{ route('seller.shop.verify.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 h6">{{ translate('Verification info')}}</h4>
            </div>

            <div class="row">
    <div class="col-md-2">
        <label>{{ translate('Business Type') }}</label>
    </div>
    <div class="col-md-10">
        <select class="form-control" name="business_type" required>
            <option value="unregistered">Unregistered Business</option>
            <option value="registered">Registered Business (CAC)</option>
        </select>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-2">
        <label>{{ translate('Verification Method') }}</label>
    </div>
    <div class="col-md-10">
        <select class="form-control" name="verification_method" required>
            <option value="nin">NIN</option>
            <option value="nin_phone">NIN Phone</option>
            <option value="cac">CAC</option>
        </select>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-2">
        <label>{{ translate('Verification Value') }}</label>
    </div>
    <div class="col-md-10">
        <input type="text" class="form-control" name="verification_value" required>
    </div>
</div>

      
            <div class="card-body">
               
                <div class="text-right mt-4">
                    <button type="submit" class="btn btn-primary">{{ translate('Apply')}}</button>
                </div>
            </div>
        </div>
    </form>
@endsection
