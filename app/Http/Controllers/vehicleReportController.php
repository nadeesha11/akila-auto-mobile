<?php

namespace App\Http\Controllers;

use App\Models\issuesAddModel;
use App\Models\servicesModel;
use App\Models\User;
use Illuminate\Http\Request;
use DB;


class vehicleReportController extends Controller
{
    //

    public function autotype(Request $request){

        //  $data = servicesModel::select("service")
        // ->where("service","LIKE","%{$request->query}%")
        // ->get();


        // return response()->json($data);
        $data = servicesModel::select("service")     
        ->where("service","LIKE","%{$request->value}%")
        ->pluck("service"); 
                         
       return response()->json($data);  


    }




    public function add_issue(Request $request){

        $request->validate([
            'issue' => 'required',
            
           ]);

        //    add issue to db start
        
          issuesAddModel::create([
            'service_name'=>$request->issue,
            'telephone'=>$request->telephone,
           
          ]);

          return response()->json([  
           'success' => 'New issue added',  
          ] , 201);
         




        // end add issue to db 



    }


    public function dislpay_issues($telephone){


      $data = DB::table('issues_list')
     
      ->where('telephone',$telephone)
      ->whereNull('invoice_status')
      ->orderBy('id')
      ->get();



      

      return datatables()->of($data)

    
      ->addIndexColumn()

      ->addColumn('action', function($data){
        $btn = '<div class="btn-group" role="group" >
        <button style=" font-size:7px; " href="javascript:void(0)" type="button" data-id="'.$data->id.'" class="btn edit btn-primary"> <i class="fa fa-edit" aria-hidden="true"></i></button> 
        <button style=" font-size:7px; " href="javascript:void(0)" type="button" data-id="'.$data->id.'" class="btn delete btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </div>';
        return $btn;
      })

      // test
      ->addColumn('issue_stage', function($data){
        if($data->issue_status ==="Issue fixed"){

          $status = '<div style=" font-size:10px; "  class="text-dark font-weight-bold p-1 bg-success  rounded">Fixed</div>';
          
        }else{

          $status = '<div style=" font-size:10px; " class="text-dark font-weight-bold p-1 bg-danger  rounded">Pending</div>';
         
        }
        return $status;

       
      })
      // test

      ->rawColumns(['action','issue_stage'])
      ->make(true);

    
    }


    public function delete($id){

      $record = issuesAddModel::find($id);

      if(! $record){
   
       abort(404);
      }
   
     $record->delete();
   
     return response()->json([
    
       'success' => 'Issue Deleted',
       
      ] , 201);
   

    }

    public function edit($id){


     $data = DB::table('issues_list')->where('id',$id)->orderBy('id')->first();
     return $data;
      
    }

    public function edit_issue(Request $request){


  //  add values if job is pending or fixed start

  $issue_status = "";
  if(!isset($request->issue_status)){

    $issue_status =  "Issue fixed";
 
  }
  else{

    $issue_status =  "Issue pending";

  }
  //  add values if job is pending or fixed end




      // price should required when issue fixed start
      if(!isset($request->issue_status)  ){


        
        $request->validate([
          'price' => 'required',  
         ]);
 




      }
      // price should required when issue fixed end

        // price should empty when issue pending start
        if(isset($request->issue_status)){
          $request->validate([
            'price' => 'declined',  
           ]);
        }
        // price should required when issue pending fixed end




    
        $request->validate([

        'service_name' => 'required',
        'price' => 'nullable|numeric|between:0,9999999999.99',
        'comment' => 'nullable|max:50',
        


       ]);

      //  return $request;


      $exist = issuesAddModel::find($request->id_edit);
      if(! $exist){
 
       abort(404);
   
      }
      else{

        $exist->update([

          'service_name'=>$request->service_name,
          'price'=>$request->price,
          'comment'=>$request->comment,
          'issue_status'=>$issue_status,
    
         ]);
      }
 
      return response()->json([  
        'success' => 'Issue updated ',  
       ] , 201);




    }


    public function print($telephone){

      $issues_list = DB::table('issues_list')
      ->where('telephone',$telephone)
      ->whereNot('price', '')
      ->whereNull('invoice_status')
      ->get();

     


    //  testing

        // $issues_list2 = DB::table('issues_list')
        // ->where('telephone',$telephone)
        // ->limit(12)
        // ->pluck('issue_status','updated_at');

    // dd($issues_list2);


      //  testing






    //  start join to get id

     

      $customer_id = DB::table('issues_list')
      ->join('vehicleregister', 'issues_list.telephone', '=', 'vehicleregister.customer_telephone')
      ->select('vehicleregister.*')
      ->where('vehicleregister.customer_telephone',$telephone)
      ->get('');

    



      // dd($customer_id);

    

      foreach($customer_id as $item){

        $id = $item->id;

       }

      




    //  start join to get id
    

      $prices = DB::table('issues_list')
      ->where('telephone',$telephone)
      ->whereNot('price', '')
      ->whereNull('invoice_status')
      ->pluck('price');

       $last_price = 0;

       foreach ($prices as $key ) {

        $last_price = $last_price + $key;
     
       }

       

    $customer_details = 'http://127.0.0.1:8000/qrcode/'.$telephone;
     

     return view('invoicePriview',compact('issues_list','last_price','telephone','id','customer_id','customer_details'));
     

    }


    public function status_update($telephone){

    $success =  DB::table('issues_list')->where('telephone', $telephone)->update(['invoice_status'=>"old_records" ]);

    if($success){

      return response()->json(['code'=>1,'msg'=>"Records updated"]);   
    
    }
    else{
    
      return response()->json(['code'=>0,'msg'=>"oops !!! something went wrong"]);  
    
    }

   

    




    }

    public function dislpay_history($telephone){

       $data = DB::table('issues_list')
      ->where('telephone',$telephone)
      ->whereNot('invoice_status', '')
      ->orderBy('id')
      ->get();

      

      return datatables()->of($data)



  
      ->addColumn('issue_stage', function($data){
        if($data->issue_status ==="Issue fixed"){
          $status = '<div  class="text-dark font-weight-bold bg-success p-1 rounded">Fixed</div>'; 
        }else{
          $status = '<div class="text-dark font-weight-bold bg-danger p-1 rounded">Pending</div>'; 
        }
        return $status;

       
      })

      // test
      ->addColumn('checkbox', function($data){
    
       return '<input type="checkbox" name="single_checkbox" class="single_checkbox"  data-id="'.$data->id.'" ><label></label>';

       
      })
      // test
      ->rawColumns(['issue_stage','checkbox'])
      ->make(true);

    }

 public function restore(Request $request){

   $id = $request->ids;

  //  issuesAddModel::whereIn('id',$id)->delete();

   $query =   issuesAddModel::whereIn('id', $id)
            ->update(
                [
                    'invoice_status' => null
                ]
            );


if($query){

  return response()->json(['code'=>1,'msg'=>"Old records restored"]);   

}
else{

  return response()->json(['code'=>0,'msg'=>"Something went wrong"]);  

}

      




 }
  



}
