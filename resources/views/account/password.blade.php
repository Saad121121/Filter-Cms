@extends('layouts.main')
@section('content')
  

<section class="password-sec-main padding-80">
    <div class="container">
      <div class="row">
        @include('account.sidebar')
        <div class="col-md-4 col-sm-4">
          <div class="password-list-sec">
            <div class="inner-heading">
              <h2>Password</h2>
            </div>

        <form action="{{ route('update.account') }}" method="post" enctype="multipart/form-data">
        @csrf

              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <label>New Password *</label>
                  <input type="password" name="password" class="form-control">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <label>Verify Password *</label>
                  <input type="password" name="password_confirmation" class="form-control">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="btn-subscribe">
                    <input type="submit" value="Save Changes">
                  </div>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </section>



 
	
	
@endsection
@section('css')
<style type="text/css">
	
</style>
@endsection
@section('js')


@endsection

