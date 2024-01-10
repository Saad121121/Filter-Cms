<!-- ***** Header Area Start ***** -->

 <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->

                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{asset('assetsecom/images/logo.png')}}">
                        </a>
                        
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            			      <button style=" float: inline-end ; margin-top: 24.0px; " class="log submit-btn"> <a href="signout" class="btn btn1"> Signout </a></button>
		                    </div>

                        <!-- ***** Logo End ***** -->

                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">

                            <li class="scroll-to-section"><a href="{{ route('home') }}" class="active">Home</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href=" {{ route('contact') }} ">Contact Us</a></li>
                            <li><a href="{{ route('product') }}">Products</a></li>
                            <li><a href="{{ route('cart') }} ">Cart</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Fashion Products</a>
                                <ul>
                            <li class="scroll-to-section"><a href="#men">Mens</a></li>
                            <li class="scroll-to-section"><a href="#women">Womens</a></li>
                            <li class="scroll-to-section"><a href="#kids">Kids</a></li>
                                </ul>
                            </li>

                        <!-- ***** Menu End ***** -->
                    </nav>
                            
                </div>
            </div>
        </div>
    </header>

    <!-- ***** Header Area End ***** -->