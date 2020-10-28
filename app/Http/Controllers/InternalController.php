<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\Utils\YelpHelper;

class InternalController extends Controller
{
    use YelpHelper;

    public function index()
    {
        $response = $this->searchBusinesses();
        $businesses = json_decode($response,true)['businesses'];
        $total = json_decode($response,true)['total'];
        // dd(json_decode($response,true));
        return view('Internal.pages.dashboard')->with(['businesses' => $businesses, 'total' => $total]);
    }
}
