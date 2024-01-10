@extends('layouts.app')

@push('before-css')
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>

    <!-- Date picker plugins css -->
    <link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <!-- page css -->
    <link href="{{asset('assets/css/pages/google-vector-map.css')}}" rel="stylesheet">
@endpush

@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex m-b-10 no-block">
                            <h5 class="card-title m-b-0 align-self-center">Product List</h5>
                            <div class="ml-auto text-light-blue">
                                <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12"
                                    role="tablist">
                                    <li>
                                        <a href="{{url('ecommerce-add-new')}}"
                                           class="btn waves-effect waves-light btn-rounded btn-primary">Add Product</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive m-t-10">
                            <table id="myTable" class="table color-table table-bordered product-table table-hover">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Product</td>
                                    <td>Category</td>
                                    <td>SKU</td>
                                    <td>Price</td>
                                    <td>QTY</td>
                                    <td>Status</td>
                                    <td class="op-0">&nbsp;</td>
                                    <td class="op-0">&nbsp;</td>


                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1245</td>
                                    <td class="text-dark weight-600"><img src="{{asset('assets/imgs/pro4.jpg')}}" alt="" title=""> Riser white laptop <br>
                                    </td>
                                    <td>Technique</td>
                                    <td>C1561</td>
                                    <td>$1175</td>
                                    <td>25</td>
                                    <td>In Stock</td>
                                    <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                                    <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>


                                <tr>
                                    <td>5891</td>
                                    <td class="text-dark weight-600"><img src="{{asset('assets/imgs/pro5.jpg')}}" alt="" title=""> Red wine lipstick <br>
                                    </td>
                                    <td>Women Accessories</td>
                                    <td>P4545</td>
                                    <td>$750</td>
                                    <td>140</td>
                                    <td>In Stock</td>
                                    <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                                    <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>1234</td>
                                    <td class="text-dark weight-600"><img src="{{asset('assets/imgs/pro3.jpg')}}" alt="" title=""> Huawei Y512 phone <br>
                                    </td>
                                    <td>Phone</td>
                                    <td>K5463</td>
                                    <td>$375</td>
                                    <td>54</td>
                                    <td>Out of Stock</td>
                                    <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                                    <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>7811</td>
                                    <td class="text-dark weight-600"><img src="{{asset('assets/imgs/pro.jpg')}}" alt="" title=""> Notebook Asus Aspire <br>
                                    </td>
                                    <td>Technique</td>
                                    <td>A5415</td>
                                    <td>$175</td>
                                    <td>5</td>
                                    <td>In Stock</td>
                                    <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                                    <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>


                                <tr>
                                    <td>6587</td>
                                    <td class="text-dark weight-600"><img src="{{asset('assets/imgs/pro6.jpg')}}" alt="" title=""> Rose hand cream <br>
                                    </td>
                                    <td>Cosmetics</td>
                                    <td>Q4811</td>
                                    <td>$515</td>
                                    <td>14</td>
                                    <td>Out of Stock</td>
                                    <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                                    <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>


                                <tr>
                                    <td>2451</td>
                                    <td class="text-dark weight-600"><img src="{{asset('assets/imgs/pro7.jpg')}}" alt="" title="">Wood table in red <br>
                                    </td>
                                    <td>Furniture</td>
                                    <td>F1561</td>
                                    <td>$2115</td>
                                    <td>321</td>
                                    <td>In Stock</td>
                                    <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                                    <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>


                                <tr>
                                    <td>2611</td>
                                    <td class="text-dark weight-600"><img src="{{asset('assets/imgs/pro8.jpg')}}" alt="" title=""> Baby oil for body <br>
                                    </td>
                                    <td>Oils</td>
                                    <td>I1551</td>
                                    <td>$85</td>
                                    <td>985</td>
                                    <td>In Stock</td>
                                    <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                                    <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>7891</td>
                                    <td class="text-dark weight-600"><img src="{{asset('assets/imgs/pro2.jpg')}}" alt="" title=""> Women Gold ring <br>
                                    </td>
                                    <td>Women Accessories</td>
                                    <td>A156</td>
                                    <td>$456</td>
                                    <td>12</td>
                                    <td>Out of Stock</td>
                                    <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                                    <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
							
                        </div>


                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- chart box two -->
        <!-- ============================================================== -->
          @include('layouts.admin.footer')
    </div>
@endsection

@push('js')<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--c3 JavaScript -->
<script src="{{asset('plugins/vendors/d3/d3.min.js')}}"></script>
<script src="{{asset('plugins/vendors/c3-master/c3.min.js')}}"></script>
<!--jquery knob -->
<script src="{{asset('plugins/vendors/knob/jquery.knob.js')}}"></script>
<!--Sparkline JavaScript -->
<script src="{{asset('plugins/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
<!--Morris JavaScript -->
<script src="{{asset('plugins/vendors/raphael/raphael-min.js')}}"></script>
<script src="{{asset('plugins/vendors/morrisjs/morris.js')}}"></script>
<!-- Popup message jquery -->
<script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{asset('plugins/vendors/datatables/jquery.dataTables.min.js')}}"></script>

<script>
    $(function () {
        $('#myTable').DataTable();
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 18,
            "drawCallback": function (settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function (group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function () {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });

    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>

<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endpush