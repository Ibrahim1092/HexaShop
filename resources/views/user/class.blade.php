@php
    $man = null;
    $woman = null;
    $kids = null;
    $other = null;
@endphp
@foreach ($home as $item)
@php
    $other = $item->image_on_left;
    $man = $item->men_image;
    $woman = $item->women_image;
    $kids = $item->kid_image;
@endphp
@endforeach
@extends('site.layout')
@section('content')
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Types</h2>
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
                    <h2>Classes</h2>
                    {{-- <span>Check out all of our products.</span> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($class as $item)
            <div class="col-lg-4">
                <div class="item">
                    <div class="thumb">
                        <div class="hover-content">
                        </div>
                        @if ($item->type == "Man's")
                        <a href="{{route('/user/categories',$item->id)}}"> <img src="{{asset($man)}}" alt="logo" /> </a>
                        @elseif (($item->type == "Woman's"))
                        <a href="{{route('/user/categories',$item->id)}}"> <img src="{{asset($woman)}}" alt="logo" /> </a>
                        @elseif (($item->type == "Kids"))
                        <a href="{{route('/user/categories',$item->id)}}"> <img src="{{asset($kids)}}" alt="logo" /> </a>
                        @else
                        <a href="{{route('/user/categories',$item->id)}}"> <img src="{{asset($other)}}" alt="logo" /> </a>
                        @endif
                    </div>
                    <div class="down-content">
                        <h4 style="text-align:center">{{$item->type}}</h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>
@endsection
