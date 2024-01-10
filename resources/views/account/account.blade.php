@extends('layouts.main')
@section('title', 'Cart')
@section('css')
<style>

.myaccount-content {
}

.col-lg-9.col-md-8 {
}

p {
    font-size: 14px;
    line-height: 25px;

}

.borders {

}


.myaccount-tab-menu.nav {
    text-align: center;
    border-radius: 10px;
    
}


.section-heading {
    text-align: center;

}


    
main.my-cart {
    margin-top: 150px;
    margin-bottom: 150px;
}
.col-lg-9.col-md-8 {
    margin-top: -37px;
    border-radius: 117px;
}

.subscribe form button {
    width: 170px;
    height: 58px;
    display: inline-block;
    text-align: center;
    line-height: 44px;
    background-color: #2a2a2a;
    box-shadow: none;
    border: 1px solid transparent;
    color: #fff;
    transition: all 0.3s;
}

.account-details-form legend {
    font-family: CottonCandies;
    font-size: 38px;
}

.subscribe {
    margin-top: 38px;
}



.subscribe .section-heading h2{
    margin-bottom: 0px;
}
.subscribe .section-heading {
    margin-bottom: 0px;
}

.col-lg-9.col-md-8 {
    margin-top: -55px;
    border-radius: 117px;
}

.section-heading h2 {
    font-size: 28px;
    font-weight: 700;
    color: #2a2a2a;
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
    

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Account Details</h2>
                        <span>Awesome, clean &amp; creative HTML5 Template</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Contact Area Starts ***** -->
   <main class="my-cart">
    <div class="my-account-wrapper">
        <div class="container">
            <div class="borders">
                <div class="col-lg-12">
                    <div class="myaccount-page-wrapper">
                        <div class="row">
                            @include('account.sidebar')
                          <!-- My Account Tab Menu End -->
    
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                   
                                   <!-- Single Tab Content Start -->
                                    <div class="tab-pane active" id="account-info" role="tabpanel">
                                            <div class="account-details-form subscribe">
                                                    <div class="section-heading">
					                                    <h2>Account Details</h2>
                                                    </div>
                                               <form action="{{ route('update.account') }}" method="post" enctype="multipart/form-data" id="accountForm">
                                                @csrf
                                                    <div class="row">
                                                    
                                                        <div class="col-lg-12">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">Name</label>
                                                                <input type="text" id="last-name" name="uname" placeholder="Last Name" value="<?php echo Auth::user()->name; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="single-input-item">
                                                        <label for="email" class="required">Email Addres</label>
                                                        <input type="email" id="email" placeholder="Email Address" name="email" value="<?php echo Auth::user()->email; ?>">
                                                    </div>
    
                                                    <div class="section-heading">
					                                    <h2>Password change</h2>
                                                    </div>

                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">New Password</label>
                                                                    <input type="password" id="new-pwd" placeholder="New Password" name="password">
                                                                </div>
                                                            </div>
    
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirm-pwd" class="required">Confirm Password</label>
                                                                    <input type="password" id="confirm-pwd" placeholder="Confirm Password" name="password_confirmation">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
    
                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn btn btn-red" id="updateProfile">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
    
                                    
                                </div>
                            </div> <!-- My Account Tab Content End -->


                           
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->
<!-- main content end -->   
</main>

    <!-- ***** Footer Start ***** -->
   
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
@section('js')
<script type="text/javascript">
     $(document).on('click', ".btn1", function(e){
            // alert('it works');
            $('.loginForm').submit();
     });
</script>
@endsection    
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

<script type="text/javascript">

 $(document).on('click', "#updateProfile", function(e){
        $('#accountForm').submit();
  });

</script>



@endsection



























