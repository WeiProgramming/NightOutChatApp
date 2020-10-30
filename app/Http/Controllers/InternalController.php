<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\Utils\YelpHelper;
use Illuminate\Support\Facades\Auth;
use App\User;


class InternalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    use YelpHelper;

    public function index()
    {
        $response = $this->searchBusinesses();
        $businesses = json_decode($response,true)['businesses'];
        $total = json_decode($response,true)['total'];
        // dd(json_decode($response,true));
        return view('Internal.pages.dashboard')->with(['businesses' => $businesses, 'total' => $total]);
    }

    public function getUserChat($location_id, $id = null) {
        // dd($businessId);
        // get current route
        $route = (in_array(\Request::route()->getName(), ['user', config('chatify.path')]))
        ? 'user'
        : \Request::route()->getName();
    
        // set user location id to the businessId
        $user = User::find(Auth::id());
        $user->location_id = $location_id;
        $user->save();

        //get business details
        $response = $this->getBusinessDetails($location_id);

        // prepare id
        return view('Chatify::pages.app', [
            'id' => ($id == null) ? 0 : $route . '_' . $id,
            'route' => $route,
            'messengerColor' => Auth::user()->messenger_color,
            'dark_mode' => Auth::user()->dark_mode < 1 ? 'light' : 'dark',
            'business_name' => json_decode($response,true)['name']
        ]);
    }
}
