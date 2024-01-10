@extends('layouts.main')
@section('title', 'Cart')
@section('css')

<style>


h4 {
    padding-bottom: 6px;
    color: white;
    font-size: 33px;
    font-family: sans-serif;
    font-weight: bold;
}

</style>


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

    <!-- ***** Header Area End ***** -->


    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                     <h4>{{$page->page_name}}</h4>
                        <span>{{$page->name}}</span>
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
                        <img src="{!! $section[5]->value !!}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <h4>{{ $section[0]->value }}</h4>
                        {!! $section[1]->value !!}
                        <div class="quote">
                        
                            <i class="fa fa-quote-left"></i>{!! $section[2]->value !!}
                        </div>
                        {!! $section[3]->value !!}
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Our Team Area Starts ***** -->
    <section class="our-team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        {!! $section[4]->value !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                                <img src="{!! $section[6]->value !!}" alt="">

                        </div>
                            <div class="down-content">
                                {!! $section[7]->value !!}
                            </div>
                        </div>
                    </div>


                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                                <img src="{!! $section[8]->value !!}" alt="">
                            </div>
                                <div class="down-content">
                                {!! $section[9]->value !!}
                                </div>
                            </div>
                        </div>


                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                               <img src="{!! $section[10]->value !!}" alt="">
                            </div>
                                <div class="down-content">
                                    {!! $section[11]->value !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    <!-- ***** Our Team Area Ends ***** -->

    <!-- ***** Services Area Starts ***** -->
    <section class="our-services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        {!! $section[12]->value !!}                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                            {!! $section[13]->value !!}                        
                            <img src="{!! $section[16]->value !!}" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                            {!! $section[14]->value !!}
                            <img src="{!! $section[17]->value !!}" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                            {!! $section[15]->value !!}
                            <img src="{!! $section[18]->value !!}" alt="">
                    </div>
                </div>
            </div>
        </div>
    
    <!-- ***** Services Area Ends ***** -->

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
  
  
  
  







  
  
  
  
  
  
  
  
  
  
