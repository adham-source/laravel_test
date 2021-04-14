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
                        Members || 
                       <a class = "text-light" href="{{ url('member/create') }}"> Add Members </a>
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
                                    @foreach($member as $data)
                                        <tr>
                                            <td> {{ $data -> id }} </td>
                                            <td> {{ $data -> name }} </td>
                                            <td> {{ $data -> email }} </td>
                                            <td>
                                                <a href="{{ url('member/' . $data -> id . '/edit') }}" class="btn btn-primary mx-1">Edit</a>

                                                <button type="button" class="btn btn-danger mx-1" data-toggle="modal" data-target="#modalAccount{{ $data -> id }}">Delete</button>
                                                    <!-- Modal to confirm delete -->
                                                    <div class="modal fade" id="modalAccount{{ $data -> id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div class="alert alert-warning w-100" role="alert">Warning !</div>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure to delete the user account <strong class="text-danger">{{ $data -> name }}</strong> <br /> Click Confirm to Delete or Return</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ url('member/' . $data -> id) }}" method="post">
                                                                        {{-- create token to secure form --}}
                                                                        @csrf

                                                                        {{-- create input hidden to used method delete to delete data --}}
                                                                        <input type="hidden" value="delete" name="_method" />
                                                                        <button type="submit" class="btn btn-danger">Confirm</button>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Return</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                            </td> 
                                        </tr>
                                    @endforeach            
                                </tbody>
                            </table>

                            {{-- Show pagination --}}
                            {{ $member -> links() }}
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