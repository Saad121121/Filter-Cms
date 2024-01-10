<!-- ============================================================== -->
<!-- All CSS AND LINKS BELOW  -->
<!-- ============================================================== -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Front Css -->

<!-- Additional CSS Files -->
<link rel="stylesheet" type="text/css" href="{{asset('assetsecom/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assetsecom/css/font-awesome.css')}}">
<link rel="stylesheet" href="{{asset('assetsecom/css/templatemo-hexashop.css')}}">
<link rel="stylesheet" href="{{asset('assetsecom/css/owl-carousel.css')}}" >
<link rel="stylesheet" href="{{asset('assetsecom/css/lightbox.css')}}">
<!-- Additional CSS Files -->

    <!-- jQuery -->
    <script src="{{asset('assetsecom/js/jquery-2.1.0.min.js')}}"></script>
    <!-- Plugins -->
    <script src="{{asset('assetsecom/js/popper.js')}}"></script>
    <script src="{{asset('assetsecom/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assetsecom/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assetsecom/js/accordions.js')}}"></script>
    <script src="{{asset('assetsecom/js/datepicker.js')}}"></script>
    <script src="{{asset('assetsecom/js/scrollreveal.min.js')}} "></script>
    <script src="{{asset('assetsecom/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assetsecom/js/jquery.counterup.min.js')}} "></script>
    <script src="{{asset('assetsecom/js/imgfix.min.js')}}"></script> 
    <script src="{{asset('assetsecom/js/slick.js')}}"></script> 
    <script src="{{asset('assetsecom/js/lightbox.js')}} "></script> 
    <script src="{{asset('assetsecom/js/isotope.js')}}"></script>     
    <script src="{{asset('assetsecom/js/custom.js')}}"></script>

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
    <!-- Global Init -->

