@php
    $total = 0;
    $cart_total = 0;
@endphp
@extends('site.layout')
@section('content')
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cart-area bg-1 ptb-130">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-xs-12">
                <div class="shoping-cart-wrap table-responsive  bg-2 mb-30">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="shoping-cart-img">Image</th>
                                <th class="shoping-cart-name">Product Name</th>
                                <th class="shoping-cart-price">Price</th>
                                <th class="shoping-cart-quantity">Quantity</th>
                                <th class="shoping-cart-total">Total</th>
                                <th class="shoping-cart-remove">Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @if ($message = session()->get('cartdata'))
                                <tr>
                                    @foreach ($message as $item)
                                    @php
                                        $image = explode('|',$item['images']);
                                    @endphp
                                    <td  class="shoping-cart-img">
                                        <img  class="shoping-cart-img" src="{{asset($image[0])}}" alt="" />
                                    </td>
                                    <td style="text-align: center" class="shoping-cart-name">
                                        <span>{{$item['name']}}</span>
                                    </td>
                                    <td style="text-align: center" class="shoping-cart-price">
                                        <span>{{$item['price']}}</span>
                                    </td>
                                    <td style="text-align: center" class="shoping-cart-quantity">
                                        <form action="{{route('/updatecart',$item['id'])}}" method="POST">
                                            @csrf
                                        <input type="number" name = "quantity" value="{{$item['quantity']}}"/>
                                    </td>
                                    <td style="text-align: center" class="shoping-cart-total">
                                        @php
                                            $total = $item['price'] * $item['quantity'];
                                            $cart_total = $cart_total + $total;
                                        @endphp
                                        <span>{{$total}}</span>
                                    </td>
                                    <td style="text-align: center" class="shoping-cart-remove">
                                        <div class="row responsive ">
                                            <div class="col" >
                                                <button class="btn btn-dark" type="submit"  ><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                            </form>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-dark" href="{{route('/removefromcart',$item['id'])}}"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="shoping-cart-btn">
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="shoping-cart-wrapper cart-form-wrap bg-2">
                            <h3 class="widget-title">Cart Totals</h3>
                            <ul>
                                <li>Cart Total <span>{{$cart_total}}</span></li>
                            </ul>
                            @if ($message = session()->get('cartdata'))
                            <a class="btn btn-dark" href="{{route('/user/checkout')}}">Proceed To Checkout</a>
                                {{-- <button type="submit">Proceed To Checkout</button> --}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
