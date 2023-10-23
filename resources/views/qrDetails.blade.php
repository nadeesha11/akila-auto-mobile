
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Akila Automobile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>

   <div>  

    
    <h2 class="text-center m-4">Alika Automobile</h2>

    <h3 class="text-left m-4">Vehicle Service History</h3>

    <table class="table table-lg ">
    
        <tbody>
      
   
          <tr>
            <th>Name</th>
            <td>{{ $customer_details[0]->customer_name }}</td>
          </tr>

          <tr>
            <th>Vehicle Number</th>
            <td>{{ $customer_details[0]->vehicle_number }}</td>
          </tr>

          <tr>
            <th>Vehicle Model</th>
            <td>{{ $customer_details[0]->vehicle_type }}</td>
          </tr>

        </tbody>
      </table>



    <table class="table table-dark">
        <thead>
          <tr>
            <th >#</th>
            <th >service</th>
            <th >issue_status</th>
            <th >price</th>
            <th >comment</th>
            <th >date</th>
          </tr>
        </thead>
        <tbody>

            @php
                $number = 0;
            @endphp
    
            @foreach ($qrdatas as $data)
             
            <tr>
                <td>{{ $number++ }}</td>
                <td> {{ $data->service_name }} </td>


              @if ( !isset($data->issue_status))
              <td> 	Issue pending </td>   
              @else
              <td> {{ $data->issue_status }} </td> 
              @endif

              


              @if ( !isset($data->issue_status))
              <td> 0 </td>   
              @else
              <td> {{ $data->price }} </td>
              @endif
              






                <td> {{ $data->comment }} </td>
                <td> {{ $data->updated_at }} </td>
             
              </tr>

            @endforeach
      
       


        </tbody>
      </table>
    </div>




    </body>
</html>



















