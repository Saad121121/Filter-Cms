@extends('layouts.main')
@section('title', 'Cart')
@section('css')

  <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.html" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="index.html">Men's</a></li>
                            <li class="scroll-to-section"><a href="index.html">Women's</a></li>
                            <li class="scroll-to-section"><a href="index.html">Kids</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Pages</a>
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="products.html">Products</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="index.html">Explore</a></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Check Our Products</h2>
                        <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
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
				    </ul>s
			    </div> <img src="{{ asset('' . $shop->image) }}">  <img src="" alt=""> </div>

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
            </div>
        </div>
    </div>
</div>

          <br></br>
                <div class="col-lg-12">
                    <div class="pagination">
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
          <br></br>
                <div class="col-lg-12">
                    <div class="pagination">
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
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
    
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

@endsection
  
  
  
  







  
  
  
  
  
  
  
  
  
  
