@extends('layouts.master')


@section('content')

<style>

  #issues_list,#repair_history{
  
    font-size: 12px;
  }
  
  </style>

<div class="text-center m-3"><h2>Vehicle Reports</h2></div>
<div >

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Details</h6>
        </div>
        <div class="card-body">

          <div class="row table-responsive text-nowrap">
            <table class="table table-sm table-hover  ">
                <tbody>
                 
              
                    <tr>
                      <th >Customer Name</th>
                      <td >{{ $vehicle_details->customer_name }} </td>
                    
                   
                    </tr>

                    <tr>
                        <th >Vehicle Number</th>
                        <td > {{ $vehicle_details->vehicle_number }} </td>
                     
                      </tr>

                      <tr>
                        <th >Vehicle Type</th>
                        <td > {{ $vehicle_details->vehicle_type }} </td>
                     
                      </tr>

                      <tr>
                        <th >Contact no</th>
                        <td > {{ $vehicle_details->customer_telephone }} </td>
                     
                      </tr>
                      






                  </tbody>
                

              </table>
      
          </div>

        </div>
    </div>



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Issues list</h6>
        </div>
        <div class="card-body">
        
            {{--new issue form start --}}

            <form id="add_issue_form">

               <input type="hidden" name="telephone" id="telephone" value="{{ $vehicle_details->customer_telephone }}">

                <div class="input-group">


                    <input type="text" maxlength="150" name="issue" id="issue" class="form-control add_edit_issues">
                    
                    <span class="input-group-btn">
                         <button id="add_issue" class="btn ml-1 btn-success" type="button">Add service</button>
                    </span>
                 </div>
                 <span id="issue_error" class="text-danger error_show">    </span>

             
              </form>

            {{--new issue form end --}}



                {{-- display issue list start --}}
              <div class="mt-4">
      
                <table id="issues_list"   class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                      <tr>
                      
                        {{-- <th>Id</th> --}}
                        <th>Service</th>
                    
                        
                        <th>Price (LKR)</th>
                        <th>comment</th>
                        <th>date</th>
                        <th>Issue stage</th>
                     
                        <th>Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                    
                    
                    </tbody>
                  </table>




                  {{-- print button start --}}
              <div class="text-center mt-3">
                <a href=" {{ url('/printPrieview/'.$vehicle_details->customer_telephone) }} "  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm print_invoice">
                  
                  <i class="fa fa-eye"></i>
                  Preview invoice</a>


              </div>

                      {{-- print button end --}}
      
      
               </div>
      
                {{-- display issue list end --}}


        </div>   


</div>




{{-- old Repair history start --}}
<div class="card shadow mb-4 mt-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> Repair history</h6>
  </div>
  <div class="card-body">
          {{-- display issue list start --}}
        <div class="mt-4">
          <table id="repair_history"    class="table align-middle mb-0 bg-white">
              <thead class="bg-light">
                <tr>
                  
                  <th> <input type="checkbox" class="main_checkbox " id="main_checkbox"  name="main_checkbox"><label></label> </th> 
                  <th>Service</th>     
                  <th>Price (LKR)</th>
                  <th>comment</th>
                  <th>date</th>
                  <th>Issue stage <button class="btn btn-sm btn-warning d-none "   id="restorebtn"><span class="text-dark">Restore</span> </button> </th>
                 
                </tr>
              </thead>
              <tbody> 
              </tbody>
            </table>
         </div>
          {{-- display issue list end --}}
  </div>   
</div>
{{-- old Repair history end --}}








