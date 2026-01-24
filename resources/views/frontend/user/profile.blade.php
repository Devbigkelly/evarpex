@extends('frontend.layouts.user')

@section('panel_content')
    <div class="col-lg-9 pt-2 pt-xl-3">

            <!-- Page title -->
            <h1 class="h2 pb-1 pb-sm-2 pb-md-3">Profile</h1>

            <!-- Nav tabs -->
            <div class="overflow-auto mb-3">
              <ul class="nav nav-pills flex-nowrap gap-2 text-nowrap pb-3" role="tablist">
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link active" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile" role="tab" aria-controls="profile" aria-selected="true">
                    Profile
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" id="security-tab" data-bs-toggle="pill" data-bs-target="#security" role="tab" aria-controls="security" aria-selected="false">
                    Security
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" id="payment-tab" data-bs-toggle="pill" data-bs-target="#payment" role="tab" aria-controls="payment" aria-selected="false">
                    Addresses
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" id="notifications-tab" data-bs-toggle="pill" data-bs-target="#notifications" role="tab" aria-controls="notifications" aria-selected="false">
                    Notifications
                  </button>
                </li>
              </ul>
            </div>


            <!-- Tabs content -->
            <div class="tab-content">

              <!-- Profile tab -->
              <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <!-- Avatar -->
                <div class="d-flex align-items-start align-items-sm-center pb-3 mb-3">
                  <div class="ratio ratio-1x1 hover-effect-opacity border rounded-circle overflow-hidden" style="width: 112px">
                 @php
    $user = Auth::user();

    $nameParts = explode(' ', trim($user->name));
    $initials = strtoupper(
        ($nameParts[0][0] ?? '') .
        ($nameParts[1][0] ?? '')
    );
@endphp

@if(!empty($user->avatar_original))
    <img src="{{ $user->avatar_original }}" alt="Avatar" class="rounded-circle" width="40" height="40">
@else
    <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
         style="width:100px;height:100px;font-weight:600;">
        {{ $initials }}
    </div>
