@extends('layouts.main')
@section('content')
  

<section class="upload-sec-main padding-80">
    <div class="container">
      <div class="row">
                @include('account.sidebar')

        <div class="col-md-6 col-sm-6">
          <div class="inner-heading">
            <h2>Upload Image</h2>
          </div>

        <form action="{{ route('uploadPicture') }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="control-group file-upload" id="file-upload1">
            <div class="image-box text-center">
              <h3>Drop your image here, <span>or browse</span></h3>
              <p>Support: jpg, png</p>
              <img src="" alt="">
            </div>
            <div class="controls" style="display: none;">
              <input type="file" name="pic"/>
            </div>
          </div>

          <div class="account-form">
            <div class="form-group">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="btn-subscribe">
                    <input type="submit" value="Save Changes">
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>
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

<script type="text/javascript">

 $(document).on('click', "#updateProfile", function(e){
		$('#accountForm').submit();
  });

</script>

@endsection

