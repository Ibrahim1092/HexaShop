@extends('site.layout')
@section('content')
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Our Products</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section" id="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Our Latest Products</h2>
                    <span>Check out all of our products.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($product as $item)
            @php
                $image = explode('|',$item->images);
            @endphp
            <div class="col-lg-4">
                <div class="item">
                    <div class="thumb">
                        <div class="hover-content">
                            <ul>
                                <li><a href="{{route('/product/singleproduct',$item->slug)}}"><i class="fa fa-eye"></i></a></li>
                                {{-- <li><a href="single-product.html"><i class="fa fa-star"></i></a></li> --}}
                                <li><a href="{{route('/addtocart',$item->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <img src="{{asset($image[0])}}" alt="">
                    </div>
                    <div class="down-content">
                        <h4>{{$item->name}}</h4>
                        <span>{{$item->price}} <strong style="color: red">sp</strong></span>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
