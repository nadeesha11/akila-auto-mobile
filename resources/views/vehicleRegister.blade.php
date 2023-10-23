@extends('layouts.master')

@section('content')

<style>
.scrollable-menu {
    height: auto;
    max-height: 100px;
    overflow-x: hidden;
}

#register_table{

  font-size: 12px;

}


</style>




<h2 class="text-center m-4">Vehicle Register</h2>

<button id="register_btn" type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#register_vehicle">Register</button>

{{-- table start --}}
<div  class="table-responsive w-100">  


  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Details</h6>
    </div>
    <div class="card-body">


<table id="register_table" class="table   table-striped    table-hover  mt-3 bg-light yajra-datatable">
  <thead class="bg-light">
    <tr>
     
      <th>Id</th>
      <th>Customer Name</th>
      <th>Telephone</th>
      {{-- <th>Model</th>
      <th>Vehicle Number</th> --}}
   
      <th>Action</th>
     
    </tr>
  </thead>
  <tbody>
  
  
  </tbody>
</table>
</div>
</div>
{{-- table end --}}











{{-- modal for more details start --}}


 <div class="modal fade" id="more_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-md  modal-dialog-centered" role="document">
    <div class="modal-content rounded-0">
      <div class="modal-body  py-2">          
        <div class=" main-content ">

          {{-- table start --}}
          <table class="table">
          
            <tbody>

              <tr>
                <td>Vehicle Model</td>
                <td id="model_display"></td>
              </tr>


              <tr>
                <td>Vehicle Number</td>
                <td id="number_display"></td>
              </tr>


           
              <tr>
                <td>Address One</td>
                <td id="address_one_details"></td>
              </tr>

              <tr>
                <td>Address Two</td>
                <td id="address_two_details"></td>
              </tr>

              <tr>
                <td>Province</td>
                <td id="province_details"></td>
              </tr>

              <tr>
                <td>Vehicle Type</td>
                <td id="vehicle_type_details"></td>
              </tr>

              <tr>
                <td>Vehicle Year</td>
                <td id="vehicle_year_details"></td>
              </tr>
              
              

            </tbody>
          </table>






            {{-- table end --}}
      
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
          
        </div>

      </div>
    </div>
  </div>
</div>







{{-- modal for more details start --}}






