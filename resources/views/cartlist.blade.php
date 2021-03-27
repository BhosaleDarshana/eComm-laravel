@extends('master')
@section('content')
<div class="custom-product">
<div class="col-sm-4">
<a href="#"></a>
</div>
<div class="col-sm-10">
<div class="trending-wrapper">
<h3>products in cart list</h3>
<div class="carousel-inner">
    @foreach($products as $item)
    <div class="row searched-item cart-list-divider">
      <div class="col-sm-3">
      <a href="detail/{{$item->id}}"> <!--when it is joint we use $item->id rather than $item['id'] -->
      <img class="trending-img" src="{{$item->gallary}}" >
      </a>
      </div>

      <div class="col-sm-3">
      <div class="">
        <h3>{{$item->name}}</h3>
        <p>{{$item->description}}</p>
      </div>
      </div>

      <div class="col-sm-3">
      <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">remove from cart</a>
      </div>

      </div>
      @endforeach
    </div>
</div>
</div>
@endsection