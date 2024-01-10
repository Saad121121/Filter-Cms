@extends('layouts.main')


@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->
    <!-- ============================================================== -->
<br></br>
<br></br>
<br></br>
<br></br>
    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12"></div>
                <div class="col-lg-8">
                    <div class="product-detail-wrapper">
                        <div class="row product-details">
                            <div class="col-lg-3">
                                <div class="slider-nav slick-initialized slick-slider slick-vertical">
                                    <div class="slick-list draggable">
                                        <div class="slick-track">
                                            <div class="slider-thumb">
                                                <figure>
                                                    <img src="{{ asset($product_detail->image) }}" class="w-100"
                                                        alt="">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-9">
                                <div class="slider-wrapper">
                                    <div class="slider-for slick-initialized slick-slider">
                                        <div class="slick-list draggable">
                                            <div class="slick-track">
                                                <div class="slider-image 2 slick slide slick-current slick-active">
                                                    <div class="product-img--main">
                                                        <img src="{{ asset($product_detail->image) }}"
                                                            class="w-100" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <form method="POST" action="{{ route('save_cart') }}" id="add-cart">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{ $product_detail->id }}">
                        <div class="product-details-content">
                            <h1 class="product_title">{{ $product_detail->product_title }}</h1>

                            <hr />
                            <p class="price">$ {{ $product_detail->price }}</p>
                            <hr />



                                @foreach ($att_model as $att_models)

                                    <div class="variation">
                                        <h2>{{ $att_models->attribute->name }}</h2>
                                        @php
                                            $pro_att = \App\ProductAttribute::where(['attribute_id' => $att_models->attribute_id, 'product_id' => $product_detail->id])->get();
                                        @endphp

                                            {{--  @foreach ($pro_att as $pro_atts)
                                            <p>

                                                {{ $pro_atts->attributesValues->value }}
                                            </p>
                                            @endforeach  --}}

                                        </select>
                                    </div>

                                @endforeach

                            <hr />
                            <div class="qty">
                                <span class="minus bg-dark">-</span>
                                <input type="number" id="addcount" class="count" name="qty" value="1">
                                <span class="plus bg-dark">+</span>
                            </div>
                            <hr />
                            <button id="addCart" class="qty btn btnDonate mt-2" href="javascript:void(0)"
                                class="nav-link btn btn-red" id="addCart">Add
                                To
                                Cart</button>
                        </div>
                    </form>
                </div>

                {{-- <div class="col-md-6 conpad text-left">
                    <form class="h-100 d-flex flex-column justify-content-center align-items-start" method="post"
                        action="{{ route('save_cart') }}" id="add-cart">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{ $product_detail->id }}">
                        <h1 class="product_title">{{ $product_detail->product_title }}</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla quod ea voluptatibus atque dolorum
                            ad quo, pariatur iure iste, ullam labore facilis sint fugit laboriosam ex dolores! Sunt,
                            delectus vero.</p>
                        <p class="price">$ {{ $product_detail->price }}</p>

                        @foreach ($att_model as $att_models)
                            <div class="variation">
                                <h2>{{ $att_models->attribute->name }}</h2>
                                @php
                                    $pro_att = \App\ProductAttribute::where(['attribute_id' => $att_models->attribute_id, 'product_id' => $product_detail->id])->get();
                                @endphp
                                <select name="variation[{{ $att_models->attribute->name }}]">
                                    @foreach ($pro_att as $pro_atts)
                                        <option value="{{ $pro_atts->attributesValues->id }}">
                                            {{ $pro_atts->attributesValues->value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach

                        <div class="qty">
                            <span class="minus bg-dark">-</span>
                            <input type="number" id="addcount" class="count" name="qty" value="1">
                            <span class="plus bg-dark">+</span>
                        </div>


                        <a id="addCart" class="qty btn btnDonate" href="javascript:void(0)" class="nav-link btn btn-red"
                            id="addCart">Add
                            To
                            Cart</a>

                    </form>
                </div> --}}
            </div>
        </div>

    </section>



    <div class="description">
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <h1>Description</h1>
                        <?= html_entity_decode($product_detail->description) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="realted-product pb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <h1>Related Products</h1>
                </div>
                @foreach ($shop as $shops)
                    <div class="col-lg-3 col-lg-4 col-md-6">
                        <div class="shop-box">
                            <figure>
                                <img src="{{ asset($shops->image) }}" alt="">
                            </figure>
                            <h6>{{ $shops->product_title }}</h6>
                            <div class="stars">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <ul>
                                <li>
                                    <h5>${{ $shops->price }}</h5>
                                </li>
                                <li>
                                    <a href="{{ route('shopDetail', $shops->id) }}">Add to cart</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- BODY END HERE -->
    <!-- ============================================================== -->
@endsection
@section('css')
    <style>
        .price{
            font-size: 30px;
            padding: 3px;

        }
        h1.red {
            font-size: 70px;
        }

        section.main-pro-dtail {
            padding: 100px 0px;
        }

        .variation h2 {
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .variation {
            padding: 0px 0px 20px 0px;
        }

        .wunty-check h1 {
            width: 100%;
            font-size: 18px;
            font-weight: bold;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .variation select {
            width: 100%;
            height: 36px;
            padding: 0px 10px;
            text-transform: capitalize;
            font-weight: 400;
        }

        .qty .count {
            color: #000;
            display: inline-block;
            vertical-align: top;
            font-size: 25px;
            font-weight: 700;
            line-height: 30px;
            padding: 0 2px;
            min-width: 35px;
            text-align: center;
        }

        .qty .plus {
            cursor: pointer;
            display: inline-block;
            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial, sans-serif;
            text-align: center;
            border-radius: 50%;
        }

        .qty .minus {
            cursor: pointer;
            display: inline-block;

            vertical-align: top;
            color: white;
            width: 30px;
            height: 30px;
            font: 30px/1 Arial, sans-serif;
            text-align: center;
            border-radius: 50%;
            background-clip: padding-box;
        }

        .qty {
            text-align: center;
            padding: 5px;
    }



        .btnDonate {
            background-color: black;
            width: 100%;
            color: white;

        }

        .btnDonate:hover {
            background-color: white;
            width: 100%;
            color: #000000;
            border: 1px solid #000000;
        }

        .special-bo-info hr {
            margin: 4px 0px 5px;
            width: 90%;
        }

        .product-details-content hr {
            border-top: 2px solid rgba(0, 0, 0, .1);
            border-style: dashed;
            margin: 8px 0px;
        }

        .minus:hover {
            background-image: -webkit-linear-gradient(-180deg, rgb(254, 109, 14) 0%, rgb(253, 66, 23) 100%);
        }

        .plus:hover {
            background-image: -webkit-linear-gradient(-180deg, rgb(254, 109, 14) 0%, rgb(253, 66, 23) 100%);
        }

        input.count {
            border: 0;
            width: 2%;
        }
        .variation h2{
            text-align: left;
        }

        .w-100 {
            width: 570px;
        }

        .slider-thumb {
            border: 2px solid black;

        }

        /* Slider */
        .slick-slider {
            position: relative;

            display: block;
            box-sizing: border-box;

            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;

            -webkit-touch-callout: none;
            -khtml-user-select: none;
            -ms-touch-action: pan-y;
            touch-action: pan-y;
            -webkit-tap-highlight-color: transparent;
        }

        .slick-list {
            position: relative;

            display: block;
            overflow: hidden;

            margin: 0;
            padding: 0;
        }

        .slick-list:focus {
            outline: none;
        }

        .slick-list.dragging {
            cursor: pointer;
            cursor: hand;
        }

        .slick-slider .slick-track,
        .slick-slider .slick-list {
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .slick-track {
            position: relative;
            top: 0;
            left: 0;

            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .slick-track:before,
        .slick-track:after {
            display: table;

            content: '';
        }

        .slick-track:after {
            clear: both;
        }

        .slick-loading .slick-track {
            visibility: hidden;
        }

        .slick-slide {
            display: none;
            float: left;

            height: 100%;
            min-height: 1px;
        }

        [dir='rtl'] .slick-slide {
            float: right;
        }

        .slick-slide img {
            display: block;
        }

        .slick-slide.slick-loading img {
            display: none;
        }

        .slick-slide.dragging img {
            pointer-events: none;
        }

        .slick-initialized .slick-slide {
            display: block;
        }

        .slick-loading .slick-slide {
            visibility: hidden;
        }

        .slick-vertical .slick-slide {
            display: block;

            height: auto;

            border: 1px solid transparent;
        }

        .slick-arrow.slick-hidden {
            display: none;
        }
        .product-img--main__image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: contain;
    background-position: center;

    background-repeat: no-repeat;
    -webkit-transition: -webkit-transform .5s ease-out;
    transition: -webkit-transform .5s ease-out;
    transition: transform .5s ease-out;
    transition: transform .5s ease-out,-webkit-transform .5s ease-out;
}
.product-img--main {

   position: relative;
  overflow: hidden;
    height:500px;
    width:100%;


}

h1.product_title {
    padding: 5px;
    font-size: 27px;
}


.col-lg-4 {
    padding-top: 80px;
}

    </style>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).on('click', "#addCart", function(e) {
            console.log($('#addcount').val())
            $('#add-cart').submit();
        });

        $(document).on('keydown keyup', ".qty", function(e) {
            if ($(this).val() <= 1) {
                e.preventDefault();
                $(this).val(1);
            }
        });
        $(document).ready(function() {
            $(document).on('click', '.plus', function() {
                $('.count').val(parseInt($('.count').val()) + 1);
            });
            $(document).on('click', '.minus', function() {
                $('.count').val(parseInt($('.count').val()) - 1);
                if ($('.count').val() == 0) {
                    $('.count').val(1);
                }
            });
        });

        $('.product-img--main')
        // tile mouse actions
        .on('mouseover', function(){
          $(this).children('.product-img--main__image').css({'transform': 'scale('+ $(this).attr('data-scale') +')'});
        })
        .on('mouseout', function(){
          $(this).children('.product-img--main__image').css({'transform': 'scale(1)'});
        })
        .on('mousemove', function(e){
          $(this).children('.product-img--main__image').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
        })
        // tiles set up
        .each(function(){
          $(this)
            // add a image container
            .append('<div class="product-img--main__image"></div>')
            // set up a background image for each tile based on data-image attribute
            .children('.product-img--main__image').css({'background-image': 'url('+ $(this).attr('data-image') +')'});
        });



    </script>
@endsection
