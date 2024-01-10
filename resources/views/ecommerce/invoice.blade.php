@extends('layouts.app')

@push('before-css')
@endpush

@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Invoice box -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-body printableArea">
                                    <div class="row">
                                        <div class="col-md-12 p-3">
                                            <div class="pull-left">
                                                <h3 class="text-center"><img
                                                            src="{{asset('assets/imgs/logo-icon-lg.png')}}" alt=""
                                                            title=""> <span class="clearfix"></span> <span
                                                            class="weight-600"> Mintone</span></h3>
                                            </div>
                                            <div class="pull-right text-right">
                                                <address>
                                                    <div class="weight-500">
                                                        Invoice 120-545K
                                                    </div>
                                                    <p class="m-t-20 m-b-0"><b class="text-muted">Date :</b> 23rd June
                                                        2018</p>
                                                    <p><b class="text-muted">Due Date :</b> 25th June 2018</p>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row col-md-12 p-t-40">
                                            <div class="col">
                                                <address>
                                                    <div class="text-uppercase font-16 weight-500 m-b-10">Bill From:
                                                    </div>
                                                    <div class="weight-500 m-b-10">Mintone Agency</div>
                                                    <p class="m-b-10">Piccadily St. 5, London, UK, 12003</p>
                                                    <p class="m-b-10">(049) 450 00 567</p>
                                                    <p class="m-b-10">Creativeagency@gmail.com</p>
                                                </address>
                                            </div>
                                            <div class="col">
                                                <address>
                                                    <div class="text-uppercase font-16 weight-500 m-b-10">Bill To:</div>
                                                    <div class="weight-500 m-b-10">Rosewood Caffe</div>
                                                    <p class="m-b-10">Barber St. 45/6, LA, USA, 44030</p>
                                                    <p class="m-b-10">(049) 450 00 567</p>
                                                    <p class="m-b-10">rosewoodcaffe@gmail.com</p>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive m-t-40">
                                                <table class="table color-table m-b-0 invoice-table">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:291px">Services</th>
                                                        <th style="width:183px">Unit</th>
                                                        <th style="width:155px">Unit Price</th>
                                                        <th style="width:92px">Quantity</th>
                                                        <th style="width:61px">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Product research</td>
                                                        <td>Hours</td>
                                                        <td>$15</td>
                                                        <td>17</td>
                                                        <td>$255</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Wireframin</td>
                                                        <td>Hours</td>
                                                        <td>$15</td>
                                                        <td>17</td>
                                                        <td>$255</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Design</td>
                                                        <td>Hours</td>
                                                        <td>$15</td>
                                                        <td>17</td>
                                                        <td>$255</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="invoice-bottom-top" rowspan="3">Note:<br>
                                                            <span class="text-muted">Please pay the total sum via bank transfer during 7 days of receive moment. Thank you!</span>
                                                        </td>
                                                        <td class="invoice-bottom-top">&nbsp;</td>
                                                        <td class="invoice-bottom-top" colspan="2">Subtotal Price:</td>
                                                        <td class="invoice-bottom-top">$1389</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="invoice-bottom">&nbsp;</td>
                                                        <td class="invoice-bottom" colspan="2">Tax 20%:</td>
                                                        <td class="invoice-bottom">-10%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="invoice-bottom">&nbsp;</td>
                                                        <td class="invoice-bottom" colspan="2">Discount:</td>
                                                        <td class="invoice-bottom">39</td>
                                                    </tr>
                                                    </tbody>

                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <th>&nbsp;</th>
                                                        <th colspan="2">Unit Price</th>
                                                        <th>$1418</th>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                        <div class="row col-md-12 p-t-40">
                                            <div class="col">
                                                <address>
                                                    <div class="text-uppercase font-16 weight-500 m-b-10">Transfer
                                                        details
                                                    </div>
                                                    <p class="m-b-0">Account Name: Some Company</p>
                                                    <p class="m-b-0">Bank Name: Credit Agricole Bank</p>
                                                    <p class="m-b-0">Account No: 4520 0012 0125 KJ</p>
                                                </address>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 class="m-b-10 m-t-20"><span
                                                                    class="text-uppercase font-16 weight-500 ">Alex Robertson</span><br>
                                                            <span class="text-muted small">Creative Agency Director</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col p-t-10"><img
                                                                src="{{asset('assets/imgs/signature.png')}}"
                                                                class="img-fluid" alt=""></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                            <div class="text-right">
                                                <button class="btn btn-danger" type="submit"> Proceed to payment
                                                </button>
                                                <button id="print" class="btn btn-default btn-outline" type="button">
                                                    <span><i class="fa fa-print"></i> Print</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End Invoice box -->
         @include('layouts.admin.footer')
    </div>
@endsection

@push('js')
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Popup message jquery -->
    <script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('assets/js/jquery.PrintArea.js')}}"></script>
    <script>
        $(function () {
            $("#print").on('click', function () {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("div.printableArea").printArea(options);
            });
        });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endpush
