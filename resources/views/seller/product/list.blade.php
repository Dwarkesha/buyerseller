
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  </head>
  <body>

  <h2><b>Product</b></h2><br>

  <div>
  <a class="btn btn-info btn-sm" href="{{url('productcreate')}}">Add</a>
  <a class="btn btn-info btn-sm" href="{{url('sellerindex')}}">Back</a>
  </div><br>

  <table id="myTable" class="table table-striped">  
        <thead>  
          <tr>  
            <th>Sr.No.</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category Name</th>
            <th>Action</th>
          </tr>  
        </thead>  
        <tbody>  
        @foreach($products as $key => $product)
          <tr>  
            <td>{{$key + 1}}</td>
            <td><img src="{{ Storage::url($product->image) }}" style="width: 50px;height: 50px;"></td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->category->name}}</td>
            <td>
            <a class="btn btn-info btn-sm" href="{{url('/productview', ['id' => $product->id])}}">
                view
            </a>

            <a class="btn btn-info btn-sm" href="{{url('/productedit', ['id' => $product->id])}}">
                edit
            </a>

            <a class="btn btn-info btn-sm" href="{{url('/productdelete', ['id' => $product->id])}}">
                delete
            </a>

            </td>
          </tr>  
        @endforeach
        </tbody>  
      </table>  

    </body>
</html>


<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>

</script>