<?php
// TODO: Make this an independant class
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
    function getTotalBusinessPages($totalBusiness, $limit) {
        dd($totalBusiness);
        $pages = ceil($totalBusiness/$limit);
        return $pages;
    }
    function searchBusinesses($userYelpData, $searchInput = '') {
        $client = new \GuzzleHttp\Client();
        $url = $this->yelp_api_root.'businesses/search?latitude='
        .$userYelpData['latitude'].'&longitude='
        .$userYelpData['longitude'].'&radius='
        .$userYelpData['radius'].'&sort_by='
        .$userYelpData['sort_by'].'&categories='
        .$userYelpData['categories'].'&limit='
        .$userYelpData['limit'].'&term='.$searchInput;
        $request = $client->get($url, ['headers' => ['Authorization' => 'Bearer ' . $this->api_key, 'Accept' => 'application/json']]);
        $response = $request->getBody()->getContents();
        // $totalBusinesses = json_decode($response,true)['total'];
        // $numBusinessPages = $this->getTotalBusinessPages( $totalBusinesses, $userYelpData['limit']);
        return $response;
    }

    function getBusinessDetails($location_id) {
        $client = new \GuzzleHttp\Client();
        $url = $this->yelp_api_root.'businesses/'.$location_id;
        $request = $client->get($url, ['headers' => ['Authorization' => 'Bearer ' . $this->api_key, 'Accept' => 'application/json']]);
        $response = $request->getBody()->getContents();
        return $response;
    }

    // // TODO: This gets all businesses from the user and sends it back as an array of objs
    // function getAllUserBusinesses() {
    //     $allBusinessArr = array();
    //     $userYelpData = $this->getYelpUserInfo();
    //     $businesses = $this->searchBusinesses($offset = null, $userYelpData);
    //     $total = json_decode($businesses,true)['total'];
    //     $numBusinessPages = 0;
    //     $counter = 0;
    //     while($counter <= $numBusinessPages) {
    //         $currentPageBusiness = $this->searchBusinesses($counter, $userYelpData);
    //         $currentPageBusiness = json_decode($businesses,true)['businesses'];
    //         $allBusinessArr = array_merge($allBusinessArr, $currentPageBusiness);
    //         $counter++;
    //         $numBusinessPages++;
    //         sleep(2);
    //     }
    //     dd($allBusinessArr);

    //     return ['total' => $total, 'businesses' => $allBusinessArr, 'total_businesspages' => $numBusinessPages];
    // }

    // function getBusinessReviews() {
    //     $yelpFusion = new Yelp(API_TOKEN);
    //     $result     = $yelpFusion->getDetails("reviews", "blue-hill-new-york");
    // }
}
