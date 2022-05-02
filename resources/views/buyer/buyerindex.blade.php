


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

  <h2><b>Product List</b></h2><br>

  <div>
    <a href="{{url('/home')}}" > <button type="button">Back</button> </a> 
  </div><br>

  <div>
    <a href="{{url('/profile', ['id' => $user->id])}}" > <button type="button">Profile</button> </a> 
  </div><br>

  <div>
    <a href="{{url('/buyerhistory', ['id' => $user->id])}}" > <button type="button">History</button> </a> 
  </div><br>

  <div>
    <a href="{{url('parchaselist')}}" > <button type="button">Parchase List</button> </a> 
  </div><br>

  <form method="post">
  startprice: <input type="text" name="start_price" id="start_price"/>
    <div>to</div>
  endprice: <input type="text"  name="end_price" id="end_price" />

  <a type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</a>
  </form><br>

  <form method="get">
  <select id="category" name="category" data-error-container="#brand-error">
      <option>Select category</option>
        @foreach($categorys as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
  </select>

  <a type="button" name="filter" id="categoryfilter" class="btn btn-info btn-sm">Filter</a>
  </form><br>

  <table id="myTable" class="table table-striped">  
        <thead>  
          <tr>  
          <th>Sr.No.</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Seller Name </th>
            <th>Category Name</th>
            <th>Action</th>
          </tr>  
        </thead>  
        <tbody>  
        @foreach($products as $key => $product)
          <tr>  
            <td>{{$key + 1}}</td>
            <td><img src="{{url('/')}}/{{$product->image }}" style="width: 50px;height: 50px;"></td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->users->full_name}}</td>
            <td>{{$product->category->name}}</td>
            <td>
            <a class="btn btn-info btn-sm" href="{{url('/productdetail', ['id' => $product->id])}}">
                view
            </a>
            </td>
          </tr>  
        @endforeach
        </tbody>  
      </table>  

    </body>
</html>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
    
    $('#filter').on('click',function(){
    $start_price=$('#start_price').val();
    $end_price=$('#end_price').val();
   
    $.ajax({
      method:"POST",
    url : "{{ route('productfilter') }}",
    data:{
      '_token': '{{ csrf_token() }}',
      'start_price':$start_price,
      'end_price':$end_price,
    },
    success:function(data){
      console.log(data);
      var output = '';
      
      for(var count = 1; count < data.length; count++)
      {
      output += '<tr>';
      output += '<td>' + count + '</td>';
      output += '<td><img src="'+data[count].image+'" style="width: 50px;height: 50px;"></td>';
      output += '<td>' + data[count].name  + '</td>';
      output += '<td>' + data[count].price  + '</td>';
      output += '<td>' + data[count].users.full_name  + '</td>';
      output += '<td>' + data[count].category.name  + '</td>';
      
      }
      // $("#tablebody").html("");
      $('table').html(output);
    }
    });
    })


    $('#categoryfilter').on('click',function(){
    $category=$('#category').val();
   
    $.ajax({
      method:"get",
    url : "{{ route('categoryfilter') }}",
    data:{
      'category_id':$category,
    },
    success:function(data){
     
      var output = '';
      
      for(var count = 1; count < data.length; count++)
      {
      output += '<tr>';
      output += '<td>' + count + '</td>';
      output += '<td><img src="'+data[count].image+'" style="width: 50px;height: 50px;"></td>';
      output += '<td>' + data[count].name  + '</td>';
      output += '<td>' + data[count].price  + '</td>';
      output += '<td>' + data[count].users.full_name  + '</td>';
      output += '<td>' + data[count].category.name  + '</td>';
      
      }
      // $("#tablebody").html("");
      $('table').html(output);
    }
    });
    })
});
</script>

</script>

