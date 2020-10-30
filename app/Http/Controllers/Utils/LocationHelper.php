<?php

namespace App\Http\Controllers\Utils;

use Illuminate\Http\Request;
use Location;

trait LocationHelper {
    // using laravel built in ip heler
    static function getUserIp() {
        return trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
    }
    static function getUserZip($ip) {
        return Location::get($ip)->zipCode;
    }
    static function getUserLatitude($ip) {
        return Location::get($ip)->latitude;
    }
    static function getUserLongitude($ip) {
        return Location::get($ip)->longitude;
    }
}