<?php

namespace App\Http\Controllers;

use App\Models\VehicleModel;
use Illuminate\Http\Request;
use DB;

use DataTable;
use Illuminate\Contracts\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class vehicleRegister extends Controller
{
    
   public function index(){


    return view('vehicleRegister');

   }




   public function store(Request $request){


    // $request->validate([
    //     'customer_name' => 'required',
    //     'customer_telephone' => 'required|numeric|digits:10|unique:vehicleregister,customer_telephone',
    //     'province' => 'required',
    //     'vehicle_model' => 'required',
    //     'vehicle_number' => 'required|min:6|regex:/[-]{1}[0-9]{4}+$/',
    //     'vehicle_type' => 'required',
    //     'vehicle_year' => 'required|numeric|digits:4',
    //    ]);



       if( isset($request->hidden_id)){

        $request->validate([
        'customer_name' => 'required',
        'customer_telephone' => 'required|numeric|digits:10',
        'province' => 'required',
        'vehicle_model' => 'required',
        'vehicle_number' => 'required|min:6|regex:/[-]{1}[0-9]{4}+$/',
        'vehicle_type' => 'required',
        'vehicle_year' => 'required|numeric|digits:4',
       ]);





        $exist = VehicleModel::find($request->hidden_id);
     if(! $exist){

      abort(404);
      
     }


     

     $exist->update([
      'customer_name'=>$request->customer_name,
     
      'province'=>$request->province,
      'vehicle_model'=>$request->vehicle_model,
      'vehicle_number'=>$request->vehicle_number,
      'vehicle_type'=>$request->vehicle_type,
      'vehicle_year'=>$request->vehicle_year,
      'Address_one'=>$request->Address_one,
      'Address_two'=>$request->Address_two,

     ]); 
     return response()->json([
 
      'success' => 'Vehicle details updated',
      
     ] , 201);


       }
       else{

        $request->validate([
          'customer_name' => 'required',
          'customer_telephone' => 'required|numeric|digits:10|unique:vehicleregister,customer_telephone',
          'province' => 'required',
          'vehicle_model' => 'required',
          'vehicle_number' => 'required|min:6|regex:/[-]{1}[0-9]{4}+$/',
          'vehicle_type' => 'required',
          'vehicle_year' => 'required|numeric|digits:4',
         ]);






        // strat add data to db
        VehicleModel::create([
          'customer_name'=>$request->customer_name,
          'customer_telephone'=>$request->customer_telephone,
          'province'=>$request->province,
          'vehicle_model'=>$request->vehicle_model,
          'vehicle_number'=>$request->vehicle_number,
          'vehicle_type'=>$request->vehicle_type,
          'vehicle_year'=>$request->vehicle_year,
          'Address_one'=>$request->Address_one,
          'Address_two'=>$request->Address_two,
        ]);
        return response()->json([  
         'success' => 'Vehicle Registerd Succesfully',  
        ] , 201);
        // end add data to db
 

       }




     





   }

  public function recieve(Request $request){


    $data = DB::table('vehicleregister')->orderBy('id')->get();

    return datatables()->of($data)
    ->addIndexColumn()
    ->addColumn('action', function($data){

     

      $btn = '<div class="btn-group" role="group" >
      <button href="javascript:void(0)" style="font-size:10px;" type="button" data-id="'.$data->id.'" class="btn details btn-primary">Details</button>
      
      <button href="javascript:void(0)" style="font-size:10px;" type="button" data-id="'.$data->id.'" class="btn edit btn-secondary">Edit</button>
      <button href=""    type="button" style="font-size:10px;" data-id="'.$data->id.'" class="btn records btn-success">Records</button>
    </div>';

    return $btn;



    })
    ->rawColumns(['action'])
    ->make(true);
  }


  public function more($id){

    $data = VehicleModel::find($id); 
    return $data;
   

  }






  public function records($id){

    

    $vehicle_details =  VehicleModel::find($id);

    return view('vehicle_details',compact('vehicle_details'));
  }






}
