@extends('layouts.main')
@section('title', 'Checkout')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>

.section-heading {
    margin-left: 16px;
}

a.runningBtn {
    margin: 140px;
}
a {
    color: black;
    text-decoration: none !important;
}
.form-group {
    color: black;
    margin-top: 13px;
}

h5 {
    padding: 18px;
}

  .payment-accordion img {
    display: inline-block;
    margin-left: 10px;
    background-color: white;
  }
  form#order-place .form-control {
    border-width: 1px;
    border-color: rgb(42 42 42);
    border-style: solid;
    border-radius: 8px;
    background-color: transparent;
    height: 54px;
    padding-left: 15px;
    color: black;
  }
  form#order-place textarea.form-control {
      height: auto !important;
  }

  .checkoutPage {
      padding: 50px 0px;
  }
  .checkoutPage .section-heading h3{
      margin-bottom: 30px;
  }
  .YouOrder {
          background-color: black;
      color: white;
      padding: 40px;
      padding-bottom: 40px;
      min-height: 300px;
      border-radius: 50px;
      margin-bottom: 20px;
box-shadow: 20px -15px 5px 4px rgba(0, 0, 0, 0.1);

  }
  .amount-wrapper {
      padding-top: 12px;
      border-top: 2px solid white;
      text-align: left;
      margin-top: 90px;
  }

h5 {
    font-size: 24px;
}
span.price {
    display: -webkit-box;
    margin-top: 25px;
    margin-bottom: auto;
}
  .amount-wrapper h2 {
      font-size: 25px;
      padding: 8px;
      display: flex;
      justify-content: space-between;
  }
  .amount-wrapper h3 {
      display: FLEX;
      justify-content: SPACE-BETWEEN;
      font-size: 25px;
      border-top: 2px solid white;
      padding: 20px;
      margin-top: 14px;
  }
  .checkoutPage span.invalid-feedback strong {
      color: #721c24;
      background-color: #f8d7da;
      border-color: #f5c6cb;
      display: block;
      width: 100%;
      font-size: 15px;
      padding: 5px 15px;
      border-radius: 6px;
  }
  .payment-accordion .btn-link {
    display: block;
    width: 100%;
    text-align: left;
    padding: 10px 19px;
    color: black;
  }

  .payment-accordion .card-header {
      padding: 0px !important;
  }
  .payment-accordion .card-header:first-child {
    border-radius: 6px;
    background-color: #ffb71d;
    transition: color 0.3s;
    width: 400px;
    height: 57px;
    margin-left: 23px;
}
  .payment-accordion .card{
    border-radius: 0px;
  }
  .form-group.hide {
    display: none;
  }
  .StripeElement {
    box-sizing: border-box;
    height: 40px;
    padding: 10px 12px;
    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;
    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
    border-width: 1px;
    border-color: rgb(150, 163, 218);
    border-style: solid;
    margin-bottom: 10px;
  }

  .StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
  }

  .StripeElement--invalid {
    border-color: #fa755a;
  }

  .StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
  }
  div#card-errors {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    display: block;
    width: 100%;

    font-size: 15px;
    padding: 5px 15px;
    border-radius: 6px;
    display: none;
    margin-bottom: 10px;
  }

  .black-border {
    border: 1px solid black;
}

.mb-0, .my-0 {
    margin-bottom: 0!important;
    height: 48px;
}

button.btn.btn-link {
    margin-top: -15px;
    color: black !important;
}

</style>
@endsection
@section('content')
<br></br>
<br></br>
<section class="banner inner-banner" style="background-image: url({{ asset('images/banner.png')}});">
    
