<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Service;

class API extends Controller
{
    
    function services(Request $req){
      $services = DB::table('services');
      return response()->json([
        'services' => $services
      ]);
    }
}
