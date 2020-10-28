<?php

namespace App\Http\Controllers\Utils;

use \App\Http\Controllers\Utils\LocationHelper;

trait YelpHelper
{
    private $client_id = '-FywCKjcltjQwPJWQxxXBA';
    private $api_key   = 'K5Hb-JULyeRj6jb9SVwJnc8syTnsqkYP-5eqlyU8IN6jLryqU-EQJi1VbQ-C_wMuFnYxsMHaTEx-nLpAITSD64j7RvDQ7orW-aBf4H8p2uHbBD4NaPGlbcUAEZGXX3Yx';
    private $yelp_api_root = 'https://api.yelp.com/v3/';
    // private $headers = ['Authorization' => 'Bearer ' . $api_key, 'Accept' => 'application/json'];

    use LocationHelper;

    function getYelpUserInfo()
    {
        $ip = LocationHelper::getUserIp();
        $latitude = LocationHelper::getUserLatitude($ip); 
        $longitude = LocationHelper::getUserLongitude($ip); 
        // $response->getBody()->getContents();
        // return $response;
        return [
            "latitude" => $latitude,
            "longitude" => $longitude,
            "radius"        => "5000", 
            "sort_by"       => "distance",
            "categories"    => "nightlife",
            "limit"         => 50
            ];
    }

    function searchBusinesses() {
        $userYelpData = $this->getYelpUserInfo();
        $client = new \GuzzleHttp\Client();
        $url = $this->yelp_api_root.'businesses/search?latitude='
        .$userYelpData['latitude'].'&longitude='
        .$userYelpData['longitude'].'&radius='
        .$userYelpData['radius'].'&sort_by='
        .$userYelpData['sort_by'].'&categories='
        .$userYelpData['categories'].'&limit='
        .$userYelpData['limit'];
        $request = $client->get($url, ['headers' => ['Authorization' => 'Bearer ' . $this->api_key, 'Accept' => 'application/json']]);
        $response = $request->getBody()->getContents();
        return $response;
    }

    function getBusinessDetails($business_id) {
        $client = new \GuzzleHttp\Client();
        $url = $this->yelp_api_root.'businesses/'.$business_id;
        $request = $client->get($url, ['headers' => ['Authorization' => 'Bearer ' . $this->api_key, 'Accept' => 'application/json']]);
        $response = $request->getBody()->getContents();
        return $response;
    }

    // function getBusinessReviews() {
    //     $yelpFusion = new Yelp(API_TOKEN);
    //     $result     = $yelpFusion->getDetails("reviews", "blue-hill-new-york");
    // }
}
