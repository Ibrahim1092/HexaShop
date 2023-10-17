@extends('site.layout')
@section('content')


    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>{{$product->english_name}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                @php
                    $images = explode('|',$product->images);
                @endphp
                <div class="col-lg-8">
                    <div class="left-images">
                        @foreach ($images as $image)
                        <img src="{{asset($image)}}" alt="">
                        @endforeach
                </div>
             </div>
             <div class="col-lg-4">
                <div class="right-content">
                    <h4>{{$product->english_name}}</h4>
                    <span class="price">{{$product->price}} <strong style="color: red">sp</strong></span>
                    {{-- <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut labore.</span> --}}
                    <div class="quote">
                        <i class="fa fa-quote-left"></i><p>{{$product->english_description}}</p>
                    </div>
                    <div class="quantity-content">
                        {{-- <div class="right-content">
                            <div class="quantity buttons_added">
                                <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                            </div>
                        </div> --}}
                    </div>
                    <div class="total">
                        {{-- <h4>Total: $210.00</h4> --}}
                        <div class="main-border-button"><a href="{{route('/addtocart',$product->id)}}">Add To Cart</a></div>
                    </div>
                </div>

             </div>
            </div>
        </div>
    </section>
    @endsection
