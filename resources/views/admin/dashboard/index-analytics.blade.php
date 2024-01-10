@extends('layouts.app')

@push('before-css')
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/pages/easy-pie-chart.css')}}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!-- page css -->
    <link href="{{asset('assets/css/pages/google-vector-map.css')}}" rel="stylesheet">
@endpush

@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- chart box one -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-md-12">
                <div class="card panel-main o-income panel-refresh">
                    <div class="refresh-container">
                        <div class="preloader">
                            <div class="loader">
                                <div class="loader__figure"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body panel-wrapper">
                        <div class="m-b-10">
                            <div class="row">
                                <div class="col-md-4"><h5
                                            class="card-title m-b-0 align-self-center text-uppercase">Sessions</h5>
                                </div>
                                <div class="col-md-8 text-right">
                                    <div class="ml-auto text-light-blue">
                                        <ul class="list-inline m-b-30 text-uppercase lp-5 font-medium font-12">
                                            <li>Last year</li>
                                            <li>Last month</li>
                                            <li>Last week</li>
                                            <li><i class="flaticon-calendar"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline m-b-30 text-uppercase lp-5 font-medium font-12">
                            <li><i class="fa fa-square m-r-5 text-warning"></i> Sales</li>
                            <li><i class="fa fa-square m-r-5 text-pink"></i> Orders</li>
                            <li><i class="fa fa-square m-r-5 text-primary"></i> New visitors</li>
                        </ul>
                        <div id="extra-area-chart-2"></div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End chart box one -->


        <!-- Column -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card panel-main o-income panel-refresh">
                    <div class="refresh-container">
                        <div class="preloader">
                            <div class="loader">
                                <div class="loader__figure"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body panel-wrapper">
                        <div class="d-flex m-b-10 no-block">
                            <h5 class="card-title m-b-0 align-self-center">top 5 pages</h5>
                            <div class="ml-auto text-light-blue"><a href="#"
                                                                    class="pull-left text-light-blue inline-block refresh mr-15">
                                    <i class="fas fa-sync"></i> Update </a></div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <div class="chart easy-pie-chart-1" data-percent="35"><span
                                            class="percent  text-purple">35/100</span></div>
                                <p class="font-16 font-weight-bold">Shop catalog</p>
                            </div>
                            <div class="col text-center">
                                <div class="chart easy-pie-chart-2" data-percent="35"><span
                                            class="percent  text-warning">35/100</span></div>
                                <p class="font-16 font-weight-bold">Main page</p>
                            </div>
                            <div class="col text-center">
                                <div class="chart easy-pie-chart-3" data-percent="35"><span
                                            class="percent  text-primary">35/100</span></div>
                                <p class="font-16 font-weight-bold">Customer page</p>
                            </div>
                            <div class="col text-center">
                                <div class="chart easy-pie-chart-4" data-percent="35"><span
                                            class="percent  text-danger">35/100</span></div>
                                <p class="font-16 font-weight-bold">Readonly</p>
                            </div>
                            <div class="col text-center">
                                <div class="chart easy-pie-chart-5" data-percent="35"><span
                                            class="percent  text-turqoise">35/100</span></div>
                                <p class="font-16 font-weight-bold">Products</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->


        <!--visitors age-->

        <div class="row">


            <div class="col-lg-6 col-md-12">
                <div class="card panel-main o-income panel-refresh">
                    <div class="refresh-container">
                        <div class="preloader">
                            <div class="loader">
                                <div class="loader__figure"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body panel-wrapper">
                        <div class="d-flex m-b-10 no-block">
                            <h5 class="card-title m-b-0 align-self-center">visitors Age</h5>
                            <div class="ml-auto text-light-blue"><a href="#"
                                                                    class="pull-left text-light-blue inline-block refresh mr-15">
                                    <i class="fas fa-sync"></i> Update </a></div>
                        </div>

                        <div id="morris-area-chart3"></div>

                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-12">
                <div class="card panel-main o-income panel-refresh">
                    <div class="refresh-container">
                        <div class="preloader">
                            <div class="loader">
                                <div class="loader__figure"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body panel-wrapper">
                        <div class="d-flex m-b-10 no-block">
                            <h5 class="card-title m-b-0 align-self-center">visitors gender</h5>
                            <div class="ml-auto text-light-blue"><a href="#"
                                                                    class="pull-left text-light-blue inline-block refresh mr-15">
                                    <i class="fas fa-sync"></i> Update </a></div>
                        </div>
                        <ul class="list-inline m-b-30 text-uppercase lp-5 font-medium font-12">
                            <li><i class="fa fa-square m-r-5 text-primary"></i> Male</li>
                            <li><i class="fa fa-square m-r-5 text-warning"></i> Female</li>
                            <li><i class="fa fa-square m-r-5 text-purple"></i> Undefined</li>
                            <li><i class="fa fa-square m-r-5 text-pink"></i> Suits</li>
                        </ul>

                        <canvas id="chart3" height="170"></canvas>

                    </div>
                </div>
            </div>


        </div>

        <!--visitors age-->


        <!-- chart box two -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-md-12">
                <div class="card panel-main o-income panel-refresh">
                    <div class="refresh-container">
                        <div class="preloader">
                            <div class="loader">
                                <div class="loader__figure"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body panel-wrapper">
                        <div class="d-flex m-b-10 no-block">
                            <h5 class="card-title m-b-0 align-self-center">Visitors</h5>
                            <div class="ml-auto text-light-blue"><a href="#"
                                                                    class="pull-left text-light-blue inline-block refresh mr-15">
                                    <i class="fas fa-sync"></i> Update </a></div>
                        </div>
                        <div id="world-map-markers" style="height: 400px"></div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        @include('layouts.admin.footer')
    </div>
@endsection

@push('js')
    <!-- This page plugins -->
    <!-- Popup message jquery -->
    <script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>
    <!-- EASY PIE CHART JS -->
    <script src="{{asset('plugins/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
    <script src="{{asset('plugins/vendors/jquery.easy-pie-chart/easy-pie-chart.init.js')}}"></script>
    <!-- ============================================================== -->
    <script src="{{asset('plugins/vendors/knob/jquery.knob.js')}}"></script>

    <!--Sparkline JavaScript -->
    <script src="{{asset('plugins/vendors/sparkline/jquery.sparkline.min.js')}}"></script>

    <!--Morris JavaScript -->
    <script src="{{asset('plugins/vendors/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('plugins/vendors/morrisjs/morris.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset('plugins/vendors/Chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('assets/js/analytics-page-chart.js')}}"></script>

    <!-- Vector map JavaScript -->
    <script src="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('plugins/vendors/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

    <!-- Dashboard JS -->
    <script src="{{asset('assets/js/dashboard-analytics.js')}}"></script>


@endpush