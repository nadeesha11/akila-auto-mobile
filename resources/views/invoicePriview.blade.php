@extends('layouts.master')


@section('content')

{{-- front end invoice start --}}

<style>
    .custom_size{
    
      font-size: 12px !important;
      width: 50%;
      font-weight: bold;
    
    }
    table, th, td {
      /* border: 1px solid black;
      border-collapse: collapse; */
    }

    




    </style>


<div class="d-flex align-items-center justify-content-center"> 

    <div id="print_div" style="background-color:rgb(237, 231, 231);" class="custom_size print_div  mb-2 p-1">
    
    <div >
      <p class="text-center mt-3 mr-4 " >Invoice</p><br>
       
        <div class="row">

          <table class="table ">
          <tr>
            <td>Plate No</td>
            <td> {{$customer_id[0]->vehicle_number}} </td>
          </tr>

          <tr>
            <td>Date</td>
            <td> {{date('Y-m-d H:i:s')}} </td>
          </tr>

          <tr>
            <td>Customer</td>
            <td>  {{$customer_id[0]->customer_name}} </td>
          </tr>

          </table>
    
         
    
        
        </div>
    </div>
    
    
    
    
    
    
      <div class="m-1">
        <table style="width: 100%">
          <tr>
            <th>Service</th>
           
            <th>Price (LKR)</th>
          </tr>
          @foreach ($issues_list as $item)     
          <tr>
            <td style="width: 75%" class=" m-1">  {{ $item->service_name }} </td>
        
            <td style="width: 10%;  text-align:right;" class=" m-1">  {{   number_format($item->price, 2, '.', '') }}  </td> 
            {{-- $item->price  --}}

          </tr>
          @endforeach
          <tr class="mt-2">
            <th style="width: 75%" >Total</th>
  
            <th style="width: 10%"  style="  text-decoration-line:  underline;"><p class="mt-1">{{ number_format($last_price,2,'.','') }}</p></th>
          </tr>
        </table>
      
    </div>
    
    <div class="text-center ml-1">
      {!! QrCode::size(65)->generate($customer_details); !!}
    </div>
    
  
    
    
    
    </div>
    {{-- end of print --}}
    </div>







{{-- front end invoice end  --}}




{{--end custom css for print page --}}






<a href="{{ url('/register/records/'.$id) }}" class="btn btn-danger " >Back</a>

<button class="btn btn-success"  onclick="PrintReceiptContent()"  >Print</button>

