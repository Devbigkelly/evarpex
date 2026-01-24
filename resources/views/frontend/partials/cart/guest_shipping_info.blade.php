<div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4 mb-4">
    <!-- Name -->
    <div class="col">
            <label class="form-label">{{ translate('Name')}}</label>
            <input class="form-control form-control-lg" placeholder="{{ translate('Your Name')}}" rows="2" name="name" required></input>
    </div>

    <!-- Email -->
    <div class="col">
            <label class="form-label">{{ translate('Email')}}</label>
        
       
            <input type="email" class="form-control form-control-lg" placeholder="{{ translate('Your Email')}}" name="email" value="" required>
       
    </div>

    <!-- Address -->
    <div class="col">
      
            <label class="form-label">{{ translate('Address')}} </label>
            <textarea class="form-control form-control-lg" placeholder="{{ translate('Your Address')}}" rows="2" name="address" required></textarea>
       
    </div>

    <!-- Country -->
    @if (get_active_countries()->count() > 1)
    <div class="col">
            <label class="form-label">{{ translate('Country')}}</label>
                <select class="form-select @if (get_setting('shipping_type') == 'carrier_wise_shipping') onchange="updateDeliveryAddress(this.value)" @endif
                    data-live-search="true" data-placeholder="{{ translate('Select your country') }}" name="country_id" required>
                    <option value="">{{ translate('Select your country') }}</option>
                    @foreach (get_active_countries() as $key => $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
    </div>
    @elseif(get_active_countries()->count() == 1)
    <input type="hidden" name="country_id" value="{{get_active_countries()[0]->id }}">
    @endif

    @if(get_setting('has_state') == 1)
    <!-- State -->
    <div class="col">
        
            <label class="form-label">{{ translate('State')}} <span class="text-danger">*</span></label>

            <select class="form-select" data-live-search="true" name="state_id" required>

            </select>
    </div>
    @endif

    <!-- City -->
    <div class="col">
       
            <label class="form-label">{{ translate('City')}} <span class="text-danger">*</span></label>
       
            <select class="form-select" data-live-search="true" name="city_id" required>

            </select>
       
    </div>

    <!--Area-->
    <div class="row area-field d-none">
        <div class="col-md-2">
            <label>{{ translate('Area')}}<span class="text-danger">*</span></label>
        </div>
        <div class="col-md-10">
            <select class="form-control mb-3 aiz-selectpicker rounded-0 guest-checkout" data-live-search="true" name="area_id">

            </select>
        </div>
    </div>

    @if (get_setting('google_map') == 1)
        <!-- Google Map -->
        <div class="row mt-3 mb-3">
            <input id="searchInput" class="controls" type="text" placeholder="{{translate('Enter a location')}}">
            <div id="map"></div>
            <ul id="geoData">
                <li style="display: none;">Full Address: <span id="location"></span></li>
                <li style="display: none;">Postal Code: <span id="postal_code"></span></li>
                <li style="display: none;">Country: <span id="country"></span></li>
                <li style="display: none;">Latitude: <span id="lat"></span></li>
                <li style="display: none;">Longitude: <span id="lon"></span></li>
            </ul>
        </div>
        <!-- Longitude -->
        <div class="row">
            <div class="col-md-2" id="">
                <label for="exampleInputuname">{{ translate('Longitude')}}</label>
            </div>
            <div class="col-md-10" id="">
                <input type="text" class="form-control mb-3 rounded-0" id="longitude" name="longitude" readonly="">
            </div>
        </div>
        <!-- Latitude -->
        <div class="row">
            <div class="col-md-2" id="">
                <label for="exampleInputuname">{{ translate('Latitude')}}</label>
            </div>
            <div class="col-md-10" id="">
                <input type="text" class="form-control mb-3 rounded-0" id="latitude" name="latitude" readonly="">
            </div>
        </div>
    @endif

    <!-- Postal code -->
    <div class="col">
            <label class="form-label">{{ translate('Postal code')}} </label>
       
            <input type="text" class="form-control form-control-lg" placeholder="{{ translate('Your Postal Code')}}" name="postal_code" value="" required>
    </div>

    <!-- Phone -->
    <div class="col">
       
            <label class="form-label">{{ translate('Phone')}} </label>
       
            <input type="tel" id="phone-code" class="form-control form-control-lg" placeholder="" name="phone" autocomplete="off" required>
            <input type="hidden" name="country_code" value="">
    </div>
</div>

<div class="px-3 pt-3 pb-4 row">
    <div class="col-md-2 mt-md-2"></div>
    <div class="col-md-10">
        <div class="bg-soft-info p-2">
            {{ translate('If you have already used the same mail address or phone number before, please ') }}
            <a href="javascript:void(0);" data-toggle="modal" data-target="#login_modal" class="fw-700 animate-underline-primary">{{ translate('Login') }}</a>
            {{ translate(' first to continue') }}
        </div>
    </div>
</div>
