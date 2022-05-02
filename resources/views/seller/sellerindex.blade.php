<div>
    <a href="{{url('/home')}}" > <button type="button">Back</button> </a> 
</div><br>

<div>
    <a href="{{url('/profile', ['id' => $user->id])}}" > <button type="button">Profile</button> </a> 
</div><br>

<div>
    <a href="{{url('/selledhistory')}}" > <button type="button">History</button> </a> 
</div><br>

<a href="{{url('productlist')}}"> <h4>Product</h4> </a>