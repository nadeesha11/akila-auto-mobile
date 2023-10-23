<?php

namespace App\Http\Controllers;

use App\Models\issuesAddModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;

class adminController extends Controller
{
    public function index(){


      return view('login');

    }

    public function login(Request $request){

        $credentials = $request->only('name','password');



        if(Auth::attempt($credentials)) {
       
          $userdata = issuesAddModel::select(DB::raw('SUM(price) as price '))
          ->where('invoice_status','old_records')
         ->whereYear('updated_at',date('Y'))
         ->groupBy(DB::raw('Month(updated_at)'))
         ->pluck('price');
      
        
      
      
          return view('dashboard',compact('userdata'));
          
       

          //  return view('dashboard');
          



        }
        else{

          return back()->with('login_error','Username or password incorrect');

        }



      
  
      }






      public function logout(){


        Auth::logout();
      


        

        return redirect('/');

      }



      public function qrcode($telephone){

        return view('qrDetails');

      }

    
}
