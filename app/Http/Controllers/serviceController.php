<?php

namespace App\Http\Controllers;

use App\Models\servicesModel;
use Illuminate\Http\Request;
use DataTable;
use Yajra\DataTables\Facades\DataTables;
use DB;

class serviceController extends Controller
{
    
  
  public function index(){

    return view('service');

  }


  public function store(Request $request){



  if($request->service_id !=null){
    
     $exist = servicesModel::find($request->service_id);
     if(! $exist){

      abort(404);
      
     }

    
     $request->validate([
      'service_name' => 'required|unique:services,service|max:65',
     ]);



     $exist->update([
      'service'=>$request->service_name,

     ]); 
     return response()->json([
 
      'success' => 'Service Update Succesfully',
      
     ] , 201);

  }else{


    $request->validate([
      'service_name' => 'required|unique:services,service|max:65',
     ]);
 
  
   servicesModel::create([
      'service'=>$request->service_name,
    ]);
 
    return response()->json([
 
     'success' => 'Service Added Succesfully',
     
    ] , 201);


  }
  }






  public function recieve(Request $request){

 

    $data = DB::table('services')->orderBy('id')->get();

    return datatables()->of($data)
    ->addIndexColumn()
    ->addColumn('action', function($data){

           $btn = '<a style="font-size:10px;" href="javascript:void(0)"   data-id="'.$data->id.'" class="edit btn btn-info btn-sm m-2 ">Edit</a>';
           $btn = $btn.'<a style="font-size:10px;" href="javascript:void(0)" data-id="'.$data->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
  
            return $btn;
    })
    ->rawColumns(['action'])
    
    ->make(true);



  }


  public function edit($id){
  
 
  $data = servicesModel::where('id',$id)->first();
  return $data;


  }




  public function delete($id){

   $record = servicesModel::find($id);

   if(! $record){

    abort(404);
   }

  $record->delete();

  return response()->json([
 
    'success' => 'Service Deleted',
    
   ] , 201);


  }






}












