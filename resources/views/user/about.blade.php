@extends('site.layout')
@section('content')
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>About Our Company</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image">
                        <img src="{{asset($about->left_image)}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <h4>About Us &amp; Our Skills</h4>
                        {{-- <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut labore.</span> --}}
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>{{$about->about_us}}</p>
                        </div>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p> --}}
                        <ul>
                            <li><a href="{{$about->facebook}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$about->instagram}}"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{$about->behance}}"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Services Area Starts ***** -->
    <section class="our-services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Services</h2>
                    </div>
                </div>
                @foreach ($service as $item)
                <div class="col-lg-4">
                    <div class="service-item">
                        <h4>{{$item->Title}}</h4>
                        <p>{{$item->Description}}</p>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Services Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Store Location:<br><span>{{$about->store_location}}</span></li>
                                <li>Phone:<br><span>{{$about->phone}}</span></li>
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
