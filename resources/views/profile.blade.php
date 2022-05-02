<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Profile Data</h3>

<div class="container">
  <form method="post" action="{{url('/profile')}}">
    
    @csrf

    <label for="full_name">Full Name</label>
    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{$userData->full_name}}" placeholder="Your name..">
    @error('full_name')
      <span class="invalid-feedback" role="alert">
        <strong style="color:red">{{ $message }}</strong>
      </span>
    @enderror
    <br><br>
    <input type="hidden" name="id" value="{{ $userData->id }}">


    <label for="email">Email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$userData->email}}" placeholder="Your email..">
    @error('email')
      <span class="invalid-feedback" role="alert">
        <strong style="color:red">{{ $message }}</strong>
      </span>
    @enderror
    <br><br>

    <label for="contact_no">Contact No.</label>
    <input type="text" class="form-control @error('contact_no') is-invalid @enderror" id="contact_no" name="contact_no" value="{{$userData->contact_no}}" placeholder="Your contact no..">
    @error('contact_no')
      <span class="invalid-feedback" role="alert">
        <strong style="color:red">{{ $message }}</strong>
      </span>
    @enderror
    <br><br>

    <label for="address">Address</label>
    <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Write address.." style="height:100px">{{$userData->address}}</textarea>
    @error('address')
      <span class="invalid-feedback" role="alert">
        <strong style="color:red">{{ $message }}</strong>
      </span>
    @enderror
    <br><br>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{url('/home')}}" > <button type="button">Cancle</button> </a> 
  </form>
</div>



</body>
</html>
