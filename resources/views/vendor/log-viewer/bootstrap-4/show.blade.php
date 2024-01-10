{{--@extends('log-viewer::bootstrap-4._master')--}}
@extends('layouts.app')

@push('after-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('log_viewer.css') }}">
    <style>
        .label-default {
            background-color: #8d9498 !important;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box card">
                    <div class="card-body">
                        <h3 class="box-title pull-left">Log [{{ $log->date }}]</h3>

                        <!--main content-->
                        <div class="clearfix "></div>
                        <div class="panel panel-default">
                            @if ($entries->hasPages())
                                <div class="panel-heading">
                                    {!! $entries->appends(compact('query'))->render() !!}

                                    <span class="label label-info pull-right">
                            Page {!! $entries->currentPage() !!} of {!! $entries->lastPage() !!}
                        </span>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="entries" class="table table-condensed" width="100%">
                                    <thead>
                                    <tr>
                                        <th>ENV</th>
                                        <th>Level</th>
                                        <th>Time</th>
                                        <th>Header</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($entries as $key => $entry)
                                        <tr>
                                            <td>
                                                <span class="label label-env">{{ $entry->env }}</span>
                                            </td>
                                            <td>
                                        <span class="level level-{{ $entry->level }}">
                                            {!! $entry->level() !!}
                                        </span>
                                            </td>
                                            <td>
                                        <span class="label label-default">
                                            {{ $entry->datetime->format('H:i:s') }}
                                        </span>
                                            </td>
                                            <td>
                                                <p>{{ $entry->header }}</p>
                                            </td>
                                            <td class="text-right">
                                                @if ($entry->hasStack())
                                                    <a class="btn btn-xs btn-default" role="button"
                                                       data-toggle="collapse" href="#log-stack-{{ $key }}"
                                                       aria-expanded="false" aria-controls="log-stack-{{ $key }}">
                                                        <i class="fa fa-toggle-on"></i> Stack
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @if ($entry->hasStack())
                                            <tr>
                                                <td colspan="5" class="stack">
                                                    <div class="stack-content collapse" id="log-stack-{{ $key }}">
                                                        {!! $entry->stack() !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <span class="label label-default">{{ trans('log-viewer::general.empty-logs') }}</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            @if ($entries->hasPages())
                                <div class="panel-footer">
                                    {!! $entries->appends(compact('query'))->render() !!}

                                    <span class="label label-info pull-right">
                            Page {!! $entries->currentPage() !!} of {!! $entries->lastPage() !!}
                        </span>
                                </div>
                            @endif
                        </div>
                        <a class="btn btn-primary" href="{{ URL::to('log-viewers/logs') }}">
                            Back
                        </a>
                        <!--main content ends-->

                        <!--Delete Modal-->
                        <div id="delete-log-modal" class="modal fade">
                            <div class="modal-dialog">
                                <form id="delete-log-form" action="{{ URL::to('admin/log_viewers/logs/delete') }}"
                                      method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="date" value="{{ $log->date }}">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">DELETE LOG FILE</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to <span class="label label-danger">DELETE</span>
                                                this log file <span class="label label-primary">{{ $log->date }}</span>
                                                ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-default pull-left"
                                                    data-dismiss="modal">Cancel
                                            </button>
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    data-loading-text="Loading&hellip;">DELETE FILE
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
        @endsection

        @section('modals')
            {{-- DELETE MODAL --}}
            <div id="delete-log-modal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="date" value="{{ $log->date }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">DELETE LOG FILE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to <span class="badge badge-danger">DELETE</span> this log file
                                    <span class="badge badge-primary">{{ $log->date }}</span> ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary mr-auto" data-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-sm btn-danger" data-loading-text="Loading&hellip;">
                                    DELETE FILE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('layouts.partials.footer')
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            var deleteLogModal = $('div#delete-log-modal'),
                deleteLogForm = $('form#delete-log-form'),
                submitBtn = deleteLogForm.find('button[type=submit]');

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
                            location.replace("{{ route('log-viewer::logs.list') }}");
                        }
                        else {
                            alert('OOPS ! This is a lack of coffee exception !')
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

            @unless (empty(log_styler()->toHighlight()))
            $('.stack-content').each(function () {
                var $this = $(this);
                var html = $this.html().trim()
                    .replace(/({!! join(log_styler()->toHighlight(), '|') !!})/gm, '<strong>$1</strong>');

                $this.html(html);
            });
            @endunless
        });
    </script>
@endsection
