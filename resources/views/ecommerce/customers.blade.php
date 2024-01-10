@extends('layouts.app')

@push('before-css')
  <!-- This page CSS -->
  <!-- Page CSS -->
  <link href="{{asset('plugins/vendors/bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet" type="text/css">
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
              <h5 class="card-title m-b-0 align-self-center">Customers</h5>
            </div>
            <div class="table-responsive m-t-10">
              <table id="myTable" class="table table-orders color-table table-bordered table-hover">
                <thead>
                <tr>
                  <td><div class="checkbox checkbox-primary">
                      <input id="checkbox0"  onchange="checkAll(this)" name="chk[]" type="checkbox">
                      <label for="checkbox0"></label>
                    </div></td>
                  <td>ID</td>
                  <td>Customer</td>
                  <td>Email</td>
                  <td>Purchases</td>
                  <td>Total Spent</td>
                  <td class="op-0">&nbsp;</td>
                  <td class="op-0">&nbsp;</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td><div class="checkbox checkbox-primary">
                      <input id="checkbox21" type="checkbox">
                      <label for="checkbox21"></label>
                    </div>
                  <td>8524</td>
                  <td class="text-dark weight-600"><a href="">Hakim Summers</a> </td>
                  <td>summershak@gmail.com</td>
                  <td>$1175</td>
                  <td>$8254</td>
                  <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                  <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
                <tr>
                  <td><div class="checkbox checkbox-primary">
                      <input id="checkbox31" type="checkbox">
                      <label for="checkbox31"></label>
                    </div></td>
                  <td>1234</td>
                  <td class="text-dark weight-600">Eric Breinstorm</td>
                  <td>ericbrein@gmail.com</td>
                  <td>$750</td>
                  <td>$6512</td>
                  <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                  <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
                <tr>
                  <td><div class="checkbox checkbox-primary">
                      <input id="checkbox3" type="checkbox">
                      <label for="checkbox3"></label>
                    </div></td>
                  <td>2651</td>
                  <td class="text-dark weight-600">Mellissa Reynolds</td>
                  <td>melreyno@gmail.com</td>
                  <td>$375</td>
                  <td>$5631</td>
                  <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                  <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
                <tr>
                  <td><div class="checkbox checkbox-primary">
                      <input id="checkbox4" type="checkbox">
                      <label for="checkbox4"></label>
                    </div></td>
                  <td>4591</td>
                  <td class="text-dark weight-600">Jessica Abbingtom </td>
                  <td>jessabing@gmail.com</td>
                  <td>$175</td>
                  <td>$35745</td>
                  <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                  <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
                <tr>
                  <td><div class="checkbox checkbox-primary">
                      <input id="checkbox5" type="checkbox">
                      <label for="checkbox5"></label>
                    </div></td>
                  <td>9821</td>
                  <td class="text-dark weight-600">Mason Hudson</td>
                  <td>mashuds@gmail.com</td>
                  <td>$515</td>
                  <td>$7842</td>
                  <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                  <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
                <tr>
                  <td><div class="checkbox checkbox-primary">
                      <input id="checkbox61" type="checkbox">
                      <label for="checkbox61"></label>
                    </div></td>
                  <td>5913</td>
                  <td class="text-dark weight-600">Sasha Rhodes</td>
                  <td>sasrho@gmail.com</td>
                  <td>$2115</td>
                  <td>$8745</td>
                  <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                  <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
                <tr>
                  <td><div class="checkbox checkbox-primary">
                      <input id="checkbox71" type="checkbox">
                      <label for="checkbox71"></label>
                    </div></td>
                  <td>7815</td>
                  <td class="text-dark weight-600">Mitchell Jones</td>
                  <td>mitchjo@gmail.com</td>
                  <td>$85</td>
                  <td>$2515</td>
                  <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                  <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
                <tr>
                  <td><div class="checkbox checkbox-primary">
                      <input id="checkbox8"  type="checkbox">
                      <label for="checkbox8"></label>
                    </div></td>
                  <td>6581</td>
                  <td class="text-dark weight-600">Nina Fox</td>
                  <td>ninafox@gmail.com</td>
                  <td>$456</td>
                  <td>$1236</td>
                  <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                  <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
                <tr>
                  <td><div class="checkbox checkbox-primary">
                      <input id="checkbox1" type="checkbox">
                      <label for="checkbox1"></label>
                    </div>
                  <td>8524</td>
                  <td class="text-dark weight-600">Hakim Summers</td>
                  <td>summershak@gmail.com</td>
                  <td>$1175</td>
                  <td>$8254</td>
                  <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                  <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
                <tr>
                  <td><div class="checkbox checkbox-primary">
                      <input id="checkbox6" type="checkbox">
                      <label for="checkbox6"></label>
                    </div></td>
                  <td>5913</td>
                  <td class="text-dark weight-600">Sasha Rhodes</td>
                  <td>sasrho@gmail.com</td>
                  <td>$2115</td>
                  <td>$8745</td>
                  <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                  <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
                <tr>
                  <td><div class="checkbox checkbox-primary">
                      <input id="checkbox7" type="checkbox">
                      <label for="checkbox7"></label>
                    </div></td>
                  <td>7815</td>
                  <td class="text-dark weight-600">Mitchell Jones</td>
                  <td>mitchjo@gmail.com</td>
                  <td>$85</td>
                  <td>$2515</td>
                  <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                  <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a></td>
                </tr>
                <tr>
                  <td><div class="checkbox checkbox-primary">
                      <input id="checkbox2" type="checkbox">
                      <label for="checkbox2"></label>
                    </div></td>
                  <td>1234</td>
                  <td class="text-dark weight-600">Eric Breinstorm</td>
                  <td>ericbrein@gmail.com</td>
                  <td>$750</td>
                  <td>$6512</td>
                  <td class="text-center"><a href=""><i class="fas fa-pencil-alt"></i></a></td>
                  <td class="text-center"><a href=""><i class="fas fa-trash-alt text-danger"></i></a></td>
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

@push('js')
  <!-- ============================================================== -->
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
      $(function() {
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
              "drawCallback": function(settings) {
                  var api = this.api();
                  var rows = api.rows({
                      page: 'current'
                  }).nodes();
                  var last = null;
                  api.column(2, {
                      page: 'current'
                  }).data().each(function(group, i) {
                      if (last !== group) {
                          $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                          last = group;
                      }
                  });
              }
          });
          // Order by the grouping
          $('#example tbody').on('click', 'tr.group', function() {
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
  <script>
      function checkAll(ele) {
          var checkboxes = document.getElementsByTagName('input');
          if (ele.checked) {
              for (var i = 0; i < checkboxes.length; i++) {
                  if (checkboxes[i].type == 'checkbox') {
                      checkboxes[i].checked = true;
                  }
              }
          } else {
              for (var i = 0; i < checkboxes.length; i++) {
                  console.log(i)
                  if (checkboxes[i].type == 'checkbox') {
                      checkboxes[i].checked = false;
                  }
              }
          }
      }
  </script>
  <!-- ============================================================== -->
  <!-- Style switcher -->
  <!-- ============================================================== -->
  <script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
@endpush
