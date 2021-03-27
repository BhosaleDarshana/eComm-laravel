@extends('master')
@section('content')
<div class="custom-product">
<div class="col-sm-4">
<a href="#">filter</a>
</div>
<div class="col-sm-4">
<div class="trending-wrapper">
<h3>Result for products</h3>
<div class="carousel-inner">
    @foreach($products as $item)
    <div class="searched-item">
      <a href="detail/{{$item['id']}}">
      <img class="trending-img" src="{{$item['gallary']}}" >
      <div class="">
        <h3>{{$item['name']}}</h3>
        <p>{{$item['description']}}</p>
      </div>
      </a>
      </div>
      @endforeach
    </div>
</div>
</div>
@endsection