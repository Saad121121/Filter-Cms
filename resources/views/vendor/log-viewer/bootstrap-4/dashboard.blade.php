{{--@extends('log-viewer::bootstrap-4._master')--}}
@extends('layouts.app')

@push('after-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('log_viewer.css') }}">
    <style>
        .info-box{
            min-height: 70px!important;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box card">
                    <div class="card-body">
                    <div class="page-header m-0">
                        <h3 class="box-title pull-left">Log Viewer</h3>
                        <div class="pull-right">
                            <a href="{{  asset('/log-viewers/logs') }}" class="btn btn-sm btn-default m-r-5"><span class="fa fa-plus"></span> Logs</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @if(($percents))
                                <div class="col-lg-3 col-sm-5">
                                    <canvas id="stats-doughnut-chart" height="300" width="300px"></canvas>
                                </div>
                                <div class="col-lg-9  col-sm-7">
                                    <section class="box-body">
                                        <div class="row">
                                            @foreach($percents as $level => $item)
                                                <div class="col-lg-4 col-md-12  ">
                                                    <div class="info-box level level-{{ $level }} {{ $item['count'] === 0 ? 'level-empty' : '' }}">
                                <span class="info-box-icon">
                                    {!! log_styler()->icon($level) !!}
                                </span>

                                                        <div class="info-box-content">
                                                            <span class="info-box-text">{{ $item['name'] }}</span>
                                                            <span class="info-box-number">
                                        {{ $item['count'] }} entries - {!! $item['percent'] !!} %
                                    </span>
                                                            <div class="progress">
                                                                <div class="progress-bar" style="width: {{ $item['percent'] }}%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </section>
                                </div>
                            @else
                                <h4>Currently there is no logs </h4>
                            @endif
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>

    <script>
        $(function() {
            @if($chartData != null)
            new Chart(document.getElementById("stats-doughnut-chart"), {
                type: 'doughnut',
                data: {!! $chartData !!},
                options: {
                    legend: {
                        position: 'bottom'
                    }
                }
            });
            @endif
        });
    </script>
@endpush