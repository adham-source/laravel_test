<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <title>{{ $title ?? 'Page' }}</title>
  </head>
  <body>
    <body class="bg-light">
        <main>
            <div class="container-fluid">
                <div class="card my-4">
                    <div class="card-header bg-dark text-light">
                        <i class="fas fa-table mr-1"></i>
                        Users || 
                       <a class = "text-light" href=""> Add User </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                                
                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                <thead class="bg-dark text-light">

                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($user as $data)
                                        <tr>
                                            <td> {{ $data -> id }} </td>
                                            <td> {{ $data -> name }} </td>
                                            <td> {{ $data -> email }} </td>
                                            <td>
                                                <a href="" class="btn btn-primary mx-1">Edit</a>
                                                <a href="" class="btn btn-danger mx-1">Delete</a>
                                                
                                            </td> 
                                        </tr>
                                    @endforeach            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </main>
    </body>
   

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>