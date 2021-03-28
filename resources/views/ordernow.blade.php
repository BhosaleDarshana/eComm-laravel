@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">

        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Price</td>
                    <td>{{$total}} Rupees</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Tax</td>
                    <td>0 Rupees</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Delivery charges</td>
                    <td>100</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Total Amount</td>
                    <td>{{$total+100}}</td>
                </tr>
            </tbody>
        </table>

        <form action="orderplace" method="POST">
        @csrf
            <div class="form-group">
                <textarea name="address" placeholder="enter your address" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Payment method</label>
                <p><input type="radio" value="cash" name="payment"><span> Online Payment</span></p>
                <p><input type="radio" value="cash" name="payment"><span> EMI Payment</span></p>
                <p><input type="radio" value="cash" name="payment"><span> Cash On Delivery</span></p>
            </div>
            <button type="submit" class="btn btn-default">Order Now</button>
        </form>
    </div>
</div>
@endsection