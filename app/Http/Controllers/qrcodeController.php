<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class qrcodeController extends Controller
{
    
    public function qrcode($telephone){

        $qrdatas = DB::table('issues_list')
        ->where('telephone',$telephone)
        
        ->get();

        $customer_details = DB::table('vehicleregister')
        ->where('customer_telephone',$telephone)
        ->get();

        



        // dd($qrdatas);

        return view('qrDetails',compact('qrdatas','customer_details'));

      }



      public function test(){


        return view('invoice');
        
      }

}
