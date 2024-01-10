{{--@extends('log-viewer::bootstrap-4._master')--}}
@extends('layouts.app')

@push('after-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('log_viewer.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box card">
                    <div class="card-body">
                        <h3 class="box-title pull-left">Logs</h3>
                        <div class="clearfix"></div>

                        <!--main content-->
                        <div class="row">
                            <div class="col-12">

                                <div class="panel panel-primary">

                                    <div class="panel-body">
                                        {!! $rows->render() !!}
                                        <div class="table-responsive">
                                            <table class="table table-condensed table-hover table-stats table-bordered">
                                                <thead>
                                                <tr>
                                                    @foreach($headers as $key => $header)
                                                        <th class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                                                            @if ($key == 'date')
                                                                <span class="label label-info">{{ $header }}</span>
                                                            @else
                                                                <span class="level level-{{ $key }}">
                                {!! log_styler()->icon($key) . ' ' . $header !!}
                            </span>
                                                            @endif
                                                        </th>
                                                    @endforeach
                                                    <th class="">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if ($rows->count() > 0)
                                                    @foreach($rows as $date => $row)
                                                        <tr>
                                                            @foreach($row as $key => $value)
                                                                <td class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                                                                    @if ($key == 'date')
                                                                        <span class="label label-primary">{{ $value }}</span>
                                                                    @elseif ($value == 0)
                                                                        <span class="level level-empty">{{ $value }}</span>
                                                                    @else
                                                                        <a href="{{ URL::to('log-viewers/logs',[$date,$key]) }}">
                                                                            <span class="level level-{{ $key }}">{{ $value }}</span>
                                                                        </a>
                                                                    @endif
                                                                </td>
                                                            @endforeach
                                                            <td class="text-right">

                                                                <a href="{{ URL::to('log-viewers/logs/'.$date) }}"
                                                                   class="">
                                                                    <i class="fa fa-info-circle"
                                                                       data-name="info"
                                                                       data-size="18"
                                                                       data-loop="true"
                                                                       data-c="#428BCA"
                                                                       data-hc="#428BCA"
                                                                    ></i>
                                                                </a>&nbsp;&nbsp;&nbsp;
                                                                <a href="{{ URL::to('log-viewers/logs/'.$date.'/download') }}"
                                                                   class="">
                                                                    <i class="fa fa-download"
                                                                       data-name="download"
                                                                       data-size="18"
                                                                       data-loop="true"
                                                                       data-c="#00bc8c"
                                                                       data-hc="#00bc8c"
                                                                    ></i>

                                                                </a>&nbsp;&nbsp;&nbsp;
                                                                <a href="#" data-target="#delete-log-modal"
                                                                   data-toggle="modal" class="delete"
                                                                   data-log-date="{{ $date }}">
                                                                    <i class="fa fa-trash" data-name="remove-alt"
                                                                       data-size="18" data-loop="true" data-c="#f56954"
                                                                       data-hc="#f56954"
                                                                    ></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="11" class="text-center">
                                                            <span class="label label-default">{{ trans('log-viewer::general.empty-logs') }}</span>
                                                        </td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-primary" href="{{ URL::to('/log-viewers') }}">
                                    Back
                                </a>
                            </div>
                        </div>
                        <!--main content ends-->


                        {{-- DELETE MODAL --}}
                        <div id="delete-log-modal" class="modal fade">
                            <div class="modal-dialog">
                                <form id="delete-log-form" action="{{ URL::to('log-viewers/logs/delete') }}"
                                      method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="date" value="">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">DELETE LOG FILE</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Delete?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-default pull-left"
                                                    data-dismiss="modal">Cancel
                                            </button>
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    data-loading-text="Loading&hellip;">DELETE
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.partials.footer')
    </div>
@endsection


@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            crossorigin="anonymous"></script>
    <script>
        $(function () {
            var deleteLogModal = $('div#delete-log-modal'),
                deleteLogForm = $('form#delete-log-form'),
                submitBtn = deleteLogForm.find('button[type=submit]');

            $("a[data-target='#delete-log-modal']").on('click', function (event) {
                event.preventDefault();

                var date = $(this).data('log-date');

                deleteLogForm.find('input[name=date]').val(date);
                deleteLogModal.find('.modal-body p').html(
                    'Are you sure you want to <span class="badge badge-danger">DELETE</span> this log file <span class="badge badge-primary">' + date + '</span> ?'
                );

//                deleteLogModal.modal('show');
            });

            deleteLogForm.on('submit', function (event) {
                event.preventDefault();
                submitBtn.button('loading');

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function (data) {
                        submitBtn.button('reset');
                        if (data.result === 'success') {
                            deleteLogModal.modal('hide');
                            location.reload();
                        }
                        else {
                            alert('AJAX ERROR ! Check the console !');
                            console.error(data);
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        alert('AJAX ERROR ! Check the console !');
                        console.error(errorThrown);
                        submitBtn.button('reset');
                    }
                });

                return false;
            });

            deleteLogModal.on('hidden.bs.modal', function () {
                deleteLogForm.find('input[name=date]').val('');
                deleteLogModal.find('.modal-body p').html('');
            });
        });
    </script>
@endpush