{{-- edit modal start --}}
<div class="modal fade" id="edit_issue_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-md  modal-dialog-centered" role="document">
    <div class="modal-content rounded-2">


      <div class="modal-body  py-2">          
        <div class=" main-content ">

             <form id="editIssue">

              <input type="hidden" name="id_edit" id="id_edit" >
            
              <div class="form-group">

                <label id="modal_title"  class="mt-4 mb-4 text-dark">Edit issue</label>
                <hr>
            
                 <div class="m-3">   
                 <div >
                  <label for="service_name" class="form-label ">Service *</label>
                  <input  type="text" name="service_name" class="form-control add_edit_issues" id="service_name" >
                  <span id="service_name_error" class="text-danger error_show">    </span>
                  </div>
                 </div> 

               
                  <div class="m-3">   
                  <div>
                  <label class="mr-5" for="issue_status" class="form-label">Issue stage</label>
                  <input   type="checkbox" name="issue_status" required    id="issue_status"  data-toggle="toggle" data-on="Pending" data-off="Issue fixed" data-onstyle="danger" data-offstyle="success" data-width="200" data-height="40">
                  <span id="issue_status_error" class="text-danger error_show">    </span>
                  </div>

                  </div> 

        

                    <div class="m-3">   
                  <div >
                    <label for="price" class="form-label">Price (LKR)</label>
                    <input maxlength="50" name="price" id="price" type="text" class="form-control" id="price" >
                    <span id="price_error" class="text-danger error_show">    </span>
                  </div>
                </div> 

                
               <div class="form-group m-3">
                <label for="comment">Comment</label>
                <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                <span id="comment_error" class="text-danger error_show">    </span>
              </div>

               </div>

               </div>
               </div>


              <div class="modal-footer">

                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button id="issue_edit_btn" type="button" class="btn btn-primary">Save changes</button>
                  
                </div>
            </div>
                      
            </form>
        </div>

      </div>
    </div>
  </div>
</div>  

  



{{-- edit modal end --}}







<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script type="text/javascript">

$(document).ready(function(){




   // to get csrf
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });



  //  edit issue start

  $('body').on('click','.edit',function(){

    var id = ($(this).data('id'));
   

   $('#edit_issue_modal').modal('show');


  // make ajax call
       $.ajax({

url:'{{ url("issues",) }}' + '/'+ id + '/edit',
method:'GET',
success: function(response){

  $('.error_show').html('');

$('#service_name').val(response.service_name);
$('#price').val(response.price);
$('#comment').val(response.comment);
$('#id_edit').val(response.id);


// make checked in edit start
if(  (response.issue_status==null) || (response.issue_status==="Issue pending")  )  {
 

  $('#issue_status').bootstrapToggle('on');

}
else{

  $('#issue_status').bootstrapToggle('off');

}

// make checked in edit end



},
   error: function(error){

}
});

// end ajax call




  });



  //  edit issue end
   
 
   
//  delete issues start  
  $('body').on('click','.delete',function(){
var id_delete = $(this).data('id');
if(confirm("Are you sure you want to delete record ? ")){
          // make ajax call
          $.ajax({

url:'{{ url("issues/delete",) }}' + '/'+ id_delete,
method:'DELETE',
success: function(response){


   Swal.fire(response.success);
   $('#issues_list').DataTable().ajax.reload();

},
   error: function(error){
    //  console.log(error);
 
}
});
}
});
//  delete issues end  



//  type ahead start   
url = "{{ route('get-services') }}"
$('.add_edit_issues').typeahead({
    source:function(query,process){             
    return $.get(url,{term:query},function(data){
                    return process(data);    
                }); 
             }
 
});
//  type ahead end   


// start add issue
$('#add_issue').click(function(){

var form = $('#add_issue_form')[0];
var formService = new FormData(form);

//start ajax for add create new issue

$.ajax({

url:"{{ route('vehicleReport.add_issue') }}",
method:"POST",

processData: false,
contentType: false,
data:formService,


success: function(response){
   

   Swal.fire(response.success);
   $('#issues_list').DataTable().ajax.reload();

   $('#issue_error').html('');
   
   $('#issue').val('');


},

error:function(error){

    if(error){

    $('#issue_error').html(error.responseJSON.errors.issue);

    }
}



});


// end ajax for add new issue


});
// end add issue




// start display issues list of particular vehicle
var telephone =  $('#telephone').val();
var display_issues =  '{!! url('issues/display',) !!}'+'/'+telephone;



  $('#issues_list').DataTable({

    // test1
  response:true,




    // test1



    // responsive: true,
    paging: false,
    info: false,
    searching: false,

processing: true,
serverSide: true,
// ajax: '{!! url('issues/display') !!}',
ajax: display_issues,
bAutoWidth:false,

columns: [
    // { data: 'id', name: 'id' },
    { data: 'service_name', name: 'service_name',  width: '20' },
    { data: 'price', name: 'price' , width: '10' },
    { data: 'comment', name: 'comment', width: '20' },
    { data: 'updated_at', name: 'updated_at' , width: '10' },
    { data: 'issue_stage', name: 'issue_stage' , width: '5'},
    { data: 'action', name: 'action' , width: '5'},
   
]

});
// end display issues list of particular vehicle