</section>
<section class="form-body checkoutPage">
    <div class="container">
        <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          </div>
            <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12">
                <div class="section-heading dark-color">
                    <h3>Billing Address</h3>
                </div>
                @if (\Session::has('stripe_error'))
                <div class="alert alert-danger">
                  {!! \Session::get('stripe_error') !!}
                </div>
                @endif
                <form action="{{route('order.place')}}" method="POST" id="order-place">
                    @csrf
                    <input type="hidden" name="payment_id" value="" />
                    <input type="hidden" name="payer_id" value="" />
                    <input type="hidden" name="payment_status" value="" />
                    <input type="hidden" name="payment_method" id="payment_method" value="paypal" />
                    @if(Auth::check())
                    <?php  $_getUser= DB::table('users')->where('id', '=', Auth::user()->id)->first();?>
                    <div class="form-group">
                        <input class="form-control black-border" id="f-name" name="first_name" value="{{old('first_name')?old('first_name'):$_getUser->name}}" placeholder="First Name *" type="text" required>
                        <span class="invalid-feedback fname {{ ($errors->first('first_name') ? 'd-block' : '') }}">
                          <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="address" name="address_line_1" placeholder="Address *" type="text" value="{{old('address_line_1')}}" required>
                        <span class="invalid-feedback {{ ($errors->first('address_line_1') ? 'd-block' : '') }}" >
                          <strong>{{ $errors->first('address_line_1') }}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <input class="form-control right" placeholder="Town / City *" name="city" id="city" type="text" required>
                        <span class="invalid-feedback {{ ($errors->first('city') ? 'd-block' : '') }}" >
                          <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="country" id="country" class="form-control left" placeholder="Country">
                        <span class="invalid-feedback {{ ($errors->first('country') ? 'd-block' : '') }}" >
                          <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <input class="form-control right" placeholder="Phone *" name="phone_no" type="text" value="{{old('phone_no')}}" required>
                        <span class="invalid-feedback {{ ($errors->first('phone_no') ? 'd-block' : '') }}" >
                          <strong>{{ $errors->first('phone_no') }}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <input class="form-control left" name="email" placeholder="Email *" type="email" value="{{old('email')?old('email'):$_getUser->email}}" required>
                        <span class="invalid-feedback {{ ($errors->first('email') ? 'd-block' : '') }}" >
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="zip_code" name="zip_code" placeholder="Postcode" type="text" value="{{old('zip_code')}}">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="comment" name="order_notes" placeholder="Order Note" rows="5">{{old('order_notes')}}</textarea>
                    </div>
                    @else
                    <a href="{{ url('signin') }}" target="_blank" class="runningBtn">Returning customer? Click here to login</a>
                    <div class="form-group">
                        <span class="invalid-feedback fname" >
                        <strong>{{ $errors->first('first_name') }}</strong></span>
                        <input class="form-control right" id="f-name" name="first_name" value="{{old('first_name')}}" placeholder="First Name" type="text">
                    </div>
                    <div class="form-group">
                        <span class="invalid-feedback lname" >
                        <strong>{{ $errors->first('last_name') }}</strong></span>
                        <input class="form-control left" placeholder="Last Name" name="last_name" id="l-name" type="text" value="{{old('last_name')}}">
                    </div>
                    <div class="form-group">
                        <span class="invalid-feedback" >
                        <strong>{{ $errors->first('address_line_1') }}</strong></span>
                        <input class="form-control" id="address" name="address_line_1" placeholder="Address" type="text" value="{{old('address_line_1')}}">
                    </div>
                    <div class="form-group">
                        <span class="invalid-feedback" >
                        <strong>{{ $errors->first('city') }}</strong></span>
                        <input class="form-control right" placeholder="Town / City" name="city" id="city" type="text">
                    </div>
                    <div class="form-group">
                        <span class="invalid-feedback" >
                        <strong>{{ $errors->first('country') }}</strong></span>
                        <input type="text" name="country" id="country" class="form-control left" placeholder="Country">
                    </div>
                    <div class="form-group">
                        <span class="invalid-feedback" >
                        <strong>{{ $errors->first('phone_no') }}</strong></span>
                        <input class="form-control right" placeholder="Phone" name="phone_no" type="text" value="{{old('phone_no')}}">
                    </div>
                    <div class="form-group">
                        <span class="invalid-feedback" >
                        <strong>{{ $errors->first('email') }}</strong></span>
                        <input class="form-control left" name="email" placeholder="Email" type="email" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="compnayName" name="zip_code" placeholder="Postcode" type="text" value="{{old('zip_code')}}">
                    </div>
                    @if(!Auth::check())
                    <div class="form-group"> <label class="chkbox">
                        <input type="checkbox" name="create_account" id="create_account"  {{ (! empty(old('create_account')) ? 'checked' : '') }}>
                        Create An Account?</label>

                    </div>

                    <div class="form-group">

                            <input type="password" class="form-control left" name="password" placeholder="Password">

                        <span class="invalid-feedback" >
                            <strong>{{ $errors->first('password') }}</strong></span>
                    </div>
                    <div class="form-group">

                            <input type="password" class="form-control right" name="confirm_password" placeholder="Confirm Password">
                            <span class="invalid-feedback" >
                                <strong>{{ $errors->first('confirm_password') }}</strong></span>

                    </div>

                    @endif
                    <div class="form-group">
                        <textarea class="form-control" id="comment" name="order_notes" placeholder="Order Note" rows="5"></textarea>
                    </div>
                    @endif
                </form>
            </div>
            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                <div class="section-heading dark-color">
                  <h3>YOUR ORDER</h3>
                </div>
                <div class="YouOrder">
                    <?php $subtotal  = 0; $addon_total = 0; $variation = 0; ?>

                    @foreach($cart as $key=>$value)

                    <h5 style="font-style: italic;">{{ $value['name'] }}
                    <br>
                    <span class="price"> Price : ${{ $value['baseprice'] * $value['qty'] }}</span>
                     <br>
                      Quantity : x{{ $value['qty'] }} </h5>
                    <?php $subtotal+= $value['baseprice'] * $value['qty'];
                    $variation += $value['variation_price'];
                    ?>

                    @endforeach

                    <div class="amount-wrapper">
                      <h2 style="font-style: italic;">Item Subtotal <span>${{ $subtotal }}</span></h2>
                      <h3 style="font-style: italic;"> Total Price <span>${{ $subtotal +  $variation }}</span></h3>
                    </div>
                </div>
                {{--  style=" color:white ;"  --}}
                <div id="accordion" class="payment-accordion">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button style="margin-top: -29px;
                                       color: #ffffffff;
                                       font-weight:500;
                                       text-align:center;"
                                class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" data-payment="paypal">
                           <img style=" background-color:#fcb732; margin: 17px;" src="{{ asset('images/download.png')}}" width="70" alt="">Pay with Paypal</button>
                      </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <input type="hidden" name="price" value="{{ $subtotal }}" />
                        <input type="hidden" name="product_id" value="" />
                        <input type="hidden" name="qty" value="value['qty']" />
                        <div id="paypal-button-container-popup"></div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button style="padding-top: 7px; font-family: 'Poppins', sans-serif; padding-left: 90px; color:white ; font-weight:500; text-align:justify-center;"

                        class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo" data-payment="stripe">

                          <img style="margin-top:-5px; background-color: #fcb732;" src=" {{ asset('images/credit-card-png-26.png')}}" width="50" alt="">
                          Pay with Credit Card  
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        <div class="stripe-form-wrapper require-validation" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" data-cc-on-file="false">
                          <div id="card-element"></div>
                          <div id="card-errors" role="alert"></div>
                          <div class="form-group">
                            <button class="btn btn-red btn-block" type="button" id="stripe-submit">Pay Now ${{ $subtotal }}</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>

                <button type="submit" class="hvr-wobble-skew" style="display:none">place order</button>
                <!--   <a class="PaymentMethod-a" id="paypal-button-container-popup" href="#" style="display:none"></a> -->
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>

      // $(document).on('click', ".btn", function(e){
      //   $('#order-place').submit();
      // });

      $('#accordion .btn-link').on('click', function(e) {
        if (!$(this).hasClass('collapsed')) {
          e.stopPropagation();
        }
        $('#payment_method').val($(this).attr('data-payment'));
      });

      $('.bttn').on('change', function() {
        var count = 0;
        if($(this).prop("checked") == true){
          if($('#f-name').val()== "") {
            $('.fname').text('first name is required field');
          } else {
            $('.fname').text("");
            count++;
          }
          if($('#l-name').val()== "") {
            $('.lname').text('last name is required field');
          } else {
            $('.lname').text("");
            count++;
          }

           if(count == 2) {
            $('#paypal-button-container-popup').show();
           } else {
             $(this).prop("checked",false);

             $.toast({
                  heading: 'Alert!',
                  position: 'bottom-right',
                  text:  'Please fill the required fields before proceeding to pay',
                  loaderBg: '#ff6849',
                  icon: 'error',
                  hideAfter: 5000,
                  stack: 6
              });

             return false;

           }

         } else {
          $('#paypal-button-container-popup').hide();
          // $('.btn').show();
         }

         $('input[name="' + this.name + '"]').not(this).prop('checked', false);
         //$(this).siblings('input[type="checkbox"]').prop('checked', false);
      });

      paypal.Button.render({
      env: 'sandbox', //production

      style: {
        label: 'checkout',
        size:  'responsive',
        shape: 'rect',
        color: 'gold'
      },
      client: {
        sandbox: 'AV06KMdIerC8pd6_i1gQQlyVoIwV8e_1UZaJKj9-aELaeNXIGMbdR32kDDEWS4gRsAis6SRpUVYC9Jmf',
        // production:'ARIYLCFJIoObVCUxQjohmqLeFQcHKmQ7haI-4kNxHaSwEEALdWABiLwYbJAwAoHSvdHwKJnnOL3Jlzje',
      },
      validate: function(actions) {
        actions.disable();
        paypalActions = actions;
      },

      onClick:  function(e) {
        var errorCount = checkEmptyFileds();

        if(errorCount == 1){
          $.toast({
              heading: 'Alert!',
              position: 'bottom-right',
              text:  'Please fill the required fields before proceeding to pay',
              loaderBg: '#ff6849',
              icon: 'error',
              hideAfter: 5000,
              stack: 6
          });
          paypalActions.disable();
        }else{
          paypalActions.enable();
        }
      },
      payment: function(data, actions) {
        return actions.payment.create({
          payment: {
            transactions: [
              {
                amount: { total: {{number_format(((float)$subtotal),2, '.', '')}}, currency: 'USD' }
              }
            ]
          }
        });
      },
      onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function() {
          // generateNotification('success','Payment Authorized');

           $.toast({
                heading: 'Success!',
                position: 'bottom-right',
                text:  'Payment Authorized',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 1000,
                stack: 6
            });

          var params = {
            payment_status:'Completed',
            paymentID: data.paymentID,
            payerID: data.payerID
          };

          // console.log(data.paymentID);
          // return false;
          $('input[name="payment_status"]').val('Completed');
          $('input[name="payment_id"]').val(data.paymentID);
          $('input[name="payer_id"]').val(data.payerID);
          $('input[name="payment_method"]').val('paypal');
          $('#order-place').submit();
        });
      },
      onCancel: function(data, actions) {
          var params = {
            payment_status:'Failed',
            paymentID: data.paymentID
          };
          $('input[name="payment_status"]').val('Failed');
          $('input[name="payment_id"]').val(data.paymentID);
          $('input[name="payer_id"]').val('');
          $('input[name="payment_method"]').val('paypal');
      }
    }, '#paypal-button-container-popup');


  var stripe = Stripe('{{ env("STRIPE_KEY") }}');

  // Create an instance of Elements.
  var elements = stripe.elements();
  var style = {
    base: {
      color: '#32325d',
      lineHeight: '18px',
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: 'antialiased',
      fontSize: '16px',
      '::placeholder': {
        color: '#aab7c4'
      }
    },
    invalid: {
      color: '#fa755a',
      iconColor: '#fa755a'
    }
  };
  var card = elements.create('card', {style: style});
  card.mount('#card-element');

  card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
      $(displayError).show();
      displayError.textContent = event.error.message;
    } else {
      $(displayError).hide();
      displayError.textContent = '';
    }
  });

  var form = document.getElementById('order-place');

  $('#stripe-submit').click(function(){
    stripe.createToken(card).then(function(result) {
      var errorCount = checkEmptyFileds();
      if ((result.error) || (errorCount == 1)) {
        // Inform the user if there was an error.
        if(result.error){
          var errorElement = document.getElementById('card-errors');
          $(errorElement).show();
          errorElement.textContent = result.error.message;
        }else{
          $.toast({
            heading: 'Alert!',
            position: 'bottom-right',
            text:  'Please fill the required fields before proceeding to pay',
            loaderBg: '#ff6849',
            icon: 'error',
            hideAfter: 5000,
            stack: 6
          });
        }
      } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
      }
    });
  });

  function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('order-place');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    form.submit();
  }


  function checkEmptyFileds(){
    var errorCount = 0;
    $('form#order-place').find('.form-control').each(function(){
      if($(this).prop('required')){
        if( !$(this).val() ) {
          $(this).parent().find('.invalid-feedback').addClass('d-block');
          $(this).parent().find('.invalid-feedback strong').html('Field is Required');
          errorCount = 1;
        }
      }
    });
    return errorCount;
  }



</script>
@endsection
