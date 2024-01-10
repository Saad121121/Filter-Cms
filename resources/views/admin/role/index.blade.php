@extends('layouts.app')

@push('after-css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                    <div class="card-body">
                        <h3 class="box-title pull-left">Role Management</h3>
                        <a class="btn btn-success pull-right" href="{{url('admin/role/create')}}"><i class="icon-plus"></i>
                            Add
                            Role</a>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="row  justify-content-center">
                            <div class="col-lg-10 col-12 mt-lg-5 align-self-center">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $key=>$role)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$role->name}}</td>
                                                <th>
                                                    <a class="btn btn-info btn-sm"
                                                       href="{{url('admin/role/edit/'.$role->id)}}"><i
                                                                class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</a>
                                                    &nbsp;&nbsp;
                                                    <a class="delete btn btn-danger btn-sm"
                                                       href="{{url('admin/role/delete/'.$role->id)}}"><i
                                                                class="fa fa-trash-o"></i> Delete</a>
                                                </th>
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
        </div>
        @include('layouts.admin.footer')

    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    {{--<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>--}}
    {{--<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>--}}
    {{--<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>--}}
    {{--<!-- end - This is for export functionality only -->--}}
    <script>
        $(document).on('click', '.delete', function () {
            if (confirm('Are you sure want to delete?')) {
            }
            else {
                return false;
            }
        });
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
        $(function () {
            $('#myTable').DataTable({
                "columns": [
                    null, null, {"orderable": false}
                ],
                "columnDefs": [
                    {"width": "50%", "targets": 1}
                ]
            });

        });
    </script>

@endpush