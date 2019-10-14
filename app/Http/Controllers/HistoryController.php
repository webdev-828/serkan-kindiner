<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientinfo;
use DB;

class HistoryController extends Controller
{
    //
    public function index()
    {
        $clients = DB::table('clientinfos')->select('id', 'ip_address', 'city', 'state', 'country', 'zip', 'isp')
                                       ->orderBy('id', 'desc')                                
                                       ->get();
        return view('history', ['clients' => $clients]);
    }
}