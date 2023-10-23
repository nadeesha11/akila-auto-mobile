@extends('layouts.master')

@section('content')

<style>

#service{

  font-size: 12px;
}

</style>


<div class="text-center m-3"><h2>Services</h2></div>

<div class="m-3">

    <button type="button" id="add_service_btn" class="btn mb-3 mr-3 btn-success " data-toggle="modal" data-target="#Add_service">
       Add Service
      </button>
    






   {{-- table start --}}
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Details</h6>
    </div>
    <div class="card-body ">
   
   <table id="service" class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
       
        <th>id</th>
        <th>service</th>
        <th>action</th>
       
      </tr>
    </thead>
    <tbody>
    
    
    </tbody>
  </table>
{{-- table start --}}
</div>



{{-- modal  --}}

    <!-- Modal  for add services -->
    <div class="modal fade" id="Add_service" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-md  modal-dialog-centered" role="document">
          <div class="modal-content rounded-0">
            <div class="modal-body  py-2">          
              <div class=" main-content ">

                  <form id="serviceForm">
                  
                    <div class="form-group">

                      <label id="modal_title"  class="mt-4 mb-4 ">Add Service</label>

                      <input type="hidden" id="service_id"  name="service_id">
                      <input type="text mb-5"  id="service_name" name="service_name" maxlength="150" class="form-control "  placeholder="Enter service">
                      <span id="service_name_error" class="text-danger error_show">    </span>
                    
     

                    <div class="modal-footer">

                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button id="service_submit" type="button" class="btn btn-primary">Save changes</button>
                      
                    </div>
                  </div>
                            
                  </form>


                {{-- </div> --}}
              </div>
  
            </div>
          </div>
        </div>
      </div>
      {{-- Modal  for add services --}}
     
{{-- modal  --}}

</div>





<script>

  
$(document).ready( function () {


  $('#add_service_btn').click(function(){

    $('#modal_title').html('Add Service');
    $('.error_show').html('');
    $('#service_id').val('');
    $('#service_name').val('');

  });



  // to get csrf
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });



    $('#service').DataTable({

        processing: true,
        serverSide: true,
        ajax: '{!! route('service.recieve') !!}',
        bAutoWidth:false,
        columns: [
            { data: 'id', name: 'id' ,  width: '10'},
            { data: 'service', name: 'service',  width: '80' },
            { data: 'action', name: 'action' ,  width: '10' },
           
        ]
     
    });



    var form = $('#serviceForm')[0];

    $('#service_submit').click(function(){

    $('.error_show').html('');


    var formService = new FormData(form);

     $.ajax({

       url:"{{ route('service.store') }}",
       method:"POST",
      
       processData: false,
       contentType: false,

       data:formService,


       success: function(response){
          
           $('#Add_service').modal('hide');
        
          //  unset field values after success of edit
           $('#service_name').val('');
           $('#service_id').val('');

          //  unset field values after success of edit

           if(response){
            
            Swal.fire(response.success);
            $('#service').DataTable().ajax.reload();
           

           }

   
       },

       error:function(error){

           if(error){

         

          $('#service_name_error').html(error.responseJSON.errors.service_name);


           }
       }



     });




    });
    


    // edit btn start
    $('body').on('click','.edit',function(){

    var id = $(this).data('id');
    $('.error_show').html('');

    // make ajax call
    $.ajax({

     url:'{{ url("services",) }}' + '/'+ id + '/edit',
     method:'GET',
     success: function(response){
     
    // console.log(response);

     $('#Add_service').modal('show');

     $('#modal_title').html('Edit Service');
     
     $('#service_name').val(response.service);

     $('#service_id').val(response.id);

    
     },
        error: function(error){
          console.log(error);
      
     }
    });


    
    });
      // edit btn end 




  //   start delete record
  $('body').on('click','.delete',function(){

   var id_delete = $(this).data('id');



  if(confirm("Are you sure you want to delete record ? ")){


          // make ajax call
          $.ajax({

  url:'{{ url("services/delete",) }}' + '/'+ id_delete,
  method:'DELETE',
  success: function(response){


   Swal.fire(response.success);
   $('#service').DataTable().ajax.reload();

},
   error: function(error){
  //  console.log(error);
 
}
});


  };

  });
 
  //   end delete record
  
});
</script>

@endsection