
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
                    @if(session('success'))
                        <div class="alert alert-success" role='alert'>
                            {{ session('success') }}
                        </div>
                   @endif
                    <div class="card-header">
                        <h1 class="float-start" > Product list</h1>
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

                            @foreach($products as $key=>$product)
                             <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->name}}</td>
                                <td>
                                    <img src="{{asset('products'.$product->image)}}" alt="{{$product->name}}" height="60px" width="50px">
                                </td>
                                <td>{{$product->price}}</td>
                                <td>{{date('d-m-Y H:i A ', strtotime($product->created_at))}}</td>
                                <td>{{($product->created_at == $product->updated_at) ? 'N/A' :   date('d-m-Y H:i A ', strtotime($product->updated_at))}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{route('user.product.edit', $product->id)}}" class="btn btn-info btn-sm ">Edit</a>
                                        <a href="{{route('user.product.delete', $product->id)}}" class="btn btn-danger btn-sm ">Delete</a>
                                    </div>
                                </td>
                             </tr>

                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
