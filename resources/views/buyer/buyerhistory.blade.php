


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  </head>
  <body>

  <div>
    <a href="{{url('/buyerindex')}}" > <button type="button">Back</button> </a> 
  </div><br>

  <form method="post">
  <input type="text" name="year" id="year" placeholder="Enter Year"/>
   
  <a type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</a>
  </form><br>


  <div class="container">
  <h3>Product History List</h3>
  </div><br>

  <table id="myTable" class="table table-striped">  
        <thead>  
          <tr>  
          <th rowspan="2">Sr.No.</th>
          <th rowspan="2">Name</th>
          <th rowspan="2">Price</th>
          <th colspan="3">Seller Detail</th>
          <th rowspan="2">Date</th>
           
          </tr>  

          <tr>
          <th>Seller Name</th>
          <th>Address</th>
          <th>Contact Number</th>
        </tr>

        </thead>  
        <tbody>  
        @foreach($parchaseProducts as $key => $parchaseProduct)
        <tr>
                  <td>{{$key +1}}</td>
                  <td>{{$parchaseProduct->product->name}}</td>
                  <td>{{$parchaseProduct->product->price}}</td>
                  <td>{{$parchaseProduct->selleruser->full_name}}</td>
                  <td>{{$parchaseProduct->buyeruser->address}}</td>
                  <td>{{$parchaseProduct->buyeruser->contact_no}}</td>
                  <td>{{$parchaseProduct->created_at}}</td> 
                  
              
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