{{-- modal  --}}

    <!-- Modal  for register vehicle -->
    <div class="modal fade" id="register_vehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
          <div class="modal-content rounded-2">


            <div class="modal-body  py-2">          
              <div class=" main-content ">

                  <form id="RegisterForm">
                  
                    <div class="form-group">

                      <label id="modal_title"  class="mt-4 mb-4 text-dark">Register Vehicle</label>
                     <hr>
                  
                   {{-- hidden id --}}
           <input type="hidden" name="hidden_id" id="hidden_id">




                    <div class="row mb-4"> 

                       <div class="col-6">   
                      <div >
                        <label for="customer_name" class="form-label">Customer Name *</label>
                        <input maxlength="50" type="text" name="customer_name" class="form-control" id="customer_name" >
                        <span id="customer_name_error" class="text-danger error_show">    </span>
                      </div>
                    </div> 

                     
                    <div class="col-6">   
                      <div >
                        <label for="customer_telephone" class="form-label">Customer Telephone *</label>
                        <input maxlength="10" minlength="10" type="text" name="customer_telephone" class="form-control" id="customer_telephone" >
                        <span id="customer_telephone_error" class="text-danger error_show">    </span>
                      </div>

                    </div> 

                    </div>




                    <div class="row mb-4"> 

                        <div class="col-6">   
                       <div >
                         <label for="Address_one" class="form-label">Address line 1</label>
                         <input maxlength="50" name="Address_one" type="text" class="form-control" id="Address_one" >
                         <span id="Address_one_error" class="text-danger error_show">    </span>
                       </div>
                     </div> 
 
                      
                     <div class="col-6">   
                       <div>
                         <label for="Address_two" class="form-label">Address line 2</label>
                         <input maxlength="50" name="Address_two" type="text" class="form-control" id="Address_two" >
                         <span id="Address_two_error" class="text-danger error_show">    </span>
                       </div>
 
                     </div> 
 
                     </div>






                     <div class="row mb-4"> 
                        <div class="col-6">   
                     
                       <div>
                        <label >Select Vehicle Type *</label>
                        <select name="vehicle_type" id="vehicle_type"  class="form-control scrollable-menu" >
                            <option value="" selected>Choose vehicle type</option>

                            <option value="Motorbike">Motorbike</option>
                            <option value="Car">Car</option>
                            <option value="Three Wheeler">Three Wheeler</option>

                            <option value="Lorry">Lorry</option>
                            <option value="Truck">Truck</option>
                            <option value="Van">Van</option>

                            <option value="Tractor">Tractor</option>
                            <option value="Heavy Duty">Heavy Duty</option>
                            <option value="Bus">Bus</option>
                            <option value="Boat or water transport">Boat or water transport</option>

                          </select>
                          <span id="vehicle_type_error" class="text-danger error_show">    </span>
                       </div>
                     </div> 
 
                      
                     <div class="col-6">   
                       <div>
                         <label for="vehicle_model" class="form-label">Vehicle Model *</label>
                         <input maxlength="25" name="vehicle_model" type="text" class="form-control" id="vehicle_model" >
                         <span id="vehicle_model_error" class="text-danger error_show">    </span>
                       </div>
                     </div> 
 
                     </div>







                     <div class="row mb-4"> 
                        <div class="col-6">   
                       <div >
                         <label for="vehicle_year" class="form-label">Vehicle Year *</label>
                         <input maxlength="4" name="vehicle_year" type="text" class="form-control" id="vehicle_year" >
                         <span id="vehicle_year_eror" class="text-danger error_show">    </span>
                       </div>
                     </div> 
 
                      
                     <div class="col-6">   
                       <div>
                         <label for="vehicle_number" class="form-label">Vehicle Number *</label>
                         <input    maxlength="8" name="vehicle_number" type="text" class="form-control" id="vehicle_number" >
                         <span id="vehicle_number_error" class="text-danger error_show">    </span>
                       </div>
                     </div> 
 
                     </div>


                     <div class="row mb-4"> 
                        <div class="col-6  form-group">   


                       <div>
                        <label >Select province *</label>
                        <select name="province" id="province"  class="form-control scrollable-menu" >
                            <option value="" selected>Choose registerd province</option>

                            <option value="CP">Central Province</option>
                            <option value="EP">Eastern Province</option>
                            <option value="NC">North Central province</option>

                            <option value="NE">North Eastern province</option>
                            <option value="NW">North Western province</option>
                            <option value="SB">Sabaragamuwa province</option>

                            <option value="SP">Southern Province</option>
                            <option value="UP">Uva Province</option>
                            <option value="WP">Western Province</option>

                          </select>
                          <span id="province_error" class="text-danger error_show">    </span>
                       </div>



                     </div> 
 
                      
                     <div class="col-6">   
                       <div>
                      
                       </div>
                     </div> 
 
                     </div>









                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="Vehicle_btn" type="button" class="btn btn-primary">Save changes</button>
                        
                      </div>
                  </div>
                            
                  </form>
              </div>
  
            </div>
          </div>
        </div>
      </div>
      {{-- Modal  for register --}}
     
{{-- modal  --}}











<script>

