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

<h3>Add Nwe Product</h3>

<div class="container">
  <form id="frmAdd" method="post" action="{{url('/productedit')}}" enctype="multipart/form-data">
    
    @csrf
  

    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}" id="name" name="name" placeholder="Product name..">
    <input type="hidden" name="id" value="{{ $product->id }}">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong style="color:red">{{ $message }}</strong>
      </span>
    @enderror
    <br><br>


    <label for="price">Price</label>
    <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{$product->price}}"  id="price" name="price" placeholder="Enter price..">
    @error('price')
      <span class="invalid-feedback" role="alert">
        <strong style="color:red">{{ $message }}</strong>
      </span>
    @enderror
    <br><br>

 
   <label for="category_id">Category</label>
    <select id="category_id" class="form-control @error('category_id') is-invalid @enderror"  name="category_id" data-error-container="#brand-error">
        <option>Select category</option>
        @foreach($categorys as $category)
            <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected="" @endif >{{ $category->name }}</option>
        @endforeach
    </select>
        @error('category_id')
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $message }}</strong>
        </span>
        @enderror
    <br><br>


    <label for="image">Product Image:</label>
    <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control @error('image') is-invalid @enderror" id="image" name="image" tabindex="0" />
    @error('image')
        <span class="invalid-feedback" role="alert">
            <strong style="color:red">{{ $message }}</strong>
        </span>
    @enderror

    <div class="form-group row">
        <div class="col-md-12 col-md-offset-4">
            <div class="col-md-3 upload-img-item">
                <div class="thumb-imgs">
                    <img src="{{ Storage::url($product->image)}}" id="blah" alt="your image" class="img img-responsive" width="150px" height="auto">
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>

    <button type="submit" class="btn btn-success">Submit</button>
    <a href="{{url('/productlist')}}" > <button type="button">Cancle</button> </a> 
  </form>
</div>

<script>

$("#frmAdd").validate({
        rules: {
            category_id:{
                required:true,
            },

        },
        messages: {
            category_id: {
                required: "category field is required",
            },
        },
        
    });
</script>

</body>
</html>
