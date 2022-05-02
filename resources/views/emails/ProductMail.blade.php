@component('mail::message')
# Introduction

your product successfully buyed!

@component('mail::message')
<p>Product Name: {{$data['name']}}</p>
<p>Product Price: {{$data['price']}}</p>
<p>Category: {{$data['category']}}</p>
<p>Seller Name: {{$data['seller']}}</p>
@endcomponent

Thanks,<br>
@endcomponent
