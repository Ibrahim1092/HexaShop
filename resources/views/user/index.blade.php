@extends('site.layout')
@section('content')
<div class="main-banner" id="top">
    <div class="container-fluid">
        <div class="row">
         @foreach ($home as $item)
            <div class="col-lg-6">
                <div class="left-content">
                    <div class="thumb">
                        <div class="inner-content">
                            <h4>{{$item->title_image_left}}</h4>
                            <span>{{$item->description_image_left}}</span>
                            <div class="main-border-button">
                                {{-- <a href="#">Purchase Now!</a> --}}
                            </div>
                        </div>
                        <img src="{{asset($item->image_on_left)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>Men</h4>
                                        <span></span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>Men</h4>
                                            <p>{{$item->description_men_image}}</p>
                                            <div class="main-border-button">

                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{asset($item->men_image)}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>Women</h4>
                                        <span></span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>Women</h4>
                                            <p>{{$item->description_women_image}}</p>
                                            <div class="main-border-button">

                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{asset($item->women_image)}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>Kids</h4>
                                        <span></span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>Kids</h4>
                                            <p>{{$item->description_kid_image}}</p>
                                            <div class="main-border-button">

                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{asset($item->kid_image)}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Men's Latest</h2>
                    <span>The Best of Men Collection</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @foreach ($Mens as $item)
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="{{route('/product/singleproduct',$item->slug)}}"><i class="fa fa-eye"></i></a></li>
                                        {{-- <li><a href="single-product.html"><i class="fa fa-star"></i></a></li> --}}
                                        <li><a href="{{route('/addtocart',$item->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                @php
                                $Images = explode('|',$item->images);
                                $img = $Images[0];
                                @endphp
                                <img src="{{$img}}" alt="">
                            </div>
                            <div class="down-content">
                                <h4>{{$item->english_name}}</h4>
                                <span>{{$item->price}}</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section" id="women">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Women's Latest</h2>
                    <span>The Best of Women Collection</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @foreach ($women as $item)
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>

                                        <li><a href="{{route('/product/singleproduct',$item->slug)}}"><i class="fa fa-eye"></i></a></li>
                                        {{-- <li><a href="single-product.html"><i class="fa fa-star"></i></a></li> --}}
                                        <li><a href="{{route('/addtocart',$item->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                @php
                                $Images = explode('|',$item->images);
                                $img = $Images[0];
                                @endphp
                                <img src="{{$img}}" alt="">
                            </div>
                            <div class="down-content">
                                <h4>{{$item->english_name}}</h4>
                                <span>{{$item->price}}</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section" id="kids">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Kid's Latest</h2>
                    <span>The Best of Kid's Collection</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @foreach ($kids as $item)
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>

                                        <li><a href="{{route('/product/singleproduct',$item->slug)}}"><i class="fa fa-eye"></i></a></li>
                                        {{-- <li><a href="single-product.html"><i class="fa fa-star"></i></a></li> --}}
                                        <li><a href="{{route('/addtocart',$item->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                @php
                                $Images = explode('|',$item->images);
                                $img = $Images[0];
                                @endphp
                                <img src="{{$img}}" alt="">
                            </div>
                            <div class="down-content">
                                <h4>{{$item->english_name}}</h4>
                                <span>{{$item->price}}</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-6">
                        <ul>
                            <li>Store Location:<br><span>{{$about->store_location}}</span></li>
                            <li>Phone:<br><span>{{$about->phone}}</span></li>
                            {{-- <li>Office Location:<br><span>North Miami Beach</span></li> --}}
                            <li>Work Hours:<br><span>{{$about->work_hours}}</span></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul>

                            <li>Email:<br><span>{{$about->email}}</span></li>
                            <li>Social Media:<br><span><a href="{{$about->facebook}}">Facebook</a>, <a href="{{$about->instagram}}">Instagram</a>, <a href="{{$about->behance}}">Behance</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
