@extends('layouts.main')
@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->
    <!-- ============================================================== -->
    <?php
    
    $categories = DB::table('categories')->get();
    use App\wishlists;
    
    ?>


    <section class="banner inner-banner" style="background-image: url({{ asset('images/banner.png') }});">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ul>
                        <li>
                            <img src="{{ asset('images/1-star.png') }}" alt="">
                        </li>
                        <li>
                            <div class="banner-content">
                                <div class="section-heading">
                                    <h1 class="red">Store</h1>
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('images/1-star.png') }}" alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="shop">
        <div class="container">
            <div class="row">

                @foreach ($shop as $shops)
                    <div class="col-lg-3 col-lg-4 col-md-6">
                        <div class="shop-box">
                            <figure>
                                <img src="{{ asset($shops->image) }}" alt="">
                            </figure>
                            <h6>{{ $shops->product_title }}</h6>
                            <div class="stars">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <ul>
                                <li>
                                    <h5>${{ $shops->price }}</h5>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('shopDetail', ['id' => $item->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $item->product_title)))]) }}}">Add
                                        to cart</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- <section class="sliderMain   bannersec">
            <div id="carousel-example-generic1" class="carousel slide online-main" data-ride="carousel"> -->
    <!-- Wrapper for slides -->
    <!-- <div class="carousel-inner" role="listbox">
                <div class="item active ">
                    <div class="sliderOverly">
                        <img src="images/bannar1.jpg" alt="slider">
                    </div>
                    <div class="container">
                        <div class="onepic">
                            <div class="carousel-caption">
                                <div class="carousel-captionDiv wow fadeInLeft" wow-data-duration="2s" style="visibility: visible; animation-name: fadeInLeft;">
                                    <h1>Pricing</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
    <!-- Controls -->
    <!-- </div>
        </section> -->
    <!-- <section class="ProductSec">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-11 Middle row_flex">
                        <div class="col-xs-12 col-sm-4">
                            <h3>All Products</h3>
                            <h4>2021 GRAND OPENING SPECIALS</h4>
                        </div>
                        <div class="col-xs-12 col-sm-8 marg-top">
                            <p>Our 24hr Trial is a One Device Connection extended now to 36hrs+
                            <P>The $5.00 cost will be applied to your first-month subscription purchase</P>
                            <P>All of our 12-month subscriptions are now 10% off the regular price for the duration of 2021</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-11 Middle">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ALL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">1  Device</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">2 Device</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">3 Device</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">4 Device</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">5 Device</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade in active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="allproduct">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="TabBox">
                                            <div class="tab_img">
                                                <img src="images/icon04.png" class="img-responsive" alt="">
                                            </div>
                                            <h3>1A - 1 dEVICE fOR 1 month </h3>
                                            <span class="monthly">17.00/<small>Monthly</small> </span>
                                            <a href="" class="select_btn">Select Options</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="TabBox">
                                            <div class="tab_img">
                                                <img src="images/icon04.png" class="img-responsive" alt="">
                                            </div>
                                            <h3>1A - 1 dEVICE fOR 1 month </h3>
                                            <span class="monthly">17.00/<small>Monthly</small> </span>
                                            <a href="" class="select_btn">Select Options</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="TabBox">
                                            <div class="tab_img">
                                                <img src="images/icon04.png" class="img-responsive" alt="">
                                            </div>
                                            <h3>1A - 1 dEVICE fOR 1 month </h3>
                                            <span class="monthly">17.00/<small>Monthly</small> </span>
                                            <a href="" class="select_btn">Select Options</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="allproduct">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="TabBox">
                                            <div class="tab_img">
                                                <img src="images/icon04.png" class="img-responsive" alt="">
                                            </div>
                                            <h3>1A - 1 dEVICE fOR 1 month </h3>
                                            <span class="monthly">17.00/<small>Monthly</small> </span>
                                            <a href="" class="select_btn">Select Options</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="TabBox">
                                            <div class="tab_img">
                                                <img src="images/icon04.png" class="img-responsive" alt="">
                                            </div>
                                            <h3>1A - 1 dEVICE fOR 1 month </h3>
                                            <span class="monthly">17.00/<small>Monthly</small> </span>
                                            <a href="" class="select_btn">Select Options</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="TabBox">
                                            <div class="tab_img">
                                                <img src="images/icon04.png" class="img-responsive" alt="">
                                            </div>
                                            <h3>1A - 1 dEVICE fOR 1 month </h3>
                                            <span class="monthly">17.00/<small>Monthly</small> </span>
                                            <a href="" class="select_btn">Select Options</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="allproduct">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="TabBox">
                                            <div class="tab_img">
                                                <img src="images/icon04.png" class="img-responsive" alt="">
                                            </div>
                                            <h3>1A - 1 dEVICE fOR 1 month </h3>
                                            <span class="monthly">17.00/<small>Monthly</small> </span>
                                            <a href="" class="select_btn">Select Options</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="TabBox">
                                            <div class="tab_img">
                                                <img src="images/icon04.png" class="img-responsive" alt="">
                                            </div>
                                            <h3>1A - 1 dEVICE fOR 1 month </h3>
                                            <span class="monthly">17.00/<small>Monthly</small> </span>
                                            <a href="" class="select_btn">Select Options</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="TabBox">
                                            <div class="tab_img">
                                                <img src="images/icon04.png" class="img-responsive" alt="">
                                            </div>
                                            <h3>1A - 1 dEVICE fOR 1 month </h3>
                                            <span class="monthly">17.00/<small>Monthly</small> </span>
                                            <a href="" class="select_btn">Select Options</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="allproduct">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="TabBox">
                                            <div class="tab_img">
                                                <img src="images/icon04.png" class="img-responsive" alt="">
                                            </div>
                                            <h3>1A - 1 dEVICE fOR 1 month </h3>
                                            <span class="monthly">17.00/<small>Monthly</small> </span>
                                            <a href="" class="select_btn">Select Options</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="TabBox">
                                            <div class="tab_img">
                                                <img src="images/icon04.png" class="img-responsive" alt="">
                                            </div>
                                            <h3>1A - 1 dEVICE fOR 1 month </h3>
                                            <span class="monthly">17.00/<small>Monthly</small> </span>
                                            <a href="" class="select_btn">Select Options</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="TabBox">
                                            <div class="tab_img">
                                                <img src="images/icon04.png" class="img-responsive" alt="">
                                            </div>
                                            <h3>1A - 1 dEVICE fOR 1 month </h3>
                                            <span class="monthly">17.00/<small>Monthly</small> </span>
                                            <a href="" class="select_btn">Select Options</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

    <!-- <section class="bannerSec">
              <img src="{{ asset('images/inner-page-banner.jpg') }}" class="img-responsive" alt="Banner">
              <div class="banner-overlay">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h1>Store</h1>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="products-sec body-space">
              <div class="container">
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="products-tabs">
                      <ul class="nav nav-tabs" role="tablist">
                        <h3>Categories</h3>
            
            @foreach ($categories as $value)
    <li role="presentation"><a href="{{ url('category-detail/' . $value->id) }}">{{ $value->name }}</a></li>
    @endforeach
            
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="lights">
           
            @foreach (array_chunk($shop, 3) as $product)
    <div class="row">
             @foreach ($product as $value)
    <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="product-box">
              <div class="product-img"><img class="img-responsive" src="{{ asset($value->image) }}" alt="image"></div>
              <h4>{{ $value->product_title }}</h4>
              <a href="{{ URL('shop-detail/' . $value->id) }}"><h5>$ {{ $value->price }}</h5></a>
              </div>
             </div>
    @endforeach
             </div>
    @endforeach
            
                      </div>
           
                    </div>
                  </div>
                </div>
              </div>
            </section> -->



    <!-- ============================================================== -->
    <!-- BODY END HERE -->
    <!-- ============================================================== -->
@endsection
@section('css')
    <style>
        .filter_sorting ul.list-group {
            margin-right: 25px !important;
            margin-top: 15px;
        }

    </style>
@endsection
@section('js')
    <script type="text/javascript">

    </script>
@endsection
