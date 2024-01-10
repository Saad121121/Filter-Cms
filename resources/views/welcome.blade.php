@extends('layouts.main')
@section('content')


<!-- BODY START HERE -->

<div class="main-banner" id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <div class="thumb">
                        <div class="inner-content">
                            <h4>{{$page->name}}</h4>
                            {!!$page->content!!} 
                            <div class="main-border-button">
                            <a href="#">{!! $section[14]->value !!}</a>
                            </div>
                        </div>
                        <img src="{{ asset('assetsecom/images/left-banner-image.jpg')}}"  alt="">
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
                                      {!! $section[15]->value !!}
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                              {!! $section[15]->value !!}
                                          <div class="main-border-button">
                                              {!! $section[16]->value !!}
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ asset('assetsecom/images/baner-right-image-01.jpg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>Men</h4>
                                        <span>Best Clothes For Men</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>Men</h4>
                                            <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                            <div class="main-border-button">
                                                <a href="#">Discover More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ asset('assetsecom/images/baner-right-image-02.jpg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>Kids</h4>
                                        <span>Best Clothes For Kids</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>Kids</h4>
                                            <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                            <div class="main-border-button">
                                                <a href="#">Discover More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ asset('assetsecom/images/baner-right-image-03.jpg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-first-image">
                                <div class="thumb">
                                    <div class="inner-content">
                                        <h4>Accessories</h4>
                                        <span>Best Trend Accessories</span>
                                    </div>
                                    <div class="hover-content">
                                        <div class="inner">
                                            <h4>Accessories</h4>
                                            <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                            <div class="main-border-button">
                                                <a href="#">Discover More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ asset('assetsecom/images/baner-right-image-04.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Men Area Starts ***** -->
<section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Mens Latest</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        {{--  @dump($shops)  --}}
        <div class="container">
            
	<div class="row">
		<div class="col-lg-12">
			<div class="men-item-carousel">
				<div class="owl-men-item owl-carousel owl-loaded owl-drag">
					<div class="owl-stage-outer">
                    @foreach($shops as $shop)
<div class="owl-item active" style="width: 300px; margin-right: 30px;">
	<div class="item">
		<div class="thumb">
			<div class="hover-content">
				<ul>
					<li><a href="{{ route('shopDetail', $shop->id) }}"><i class="fa fa-eye"></i></a></li>
					<li><a href="{{ route('shopDetail', $shop->id) }}"><i class="fa fa-star"></i></a></li>
					<li><a href="{{ route('shopDetail', $shop->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
				</ul>
			</div>   <img src="{{ asset('' . $shop->image) }}">  <img src="" alt=""> </div>
		<div class="down-content">
			<strong>{{$shop->product_title}}</strong><span>{{$shop->price}}</span>
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
					<div class="owl-nav">
						<button type="button" role="presentation" class="owl-prev" fdprocessedid="r2t2ut"><span aria-label="Previous">‹</span></button>
						<button type="button" role="presentation" class="owl-next" fdprocessedid="yhj79p"><span aria-label="Next">›</span></button>
					</div>
					<div class="owl-dots">
						<button role="button" class="owl-dot active"><span></span></button>
						<button role="button" class="owl-dot"><span></span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


    </section>
<!-- ***** Men Area Ends ***** -->

<!-- ***** Women Area Starts ***** -->
<section class="section" id="women">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Womens Latest</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
        
          <div class="col-lg-12">
			<div class="men-item-carousel">
				<div class="owl-men-item owl-carousel owl-loaded owl-drag">
					<div class="owl-stage-outer">

                    @foreach($shops as $shop)
					<div class="owl-item active" style="width: 300px; margin-right: 30px;">
	<div class="item">
		<div class="thumb">
			<div class="hover-content">
				<ul>
					<li><a href="{{ route('shopDetail', $shop->id) }}"><i class="fa fa-eye"></i></a></li>
					<li><a href="{{ route('shopDetail', $shop->id) }}"><i class="fa fa-star"></i></a></li>
					<li><a href="{{ route('shopDetail', $shop->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
				</ul>
			</div>   <img src="{{ asset('' . $shop->image) }}">  <img src="" alt=""> </div>
		<div class="down-content">
						<strong>{{$shop->product_title}}</strong> <span>{{$shop->price}}</span>
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
					<div class="owl-nav">
						<button type="button" role="presentation" class="owl-prev" fdprocessedid="r2t2ut"><span aria-label="Previous">‹</span></button>
						<button type="button" role="presentation" class="owl-next" fdprocessedid="yhj79p"><span aria-label="Next">›</span></button>
					</div>
					<div class="owl-dots">
						<button role="button" class="owl-dot active"><span></span></button>
						<button role="button" class="owl-dot"><span></span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


                
</section>
<!-- ***** Women Area Ends ***** -->

<!-- ***** Kids Area Starts ***** -->
<section class="section" id="kids">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Kids Latest</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
			<div class="men-item-carousel">
				<div class="owl-men-item owl-carousel owl-loaded owl-drag">
					<div class="owl-stage-outer">

                    @foreach($shops as $shop)
					<div class="owl-item active" style="width: 300px; margin-right: 30px;">
	<div class="item">
		<div class="thumb">
			<div class="hover-content">
				<ul>
					<li><a href="{{ route('shopDetail', $shop->id) }}"><i class="fa fa-eye"></i></a></li>
					<li><a href="{{ route('shopDetail', $shop->id) }}"><i class="fa fa-star"></i></a></li>
					<li><a href="{{ route('shopDetail', $shop->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
				</ul>
			</div>   <img src="{{ asset('' . $shop->image) }}">  <img src="" alt=""> </div>
		<div class="down-content">
			<strong>{{$shop->product_title}}</strong> <span>{{$shop->price}}</span>
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
					<div class="owl-nav">
						<button type="button" role="presentation" class="owl-prev" fdprocessedid="r2t2ut"><span aria-label="Previous">‹</span></button>
						<button type="button" role="presentation" class="owl-next" fdprocessedid="yhj79p"><span aria-label="Next">›</span></button>
					</div>
					<div class="owl-dots">
						<button role="button" class="owl-dot active"><span></span></button>
						<button role="button" class="owl-dot"><span></span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- ***** Kids Area Ends ***** -->

<!-- ***** Explore Area Starts ***** -->
<section class="section" id="explore">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <h2>Explore Our Products</h2>
                    {!!$page->content!!}
                    <div class="quote">
                               
                            <i class="fa fa-quote-left"></i>{!! $section[3]->value !!}
                        </div>
                    {!! $section[4]->value !!}
                    <div class="main-border-button">
                        <a href="products.html">{!! $section[6]->value !!}</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="leather">
                               {!! $section[0]->value !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="first-image">
                                <img src="{!! $section[1]->value !!}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="second-image">
                            <img src="{!! $section[2]->value !!}" alt="">
                            
                            </div>
                        </div>
                        <div class="col-lg-6">
                            {!! $section[5]->value !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Explore Area Ends ***** -->

<!-- ***** Social Area Starts ***** -->

<section class="section" id="social">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Social Media</h2>
                       {!! $section[7]->value !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row images">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>{!! $item->name !!}</h2>
                </div>
            </div>

        @foreach($social as $item)
            <div class="col-2">
                <div class="thumb">
                    <div class="icon">
                        <a href="http://instagram.com">
                            <h6>Fashion</h6>
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <img src="{{asset($item->image) }}" alt="">
                </div>
            </div>
        @endforeach
        </div>
    </div>

    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>By Subscribing To Our Newsletter You Can Get 30% Off</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                    <form id="subscribe" action="" method="get">
					<div class="row">
						<div class="col-lg-5">
							<fieldset>
								<input name="name" type="text" id="name" placeholder="Your Name" required="" fdprocessedid="36r0g"> </fieldset>
						</div>
						<div class="col-lg-5">
							<fieldset>
								<input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="" fdprocessedid="fspi0f"> </fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset>
								<button type="submit" id="form-submit" class="main-dark-button" fdprocessedid="mba5jw"><i class="fa fa-paper-plane"></i></button>
							</fieldset>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-6">
						<ul>
							<li>Store Location:
                                <span>{!! App\Http\Traits\HelperTrait::returnFlag(1975) !!}</span></li>
							<li>Phone:
								<br><span>{!! App\Http\Traits\HelperTrait::returnFlag(59) !!}</span></li>
							<li>Office Location:
								<br><span>{!! App\Http\Traits\HelperTrait::returnFlag(519) !!}</span></li>
						</ul>
					</div>
                    <div class="col-6">
						<ul>
							<li>Work Hours:
								<br><span>{!! App\Http\Traits\HelperTrait::returnFlag(1973) !!}</span></li>
							<li>Email:
								<br><span>{!! App\Http\Traits\HelperTrait::returnFlag(218) !!}</span></li>
							<li>Social Media:
								<br><span><a href="#">{!! App\Http\Traits\HelperTrait::returnFlag(1974) !!}</a></span></li>
						</ul>
					</div>
            </div>
        </div>
    </div>
    </section>
    <!-- ***** Subscribe Area Ends ***** -->

@endsection

@section('css')

<style>

h1 {
    color: white;
}


h5 {
    color: white;
    padding-top: 10px;
    padding-bottom: 20px;
}

.main-banner .left-content .inner-content h4 {
    color: #fff;
    margin-top: -10px;
    font-size: 35px;
    font-weight: 700;
    margin-bottom: 20px;
}

</style>

@endsection


@section('js')

<script type="text/javascript"></script>

@endsection