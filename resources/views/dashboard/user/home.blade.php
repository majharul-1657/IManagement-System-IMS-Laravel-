{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard | Home</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top: 45px">
                 <h4>user Dashboard</h4><hr>
                 <table class="table table-striped table-inverse table-responsive">
                     <thead class="thead-inverse">
                         <tr>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Action</th>
                         </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>{{ Auth::guard('web')->user()->name }}</td>
                                 <td>{{ Auth::guard('web')->user()->email }}</td>
                                 <td>
                                     <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                     <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                                 </td>
                             </tr>
                         </tbody>
                 </table>
            </div>
        </div>
    </div>

</body>
</html> --}}




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <div class="row ">
            <div class="col-md-10 my-5">
                <div class="card">
                    {{-- @if(session('success'))
                        <div class="alert alert-success" role='alert'>
                            {{ session('success') }}
                        </div>
                   @endif --}}
                    <div class="card-header">
                        <h1 class="float-start" > Product list</h1>
                         {{-- <a href="{{route('product.create')}}" class="btn btn-outline-info btn-sm float-end"> Add Product </a> --}}
                      <a href="{{route('user.product.create')}}" class="btn btn-outline-info btn-sm float-end"> Add Product </a>

                        </div>
                    <div class="card-body">
                        <table class="table table-responsive">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

