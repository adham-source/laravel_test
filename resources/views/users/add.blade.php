<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <title>{{ $title }}</title>
  </head>
  <body>
    <body class="bg-light">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-lg my-5">
                            <div class="card-header bg-dark text-light">
                                <h3 class="text-center font-weight-light my-2">Add users</h3>
                            </div>
                            <div class="card-body">
                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <ul>
                                            @foreach ($errors->all() as $error )
                                                <li> {{$error}} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="" action="{{ url('user') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="small mb-1" for="name">Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control py-4" id="name"  placeholder="Enter your name .." autocomplete="off" />
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">Email</label>
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control py-4" id="email"  placeholder="Enter your email .." autocomplete="off" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="small mb-1" for="password">Password</label>
                                        <input type="text" name="password" value="{{ old('password') }}" class="form-control py-4" id="password"  placeholder="Enter password .." autocomplete="off" />
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </form>
                            </div>
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