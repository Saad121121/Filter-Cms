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
.myaccount-tab-menu nav:hover{
    text-align: center;
    background-color:black !important;
    
}


.section-heading {
    text-align: center;

}


main.my-cart {
    margin-top: 150px;
    margin-bottom: 150px;
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
                        <h2>Orders History</h2>
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
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="section-heading">
					                <h2>Account Details</h2>
                                </div>
                                <div class="tab-content" id="myaccountContent">
                                   
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="orders" role="#">
                                        <div class="myaccount-content">    
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Invoice Number</th>
                                                            <th>Date</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
    
                                                    <tbody>
                                                    
                                                    @if($ORDERS)
                                                        @foreach($ORDERS as $ORDER)
                                                            <tr>
                                                              <td>{{ $ORDER->id }}</td>
                                                             
                                                              <td>{{ $ORDER->invoice_number }}</td>
                                                              <td>{{date('d F, Y h:i a',strtotime($ORDER->created_at))}}</td>
                                                              <td>${{ $ORDER->order_total  }}</td>
                                                              <td class="viewbtn"><a href="{{ route('invoice',[$ORDER->id]) }}">View</a></td>
                                                              
                                                            </tr>
                                                        @endforeach
                                                    @endif
                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->        
                                </div>
                            </div>
 <!-- My Account Tab Content End -->

                           
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
     $(document).on('click', ".btn1", function(e){
            // alert('it works');
            $('.loginForm').submit();
     });
</script>


@endsection



























