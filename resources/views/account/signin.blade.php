@section('title','Register')
@extends('layouts.main')
@section('css')
<style>
    .form-container.sign-in-container.col-md-6 {margin: 0 auto;}
/* General styling for labels */

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
        transition: all .3s;
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
    border: 1px solid #ddd; /* Add a subtle border around the form */
    border-radius: 8px; /* Rounded corners for a modern look */
}

/* Styling for the main heading */
h1 {
    margin-top: 0;
    margin-bottom: 30px;
    font-size: 36px;
    color: #333;
}

/* Additional styles for input fields */
input {
    width: auto; /* Set width to auto to allow content to determine the width */
    padding: 10px;
    margin-bottom: 15px;
    padding-left: 30px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Styles for a success message (adjust as needed) */
.success-message {
    color: #4CAF50; /* Green color for success messages */
    font-weight: bold;
    margin-top: 10px;
}


label.remember {
    flex-direction: column; /* Stack items vertically */
}

input.form-control {
    margin-bottom: 20px;
    margin-top: 5px;
}

h1{
    font-size:50px; /* Stack items vertically */
}

label.remember input {
    margin-bottom: 8px; /* Adjust the margin as needed for spacing between checkbox and text */
}


</style>
@endsection
@section('content')
<br></br>
<br></br>
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-wrapper inner-banner-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="section-heading text-center">
                                <h1>Login</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="account">
    <div class="container" id="from-wrapper">
        <div class="form-container sign-in-container col-md-6">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group ">
                    <label>Username or email address*</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                    <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label>Password*</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                    @if ($errors->has('password'))
                    <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <div class="form-group">
                <input type="checkbox">
                    <label class="remember"> Remember me </label>
                    <a href="{{ url('password/reset') }}" class="pull-right forg_text"> Forgot password? </a>
                </div>
                <button class="btn btn-yellow" type="submit">Login</button>
                <!-- <span>or</span>
                <div class="social-group">
                    <button class="loginBtn loginBtn--facebook">Login with Facebook</button>
                    <button class="loginBtn loginBtn--google">Login with Google</button>
                </div> -->
            </form>
        </div>

    </div>
</section>
@endsection
@section('js')
<script>
    $("#phone").on("keypress keyup blur",function (event) {
       $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
</script>
@endsection