<div class="modal">
    {{-- padding: 0.5mm !important;
    margin: 0 auto !important; --}}

    <div id="invoice-pos" style=" width:70mm !important; " > 
    

       
        {{-- <input type="button" id="printPageButton"   onclick="   window.print();   "    class="printPageButton noprint" value="Print" style="display:block;  text-align:center; width:100%; "> --}}

        <div style=" display: flex;   justify-content: center;  align-items: center;">
         
         
          

        <input type="button" style=" font-size: 16px !important; display: inline-block !important; text-align: center !important; padding: 15px 32px !important;  color: white !important; background-color: #4CAF50 !important;  border: none !important;  "  id="printPageButton"   onclick="    this.style.display = 'none';  window.print();  "    class="printPageButton noprint" value="Print" >
        </div>


        <div id="printed_content">
        
        <center >
        <div><p style=" font-size: 0.5em !important;  "><strong> AKILA AUTOMOBILE</strong> </p></div>
       
        <div style="line-height: 0.2em !important;">
          <p style=" text-align:center !important;   font-size: 0.5em !important; ">
            Colombo-Kandy Rd,Uthuwankanda
            </p>

        
          <p style=" text-align:center !important;   font-size: 0.5em !important; ">
            0771201301 | akilaautomobile@gmail.com
            </p>
             <hr style="border-top: 1px dashed   ">

        </div>


        </center>
        </div>
        
        <div style="  display: block !important;">
        <div class="info" style="  line-height: 0.2em !important;">
       
          <table style="  font-size: 0.5em !important;">
            <tr>
              <td  style="width:35%;  "><p> Plate No </p></td>
              <td  style="width:5%;   "> - </td>
              <td  style="width:55%;  "><strong><p style=""> {{$customer_id[0]->vehicle_number}} </p> </strong> </td>

             
           
            </tr>
            <tr>
              <td  style="width:35%;   ">Date</td>
              <td  style="width:5%;    "> - </td>
              <td  style="width:55%;    "><strong> <p style=""> {{date("Y-m-d H:i:s");}}  </p></strong></td>
             
            </tr>

            <tr>
              <td  style="width:35%">Customer</td>
              <td  style="width:5%"> - </td>
              <td  style="width:55%;  "><strong> <p style="">{{$customer_id[0]->customer_name}}  </p></strong></td>
             
            </tr>
          
          </table>
          <hr style="border-top: 1px dashed   ">

            
      
        </div>
        
        
        </div>
        
        <div class="bot">
        <div id="table" >

            <table  style="font-size: 0.4em !important; width:100% !important;">

              <tr  >
                <td style="width: 85% !important; font-size: 0.6em !important;" ><p><strong>  Service </strong> </p> </td>
            
                <td style="width: 10% !important;"  ><p> <strong>Price(LKR)</p> </strong></td>
              
            </tr>
           
            </table>

            <hr style="border-top: 1px dashed   ">
        
            <table  style="font-size: 0.5em !important; width:100% !important; " >
             
             
              

                @foreach ($issues_list as $item)
                    
             
                <tr >
                    <td  style=" text-align:left !important; width: 85% !important;"> <p>{{ $item->service_name }} </p> </td>
                  
                    <td  style=" text-align:right !important; width: 10% !important;"><p><strong>   {{ number_format($item->price, 2, '.', '') }}  </strong></p> </td>
                </tr>
                @endforeach
        
             
        
            </table>

            <hr style="border-top: 1px dashed   ">
            <table style="width:100% !important; font-size: 0.6em !important;">

              <tr>
                
                <td style="text-align:left !important; width: 85% !important;"><p > <strong>Total</strong> </p> </td>
                <td style="text-align:right !important;  width: 10% !important;" ><p > <strong> {{ number_format($last_price,2,'.','') }} </strong></p> </td>
              </tr>


            </table>
            <hr style="border-top: 1px dashed   ">
        
        
        </div>


        <table style="width: 100% !important;">

          <tr>
            <td style="width: 45% !important;">
        
            </td>
            <td>
              <div id="qrcode" style="width: 5% !important;" >
                {!! QrCode::size(45)->generate($customer_details); !!}
              </div>
        
            </td>
            <td style="width: 45% !important;">
        
        
            </td>
          </tr>
        </table>

        <div style=" text-align:center !important; ">
          <p style=" font-size: 0.3em !important; "><strong>*** THANK YOU COME AGAIN !!! ***</strong></p>
      </div>
      <hr style="border-top: 1px dashed   ">
      <div style=" text-align:center !important; ">
        <p style=" font-size: 0.05em !important; "><strong>Software By Satasme | 070 5858 000</strong></p>
    </div>

       
        
        
        </div>
        

        
        
        </div>






  





  {{-- custom js start  --}}

  

   {{-- custom js end  --}}

   
        

</div>






<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>


var telephone =   {!! json_encode($telephone, JSON_HEX_TAG) !!};

function PrintReceiptContent(el){



 var data = document.getElementById("invoice-pos").innerHTML;

//  data += data = document.getElementById("qrcode").innerHTML;




 myReciept = window.open('','myWin','left=150, top=130 , width=600, height=400 ');
 myReciept.screnX = 0;
 myReciept.screnY = 0;
 myReciept.document.write(data);
 myReciept.document.title = 'Print Receipt';
 myReciept.focus();
 setTimeout(() => {
    myReciept.close();
 }, 6000);






//  status update start

 
$.ajax({

url:'{{ url("invoice") }}' + '/'+ telephone + '/status',
method:'GET',
success: function(response){

    if(response.code == 1){
          
         
          
          setTimeout(() => {
         toastr.success(response.msg);
          },400)

        }
 

},
 error: function(error){
  console.log(error);

 }
 });





//  status update end


}


</script>





@endsection








