@endif

                    <div class="hover-effect-target position-absolute top-0 start-0 d-flex align-items-center justify-content-center w-100 h-100 opacity-0">
                      <button type="button" class="btn btn-icon btn-sm btn-light position-relative z-2" aria-label="Remove">
                        <i class="ci-trash fs-base"></i>
                      </button>
                      <span class="position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 z-1"></span>
                    </div>
                  </div>
                  <div class="ps-3 ps-sm-4">
                    <p class="fs-sm" style="max-width: 400px">Your profile picture will appear on your profile and listings. PNG or JPG no bigger than 500px wide and tall.</p>
                    <input type="file" name="photo" type="button" class="btn btn-sm btn-secondary animate-rotate rounded-pill">
                      <i class="ci-refresh-ccw animate-target fs-sm ms-n1 me-2"></i>
                      Update picture
                  </div>
                </div>

                <!-- Settings form -->
                <form class="needs-validation" novalidate="">
                  <div class="row row-cols-1 row-cols-sm-2 g-4 mb-4">
                    <div class="col position-relative">
                      <label for="fn" class="form-label fs-base">First name</label>
                      <input type="text" class="form-control form-control-lg rounded-pill" id="fn" value="{{ collect(explode(' ', Auth::user()->name))->first() }}" required="" disabled>
                    </div>
                    <div class="col position-relative">
                      <label for="ln" class="form-label fs-base">Last name</label>
                      <input type="text" class="form-control form-control-lg rounded-pill" id="ln" value="{{ collect(explode(' ', Auth::user()->name))->skip(1)->join(' ') }}" required="" disabled>
                      <div class="invalid-tooltip bg-transparent p-0">Enter your last name!</div>
                    </div>
                    <div class="col position-relative">
                      <label for="email" class="form-label d-flex align-items-center fs-base">Email address <span class="badge text-danger bg-danger-subtle ms-2">Verify email</span></label>
                      <input type="email" class="form-control form-control-lg rounded-pill" id="email" value="{{ Auth::user()->email }}" required="">
                      <div class="invalid-tooltip bg-transparent p-0">Enter a valid email address!</div>
                    </div>
                    <div class="col">
                      <label for="display-name" class="form-label fs-base">Phone</label>
                      <input type="text" class="form-control form-control-lg form-icon-end rounded-pill" id="display-name" value="{{ Auth::user()->phone }}">
                    </div>
                  </div>
              
                </form>
              </div>


              <!-- Security tab -->
              <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">

                <!-- Change password form -->
                  <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
          
         
            <!-- Password-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label fs-14">{{ translate('Your Password') }}</label>
                <div class="col-md-10">
                    <input type="password" class="form-control rounded-0" placeholder="{{ translate('New Password') }}" name="new_password">
                </div>
            </div>
            <!-- Confirm Password-->
            <div class="form-group row">
                <label class="col-md-2 col-form-label fs-14">{{ translate('Confirm Password') }}</label>
                <div class="col-md-10">
                    <input type="password" class="form-control rounded-0" placeholder="{{ translate('Confirm Password') }}" name="confirm_password">
                </div>
            </div>
            <!-- Submit Button-->
            <div class="form-group mb-0 text-right">
                <button type="submit" class="btn btn-primary rounded-0 w-150px mt-3">{{translate('Update Profile')}}</button>
            </div>
        </form>
               


              <!-- Payment methods tab -->
              <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 g-md-4 g-lg-3 g-xl-4">
                  
                 <div class="col-lg-12">
            <div class="ps-lg-3 ps-xl-0">

              <!-- Page title -->
              <h1 class="h2 mb-1 mb-sm-2">Addresses</h1>

              <!-- Primary shipping address -->
                @foreach (Auth::user()->addresses as $key => $address)
              <div class="border-bottom py-4">
                <div class="nav flex-nowrap align-items-center justify-content-between pb-1 mb-3">
                  <div class="d-flex align-items-center gap-3 me-4">
                    <h2 class="h6 mb-0">Delivery address</h2>
                     @if ($address->set_default)
                    <span class="badge text-bg-info rounded-pill">Primary</span>
                    @else
                     <a href="{{ route('addresses.set_default', $address->id) }}" wire:navigate class="badge text-bg-info rounded-pill">Make Primary</span>
                    @endif
                  </div>
                  
                  <a class="nav-link hiding-collapse-toggle text-decoration-underline p-0 collapsed" href="-7.html" data-bs-toggle="collapse" aria-expanded="false" aria-controls="primaryAddressPreview primaryAddressEdit">Edit</a>
                </div>
                <div class="collapse primary-address show" id="primaryAddressPreview">
                  <ul class="list-unstyled fs-sm m-0">
                    <li>{{ $address->address }}</li>
                    <li>{{ $address->postal_code }}</li>
                     @if ($address->area)
                    <li>{{ optional($address->area)->name }}</li>
                    @endif
                    <li>{{ optional($address->city)->name }}</li>
                      @if (get_setting('has_state') == 1)
                    <li>{{ optional($address->state)->name }}</li>
                    @endif
                    <li>{{ optional($address->country)->name }}</li>
                    <li>{{ $address->phone }}</li>
                
                  </ul>
                </div>
                
              </div>
              @endforeach


              <!-- Add address button -->
              <div class="nav pt-4">
                <a class="nav-link animate-underline fs-base px-0" href="#newAddressModal" data-bs-toggle="modal" role="button">
               <i class="ci-plus fs-lg ms-n1 me-2"></i>
              <span class="animate-target">Add address</span>
               </a>

              </div>
            </div>
          </div>
                 
                </div>
              </div>

              <!----modals---->
              <div class="modal fade" id="newAddressModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Add New Address') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
            <form class="form-default" role="form"
                  action="{{ route('addresses.store') }}"
                  method="POST">
                @csrf

                <div class="modal-body c-scrollbar-light">

                    <div class="p-3">

                        <!-- Address -->
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">{{ translate('Address') }}</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control"
                                    placeholder="{{ translate('Your Address') }}"
                                    rows="2"
                                    name="address"
                                    required></textarea>
                            </div>
                        </div>

                        @if (get_active_countries()->count() > 1)
                        <!-- Country -->
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">{{ translate('Country') }}</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control aiz-selectpicker"
                                        data-live-search="true"
                                        name="country_id"
                                        required>
                                    <option value="">{{ translate('Select your country') }}</option>
                                    @foreach (get_active_countries() as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @else
                            <input type="hidden" name="country_id" value="{{ get_active_countries()[0]->id }}">
                        @endif

                        @if (get_setting('has_state') == 1)
                        <!-- State -->
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">{{ translate('State') }}</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control aiz-selectpicker"
                                        data-live-search="true"
                                        name="state_id"
                                        required></select>
                            </div>
                        </div>
                        @endif

                        <!-- City -->
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">{{ translate('City') }}</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control aiz-selectpicker"
                                        data-live-search="true"
                                        name="city_id"
                                        required></select>
                            </div>
                        </div>

                        <!-- Area -->
                        <div class="row mb-3 area-field d-none">
                            <div class="col-md-3">
                                <label class="form-label">{{ translate('Area') }}</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control aiz-selectpicker"
                                        data-live-search="true"
                                        name="area_id"></select>
                            </div>
                        </div>

                        @if (get_setting('google_map') == 1)
                        <!-- Google Map -->
                        <div class="mb-3">
                            <input id="searchInput" class="form-control mb-2"
                                   type="text"
                                   placeholder="{{ translate('Enter a location') }}">
                            <div id="map" style="height: 300px;"></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label>{{ translate('Longitude') }}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="longitude" name="longitude" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label>{{ translate('Latitude') }}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="latitude" name="latitude" readonly>
                            </div>
                        </div>
                        @endif

                        <!-- Postal Code -->
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">{{ translate('Postal code') }}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text"
                                    class="form-control"
                                    name="postal_code"
                                    required>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">{{ translate('Phone') }}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="tel"
                                       id="phone-code"
                                       class="form-control"
                                       name="phone"
                                       required>
                                <input type="hidden" name="country_code">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        {{ translate('Cancel') }}
                    </button>

                    <button type="submit"
                            class="btn btn-primary">
                        {{ translate('Save Address') }}
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>



              <!-- Notifications tab -->
              <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
               Coming soon
              </div>
            </div>
          </div>

@endsection

@section('modal')
<!-- Address modal -->
@include('frontend.partials.address.address_modal')
@endsection

@section('script')
@include('frontend.partials.address.address_js')

<script type="text/javascript">
    $('.new-email-verification').on('click', function() {
        $(this).find('.loading').removeClass('d-none');
        $(this).find('.default').addClass('d-none');
        var email = $("input[name=email]").val();

        $.post('{{ route('user.email.update.verify.code') }}', {
                _token: '{{ csrf_token() }}',
                email: email
            },
            function(data) {
                data = JSON.parse(data);
                $('.default').removeClass('d-none');
                $('.loading').addClass('d-none');
                if (data.status == 2){
                    AIZ.plugins.notify('warning', data.message);
                }
                else if (data.status == 1){
                    AIZ.plugins.notify('success', data.message);
                    $('input[name="code"]').prop('disabled', false);
                    $('button[type="submit"]').prop('disabled', false);
                }
                else{
                    AIZ.plugins.notify('danger', data.message);
                }
            });
    });

    $(document).ready(function() {
        @if(get_setting('has_state') == 1)
            get_states(@json(get_active_countries()[0]->id));
        @else
            get_city_by_country(@json(get_active_countries()[0]->id));
        @endif
    });
</script>

@if (get_setting('google_map') == 1)
@include('frontend.partials.google_map')
@endif

@endsection