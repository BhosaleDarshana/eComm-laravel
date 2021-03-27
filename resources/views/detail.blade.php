@extends('master')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-6">
<img class="product-img" src="{{$product['gallary']}}" alt="">
</div>
<div class="col-md-6">
<a href="/">Go back</a>
<h1>Name: {{$product['name']}}</h1>
<h2>Price: {{$product['price']}}</h2>
<h3>Category: {{$product['category']}}</h3>
<h3>Description: {{$product['description']}}</h3>
<br><br>
<form action="/add_to_cart" method="POST">
<input type="hidden" name="product_id" value="{{$product['id']}}">
@csrf
<button class="btn btn-success">Add to cart</button>
</form>
<br/><br/>
<button class="btn btn-primary">Buy Now</button>
</div>
</div>
</div>
@endsection