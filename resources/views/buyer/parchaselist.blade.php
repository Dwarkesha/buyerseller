


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

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

<div>
    <a href="{{url('/buyerindex')}}" > <button type="button">Back</button> </a> 
</div><br>

<div class="container">
  <h3>Parchase Product List</h3>
  <ul class="list-inline">
    <li><a href="{{url('parchaselist')}}">Acepted Request List</a></li>
    <li><a href="{{url('pendingparchaselist')}}">Pending Request List</a></li>
  </ul>
</div><br>


<div class="{{ request()->is('parchaselist') ? 'active' : null }}" id="{{url('parchaselist')}}">

<table>

  <tr>
    <th>Sr.No.</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Seller Name</th>
    
    
  </tr>
  @foreach($aceptedParchaseProducts as $key => $aceptedParchaseProduct)
  <tr>
            <td>{{$key + 1}}</td>
            <td>{{$aceptedParchaseProduct->product->name}}</td>
            <td>{{$aceptedParchaseProduct->product->price}}</td>
            <td>{{$aceptedParchaseProduct->selleruser->full_name}}</td>
            
        
  </tr>
 @endforeach
</table>
</div>


<!-- <div class="{{ request()->is('pendingparchaselist') ? 'active' : null }}" id="{{url('pendingparchaselist')}}">

<table>

  <tr>
    <th>Sr.No.</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Seller Name</th>
    
    
  </tr>
  @foreach($aceptedParchaseProducts as $key => $aceptedParchaseProduct)
  <tr>
            <td>{{$key + 1}}</td>
            <td>{{$aceptedParchaseProduct->product->name}}</td>
            <td>{{$aceptedParchaseProduct->product->price}}</td>
            <td>{{$aceptedParchaseProduct->selleruser->full_name}}</td>
            
        
  </tr>
 @endforeach
</table>
</div> -->

</body>
</html>






