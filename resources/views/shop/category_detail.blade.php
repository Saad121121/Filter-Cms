@extends('layouts.main')
@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->


<?php 

    $categories = DB::table('categories')->get();
   use App\wishlists;

?>


    <!-- section banner -->
    <section class="Inner_banner">
      <img src="{{ asset('images/gron2.jpg') }}" alt="" class="img-responsive">
      <div class="overlay">
        <div class="container">
          <div class="text">
            <h1 class="playf">Products</h1>
          </div>
        </div>
      </div>
    </section>
    <!-- section banner end -->
    <section class="Inner_content pro wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="ls">
              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading bro">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse99"> CATEGORIES </a>
                    </h4>
                  </div>
                  <div id="collapse99" class="panel-collapse collapse">
                    @foreach($categories as $value)
					<div class="panel-group ">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                          <a href="{{ url('category-detail/'.$value->id) }}"> {{$value->name}} </a>
                          </h4>
                        </div>
                     </div>
                    </div>
                    @endforeach      
                        </div>
                      </div>
                    </div>
                    
                    
                  </div>
                  <div class="ls">
                    <h4>PRICE FILTER</h4>
                    <div class="cbtn">
                      <label class="newclick">£0.00 - £39.99
                        <input type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                      </label>
                      <label class="newclick">£40.00 - £79.99
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                      <label class="newclick">£40.00 - £79.99
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                      <label class="newclick">£40.00 - £79.99
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    
                  </div>
                </div>
                <div class="col-xs-12 col-md-9">
                  
        @if($category)
				@foreach(array_chunk($category, 3) as $product)  
                  <div class="row Row_colm">
				    @foreach($product as $value)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                      <div class="Product_box wow zoomIn"  data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="imgbox">
                          <a href="{{ url('shop-detail/'.$value->id) }}"><img alt="" class="img-responsive" src="{{ asset($value->image) }}"></a>
                        </div>
                        <div class="bottom_text">
                          <h3>{{ $value->product_title }}</h3>
                          <h4><del class="clr">{{ $value->price }}</del>  {{ $value->price }}</h4>
                          <a class="btn4 hvr-bounce-to-bottom" href="{{ url('shop-detail/'.$value->id) }}">Add To Cart</a>
                        </div>
                      </div>
                    </div>
					@endforeach 
                  </div>
				@endforeach 
				@else
            <div class="col-xs-12 col-sm-12 col-md-12">
                      <h1>No Product Found</h1>
                    </div>
        @endif
                </div>
              </div>
            </div>
            </section><!--Footer Content Start-->

<!-- ============================================================== -->
<!-- BODY END HERE -->
<!-- ============================================================== -->

@endsection
@section('css')
<style>

</style>
@endsection
@section('js')
<script type="text/javascript">


</script>
@endsection