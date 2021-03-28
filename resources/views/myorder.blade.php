@extends('master')
@section('content')
<div class="custom-product">
<div class="col-sm-4">
<a href="#"></a>
</div>
<div class="col-sm-10">
<div class="trending-wrapper">
<h3>products in Order list</h3>

<div class="carousel-inner">
    @foreach($orders as $item)
    <div class="row searched-item cart-list-divider">
      <div class="col-sm-3">
      <a href="detail/{{$item->id}}"> <!--when it is joint we use $item->id rather than $item['id'] -->
      <img class="trending-img" src="{{$item->gallary}}" >
      </a>
      </div>

      <div class="col-sm-3">
      <div class="">
        <h3>{{$item->name}}</h3>
        <p>Delivery status : {{$item->status}}</p>
        <p>Payment status : {{$item->payment_status}}</p>
        <p>Pament Method : {{$item->payment_method}}</p>
        <p>Delivery Address : {{$item->address}}</p>
        <p>Price : {{$item->price}}</p>
      </div>
      </div>

      <div class="col-sm-3">
      
      </div>

      </div>
      @endforeach
    
    </div>
</div>
</div>
@endsection