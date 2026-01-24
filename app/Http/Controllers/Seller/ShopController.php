<?php

namespace App\Http\Controllers\Seller;

use App\Models\BusinessSetting;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Notifications\ShopVerificationNotification;
use Auth;
use Illuminate\Support\Facades\Notification;

class ShopController extends Controller
{
    public function index()
    {
        $shop = Auth::user()->shop;
        return view('seller.shop', compact('shop'));
    }

    public function update(Request $request)
    {
        $shop = Shop::find($request->shop_id);

        if ($request->has('name') && $request->has('address')) {
            if ($request->has('shipping_cost')) {
                $shop->shipping_cost = $request->shipping_cost;
            }

            $shop->name             = $request->name;
            $shop->address          = $request->address;
            $shop->phone            = $request->phone;
            $shop->slug             = preg_replace('/\s+/', '-', $request->name) . '-' . $shop->id;
            $shop->meta_title       = $request->meta_title;
            $shop->meta_description = $request->meta_description;
            $shop->logo             = $request->logo;
        }

        if ($request->has('delivery_pickup_longitude') && $request->has('delivery_pickup_latitude'))
        {
            $shop->delivery_pickup_longitude    = $request->delivery_pickup_longitude;
            $shop->delivery_pickup_latitude     = $request->delivery_pickup_latitude;
        } 
        elseif ($request->has('facebook') || $request->has('google') || $request->has('twitter') ||$request->has('youtube') || $request->has('instagram'))
        {
            $shop->facebook = $request->facebook;
            $shop->instagram = $request->instagram;
            $shop->google = $request->google;
            $shop->twitter = $request->twitter;
            $shop->youtube = $request->youtube;
        }

        if ($shop->save()) {
            flash(translate('Your Store has been updated successfully!'))->success();
            return back();
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function bannerUpdate(Request $request){
        $shop = Shop::find($request->shop_id);
        $shop->top_banner_image     = $request->top_banner_image;
        $shop->top_banner_link      = $request->top_banner_link;
        $shop->slider_images        = $request->slider_images;
        $shop->slider_links         = $request->slider_links;
        $shop->banner_full_width_1_images   = $request->banner_full_width_1_images;
        $shop->banner_full_width_1_links    = $request->banner_full_width_1_links;
        $shop->banners_half_width_images    = $request->banners_half_width_images;
        $shop->banners_half_width_links     = $request->banners_half_width_links;
        $shop->banner_full_width_2_images   = $request->banner_full_width_2_images;
        $shop->banner_full_width_2_links    = $request->banner_full_width_2_links;
        if ($shop->save()) {
            flash(translate('Your Store banners has been updated successfully!'))->success();
            return back();
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function verify_form()
    {
        if (Auth::user()->shop->verification_info == null) {
            $shop = Auth::user()->shop;
            return view('seller.verify_form', compact('shop'));
        } else {
            flash(translate('Sorry! You have sent verification request already.'))->error();
            return back();
        }
    }

public function verify_form_store(Request $request)
{
    $request->validate([
        'business_type'       => 'required|in:registered,unregistered',
        'verification_method' => 'required|in:nin,nin_phone,cac',
        'verification_value'  => 'required|string'
    ]);

    $user = Auth::user();
    $shop = $user->shop;

    $accountName = strtolower(trim($user->name));
    $verified = false;
    $verificationPayload = [];

    $tokenResponse = Http::post('https://api.qoreid.com/token', [
        'clientId' => env('QOREID_CLIENT_ID'),
        'secret'   => env('QOREID_SECRET'),
    ])->json();

    Log::info('QoreID Token Response', $tokenResponse);

    if (!isset($tokenResponse['accessToken'])) {
        flash('Unable to authenticate verification service.')->error();
        return back();
    }

    $bearerToken = $tokenResponse['accessToken'];

    if ($request->business_type === 'unregistered') {

        if ($request->verification_method === 'cac') {
            flash('CAC is only allowed for registered businesses.')->error();
            return back();
        }

        $endpoint = $request->verification_method === 'nin'
            ? "https://api.qoreid.com/v1/ng/identities/nin/{$request->verification_value}"
            : "https://api.qoreid.com/v1/ng/identities/nin-phone/{$request->verification_value}";

        $response = Http::withToken($bearerToken)
            ->acceptJson()
            ->post($endpoint)
            ->json();

        Log::info('QoreID NIN Response', [
            'method' => $request->verification_method,
            'response' => $response
        ]);

        if (!isset($response['data'])) {
            flash('Unable to verify NIN details.')->error();
            return back();
        }

        $ninName = strtolower(trim(
            ($response['data']['first_name'] ?? '') . ' ' .
            ($response['data']['last_name'] ?? '')
        ));

        if (!str_contains($ninName, $accountName)) {
            flash('NIN name does not match the account name.')->error();
            return back();
        }

        $verified = true;

        $verificationPayload = [
            'type'        => 'nin',
            'method'      => $request->verification_method,
            'verified_at' => now(),
            'data'        => $response
        ];
    }

    if ($request->business_type === 'registered') {

        if ($request->verification_method !== 'cac') {
            flash('Registered businesses must verify using CAC.')->error();
            return back();
        }

        $response = Http::withToken($bearerToken)
            ->acceptJson()
            ->post('https://api.qoreid.com/v2/ng/identities/cac-basic', [
                'registration_number' => $request->verification_value
            ])
            ->json();

        Log::info('QoreID CAC Response', $response);

        if (!isset($response['data']['directors'])) {
            flash('Unable to verify CAC details.')->error();
            return back();
        }

        $directorMatched = false;

        foreach ($response['data']['directors'] as $director) {
            if (str_contains(strtolower($director['name']), $accountName)) {
                $directorMatched = true;
                break;
            }
        }

        if (!$directorMatched) {
            flash('No director name matches the account holder name.')->error();
            return back();
        }

        $verified = true;

        $verificationPayload = [
            'type'        => 'cac',
            'verified_at' => now(),
            'data'        => $response
        ];
    }

    if ($verified) {

        $shop->verification_status = 1;
        $shop->verification_info   = json_encode($verificationPayload);

        Log::info('Shop Verification Saved', [
            'shop_id' => $shop->id,
            'verification_info' => $verificationPayload
        ]);

        if ($shop->save()) {

            $admins = User::where('user_type', 'admin')->get();

            $notifyData = [
                'shop' => $shop,
                'status' => 'submitted',
                'notification_type_id' =>
                    get_notification_type('shop_verify_request_submitted', 'type')->id
            ];

            Notification::send($admins, new ShopVerificationNotification($notifyData));

            flash(translate('Your store verification was successful and submitted for review.'))->success();
            return redirect()->route('seller.dashboard');
        }
    }

    flash(translate('Sorry! Something went wrong.'))->error();
    return back();
}

    public function show()
    {
    }

    public function categoriesWiseCommission(Request $request){
        $sort_search =null;
        $categories = Category::orderBy('order_level', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $categories = $categories->where('name', 'like', '%'.$sort_search.'%');
        }
        $categories = $categories->paginate(15);
        return view('seller.categoryWise_commission', compact('categories'))->render();
    }
}
