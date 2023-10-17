@extends('site.layout')
@section('content')
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Categories</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@php
$categname = array();
$catego = array();
foreach ($product as $p)
{
if (in_array($p->category->name ,$categname ))
{
    break;
}
else
{
    $categname[] = $p->category->name;
    $catego[] = $p;
}
}
@endphp
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Categories</h2>
                        {{-- <span>Check out all of our products.</span> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($catego as $item)
                @php
                    $images = explode('|', $item->images);
                @endphp
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                            </div>
                            <a href="{{route('/user/product',["class_id"=>$item->class->id , "category_id" => $item->category->id])}}"> <img src="{{asset($images[0])}}" alt="logo" /> </a>
                        </div>
                        <div class="down-content">
                            <h4 style="text-align:center">{{$item->category->name}}</h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </section>
@endsection
