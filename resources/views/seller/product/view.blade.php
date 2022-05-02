
<h2>Product Detail</h2>

<p>Image : <img src="{{url('/')}}/{{$products->image }}" style="width: 50px;height: 50px;"></p>
<p>Name : {{$products->name}}</p>
<p>Price : {{$products->price}}</p>
<p>Category : {{$products->category->name}}</p>

<div>
    <a href="{{url('/productlist')}}" > <button type="button">Back</button> </a> 
</div><br>


<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Request List</h2>

<table>

  <tr>

    <th>Name</th>
    <th>Address</th>
    <th>Contact No</th>
    <th>Action</th>
    
    
  </tr>
  @foreach($parchaseProducts as $parchaseProduct)
  <tr>
        
            <td>{{$parchaseProduct->buyeruser->full_name}}</td>
            <td>{{$parchaseProduct->buyeruser->address}}</td>
            <td>{{$parchaseProduct->buyeruser->contact_no}}</td>
            <td>
            <a class="btn btn-info btn-sm" href="{{url('/aceptrequest', ['id' => $parchaseProduct->id])}}">
                Acept
            </a>
            </td>

          
        
  </tr>
  @endforeach
</table>

</body>
</html>


