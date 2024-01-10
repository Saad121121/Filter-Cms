@extends('layouts.app')

@push('before-css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Orders</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Home</li>
                    <li class="breadcrumb-item active">Ecommerce</li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order Info</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="">
                            <table class="table table-striped table-bordered zero-configuration" id="myTable">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Customer</td>
                                    <td>Status</td>
                                    <td>Date</td>
                                    <td class="op-0">Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                     @foreach($orders as $item) 
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td class="text-dark weight-600">
                                                    {{ $item->delivery_first_name.' '.$item->billing_last_name }}
                                                </td>
                                                <!-- <td>Air Delivery</td> -->
                                                <td>{{ $item->order_status }}</td>
                                                <td>{{date('d F, Y h:m a',strtotime($item->created_at))}}</td>
                                                <td class="text-center">
                                                    
                                                <!--    <a title="View Invoice" data-toggle="tooltip" href="{{ url('/invoice/' . $item->id) }}" target="_blank">
                                                <i class="fas fa-file"></i></a> -->
                                                <a title="View Detail" data-toggle="tooltip" href="{{ url('admin/order/detail/' . $item->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"> </i>
                                                        Edit
                                                </a>

                                                </td>
                                                <!-- <td class="text-center">
                                                    <a href=""><i
                                                                class="fas fa-trash-alt text-danger"></i>
                                                            </a></td> -->
                                            </tr>
                                    @endforeach
                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {

            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif
        })

        $(function () {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>
@endpush

