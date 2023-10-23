<?php

namespace App\Http\Controllers;

use App\Models\issuesAddModel;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use DB;

class dashboardController extends Controller
{
    

  public function index(){




     $userdata = issuesAddModel::select(DB::raw('SUM(price) as price '))
     ->where('invoice_status','old_records')
    ->whereYear('updated_at',date('Y'))
    ->groupBy(DB::raw('Month(updated_at)'))
    ->pluck('price');

  


    return view('dashboard',compact('userdata'));
  

   

  }



  public function getdata(){

   $count =  VehicleModel::count();

   $price = DB::table('issues_list')->where('invoice_status','old_records')->pluck('price');
    
   $total_rev = 0;

   foreach ($price as $item ) {

    $total_rev = $total_rev + $item;
 
   }

   $total_rev =  number_format($total_rev, 2, '.', '');

    $age = array("count"=>$count, "total_rev"=>$total_rev);
    return $age;


  }


}