$(document).ready(function() {



// create records url start
$('body').on('click','.records',function(){

  var record_id = $(this).data('id');


 
  let url = '{{ url('register/records') }}'+'/'+record_id;
  location.href = url;
  

});






// create records url end



    
  // to get csrf
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });


      $('#register_btn').click(function(){

      $('.error_show').html('');
      $('#modal_title').html('Register Vehicle');
      


    // start unset values of the model
      $('#hidden_id').val('');
      $('#customer_name').val('');
      $('#customer_telephone').val('');
      $('#province').val('');
      $('#vehicle_model').val('');
      $('#vehicle_number').val('');
      $('#vehicle_type').val('');
      $('#vehicle_year').val('');
      $('#Address_one').val('');
      $('#Address_two').val('');

      $("#customer_telephone").prop("readonly",false);

    // end unset values of the modal


      });

  //  show data using yajra and ajax
   $('#register_table').DataTable({
    responsive: true,
   

processing: true,
serverSide: true,
ajax: '{!! route('register.recieve') !!}',
bAutoWidth:false,

columns: [
    { data: 'id', name: 'id'  ,  width: '10'},
    { data: 'customer_name', name: 'customer_name' ,  width: '70' },
    { data: 'customer_telephone', name: 'customer_telephone',  width: '10' },
    // { data: 'vehicle_model', name: 'vehicle_model' },
    // { data: 'vehicle_number', name: 'vehicle_number' },
    { data: 'action', name: 'action' ,searchable: false ,  width: '10'},
   
]

});
 //  show data using yajra and ajax






   var formRegister = $('#RegisterForm')[0];

   $("#Vehicle_btn").click(function(){
    
   $('.error_show').html('');
   
   var RegisterData = new FormData(formRegister);

    
 
    // add registerd data user using ajax

    $.ajax({

url:"{{ route('vehicleRegister.store') }}",
method:"POST",

processData: false,
contentType: false,
data:RegisterData,


success: function(response){

  

     if(response){
            
      $('#register_vehicle').modal('hide');

      //  unset field values after success of edit
      $('#customer_name').val('');
      $('#customer_telephone').val('');
      $('#province').val('');

      $('#vehicle_model').val('');
      $('#vehicle_number').val('');
      $('#vehicle_type').val('');

      
      $('#vehicle_year').val('');
      $('#Address_one').val('');
      $('#Address_two').val('');
      //  unset field values after success of edit




            Swal.fire(response.success);
            $('#register_table').DataTable().ajax.reload();
           
           

           }

},

error:function(error){
  
    console.log(error);
    if(error){

      $('#customer_name_error').html(error.responseJSON.errors.customer_name);
      $('#customer_telephone_error').html(error.responseJSON.errors.customer_telephone);
      $('#province_error').html(error.responseJSON.errors.province);
      $('#vehicle_model_error').html(error.responseJSON.errors.vehicle_model);
      $('#vehicle_number_error').html(error.responseJSON.errors.vehicle_number);
      $('#vehicle_type_error').html(error.responseJSON.errors.vehicle_type);
      $('#vehicle_year_eror').html(error.responseJSON.errors.vehicle_year);
      
      
      

    } 
}
});

    // add registerd data user using ajax







  });

  //  start display more details using ajax

 //   start delete record

 
 $('body').on('click','.details',function(){
 
  var id = $(this).data('id');
        // make ajax call for getting 
      $.ajax({

url:'{{ url("register",) }}' + '/'+ id + '/more',
method:'GET',
success: function(response){
 
  // console.log(response);
  $('#more_details').modal('show');
  
  
  

  $('#number_display').html(response.vehicle_number);
  $('#model_display').html(response.vehicle_model);

  $('#address_one_details').html(response.Address_one);
  $('#address_two_details').html(response.Address_two);
  $('#province_details').html(response.province);
  $('#vehicle_type_details').html(response.vehicle_type);
  $('#vehicle_year_details').html(response.vehicle_year);
 
},
   error: function(error){
    //  console.log(error);
 
}
});

 });
   //  end display more details using ajax






// edit start display using ajax

$('body').on('click','.edit',function(){


      var id = $(this).data('id');


      // reset error messages start
      $('.error_show').html('');
       // reset error messages end

       $('#modal_title').html('Edit Vehicle Details'); 

      $('#register_vehicle').modal('show');

  
 

              // make ajax call for getting 
              $.ajax({

url:'{{ url("register",) }}' + '/'+ id + '/more',
method:'GET',
success: function(response){
 
  // console.log(response);

  

      $('#hidden_id').val(response.id);
      $('#customer_name').val(response.customer_name);
      $('#customer_telephone').val(response.customer_telephone);
      $('#province').val(response.province);
      $('#vehicle_model').val(response.vehicle_model);
      $('#vehicle_number').val(response.vehicle_number);
      $('#vehicle_type').val(response.vehicle_type);
      $('#vehicle_year').val(response.vehicle_year);
      $('#Address_one').val(response.Address_one);
      $('#Address_two').val(response.Address_two);
      
      // make telephone not editable
      $("#customer_telephone").prop("readonly",true);


      

 
},
   error: function(error){
  
 
}
});







  // make ajax call end
  


});

// edit end display using ajax






});



</script>






@endsection