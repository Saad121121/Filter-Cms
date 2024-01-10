@extends('layouts.app')
@push('before-css')
  <link href="{{asset('assets/css/pages/order-page.css')}}" rel="stylesheet" type="text/css">
@endpush
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">

              <div class="col-lg-8">
                <div class="order-status">
                    @if($order->order_status == "Pending")
                  <ul>
                    <li class="active-link">
                      <div class="white-bg">
                        <div class="circle-top"><div class="circle-1"></div>
                        </div>
                      </div>
                      <button class="btn btn-primary disabled"><span>Pending</span></button>
                    </li>
					
                    <li class="non-active">
                      <div class="white-bg">
                        <div class="circle-top"><div class="circle-1"></div>
                        </div>
                      </div>
                      <button class="btn btn-primary"><span>Completed</span></li>
                  </ul>
				  @else
					  <ul>
                    <li class="non-active">
                      <div class="white-bg">
                        <div class="circle-top"><div class="circle-1"></div>
                        </div>
                      </div>
                      <button class="btn btn-primary"><span>Pending</span></button></li>
					
                    <li class="active-link">
                      <div class="white-bg">
                        <div class="circle-top"><div class="circle-1"></div>
                        </div>
                      </div>
                      <button class="btn btn-primary disabled"><span>Completed</span></button>
                    </li>
                  </ul>
				  @endif
                </div>
              </div>

              <div class="col-lg-4">
                <div class="btn-group float-md-right d-block">
                  <p class="alert alert-primary text-center">{{$order->order_status}}</p>
                  <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Change Order Status</button>
                  <div class="dropdown-menu arrow">
                    <a href="javascript:void()"  onclick="window.location.href='{{ route('status.pending',[$order->id ]) }}'" class="dropdown-item">Pending
                    </a>
                    <a href="javascript:void()"  onclick="window.location.href='{{ route('status.completed',[$order->id ]) }}'" class="dropdown-item">Completed
                    </a>
                    <!-- <a href="javascript:void()"  onclick="window.location.href='{{ route('status.delivered',[$order->id ]) }}'" class="dropdown-item">Delivered
                    </a>
                    <a href="javascript:void()"  onclick="window.location.href='{{ route('status.cancelled',[$order->id ]) }}'" class="dropdown-item">Cancelled
                    </a> -->
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
    <!-- End Info box -->

    <!--Delivery details -->
    <!-- ============================================================== -->
    <div class="row">
      <!-- Column -->
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex m-b-10 no-block">
              <h5 class="card-title m-b-0 align-self-center text-uppercase">Order id  {{$order->id}}</h5>
              <div class="ml-auto">
                <ul class="list-inline m-t-5 text-muted text-uppercase lp-5 font-medium font-12">
                  <li> {{date('F d, Y',strtotime($order->created_at))}}</li>

                </ul>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table product-table color-table primary-table">
                <thead>
                <tr>
				
                  <th>ID </th>
                  <th>Product</th>
                  <th>&nbsp;</th>
                  <th>Price</th>
                  <th>QTY</th>
                  <th>Total</th>

                </tr>
                </thead>
                <tbody>
			<?php $subtotal  = 0;
      $total_variation = 0
      ?>

				@foreach($order_products as $order_product)	
						<?php $product = App\Product::where('id',$order_product->order_products_product_id)->first(); // Helper::returnRow("products_header","id = ".$order_product->order_products_product_id); ?>
					<tr>
					
            <td>{{ $order_product->order_products_id }}</td>
            <td> <img src="{{asset($product->image)}}" alt="" title=""> </td> 
              <td class="text-dark weight-600">
              {{$order_product->order_products_name}}
              @php
                  $variants = json_decode($order_product->variants);
                  //dump($order_product->order_products_qty);
              @endphp
              <?php  $toppingtotal += $value->price?>
              @foreach($variants as $key => $value)
              
              <?php  $toppingtotal += $value->price?>
              <p class="mb-0"> {{ $value->attribute }} - {{ $value->attribute_val }} - ${{$value->attribute_price}}</p>
              @php
              $total_variation += $value->attribute_price;
              @endphp
              @endforeach
              @php
              $total_variation *= $order_product->order_products_qty;
              @endphp

              </td>
              <td>${{$order_product->order_products_price}}</td>
              <td>{{$order_product->order_products_qty}}</td>
              <td>${{$order_product->order_products_subtotal}}</td>

					</tr>
				
			<?php $subtotal+= $order_product->order_products_qty * $order_product->order_products_price; 
      
        

      ?>
				@endforeach
             

                <tr>
                  <td colspan="2" class="custom-product">&nbsp;</td>
                  <td colspan="3" class="text-muted custom-product">Subtotal Price:
                  </td>
                  <td class="custom-product">${{ $subtotal }}</td>
                </tr>
                <tr>
                  <td class="no-border" colspan="2">&nbsp;</td>
                  <td colspan="3" class="text-muted no-border">Variation Price:
                  </td>
                  <td class="no-border">$ {{$total_variation}}</td>
                </tr>

                <tr>
                  <td class="no-border" colspan="2">&nbsp;</td>
                  <td colspan="3" class="text-dark no-border weight-600">Total Price:
                  </td>
                  <td class="no-border">${{$order->order_total + $total_variation}}</td>

                </tr>





                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>

      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title m-b-5 align-self-center text-uppercase">Shipping Address</h5>


            <div class="product-table text-dark no-border">
              <table class="table m-b-5 m-t-20 ">
                <tbody>
                  <tr>
                    <td  class="text-muted">Recipient: </td>
                    <td  class="text-color">{{$order->delivery_first_name}} {{$order->delivery_last_name}}</td>
                  </tr>
                  <tr>
                    <td class="text-muted">Phone: </td>
                    <td class="text-color">{{$order->delivery_phone_no}}</td>
                  </tr>
                  <tr>
                    <td class="text-muted">Email: </td>
                    <td class="text-color">{{$order->order_email}}</td>
                  </tr>
                  <tr>
                    <td class="text-muted">Address: </td>
                    <td class="text-color">{{$order->delivery_address_1}},{{$order->delivery_country}} {{$order->delivery_city}}, {{$order->delivery_state}}</td>
                  </tr>
                </tbody>
              </table>
            </div>


          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title m-b-5 align-self-center text-uppercase">Order Information</h5>


            <div class="product-table text-dark no-border">
              <table class="table m-b-5 m-t-20 ">
                <tbody>
                  <tr>
                    <td  class="text-muted">Payment Method: </td>
                    <td  class="text-color">{{ ucfirst($order->payment_method)}}</td>
                  </tr>
                  <tr>
                    <td class="text-muted">Transaction Id: </td>
                    <td class="text-color">{{$order->transaction_id}}</td>
                  </tr>
                  <tr>
                    <td class="text-muted">Invoice Number: </td>
                    <td class="text-color">{{$order->invoice_number}}</td>
                  </tr>
                </tbody>
              </table>
            </div>


          </div>
        </div>

      </div>
      <!-- Column -->
    </div>
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