// start display old records
var display_old_records =  '{!! url('history/display',) !!}'+'/'+telephone;
$('#repair_history').DataTable({

responsive: true,
paging: true,
info: false,
searching: true,

processing: true,
serverSide: true,
// ajax: '{!! url('issues/display') !!}',
ajax: display_old_records,
bAutoWidth:false,
columns: [

  
{ data: 'checkbox',name: 'checkbox',orderable:false,searchable:false ,width: '5'},
{ data: 'service_name', name: 'service_name',  width: '20' },
{ data: 'price', name: 'price',width: '10' },
{ data: 'comment', name: 'comment',  width: '20' },
{ data: 'created_at', name: 'updated_at' ,  width: '10' },
{ data: 'issue_stage', name: 'issue_stage',orderable:false,searchable:false ,width: '10' },


]

});





// end display old records


// start edit issues
$('#issue_edit_btn').click(function(){

var form = $('#editIssue')[0];
var formEdit = new FormData(form);

// ajax call start
$.ajax({

url:"{{ route('vehicleReport.edit_issue') }}",
method:"POST",

processData: false,
contentType: false,
data:formEdit,

success: function(response){
   Swal.fire(response.success);
   $('#issues_list').DataTable().ajax.reload();
   $('#edit_issue_modal').modal('hide');
},

error:function(error){
    if(error){
     $('#service_name_error').html(error.responseJSON.errors.service_name);
     $('#price_error').html(error.responseJSON.errors.price);
     $('#comment_error').html(error.responseJSON.errors.comment);
    }
}
});
// ajax call end
});
// end edit issues




// start multiple status change

$('body').on('click','input[name="main_checkbox"]',function(){

if(this.checked){

$('input[name="single_checkbox"]').each(function(){

  this.checked = true;

});

}
else{

  $('input[name="single_checkbox"]').each(function(){

    this.checked = false;

  });
}

restorebtn();
});




$('body').on('change','input[name="single_checkbox"]',function(){


 if($('input[name="single_checkbox"]').length == $('input[name="single_checkbox"]:checked').length){

  $('input[name="main_checkbox"]').prop('checked',true);

 }
 else{

  $('input[name="main_checkbox"]').prop('checked',false);

 }

 restorebtn();

});

 function restorebtn(){
 
  if( $('input[name="single_checkbox"]:checked').length > 0 ){

    $('#restorebtn').text('restore('+$('input[name="single_checkbox"]:checked').length+')').removeClass('d-none'); 

  }
  else{

    $('#restorebtn').addClass('d-none');
  }
 }



 $('#restorebtn').click(function(){


  var servicesid = [];

  $('input[name="single_checkbox"]:checked').each(function(){
  
    servicesid.push($(this).data('id')); 

  });



  // ajax call start


  // if(confirm("Are you sure you want to restore record ? ")){

   
  var url = '{{ route("vehicleReport.restore") }}';

  //  send data start
  if(servicesid.length > 0){

    swal.fire({

      title:'Are you sure ?',
      html:'You want to restore<b>('+servicesid.length+')</b>',
      showCancelButton:true,
      showCloseButton:true,
      confirmButtonText:"Replace",
      cancelButtonText:'Cancel',
      confirmButtonColor:'#333443',
      cancelButtonColor:"#333443",
      width:300,
      allowOutsideClick:false,



    }).then(function(result){
    
      if(result.value){

        $.post(url,{ids:servicesid},function(data){
       
          if(data.code == 1){
          
            $('#issues_list').DataTable().ajax.reload();
            $('#repair_history').DataTable().ajax.reload();
            
            setTimeout(() => {
           toastr.success(data.msg);
            },500)

          }
          else{
           
            console.log(' not success');

          }
         

        },'json');
      }


    })






  }

   // ajax call end 


 });








// end multiple status change



});
</script>








@endsection


















