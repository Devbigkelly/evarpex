@extends('frontend.layouts.user')

@section('panel_content')
      <!-- Dashboard content -->
          <div class="col-lg-9 pt-2 pt-xl-3">

            <!-- Header -->
            <div class="d-flex align-items-center justify-content-between gap-3 pb-3 mb-2 mb-md-3">
              <h1 class="h2 mb-0">My Wallet</h1>
            
            </div>

            <!-- Stats -->
            <div class="row g-3 g-xl-4 pb-3 mb-2 mb-sm-3">
              <div class="col-md-6 col-sm-6">
                <div class="h-100 bg-success-subtle rounded-4 text-center p-4">
                    <i class="ci-credit-card"></i>
                  <h2 class="fs-sm pb-2 mb-1">Wallet Balance</h2>
                  <div class="h2 pb-1 mb-2">{{ single_price(Auth::user()->balance) }}</div>
                  
                </div>
              </div>
              
              <div class="col-md-6 col-sm-12">
    <div
        class="h-100 bg-warning-subtle rounded-4 text-center p-4 cursor-pointer"
        data-bs-toggle="modal"
        data-bs-target="#wallet_modal"
        role="button"
    >
        <i class="ci-credit-card"></i>
        <div class="h2 pb-1 mb-2">Recharge Wallet</div>
        
    </div>
</div>

            </div>

            <div class="modal fade" id="wallet_modal" tabindex="-1" aria-labelledby="walletModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="walletModalLabel">
                    {{ translate('Recharge Wallet') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- MODAL BODY -->
            <div class="modal-body gry-bg px-3 pt-3">
                <form action="{{ route('wallet.recharge') }}" method="post">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">
                                {{ translate('Payment Method') }}
                                <span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <select
                                class="form-control selectpicker"
                                name="payment_option"
                                data-live-search="true"
                                required
                            >
                                @include('partials.online_payment_options')
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">
                                {{ translate('Amount') }}
                                <span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <input
                                type="number"
                                name="amount"
                                class="form-control"
                                placeholder="{{ translate('Amount') }}"
                                required
                            >
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-sm">
                            {{ translate('Confirm') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

              <!-- Sales content -->
          <div class="col-lg-12 pt-2 pt-xl-3">
            <div data-filter-list="{&quot;searchClass&quot;: &quot;product-search&quot;, &quot;listClass&quot;: &quot;product-list&quot;, &quot;sortClass&quot;: &quot;product-sort&quot;, &quot;valueNames&quot;: [&quot;product&quot;, &quot;date&quot;, &quot;tendered&quot;, &quot;earning&quot;]}">

              <!-- Header -->
              <div class="d-md-flex align-items-center justify-content-between gap-3 pb-2 pb-sm-3 mb-md-2">
                <h1 class="h2 mb-md-0">History</h1>
              
              </div>

              <!-- Sales list (table) -->
              <table class="table align-middle fs-sm mb-0">
                <thead>
                  <tr>
                    <th class="ps-0" scope="col">
                      <span class="fw-normal text-body">#</span>
                    </th>
                    <th class="ps-0" scope="col">
                      <span class="fw-normal text-body">Date</span>
                    </th>
                    <th class="ps-0" scope="col">
                      <span class="fw-normal text-body">Amount</span>
                    </th>
                    <th class="ps-0" scope="col">
                      <span class="fw-normal text-body">Payment Method</span>
                    </th>
                    <th class="ps-0" scope="col">
                      <span class="fw-normal text-body">Status</span>
                    </th>
            
                  </tr>
                </thead>
                <tbody class="product-list">


                  <!-- Item -->
                     @foreach ($wallets as $key => $wallet)
                  <tr>
                  <td class="earning">{{ sprintf('%02d', ($key+1)) }}</td>
                  <td class="earning">{{ date('d-m-Y', strtotime($wallet->created_at)) }}</td>
                  <td class="earning">{{ single_price($wallet->amount) }}</td>
                  <td class="earning">{{ ucfirst(str_replace('_', ' ', $wallet->payment_method)) }}</td>
                  <td class="earning">@if ($wallet->approval)
                                        <span class="badge badge-inline badge-success p-3 fs-12" style="border-radius: 25px; min-width: 80px !important;">{{ translate('Approved') }}</span>
                                    @else
                                        <span class="badge badge-inline badge-info p-3 fs-12" style="border-radius: 25px; min-width: 80px !important;">{{ translate('Pending') }}</span>
                                    @endif</td>
                   
                  </tr>
                  @endforeach

                </tbody>
              </table>

              <!-- Pagination -->
              <div class="d-flex align-items-center justify-content-between pt-4 gap-3">
                
                <nav aria-label="Pagination">
                 {{ $wallets->links() }}
                </nav>
              </div>
            </div>
          </div>
 
          </div>
@endsection

@section('modal')
    <!-- Wallet Recharge Modal -->
    @include('frontend.partials.wallet_modal')

  

@endsection

@section('script')
    <script type="text/javascript">
        function show_wallet_modal() {
            $('#wallet_modal').modal('show');
        }
    </script>
@endsection
