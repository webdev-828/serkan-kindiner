<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Myinfo;
use App\Portfolio;
use App\Clientinfo;
use DB;

class IndexController extends Controller
{
    //
    public function index()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        $LocationArray = json_decode( file_get_contents('http://ip-api.com/json/'.$ipaddress));
        $ip = $LocationArray['query'];
        $city = $LocationArray['city'];
        $state = $LocationArray['regionName'];
        $country = $LocationArray['country'];
        $zip = $LocationArray['zip'];
        $isp = $LocationArray['org'];
        $result = DB::insert("insert into clientinfos (ip_address, city, state, country, zip, isp) values(?, ?, ?, ?, ?, ?)", [$ip, $city, $state, $country, $zip, $isp]);
        if ($result) {
            $myinfos = DB::table('myinfos')->get();
            $portfolios = DB::table('portfolios')->get();
            return view('index', ['myinfos' => $myinfos, 'portfolios' => $portfolios]);
        } else {
            echo "Your IP Address Invalid";
        }
    }
}
