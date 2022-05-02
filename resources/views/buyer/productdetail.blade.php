
<h2>Product Detail</h2>



<p>Image : <img src="{{url('/')}}/{{$products->image }}" style="width: 50px;height: 50px;"></p>
<p>Name : {{$products->name}}</p>
<p>Price : {{$products->price}}</p>
<p>Seller Name : {{$products->users->full_name}}</p>
<p>Seller Contact No. : {{$products->users->contact_no}}</p>
<p>Seller Address. : {{$products->users->address}}</p>
<p>Category : {{$products->category->name}}</p>

@if(empty($parchaseProduct))  
<div>
    <a onclick="changeStatus('<?php echo $products->id;?>')"> <button type="button">Purchase</button> </a> 
</div><br>

@elseif($parchaseProduct->is_parchase == '2')

<div>
    <a href="{{url('/buynow', ['id' => $products->id])}}" > <button type="button">Buy Now</button> </a> 
</div>

@endif

<div>
    <a href="{{url('/buyerindex')}}" > <button type="button">Back</button> </a> 
</div><br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script>
  function changeStatus(id)
                {
                    $.ajax({
                        url: "{{ route('changeparchasestatus') }}",
                      method:"POST",
                      data:{ "_token": "{{ csrf_token() }}",'id':id},
                      success:function(data){
                            window.location.reload();
                            }
                          });
                          
                 }
               
            </script>  
           
</script>