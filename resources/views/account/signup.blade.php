@extends('layouts.main')
@section('content')

    <style >

  h3 {
    font-size: 75px;
}

	body {
    align-items: center;
    justify-content: center;
    margin: 0;
    background-color: #f4f4f4; /* Set a background color for the entire page */
}

a.pull-right.forg_text {
    color: black;
}

label {
    margin-bottom: 8px;
    font-weight: bold;
    color: #333; /* Darker text color for labels */
}

/* Styling for section headings */
.section-heading.text-center {
    padding-top: 40px;
    margin-bottom: 30px;
    font-size: 24px;
    color: #555; /* Subdued heading color */
}

/* Styling for submit button */
button.btn.btn-yellow {
    background-color: #333;
    letter-spacing: 1px;
    text-align: center;
    width: 120px;
    height: 40px;
    margin: 20px 0;
    transition: background-color 0.5s, color 0.5s, border 0.5s;
    color: white;
    border: 1px solid #333;
    cursor: pointer;
}

button.btn.btn-yellow:hover {
    background-color: #fff;
    color: #333;
    border: 2px solid #333;
}

/* Styling for the form */
form {
    padding: 20px;
    border: 1px solid #b9b9b9f2;
    border-radius: 8px;
    background-color: white;
    box-shadow: 0px 0px 11px 0px rgba(0, 0, 0, 0.1);
}

.form_head {
    text-align: center;
    padding-bottom: 10px;
}

/* Styling for the main heading */
h1 {
    margin-top: 0;
    margin-bottom: 30px;
    font-size: 36px;
    color: #333;
}


.account_form {
    align-items: center;
  }


/* Additional styles for input fields */
input {
  color: white;
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
     background-color: black;
    border-radius: 4px;
    box-sizing: border-box;
}

input:hover{
    color: black;
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    background-color: white;
    border: 1px solid black;
    border-radius: 4px;
    box-sizing: border-box;
}

.success-message {
    color: #4CAF50;
    font-weight: bold;
    margin-top: 10px;
}

label.remember {
    display: flex;
    flex-direction: column; /* Stack items vertically */
    align-items: center;
}

label.remember input {
    margin-bottom: 8px;
}
    </style>
  <br></br>
    <div class="top-prog-sec top-prog-sec2 contact-sec">
   <section class="inpage featurePro">
  <div class="container">
    <div class="row justify-content-center">
		
	
	
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
        <div class="account_form subscribe">
          <div style="margin-bottom:20px;" class="form_head">
            <h3 style="margin-bottom:7px;"> Register </h3>
            <p> If you have a registered account, you can login below. </p>
          </div>
          <form class="loginForm" method="POST" action="{{ route('register') }}">
		      @csrf
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                     <label>Name</label>

                  <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Full name" required>
				  
				   @if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
				   @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" required>
      				   @if ($errors->has('email'))
      						<span class="invalid-feedback" role="alert">
      							<strong>{{ $errors->first('email') }}</strong>
      						</span>
      				   @endif
                </div>
              </div>
            </div>
			
		
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                     <label>Password</label>
                  <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
        				  @if ($errors->has('password'))
        						<span class="invalid-feedback" role="alert">
        							<strong>{{ $errors->first('password') }}</strong>
        						</span>
        				   @endif
				  
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                     <label>Confirm Password</label>

                  <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
              </div>
            </div>
			
            <div class="row logRow">
			
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			  
			  <div class="log submit-btn"> <!--<a href="javascript:void(0)" class="btn btn1"> Register </a> --> <input type="submit" class="log submit-btn text-white mt-2"  value="Register" /> </div>
			 
			 </div>
			 
            </div>
			
			<hr/>
			
			
			    <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <div class="customer">
                        <h5> Already have an account?</h5>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
                      <div class="request"> <a href="{{ route('signin') }}" class="btn btn1 "> Login </a></div>
                    </div>
                  </div>
			
			
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
    
<!-- END: Checkout Section -->
    </div>
    <!-- product page end-->




@endsection
@section('css')
<style type="text/css">
	


	
</style>
@endsection
@section('js')
<script type="text/javascript">
	 $(document).on('click', ".btn1", function(e){
			$('.loginForm').submit();
	 });
</script>
@endsection
