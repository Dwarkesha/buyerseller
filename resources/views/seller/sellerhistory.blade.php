

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

  <div>
    <a href="{{url('/sellerindex')}}" > <button type="button">Back</button> </a> 
  </div><br>


  <div class="container">
  <h3>Product History List</h3>
  <ul class="list-inline">
    <li><a href="{{url('selledhistory')}}">Selled Product List</a></li>
    <li><a href="{{url('aceptedrequesthistory')}}">Acepted Request Product List</a></li>
  </ul>
  </div><br>

  <table id="myTable" class="table table-striped">  
        <thead>  
          <tr>  
          <th rowspan="2">Sr.No.</th>
          <th rowspan="2">Name</th>
          <th rowspan="2">Price</th>
          <th colspan="3">Buyer Detail</th>
          <th rowspan="2">Date</th>
           
          </tr>  

          <tr>
          <th>Buyer Name</th>
          <th>Address</th>
          <th>Contact Number</th>
        </tr>

        </thead>  
        <tbody>  
        @foreach($productHistorys as $key => $productHistory)
        <tr>
                  <td>{{$key +1}}</td>
                  <td>{{$productHistory->product->name}}</td>
                  <td>{{$productHistory->product->price}}</td>
                  <td>{{$productHistory->buyeruser->full_name}}</td>
                  <td>{{$productHistory->buyeruser->address}}</td>
                  <td>{{$productHistory->buyeruser->contact_no}}</td>
                  <td>{{$productHistory->created_at}}</td>
                  
              
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

