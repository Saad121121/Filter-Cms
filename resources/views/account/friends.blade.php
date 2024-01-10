@extends('layouts.main')
@section('content')

<?php $segment = Request::segments(); ?>

<section class="friends-sec-main padding-80">
        <div class="container">
            <div class="row">
                @include('account.sidebar')
                <div class="col-md-8 col-sm-8">
                    <div class="friends-list-sec">
                        <div class="inner-heading">
                            <h2>Friends</h2>
                        </div>

                        <div class="followers-home-sec">
                            <ul>
                                <li><a href="#"><img src="{{ asset('images/followers-img-01.png') }}" class="img-responsive" alt="Followers img"> <span>Musalini</span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-02.png') }}" class="img-responsive" alt="Followers img"> <span>Stalin</span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-01.png') }}" class="img-responsive" alt="Followers img"> <span>Musalini</span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-02.png') }}" class="img-responsive" alt="Followers img"> <span>Stalin</span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-01.png') }}" class="img-responsive" alt="Followers img"> <span>Musalini</span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-02.png') }}" class="img-responsive" alt="Followers img"> <span>Stalin</span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-01.png') }}" class="img-responsive" alt="Followers img"> <span>Musalini</span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-02.png') }}" class="img-responsive" alt="Followers img"> <span>Stalin</span></a> </li>


                                <li><a href="#"><img src="{{ asset('images/followers-img-03.png') }}" class="img-responsive" alt="Followers img"> <span>Franklin </span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-04.png') }}" class="img-responsive" alt="Followers img"> <span>Eva</span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-03.png') }}" class="img-responsive" alt="Followers img"> <span>Franklin </span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-04.png') }}" class="img-responsive" alt="Followers img"> <span>Eva</span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-03.png') }}" class="img-responsive" alt="Followers img"> <span>Franklin </span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-04.png') }}" class="img-responsive" alt="Followers img"> <span>Eva</span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-03.png') }}" class="img-responsive" alt="Followers img"> <span>Franklin </span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-04.png') }}" class="img-responsive" alt="Followers img"> <span>Eva</span></a> </li>

                                <li><a href="#"><img src="{{ asset('images/followers-img-05.png') }}" class="img-responsive" alt="Followers img"> <span>Bormann </span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-06.png') }}" class="img-responsive" alt="Followers img"> <span>Gebbels</span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-05.png') }}" class="img-responsive" alt="Followers img"> <span>Bormann </span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-06.png') }}" class="img-responsive" alt="Followers img"> <span>Gebbels</span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-05.png') }}" class="img-responsive" alt="Followers img"> <span>Bormann </span></a> </li>
                                <li><a href="#"><img src="{{ asset('images/followers-img-06.png') }}" class="img-responsive" alt="Followers img"> <span>Gebbels</span></a> </li>
                            </ul>
                        </div>
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
<script type="text/javascript">
	 $(document).on('click', ".btn1", function(e){
			// alert('it works');
			$('.loginForm').submit();
	 });
</script>
@endsection