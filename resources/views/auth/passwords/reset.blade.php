@extends('layouts.main')

@section('content')

    <div class="slide-main">
      <div class="container">
        <div class="slide-cap inn-slide-cap text-right" data-aos="fade-up"
          data-aos-duration="3000">
          <div class="detail-text">
            <h1>Reset Password</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
        <div class="page-wrapper m-0 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-12">
                        <div class="card border-0">
                            
                                <form method="POST" class="form bordered-input" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">


                                    <div class="p-30 pb-0">
                                        <h4>Reset Password</h4>

                                        <div class="form-group m-t-20 row">
                                            <div class="col-12">
                                                <label class="col-form-label font-12 text-primary p-0">Email Address</label>
                                                <input class="form-control pl-0 font-12 {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" placeholder="Email" name="email" >
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-30">
                                            <div class="col-12">
                                                <label class="col-form-label font-12 text-primary p-0">Password</label>
                                                <input class="form-control  pl-0 font-12 {{ $errors->has('password') ? ' is-invalid' : '' }}"  type="password" name="password" placeholder="password" >
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-20">
                                            <div class="col-12">
                                                <input id="password-confirm" type="password" class="form-control  pl-0 font-12" name="password_confirmation"  placeholder="Confirm password" >
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="form-group row m-b-10">
                                            <div class="col-12">
                                                <p><button type="submit" class="btn btn-rounded btn-primary m-b-20 btn-block waves-effect waves-light d-block">Reset Password</button></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            
                        </div>
                        <div class="clearfix"></div>
                        <div class="text-center mt-5">
                            <ul class="social-network social-circle">
                                <li><a href="#" class="icoFacebook" title="Facebook"><i class="mdi mdi-facebook"></i></a></li>
                                <li><a href="#" class="icoTwitter" title="Twitter"><i class="mdi mdi-twitter"></i> </a></li>
                                <li><a href="#" class="icoGoogle" title="Google +"><i class="mdi mdi-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
