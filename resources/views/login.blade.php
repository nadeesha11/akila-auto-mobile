<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AutoMobile</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

       <div class="mt-3">

           <h1 class="text-center text-white"> Akila AutoMobile</h1>
        
       </div>





        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                          
                        


                            <div class="col-12">
                                <div class="p-5">


                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>


                         @if ($message = Session::get('login_error'))
                   <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>    
                          <strong>{{ $message }}</strong>


                   </div>
                  @endif









                                    <form class="user" method="POST"  action="{{ route('login') }}">
                                    @csrf

                                        <div class="form-group">
                                            <input type="text" name="name" required maxlength="20" class="form-control form-control-user"
                                               
                                                placeholder="Enter User Name">
                                        </div>


                                      
                                        
                                        
                                       

                                        <div class="form-group">
                                            <input type="password"  name="password"  required maxlength="20" class="form-control form-control-user"
                                                placeholder="Enter Password">
                                               
                                        </div>



                                      






                                        <button class="btn btn-primary" type="submit">Submit</button>
                                        
                                        <hr>
                                       
                                    </form>







                                    <hr>
                                   
                                </div>
                            </div>



                           
              


                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>







    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>


















