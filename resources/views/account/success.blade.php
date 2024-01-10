@extends('layouts.main')
@section('content')
  

<?php $segment = Request::segments(); ?>


<section class="checkout-sec">
      <div class="container">
        <div class="row">
            
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="checkout-tab-main">
              <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <div class="form-sec-checkout">
                    
                    
                    <h1>Payment Successful</h1>
                    <a href="{{ url('/') }}" id="paymentRedirect" class="btn btn-success">Back To Home</a>
                    
                </div></div></div></div></div></div>
</section>

@endsection
@section('css')
<style type="text/css">
  
</style>
@endsection
@section('js')

<script type="text/javascript">

 $(document).on('click', "#updateProfile", function(e){
    $('#accountForm').submit();
  });

</script>

@endsection

